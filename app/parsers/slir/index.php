<?php

/* TODO
- exif rotate option?
- imagick support? https://www.php.net/manual/en/book.imagick.php
- gmagick support? https://www.php.net/manual/en/book.gmagick.php
- jpegoptim / jpegtran support
- option to mirror image type or always jpeg
*/

class resizer {

	// default vars available from X3 Panel > Settings > Advanced > Image Resizer
	private $quality = 85; // default quality for jpeg/webp
	private $sharpen = true; // sharpen images, only applies when resampling down
	private $smart_crop = false; // crops image based on image entropy
	private $progressive = false; // progressive for jpeg/webp
	private $copy_icc_profile = false; // copy ICC color profile for jpeg
	private $allowed_width = array(100, 200, 320, 480, 640, 800, 1024, 1280, 1600, 4096, 8192, 16384); // default allowed width requests. Includes sizes for panorama.
	private $max_memory = 128; // max memory allowance when assigning MORE memory than in ini_get('memory_limit')

	// private vars
	private $min_resize_factor = .9; // minimum difference between resize and original for resampling to take place
	private $memory_tweak = 2; // tweak factor assigned to estimating required memory to resize/crop images.
	private $convert_legacy_cache = true; // convert and move image cache from X3.28.0 and earlier
	private $legacy_quality = 90; // default for converting legacy image cache (must match q from legacy cache)

	// object vars
	function object_vars(){
		$debug = get_object_vars($this);
		foreach (array('x3_root', 'abs_path', 'cache_dir', 'cache_path') as $key) if(isset($debug[$key])) $debug[$key] = str_replace($_SERVER['DOCUMENT_ROOT'], '***', $debug[$key]);
		return highlight_string('<?php ' . var_export($debug, true).';', true);
	}

	// error
	private function error($msg, $code = 400, $arr = false){
		$msg .= '<br><br>' . $this->object_vars();
		$this->msg('Error', $msg, $code);
	}

	// debug
	private function debug(){
		$render_path = $this->x3_root . DIRECTORY_SEPARATOR . 'render';
		$this->render_exists = is_dir($render_path);
		if($this->render_exists) {
			$this->render_is_writeable = is_writable($render_path);
			$this->cache_dir_exists = is_dir($this->cache_dir);
			if($this->cache_dir_exists){
				$this->cache_dir_is_writeable = is_writable($this->cache_dir);
				$this->cache_file_exists = is_file($this->cache_path);
				if($this->cache_file_exists) $this->cache_file_is_writeable = is_writable($this->cache_path);
			}
		}
		$msg = $this->object_vars();
		$this->msg('Debug', $msg, 200);
	}

	private function msg($title, $msg, $code = 400){
		header('Expires: ' . gmdate('D, d M Y H:i:s') . ' GMT');
		header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0, s-maxage=0');
		header('Cache-Control: post-check=0, pre-check=0', false);
		header('Pragma: no-cache');
		if(function_exists('http_response_code')) http_response_code($code);
		exit('<h3>' . $title . '</h3>' . $msg);
	}

