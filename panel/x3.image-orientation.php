<?php

function fix_orientation($orientation, $fileandpath, $ext, $quality) {

  // Gets the GD image resource for loaded image
  $img_res = get_image_resource($fileandpath, $ext);

  // If it failed to load a resource, give up
  if(is_null($img_res)) return false;

  // auto rotate
  switch($orientation) {

    // Correct orientation, but flipped on the horizontal axis (might do it at some point in the future)
    case 2:
      $final_img = imageflip($img_res, IMG_FLIP_HORIZONTAL);
    break;

    // Upside-Down
    case 3:
      $final_img = imageflip($img_res, IMG_FLIP_VERTICAL);
    break;

    // Upside-Down & Flipped along horizontal axis
    case 4:
      $final_img = imageflip($img_res, IMG_FLIP_BOTH);
    break;

    // Turned 90 deg to the left and flipped
    case 5:
      $final_img = imagerotate($img_res, -90, 0);
      $final_img = imageflip($img_res, IMG_FLIP_HORIZONTAL);
    break;

    // Turned 90 deg to the left
    case 6:
      $final_img = imagerotate($img_res, -90, 0);
    break;

    // Turned 90 deg to the right and flipped
    case 7:
      $final_img = imagerotate($img_res, 90, 0);
      $final_img = imageflip($img_res,IMG_FLIP_HORIZONTAL);
    break;

    // Turned 90 deg to the right
    case 8:
      $final_img = imagerotate($img_res, 90, 0);
    break;
  }

  // If theres no final image resource to output for whatever reason, give up
  if(!isset($final_img)) return false;

  // save image
  save_image_resource($final_img, $fileandpath, $ext, $quality);

	// Free up memory
	imagedestroy($img_res);
	imagedestroy($final_img);
}

// get image
function get_image_resource($file, $ext) {
  $img = null;
  switch($ext) {

    case "png":
      $img = imagecreatefrompng($file);
      break;

    case "jpg":
    case "jpeg":
      $img = imagecreatefromjpeg($file);
      break;

    case "gif":
      $img = imagecreatefromgif($file);

  }
  return $img;
}

// save image
function save_image_resource($resource, $location, $ext, $quality) {
  $success = false;
  switch($ext) {

    case "png":
      $success = imagepng($resource,$location,$quality);
      break;

    case "jpg":
    case "jpeg":
      $success = imagejpeg($resource,$location,$quality);
      break;
    case "gif":
      $success = imagegif($resource,$location,$quality);
      break;

  }
  return $success;
}

// imageflip polyfill
if(!function_exists('imageflip')) {

  // These are the same constants so this script should be upgrade safe, the values are different no doubt, but that won't hurt!
  define("IMG_FLIP_HORIZONTAL", 1);
  define("IMG_FLIP_VERTICAL", 2);
  define("IMG_FLIP_BOTH", 3);

  function imageflip($resource, $mode) {
    if($mode == IMG_FLIP_VERTICAL || $mode == IMG_FLIP_BOTH) {
      $resource = imagerotate($resource, 180, 0);
    } else if($mode == IMG_FLIP_HORIZONTAL || $mode == IMG_FLIP_BOTH){
    	$resource = imagerotate($resource, 90, 0);
    }
    return $resource;
  }
}


?>