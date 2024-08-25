<?php

// physically rotate image according to exif orientation
function fix_orientation($orientation, $fileandpath, $ext, $quality) {

  // Gets the GD image resource for loaded image
  $img_res = get_image_resource($fileandpath, $ext);

  // If it failed to load a resource, give up
  if(is_null($img_res)) return false;

  // array of orientation values to rotate (4, 5 and 7  will also be flipped)
  $orientation_to_rotation = [3 => 180, 4 => 180, 5 => 270, 6 => 270, 7 => 90, 8 => 90];
  // return if orientation is not valid or is not in array (does not require rotation)
  if(!array_key_exists($orientation, $orientation_to_rotation)) return;
  // rotate image according to exif $orientation, write back to already-resized image destination resource
  $img_res = imagerotate($img_res, $orientation_to_rotation[$orientation], 0);
  // after rotation, orientation values 4, 5 and 7 also need to be flipped in place
  if(in_array($orientation, [4, 5, 7]) && function_exists('imageflip')) imageflip($img_res, IMG_FLIP_HORIZONTAL);

  // save image
  save_image_resource($img_res, $fileandpath, $ext, $quality);

	// Free up memory
	imagedestroy($img_res);
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
?>