	// get parameters
	private function get_request(){
		$request_array = explode('/render/', strtok($_SERVER['REQUEST_URI'], '?'), 2);
		$request = count($request_array) === 2 && !empty($request_array[1]) ? array_filter(explode('/', $request_array[1], 2)) : false;

		// error / must be params+path
		if(empty($request) || count($request) !== 2) $this->error('Invalid request parameters.');

		// params
		$p = array();
		foreach (explode('-', $request[0]) as $item) {
			$val = substr($item, 1);
			if($val) $p[$item[0]] = $val; // if $val, must be key also
		}

		// error / must have either w or c
		if(!isset($p['w']) && !isset($p['c'])) $this->error('Must specify either w[width] or c[crop].');

		// get width
		$width = isset($p['w']) ? (int) $p['w'] : false;

		// get crop
		$crop = isset($p['c']) ? preg_split('/(\.|:)/', $p['c']) : false;
		if($crop) {
			$ratio = count($crop) === 2 ? array_filter(array_map('intval', $crop)) : array();
			if(count($ratio) !== 2) $this->error('Crop must be in a valid width:height format with values larger than 0.');
			// round crop ratio down to lowest full numbers (4.2 -> 2.1, 3.9 -> 1.3, etc)
			function gcd($a, $b) { return $b ? gcd($b, $a % $b) : $a; }
			$gcd_num = array_reduce($ratio, 'gcd');
			if($gcd_num != 1) foreach ($ratio as $key => $val) $ratio[$key] = $val / $gcd_num;
			$crop_ratio = $ratio[0] / $ratio[1];
			if($crop_ratio > 10 || $crop_ratio < .1) $this->error('Crop ratio must be 10 or lower.');
		}

		// set request values
		$this->request = array(
			'width' => $width ?: false,
			'crop_ratio' => $crop ? $crop_ratio : false,
			'request' => implode('-', array_filter(array($width ? 'w' . $width : 0, $crop ? 'c' . $ratio[0] . '.' . $ratio[1] : 0)))
		);

		// set paths
		$this->x3_root = PHP_MAJOR_VERSION >= 7 ? dirname(__DIR__, 3) : dirname(dirname(dirname(__DIR__)));
		$this->x3_url_path = str_replace($_SERVER['DOCUMENT_ROOT'], '', $this->x3_root);
		$this->rel_path = trim(urldecode($request[1]), '/');
		$this->content_path = '/content/' . $this->rel_path;
		$abs_path = $this->x3_root . $this->content_path;
		// make sure path exists, is_file() and no mucking around with ../../paths 
		$this->abs_path = $abs_path === realpath($abs_path) && is_file($abs_path) ? $abs_path : false;
		// For security, directories may not contain ':' and images may not contain '..', '<', or '>'.
		if(!$this->abs_path || strpos(dirname($this->rel_path), ':') || preg_match('/(<|>)/', $this->rel_path)) $this->error('Invalid path or file does not exist <a href="' . $this->x3_url_path . $this->content_path . '" target="_blank">' . $this->rel_path . '</a>', 404);
	}

	// set debug
	private function set_debug() {
		$request_uri = $_SERVER['REQUEST_URI'];
		$this->debug = (bool) strpos($request_uri, '?debug');
		$this->force = $this->debug ? (bool) strpos($request_uri, '&force') : false;
		if($this->force) $this->debug = false;
	}

	// set cache path and get cache
  private function get_cache(){
		$this->cache_path = $this->x3_root . DIRECTORY_SEPARATOR . 'render' . DIRECTORY_SEPARATOR . $this->request['request'] . DIRECTORY_SEPARATOR . $this->rel_path;

		// return if debug or force
		if($this->debug || $this->force) return;

		// serve from cache if exists
		if(file_exists($this->cache_path)) $this->serve_image($this->cache_path, 'Cache');
  }

  // get source image data
	private function get_source(){
		$types = array(1 => 'gif', 2 => 'jpeg', 3 => 'png');
		if(defined('IMAGETYPE_WEBP')) $types[IMAGETYPE_WEBP] = 'webp';
		$this->info = getimagesize($this->abs_path, $extra);
		$this->iptc = is_array($extra) && isset($extra['APP13']) ? iptcparse($extra['APP13']) : null;
		$this->source = !empty($this->info) && is_array($this->info) && count($this->info) > 3 ? array_filter(array(
			'width' => (int) $this->info[0],
			'height' => (int) $this->info[1],
			'aspect' => $this->info[0] > 0 && $this->info[1] > 0 ? (float) $this->info[0] / $this->info[1] : false,
			'type' => (int) $this->info[2],
			'type_name' => $this->get_prop_val($this->info[2], $types),
			'mime' => isset($this->info['mime']) && is_string($this->info['mime']) && substr($this->info['mime'], 0, 6) === 'image/' ? $this->info['mime'] : false
		)) : array();
		if(count($this->source) !== 6) $this->error('Invalid image <a href="' . $this->x3_url_path . $this->content_path . '" target="_blank">' . $this->rel_path . '</a>', 400);
	}

