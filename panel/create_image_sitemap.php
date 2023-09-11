<?php

/*
X3 Sitemap Creator Version 0.1.0
[create_image_sitemap.php]
Creates sitemap.xml in X3 website root with links to images and their image landing pages.

## Instructions
Upload the script into your panel folder, login to your X3 panel, and run in browser from /panel/create_image_sitemap.php

## Typical XML output looks like this, with one page and one image landing page in the example below
`
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
  <url>
    <loc>https://demo.photo.gallery/galleries/landscapes/</loc>
    <lastmod>2022-04-19T15:33:37+07:00</lastmod>
  </url>
  <url>
    <loc>https://demo.photo.gallery/galleries/landscapes/antarctica/</loc>
    <lastmod>2018-07-26T22:41:08+07:00</lastmod>
    <image:image>
      <image:loc>https://demo.photo.gallery/content/galleries/landscapes/antarctica.jpg</image:loc>
    </image:image>
  </url>
</urlset>
`

## [todo]
- regex option for dirs and images independently?
*/

// [CONFIG]
// set to FALSE to disable image landing pages, and instead add images inside their gallery page
define('IMAGE_LANDING_PAGES', TRUE);

// return xsl stylesheet for ?preview=1 mode
if(get_query('xsl')) get_xsl();

// error reporting for now
error_reporting(E_ALL);
ini_set('display_errors', 1);

// require X3 panel login
require 'filemanager_core.php';
$core = new filemanager_core();
if(!$core->isLogin()) exit('You must be logged in to the <a href="./" target="_blank">X3 control panel</a> to run this script.');
if($core->is_guest()) exit('Guest users can\'t run this script.');

// don't create images sitemap if Settings > Advanced > [Prevent search engines from indexing image pages] is enabled
if(X3Config::$config["settings"]["image_noindex"]) exit('You have disabled panel Settings > Advanced > [Prevent search engines from indexing image pages]');

// root dir starts from ./content
$root_dir = '../content';
if(!file_exists($root_dir) || !is_readable($root_dir)) exit($root_dir . ' does not exist or is not readable.');

// *.json file to array helper
function get_json($file){
  $contents = file_exists($file) && is_readable($file) ? @file_get_contents($file) : false;
  $array = !empty($contents) ? @json_decode(trim($contents), true) : false;
  return !empty($array) ? $array : []; // always return array, because value could be FALSE
}

// get protected urls
function get_protected_urls(){
  $array = get_json('../config/protect.json');
  if(empty($array) || !isset($array['access']) || empty($array['access'])) return [];
  // create flat array of protected urls
  $urls = [];
  foreach (array_keys($array['access']) as $key) {
    // IF * key exists, global login is assigned, don't index.
    if($key === '*') exit('Entire website is password protected. No url\'s will get indexed.');
    // flatten grouped access links
    foreach (explode(',', $key) as $url) $urls[] = $url;
  }
  // remove duplicates and return
  return array_unique($urls);
}
define('PROTECTED_URLS', get_protected_urls());

// get hidden folders hidden by "hide" button in X3 panel
function get_hidden_folders(){
  $hidden = [];
  foreach (get_json('../content/folders.json') as $path => $props) {
    if(isset($props['hidden']) && $props['hidden']) $hidden[] = $path;
  }
  return $hidden;
}
define('HIDDEN_FOLDERS', get_hidden_folders());

// define global HIDE_IMAGES / starts with __ (default) or _ or false
function get_hide_images(){
  $hide_images_underscore = X3Config::$config["settings"]["hide_images"];
  return $hide_images_underscore === 'double' ? '__' : ($hide_images_underscore === 'single' ? '_' : false);
}
define('HIDE_IMAGES_UNDERSCORE', get_hide_images());

