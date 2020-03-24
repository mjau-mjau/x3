<?php

Class Asset {

  var $data;
  var $link_path;
  var $file_name;
  static $identifiers;

  function __construct($file_path) {
    # create and store data required for this asset
    $this->set_default_data($file_path);
  }

  # X3 validate utf8 for IPTC outputs (image.inc.php)
  # http://stackoverflow.com/questions/4407854/how-to-detect-if-have-to-apply-utf8-decode-or-encode-on-a-string
  function utf8_validate($string){
    // return preg_match('!!u', $string) ? $string : mb_convert_encoding($string, 'UTF-8', 'pass');
    return @mb_detect_encoding($string, 'UTF-8', true) ? $string : @utf8_encode($string);
  }

  function set_default_data($file_path) {

    # extract filename from path
    $split_path = explode('/', $file_path);
    $this->file_name = array_pop($split_path);

    # set asset.url & asset.name variables
    $this->data['url'] = $file_path;
    $this->data['file_name'] = $this->file_name;
    $this->data['id'] = Helpers::attribute_friendly($this->file_name);
    $this->data['name'] = ucfirst(preg_replace(array('/[-_]/', '/\.[\w\d]+?$/', '/^\d+?\./'), array(' ', '', ''), $this->file_name));
    if(!isset($this->data['index'])) $this->data['index'] = 0;
    $this->data['sort_title'] = isset($this->data['title']) ? $this->data['title'] : $this->data['name'];

    # X3 Set date
    if(!isset($this->data['date'])) $this->data['date'] = filemtime($file_path);

    # X3 disabled
    $this->data['mime'] = function_exists('mime_content_type') ? mime_content_type($file_path) : false;
  }

}

?>