	// get config
	private function get_config() {
		$path = $this->x3_root . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.user.json';
		$content = is_file($path) ? file_get_contents($path) : false;
		$config = $content ? json_decode($content, TRUE) : false;
		$r = !empty($config) && isset($config['back']['image_resizer']) ? $config['back']['image_resizer'] : false;
		if(!empty($r)){
			if(isset($r['default_quality'])) {
				$this->quality = $r['default_quality'];
				$this->legacy_quality = $r['default_quality'];
			}
			if(isset($r['progressive']) && in_array($this->source['type'], array(2, 18))) $this->progressive = $r['progressive'];
			if(isset($r['copy_icc_profile']) && $this->source['type'] === 2) $this->copy_icc_profile = $r['copy_icc_profile'];
			if(isset($r['sharpen'])) $this->sharpen = $r['sharpen'];
			if(isset($r['smart_crop'])) $this->smart_crop = $r['smart_crop'];
			if(isset($r['allowed_width'])) {
				$this->allowed_width = $r['allowed_width'] == '0' ? array() : array_unique(array_merge($this->allowed_width, array_filter(array_map('intval', explode(',', $r['allowed_width'])))));
				sort($this->allowed_width, SORT_NUMERIC);
			}
			if(isset($r['max_memory'])) $this->max_memory = (int) $r['max_memory'];
			if($this->debug) $this->config = $r;
		}
		if(!$this->debug && $this->request['width'] && !empty($this->allowed_width) && !in_array($this->request['width'], $this->allowed_width)) $this->error('Invalid width request <strong>' . $this->request['width'] . '</strong>. Allowed widths:<br><br> [' . implode(', ', $this->allowed_width) . ']');
	}

	// calculate render
  private function get_render(){
  	$src_width = $this->source['width'];
		$src_height = $this->source['height'];
		$src_aspect = $this->source['aspect'];
		$request_width = $this->request['width'] ?: $src_width;
		$request_aspect = $this->request['crop_ratio'] ?: $src_aspect;
		$resize = $request_width < $src_width * $this->min_resize_factor;
		$crop = $src_aspect != $request_aspect;
		$crop_factor = $src_aspect / $request_aspect;
		$crop_width = $crop_factor > 1 ? $src_width / $crop_factor : $src_width;
		$crop_height = $crop_factor < 1 ? $src_height * $crop_factor : $src_height;		
		$dst_w = $request_width > $crop_width * $this->min_resize_factor ? $crop_width : $request_width;
		$dst_h = $dst_w / $request_aspect;
		$resample = $crop_width > $dst_w;// && $crop_height > $dst_h;
		if(!$resample) $this->sharpen = false;
		$resize_width = $crop_factor > 1 ? $dst_w * $crop_factor : $dst_w;
		$resize_height = $crop_factor < 1 ? $dst_h / $crop_factor : $dst_h;
  	$this->render = array(
			'crop' => $crop,
			'crop_factor' => $crop_factor,
			'original' => !$crop && !$resize,
			'crop_width' => (int) round($crop_width),
			'crop_height' => (int) round($crop_height),
			'dst_w' => (int) round($dst_w),
			'dst_h' => (int) round($dst_h),
			'resize_width' => (int) round($resize_width),
			'resize_height' => (int) round($resize_height),
			'resample' => $resample,
			'center_crop' => $crop && !$this->smart_crop ? array(
				$crop_factor > 1 ? (int) round(($resize_width - $dst_w) / 2) : 0,
				$crop_factor < 1 ? (int) round(($resize_height - $dst_h) / 2) : 0
			) : false
		);
  }

  // set cache dir
  private function set_cache_dir($retry = false){
		$this->cache_dir = dirname($this->cache_path);

		// create cache_dir
		if(!$this->debug && !file_exists($this->cache_dir) && !@mkdir($this->cache_dir, 0777, true)) {
			// if we get to here, something is wrong.
			// 1. Either cannot write (wrong permissions)
			// 2. Or mkdir already processed by another request running simultaneously. Check again.
			if($retry) $this->error('Failed to create cache directory ' . $this->cache_dir, 500);
			usleep(200000); // wait 0.2 seconds
			$this->set_cache_dir(true);
		}
	}

	// sharpen (auto)
	private function sharpen($image){
		$final = sqrt($this->render['dst_w'] * $this->render['dst_h']) * (750.0 / sqrt($this->render['crop_width'] * $this->render['crop_height']));
		$result = max(round(52 + -0.27810650887573124 * $final + .00047337278106508946 * $final * $final), 0);
		if(!imageconvolution($image, array(
			array(-1, -2, -1),
			array(-2, $result + 12, -2),
			array(-1, -2, -1)
		), $result, 0)) $this->error('Failed to sharpen image.', 500);
	}

	// get non-empty prop val
	private function get_prop_val($name, $array){
		return isset($array[$name]) && !empty($array[$name]) ? $array[$name] : false;
	}

