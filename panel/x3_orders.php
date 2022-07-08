<?php

// check login
if(!isset($core)){
	require_once 'filemanager_core.php';
	$core = new filemanager_core();
}

// login required
if($core->isLogin() and isset($_SERVER['HTTP_X_REQUESTED_WITH']) and strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {

  // ORDERS_DIR
  define('ORDERS_DIR', '../config/orders');

  // always JSON
  header('content-type: application/json');

  // check config/orders dir
  if(!file_exists(ORDERS_DIR)) exit('{}');

  // get_orders function
  function get_orders(){
    $files = glob(ORDERS_DIR . '/order.*.json');
    if(empty($files)) exit('{}');
    return $files;
  }

  // action
  $action = isset($_POST['action']) ? $_POST['action'] : 'load';

  // delete all
  if($action === 'delete_all') {
    $order_files = get_orders();

    // delete all
    $deleted = 0;
    foreach ($order_files as $order_file) $deleted += (@unlink($order_file) ? 1 : 0);

    // success
    echo json_encode(['success' => ($deleted === count($order_files))]);

  // delete order file
  } else if($action === 'delete') {
    $path = ORDERS_DIR . '/' . $_POST['file'];
    echo json_encode(['success' => !file_exists($path)?:@unlink($path)]);

  // load all orders and return as JSON
  } else if($action === 'load'){
    $order_files = get_orders();

    $arr = [];
    foreach ($order_files as $order_file) $arr[basename($order_file)] = json_decode(file_get_contents($order_file), true);
    echo json_encode($arr, JSON_UNESCAPED_UNICODE);
  }
}
