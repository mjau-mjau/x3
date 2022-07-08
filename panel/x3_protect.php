<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

//
if(!isset($core)){
	require_once 'filemanager_core.php';
	$core = new filemanager_core();
}

//
if($core->isLogin() and isset($_SERVER['HTTP_X_REQUESTED_WITH']) and strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {

	// vars
	$file = '../config/protect.json';
	header('content-type: application/json');

	// save
	if(isset($_POST['action'])) {

		// exit if guest
		if($core->is_guest()) exit('{ "error": "Guest user cannot make changes." }');

		// create json
		$protect = isset($_POST['protect']) ? $_POST['protect'] : false;
		$json = !empty($protect) ? (phpversion() < 5.4 ? @json_encode($protect) : @json_encode($protect, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES)) : false;

		// empty, delete file
		if(empty($json)){
			echo @unlink($file) ? '{}' : '{ "error": "Can\'t delete file ' . $file . '" }';

		// write json
		} else {

			// invalidate auto-cache.json in case a newly protected page is stored
			$core->touchme();

			// write
			echo @file_put_contents($file, $json) ? $json : '{ "error": "Can\'t write to file ' . $file . '" }';
		}

	// Get settings
	} else {
		$protect = file_exists($file) ? @file_get_contents($file) : false;
		echo !empty($protect) ? trim($protect) : '{}';
	}
}

?>