	// get mime. A bit overkill, but won't fail.
	private function get_mime($path){

		// mime should always match source (if assigned)
		if(isset($this->source['mime'])) return $this->source['mime'];

		// mime_content_type
		if(function_exists('mime_content_type')){
			$mime = mime_content_type($path);
			if($mime && strtok($mime, '/') == 'image') return $mime;
		}

		// finfo_open
		if(function_exists('finfo_open')) {
      $finfo = finfo_open(FILEINFO_MIME_TYPE);
      $mime = finfo_file($finfo, $path);
      finfo_close($finfo);
      if($mime && strtok($mime, '/') == 'image') return $mime;
    }

    // mime from extension
    $mime_ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
    if($mime_ext && in_array($mime_ext, array('jpg', 'jpeg', 'webp', 'png', 'gif'))) return 'image/' . str_replace('jpg', 'jpeg', $mime_ext);

    // last resort assume jpeg
    return 'image/jpeg';
	}

	// serve image
	private function serve_image($path, $msg = '', $data = false){
		// header("Last-Modified: $lastModified");
		header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 315360000) . ' GMT');
		header('Cache-Control: public, max-age=315360000, s-max-age=315360000');
		header('content-type: ' . $this->get_mime($path));
		header('content-length: ' . ($data ? strlen($data) : filesize($path)));
		$request_time = $this->get_prop_val('REQUEST_TIME_FLOAT', $_SERVER);
		$info = implode(', ', array_filter(array(
			isset($this->render) ? $this->source['width'] . 'x' . $this->source['height'] . ' => ' . $this->render['dst_w'] . 'x' . $this->render['dst_h'] : false,
			round(memory_get_peak_usage() / 1048576, 1) . 'M',
			$request_time ? round((microtime(true) - $request_time) * 1000) . 'ms' : false
		)));
		header('X3-Resizer: ' . $msg . ' [' . $info . ']');		
		if($data) { 
			echo $data;
		} else if(!readfile($path)){
			header('content-type: text/html');
			$url_path = str_replace($_SERVER['DOCUMENT_ROOT'], '', $path);
			$this->error('Could not read file <a href="' . $url_path . '" target="_blank">' . $url_path . '</a>', 404);
		}
		exit;
	}

	// copy ICC profile
	private function copyICCProfile(){
    require __DIR__ . '/icc/class.jpeg_icc.php';
    try {
      $o = new JPEG_ICC();
      $o->LoadFromJPEG($this->abs_path);
      $o->SaveToJPEG($this->cache_path);
    } catch (Exception $e) {
    	// on fail, continue // $this->error('Failed to copy ICC color profile to ' . $this->cache_path, 500);
    }
  }

  // set memory
  private function set_memory(){

  	// get 
  	$limit = @ini_get('memory_limit');
		$limit = !empty($limit) ? (int) $limit : false;
		if(!$limit || $limit >= $this->max_memory) return;

		// destination resize/smart_crop or crop
		$dst_w = $this->render['resample'] || $this->smart_crop ? $this->render['resize_width'] : $this->render['dst_w'];
		$dst_h = $this->render['resample'] || $this->smart_crop ? $this->render['resize_height'] : $this->render['dst_h'];

		// memory required / (src + resize) * tweak / MB
		$src_area = $this->source['width'] * $this->source['height'];
		$dst_area = $dst_w * $dst_h;
		$mb = 1048576;
		$desired = 2 * $mb + ($src_area * 3 + $dst_area * 3) * $this->memory_tweak;
		if($this->sharpen) $desired += $dst_area * 4 / ($src_area/$dst_area);
		$desired = (int) ceil($desired / $mb);
		$new = min($desired, $this->max_memory);

		// set ini
		$changed = $new > $limit ? (bool) @ini_set('memory_limit', $new . 'M') : false;

		// debug
		if($this->debug) $this->memory = array('limit' => $limit . 'M', 'desired' => $desired . 'M', 'new' => $new . 'M', 'changed' => $changed);
  }

  // convert and serve from legacy cache (X3.28.0 and earlier)
  private function legacy_cache(){

  	// return
  	if(!$this->convert_legacy_cache || $this->debug || $this->force) return;

  	// legacy cache dir
  	$legacy_cache_dir = $this->x3_root . DIRECTORY_SEPARATOR . '_cache' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'rendered';

  	// return
  	if(!is_dir($legacy_cache_dir)) return;

  	// array to match legacy cache file names in _cache/images/rendered directory
		$arr = array(
			'path' => '../../..' . $this->content_path,
			'width' => (float) $this->render['resize_width'],
			'height' => (float) $this->render['resize_height'],
			'cropWidth' => $this->render['crop'] ? (float) $this->render['dst_w'] : null,
			'cropHeight' => $this->render['crop'] ? (float) $this->render['dst_h'] : null,
			'iptc' => $this->iptc,
			'quality' => (int) $this->legacy_quality,
			'progressive' => true,
			'background' => null,
			'cropper' => 'centered'
		);

		// legacy cache path
		$legacy_cache_path = $legacy_cache_dir . DIRECTORY_SEPARATOR . md5($arr['path'] . serialize($arr));

		// return if legacy cache does not exist
		if(!is_file($legacy_cache_path)) return;

		// attempt to move and rename legacy cache file to new cache path
		if(!rename($legacy_cache_path, $this->cache_path)) $this->error('Failed to move legacy cache from ' . $legacy_cache_path . ' to ' . $this->cache_path, 500);

		// success, serve converted image
		$this->serve_image($this->cache_path, 'Legacy cache converted');
  }

	// construct
	function __construct() {

		// get request parameters from url
		$this->get_request();

		// set debug
		$this->set_debug();

		// set cache path and get cache if exists
		$this->get_cache();

		// get source;
		$this->get_source();

		// get config
		$this->get_config();

		// get render
		$this->get_render();

		// serve original image if appropriate
		if(!$this->debug && $this->render['original']) $this->serve_image($this->abs_path, 'Original');

		// cache dir
		$this->set_cache_dir();

		// legacy cache
		$this->legacy_cache();

		// set memory
		$this->set_memory();

		// debug
		if($this->debug) $this->debug();

		// IMAGE
		// create src image (resize or crop required)
		$image = call_user_func('imagecreatefrom' . $this->source['type_name'], $this->abs_path);
		if(!$image) $this->error('Failed to call imagecreatefrom' . $this->source['type_name'] . '()', 500);

		// resize required
		if($this->render['resample']){
			$resized_image = imagecreatetruecolor($this->render['resize_width'], $this->render['resize_height']);
			if(!$resized_image || !imagecopyresampled($resized_image, $image, 0, 0, 0, 0, $this->render['resize_width'], $this->render['resize_height'], $this->source['width'], $this->source['height'])) $this->error('Failed to resize image.', 500);
			imagedestroy($image);
			$image = $resized_image;
			unset($resized_image);
		}

		// crop
		if($this->render['crop']){
	    if($this->smart_crop) require __DIR__ . '/smart_crop.php';
	    list($crop_x, $crop_y) = $this->smart_crop ? (new smart_crop($image))->get_resized($this->render['dst_w'], $this->render['dst_h']) : $this->render['center_crop'];
			$cropped_image = imagecreatetruecolor($this->render['dst_w'], $this->render['dst_h']);
			if(!$cropped_image || !imagecopy($cropped_image, $image, 0, 0, $crop_x, $crop_y, $this->render['dst_w'], $this->render['dst_h'])) $this->error('Failed to crop image.', 500);
			imagedestroy($image);
			$image = $cropped_image;
			unset($cropped_image);
		}

		// sharpen
		if($this->sharpen) $this->sharpen($image);

		// progressive / interlace
		if($this->progressive && !imageinterlace($image, 1)) $this->error('Failed to interlace (progressive) image.', 500);

		// change quality to format defaults if png or gif
		if(!in_array($this->source['type'], array(2, 18))) $this->quality = $this->source['type'] == 1 ? null : -1;

		// if copy ICC profile, save to cache before copying ICC profile, then serve from cached file
		if($this->copy_icc_profile) {
			if(!call_user_func('image' . $this->source['type_name'], $image, $this->cache_path, $this->quality)) $this->error('Failed to create image.', 500);
			imagedestroy($image);
			$data = false;
			$this->copyICCProfile();

		// create in memory, save data to cache, server from memory
		} else {
			ob_start(NULL);
			if(!call_user_func('image' . $this->source['type_name'], $image, null, $this->quality)) $this->error('Failed to create image.', 500);
			imagedestroy($image);
			$data = ob_get_contents();
			ob_end_clean();
			if(!file_put_contents($this->cache_path, $data)) $this->error('Failed to save cache ' . $this->cache_path, 500);
		}

		// serve image, from data or cache_path
		$this->serve_image($this->cache_path, 'Rendered and cached', $data);
	}
}

// new resizer
new resizer;
