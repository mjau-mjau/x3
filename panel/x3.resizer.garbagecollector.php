<?php

/* x3.resizer.garbagecollector.php
- collects and deletes expired image resize cache items in ./render/*, based on the following:

1. Cache path does not match any content path (images are moved or deleted).
2. Cache item modified-time < content item modified-time (content item is newer than cached item).
3. Cache item has not been accessed (atime) for 90 days (for example layout changed).

- Can also delete all cache, with or without pattern. Includes simulate option.
*/

// display all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// don't cache
header('Expires: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0, s-maxage=0');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');	

// X3 resizer cache garbage collector
class garbage {

	//
	private $deleted_files = array();
	private $deleted_dirs = array();
	private $total_size = 0;
	private $total_files = 0;

	// messenger
	private function msg($msg, $success = true){
		header('Content-Type: application/json');
		if(isset($_SERVER['REQUEST_TIME_FLOAT'])) header('X3-time: ' . round((microtime(true) - $_SERVER['REQUEST_TIME_FLOAT']) * 1000) . ' ms');

		// json
		echo json_encode(array(
			'msg' => $msg,
			'success' => $success,
			'deleted_files' => count($this->deleted_files),
			'deleted_dirs' => count($this->deleted_dirs),
			'total_size' => round($this->total_size / 1048576, 1),
			'total_files' => $this->total_files
		));
		exit;
	}

	// looper
	private function looper($dir, $delete_dir = false){
		$items = glob($dir . DIRECTORY_SEPARATOR . '*', GLOB_NOSORT);
		$delete_count = 0;
		$items_count = !empty($items) ? count($items) : 0;
		if(!$items_count) return true; // schedule dir for delete

		// loop
		foreach ($items as $item) {

			// check match
			$rel_path = substr($item, strlen($this->render_path));
			$path_array = array_values(array_filter(explode('/', $rel_path, 3)));
			$resize = $path_array[0];
			$content_path = isset($path_array[1]) ? $this->content_path . DIRECTORY_SEPARATOR . $path_array[1] : false;

			// delete if delete_dir || delete all w/ pattern match || !file_exists($content_path)
			$delete = $delete_dir || ($this->delete && (!$this->pattern || fnmatch('*' . trim($this->pattern, '*') . '*', $rel_path))) || ($content_path && !file_exists($content_path));

			// symlink just delete it. Should not exist, but we don't want to follow it.
			if(is_link($item)){
				if(unlink($item)) $delete_count ++;

			// dir
			} else if(is_dir($item)) {

				// delete if dir content is empty (or deleted) && (simulate || rmdir) 
				if($this->looper($item, $delete) && ($this->simulate || rmdir($item))) {
					$this->deleted_dirs[] = $item;
					$delete_count ++;
				}

			// file
			} else if(is_file($item)){

				// delete if delete || cache is older than source || cache is not accessed in 180 days (!w100-c1.1 !w200-c1.1)
					// && (simulate || unlink)
				if(($delete || filemtime($item) < filemtime($content_path) || (!in_array($resize, array('w100-c1.1', 'w200-c1.1')) && time() - fileatime($item) > 15552000)) && ($this->simulate || unlink($item))) {
					// time!
					$this->deleted_files[] = $item;
					$delete_count ++;
				} else {
					$this->total_size += filesize($item);
					$this->total_files ++;
				}
			}
		}

		// return true if delete all inside
		return $delete_count === $items_count;
	}

	// check time / check if garbage collector ran rencently. For automated garbage collector.
	private function check_time(){
		if(!$this->check_time) return;
		$time_file = $this->render_path . DIRECTORY_SEPARATOR . 'x3.garbage.time';
		$time_diff = file_exists($time_file) ? time() - filemtime($time_file) : false;
		if($time_diff && $time_diff < 86400) $this->msg('Garbage already checked ' . $time_diff . ' seconds ago.', true);
		@touch($time_file);
	}

	// construct
	function __construct() {

		// xmlhttprequest only
		if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest' || $_SERVER['REQUEST_METHOD'] != 'POST') exit('no.');

		// require login
		require './filemanager_core.php';
		$core = new filemanager_core();
		if(!$core->isLogin()) $this->msg('You are not logged in.', false);
		if($core->is_guest()) $this->msg('Guest user cannot make changes.', false);

		// check render path and content path
		$this->x3_root = dirname(__DIR__);
		$this->render_path = $this->x3_root . DIRECTORY_SEPARATOR . 'render';
		if(!is_dir($this->render_path)) $this->msg($this->render_path . ' does not exist.', true);
		$this->content_path = $this->x3_root . DIRECTORY_SEPARATOR . 'content';
		if(!is_dir($this->content_path)) $this->msg('./content directory does not exist.', false);

		// get parameters
		foreach (array('delete', 'pattern', 'simulate', 'check_time') as $val) $this->$val = isset($_POST[$val]) && !empty($_POST[$val]) ? $_POST[$val] : false;

		// check time
		$this->check_time();
		
		// start loop
		$this->looper($this->render_path);

		// output json
		$this->msg('Complete');
	}
}

//
new garbage();