// define SITE_URL constant with http or https
function get_site_url() {
  $protocol = (isset($_SERVER['SERVER_PROTOCOL']) && stripos($_SERVER['SERVER_PROTOCOL'], 'https') === 0) ||
              (isset($_SERVER['REQUEST_SCHEME']) && stripos($_SERVER['REQUEST_SCHEME'], 'https') === 0) ||
              (isset($_SERVER['HTTPS']) && in_array($_SERVER['HTTPS'], ['on', 1])) ||
              (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' ) ? 'https' : 'http';
  return $protocol . '://' . $_SERVER['HTTP_HOST'] . substr(dirname(__DIR__), strlen($_SERVER['DOCUMENT_ROOT']));
}
define('SITE_URL', get_site_url());

// escape entities / https://www.sitemaps.org/protocol.html#escaping / better than htmlentities()
function escape_entities($path) {
  return str_replace(['&', "'", '"', '>', '<'], ['&amp;', '&apos;', '&quot;', '&gt;', '&lt;'], $path);
}

// get page path / escape entities and replace spaces with _underscore
function get_page_path($path) {
  return str_replace([' ', '.', '+'], '_', escape_entities($path)) . '/';
}

// get X3 full page url / replace 3.numbered folders and ../content/, escape entities and replace spaces
function get_page_url($path){
  $page_path = get_page_path(preg_replace('/\d+?\./', '', str_replace('../content/', '/', $path)));
  return SITE_URL . ($page_path === '/index/' ? '/' : $page_path);
}

// Convert image name to page slug, appended to page url / replace 3.numbered names and remove extension
function get_image_slug($basename, $ext){
  return get_page_path(preg_replace(['/' . $ext . '$/', '/^\d+?\./'], '', $basename));
}

// get image url / physical path
function get_image_url($path) {
  return SITE_URL . escape_entities(str_replace('../content/', '/content/', str_replace(' ', '%20', $path)));
}

// get image landing page and image url, unless excluded
function get_image_xml($path, $page_settings, $page_url) {
  $basename = basename($path);

  // exclude image based on any of the following conditions
  if(empty($basename) // empty name
  || isset($page_settings[$basename]['hidden']) && $page_settings[$basename]['hidden'] // image is hidden from panel
  || isset($page_settings[$basename]['link']) && $page_settings[$basename]['link'] // image is link
  || (HIDE_IMAGES_UNDERSCORE && strpos($basename, HIDE_IMAGES_UNDERSCORE) === 0) // image starts with __underscore
  || !preg_match('/\.(jpe?g|png|gif|webp)$/i', $basename, $matches) // file is not image type
  || preg_match('/^(preview|thumb)' . $matches[0] . '$/', $basename) // image name starts with ^preview or ^thumb
  ) return '';

  // return image xml
  $image = '<image:image><image:loc>' . get_image_url($path) . '</image:loc></image:image>';
  return IMAGE_LANDING_PAGES ? '<url><loc>' . $page_url . get_image_slug($basename, $matches[0]) .'</loc><lastmod>' . date('c', filemtime($path)) . '</lastmod>' . $image . '</url>' : $image;
}

// global array populated and used to keep in check what assets dirs have already been added to sitemap.
$images_added_from_dirs = [];

// check if images from dir were already added
function images_added($path){
  global $images_added_from_dirs; // get global array
  if(in_array($path, $images_added_from_dirs)) return true; // already added, return
  $images_added_from_dirs[] = $path; // add this $path as already added for future reference
}

// gallery hidden, don't add images (assets folder also)
function gallery_hidden($page_settings){
  return $page_settings['gallery']['hide'] // gallery hidden for page
  || strpos($page_settings['layout']['items'], 'gallery') === false; // gallery module removed from page layout items
}

// add assets from another dir when [gallery assets] is assigned
function get_assets($assets){

  // get real assets path
  $path = '../content/' . trim($assets, '/');

  // return if this images from this assets dir were already added, for example if assets dir was normal dir
  if(images_added($path)) return;

  // get files in assets dir
  $files = is_dir($path) && is_readable($path) ? glob($path . '/*', GLOB_NOSORT) : false;
  if(empty($files)) return; // return if empty

  // get asset page settings, to exclude gallery[hidden] options and individually hidden images
  $page_settings = array_replace_recursive(X3Config::$config, get_json($path . '/page.json'));

  // gallery in dir is hidden, or gallery is not in page layout items / don't add images, even if is assets
  if(gallery_hidden($page_settings)) return '';

  // get page url for assets dir / assets page is not listed, but image page urls are relative to assets dir
  $page_url = get_page_url($path);

  // start xml output
  $xml = '';

  // loop all files and get image xml when applicable
  foreach ($files as $path) $xml .= get_image_xml($path, $page_settings, $page_url);

  // return xml
  return $xml;
}

// get files and folders in each dir recursively / add urls
function glob_dir($path){

  // exclude dirs based on any of the following conditions, and don't scan subdirs either
  if($path === '../content/custom' // X3's custom dir
  || preg_match('/\/_/', $path) // folders is hidden when starts with _underscore
  || in_array(str_replace('../content/', '', $path), HIDDEN_FOLDERS) // folder is hidden from panel
  || in_array(str_replace('../content/', '', preg_replace('/\/\d+?\./', '/', $path)) . '/', PROTECTED_URLS) // folder is passworded
  ) return '';

  // get page settings from page.json, merged with global settings / assets/
  $page_settings = array_replace_recursive(X3Config::$config, get_json($path . '/page.json'));

  // page is link, dont add to sitemap and don't scan subdirs (shouldn't be anything inside links)
  if(!empty($page_settings['link']['url'])) return '';

  // get page url
  $page_url = get_page_url($path);

  // gallery in dir is hidden, or gallery is not in page layout items / don't add images, even if is assets
  $gallery_hidden = gallery_hidden($page_settings);

  // add page url <loc> and <lastmod>
  // for <lastmod>, use newest of folder modified (files added/removed) or page.json (modified page settings)
  $xml = '<url><loc>' . $page_url . '</loc><lastmod>' . date('c', max(file_exists($path . '/page.json' ? filemtime($path . '/page.json') : 0), filemtime($path))) . '</lastmod>' . (IMAGE_LANDING_PAGES ? '</url>' : '');

  // check if assets is used / add assets to sitemap, and ignore the page's own images (if any)
  $assets = $page_settings['gallery']['assets'] ?: false;
  if($assets && !$gallery_hidden) $xml .= get_assets($assets);

  // check if images from this dir were already added, for example if it's used as assets for another page, then don't re-add.
  $images_added = images_added($path);

  // get files inside dir
  $files = glob($path . '/*', GLOB_NOSORT);

  // collect all child dirs in array to loop them after images in dir are added
  $dirs = [];

  // loop all files
  foreach ($files as $file) {

    // if dir, store in array
    if(is_dir($file)) {
      $dirs[] = $file;

    // get image xml if not using assets and images not already added from this dir (if this dir is used as assets elsewhere)
    } else if(!$assets && !$images_added && !$gallery_hidden) {

      // get image xml if file is applicable
      $xml .= get_image_xml($file, $page_settings, $page_url);
    }
  }

  //
  if(!IMAGE_LANDING_PAGES) $xml .= '</url>';

  // loop child dirs
  foreach ($dirs as $dir) $xml .= glob_dir($dir);

  // return XML
  return $xml;
}

// start XML from root dirs / no images in $root_dir /content/, because it's not a page, just a container / use GLOB_ONLYDIR
function get_root($root_dir){
  $xml = '';
  foreach (glob($root_dir . '/*', GLOB_NOSORT|GLOB_ONLYDIR) as $dir) $xml .= glob_dir($dir);
  if(empty($xml)) exit('No url\'s to add to sitemap.xml. Aborted.');
  return $xml;
}

//
function get_query($query){
  return isset($_GET[$query]) && !empty($_GET[$query]) ? $_GET[$query] : false;
}

// delete=1 action
$deleted = get_query('delete') && file_exists('../sitemap.xml') && is_writable('../sitemap.xml') && @unlink('../sitemap.xml');
// current
$xml_preview = false;

// Include XML container
if(get_query('create') || get_query('preview')) {
  $time_start = microtime(true);
  $xml_urlset = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . get_root($root_dir) . '</urlset>';
  $xml_preview = '<?xml version="1.0" encoding="UTF-8"?><?xml-stylesheet href="' . $_SERVER['PHP_SELF'] . '?xsl=1&amp;time=' . (microtime(true) - $time_start) . (get_query('create') ? '&amp;created=1' : '&amp;preview=1') . '" type="text/xsl"?>' . $xml_urlset;
  $xml_write = '<?xml version="1.0" encoding="UTF-8"?>' . $xml_urlset;

//
} else if(file_exists('../sitemap.xml') && is_readable('../sitemap.xml')) {
  $xml_preview = @file_get_contents('../sitemap.xml');
  $xml_preview = !empty($xml_preview) && stripos($xml_preview, 'xml-stylesheet') === false && strpos($xml_preview, '<?xml version="1.0" encoding="UTF-8"?>') === 0 ? str_replace('<?xml version="1.0" encoding="UTF-8"?>', '<?xml version="1.0" encoding="UTF-8"?><?xml-stylesheet href="' . $_SERVER['PHP_SELF'] . '?xsl=1&amp;current=1" type="text/xsl"?>', $xml_preview) : false;
}

// store in website root as sitempa.xml
if(get_query('create') && !@file_put_contents('../sitemap.xml', $xml_write)) exit('Failed to write to ../sitemap.xml');

// output sitemap xml
if($xml_preview) {
  header('Content-Type: text/xml; charset=UTF-8');
  echo $xml_preview;

} else {
?>
  <!doctype html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1.5.10/css/pico.min.css">
      <style type="text/css">
      h1, h2 {
        --typography-spacing-vertical: .5em;
      }
      article {
        padding: 2.5em var(--block-spacing-horizontal);
      }
      </style>
      <title>X3 Sitemap Creator</title>
    </head>
    <body>
      <main class="container">
        <h1>X3 Sitemap Creator</h1>
        <p>Creates a <code>sitemap.xml</code> in X3 website root with links to images and their image landing pages.</p>
        <p>
          <a href="?create=1" role="button">Create</a>
          <a href="?preview=1" role="button" class="secondary">Preview</a>
        </p>
        <?php if(file_exists('../sitemap.xml')) { ?>
          <article>
            Your current <a href="../sitemap.xml?<?php echo filectime('../sitemap.xml'); ?>" target="_blank">sitemap.xml</a> was created on <code><?php echo date('c', filectime('../sitemap.xml')); ?></code>
            <?php if(is_writable('../sitemap.xml')) { ?><br><small><a href="?delete=1">[Delete]</a></small><?php } ?>
          </article>
        <?php } else if($deleted) { ?>
          <article>
            sitemap.xml was deleted.
          </article>
        <?php } ?>
      </main>
    </body>
  </html>
<?php
}

// get xls stylesheet for ?preview=1 mode
function get_xsl(){
  echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<xsl:stylesheet
        version="1.0"
        xmlns:sm="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
        xmlns:mobile="http://www.google.com/schemas/sitemap-mobile/1.0"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xmlns:video="http://www.google.com/schemas/sitemap-video/1.1"
        xmlns:news="http://www.google.com/schemas/sitemap-news/0.9"
        xmlns:fo="http://www.w3.org/1999/XSL/Format"
        xmlns:xhtml="http://www.w3.org/1999/xhtml"
        xmlns="http://www.w3.org/1999/xhtml">
<xsl:output method="html" indent="yes" encoding="UTF-8"/>
  <xsl:template match="/">
    <html>
      <head>
        <title>Sitemap</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1.5.10/css/pico.min.css" />
        <style type="text/css">
        h1, h2 {
          --typography-spacing-vertical: .5em;
        }
        article {
          padding: 2.5em var(--block-spacing-horizontal);
        }
        @media (min-width: 992px) {
          .search {
            max-width: 50%;
          }
        }
        small {
          display: block;
        }
        label {
          cursor: pointer;
        }
        th {
          background-color: var(--progress-background-color);
          font-weight: 600;
        }
        .list tr:hover {
          background-color: var(--code-background-color) !important;
          box-shadow: -2px 0 0 0 currentColor;
          border-radius: 2px 0 0 2px;
        }
        td {
          vertical-align: top;
        }
        .sort {
          cursor: pointer;
        }
        .sort:after {
          vertical-align:baseline;
          margin-left: .3em;
        }
        .sort.asc:after {
          content: '▲';
        }
        .sort.desc:after {
          content: '▼';
        }
        .url {
          line-height: 1.4;
        }
        .modified {
          white-space: nowrap;
          width: 0;
        }
        .sitemap-url {
          word-break: break-all;
          display: block;
        }
        .sitemap-url-page {
          font-weight: 600;
        }
        .sitemap-url-image {
          font-size: .8em;
        }
        </style>
      </head>
      <body>
        <main class="container">
          <h1>X3 Sitemap Creator</h1>
          <p>Creates <code>sitemap.xml</code> in X3 website root with links to images and their image landing pages.</p>
          <p>
            <a href="?create=1" role="button">Create</a>&#160;<a href="?preview=1" role="button" class="secondary">Preview</a><?php if(file_exists('../sitemap.xml') && is_readable('../sitemap.xml')) { ?>&#160;<a href="?current=1" role="button" class="secondary">Current</a><?php } ?>
          </p>
          <article>
            <?php if(get_query('created')) { ?>
              <h2>Sitemap Created</h2>
              <p>New <a href="../sitemap.xml?<?php echo filectime('../sitemap.xml'); ?>" target="_blank">sitemap.xml</a> contains <strong><xsl:value-of select="count(sm:urlset/sm:url)"/></strong> url's and <strong><xsl:value-of select="count(sm:urlset/sm:url/image:image)"/></strong> images.<small>Created in <?php echo round(get_query('time'), 2); ?> seconds.</small>
            <?php } else if(get_query('current')) { ?>
              <h2>Current Sitemap</h2>
              <p>Your current <a href="../sitemap.xml?<?php echo filectime('../sitemap.xml'); ?>" target="_blank">sitemap.xml</a> contains <strong><xsl:value-of select="count(sm:urlset/sm:url)"/></strong> url's and <strong><xsl:value-of select="count(sm:urlset/sm:url/image:image)"/></strong> images.<small>Created on <?php echo date('c', filectime('../sitemap.xml')); ?></small>
            <?php } else if(get_query('preview')) { ?>
              <h2>Sitemap Preview</h2>
              <p>Sitemap will contain <strong><xsl:value-of select="count(sm:urlset/sm:url)"/></strong> url's and <strong><xsl:value-of select="count(sm:urlset/sm:url/image:image)"/></strong> images.<small>Created in <?php echo round(get_query('time'), 2); ?> seconds.</small>
            <?php } ?><small>
            <?php
              if(!get_query('preview') && file_exists('../sitemap.xml')) {
                echo '<a href="?delete=1">[Delete]</a>';
                echo '<a href="https://www.google.com/ping?sitemap=' . get_site_url() . '/sitemap.xml" target="_blank">[Submit to Google]</a>';
              }
            ?></small></p>
            <xsl:apply-templates/>
          </article>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/@exeba/list.js@2.3.1/dist/list.min.js"></script>
        <script>
        const urls = Array.from(document.getElementsByClassName('sitemap-url'));
        if(urls.length){
          const root = urls[0].href.split('/', 3).join('/');
          urls.forEach((url) => url.textContent = url.textContent.replace(root, ''));
        }
        const mylist = new List('sitemap-container', {
          valueNames: ['url', 'modified'],
          searchColumns: ['url']
        }).sort('url', { order: 'asc' });
        </script>
      </body>
    </html>
  </xsl:template>
  <xsl:template match="sm:urlset">
    <div id="sitemap-container">
      <input class="search" placeholder="Search url's" />
      <table cellSpacing="0" cellPadding="0" border="0" role="grid">
        <thead>
          <tr>
            <th class="sort" data-sort="url">URL</th>
            <th class="sort" data-sort="modified">Last Modified</th>
          </tr>
        </thead>
        <tbody class="list">
          <xsl:for-each select="sm:url">
            <tr>
              <xsl:variable name="loc">
                <xsl:value-of select="sm:loc"/>
              </xsl:variable>
              <td class="url">
                <a href="{$loc}" class="sitemap-url sitemap-url-page" target="_blank"><xsl:value-of select="sm:loc"/></a>
                <xsl:apply-templates select="image:*"/>
              </td>
              <xsl:apply-templates select="sm:*"/>
            </tr>
          </xsl:for-each>
        </tbody>
      </table>
    </div>
  </xsl:template>

  <xsl:template match="sm:loc|image:loc|video:*"></xsl:template>

  <xsl:template match="sm:lastmod">
    <td class="modified"><xsl:apply-templates/></td>
  </xsl:template>

  <xsl:template match="image:image">
    <xsl:variable name="loc">
      <xsl:value-of select="image:loc"/>
    </xsl:variable>
      <a href="{$loc}" class="sitemap-url sitemap-url-image" target="_blank"><xsl:value-of select="image:loc"/></a>
    <xsl:apply-templates/>
  </xsl:template>
</xsl:stylesheet>
<?php exit;
}
