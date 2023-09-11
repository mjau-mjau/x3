<?xml version="1.0" encoding="UTF-8"?>
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
      .changefreq, .priority {
        display: none;
      }
      </style>
    </head>
    <body>
      <main class="container">
        <h1>Sitemap viewer</h1>
        <article>
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

<xsl:template match="sm:changefreq">
  <td class="changefreq"><xsl:apply-templates/></td>
</xsl:template>

<xsl:template match="sm:priority">
  <td class="priority"><xsl:apply-templates/></td>
</xsl:template>

<xsl:template match="image:image">
  <xsl:variable name="loc">
    <xsl:value-of select="image:loc"/>
  </xsl:variable>
    <a href="{$loc}" class="sitemap-url sitemap-url-image" target="_blank"><xsl:value-of select="image:loc"/></a>
  <xsl:apply-templates/>
</xsl:template>
</xsl:stylesheet>
