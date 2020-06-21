<?php

Class BasicAuth {

	//
  private function server($var) {
    return isset($_SERVER[$var]) && !empty($_SERVER[$var]) ? $_SERVER[$var] : false;
  }

  private function prop($arr, $val, $default = false) {
    return isset($arr[$val]) && !empty($arr[$val]) ? $arr[$val] : $default;
  }

  // construct
  function __construct($access, $type) {

    // default
    $auth_user = self::server('PHP_AUTH_USER');
    $auth_pw = self::server('PHP_AUTH_PW');

    // Alternatives for servers running PHP as FastCGI
    if(!$auth_user && !$auth_pw){
      foreach (array('REDIRECT_HTTP_AUTHORIZATION', 'HTTP_AUTHORIZATION', 'REDIRECT_REMOTE_USER', 'REMOTE_USER') as $opt) {
        $val = self::server($opt);
        if($val){
          list($auth_user, $auth_pw) = explode(':', base64_decode(substr($val, 6)));
          break;
        }
      }
    }

  	// vars
  	global $protect_ob;
    $x3_users = self::prop($protect_ob, 'users', array());
    $users = self::prop($access, 'users', array());
    $username = self::prop($access, 'username');
    $password = self::prop($access, 'password');

    // if credentials not provided
    if(!$auth_user || !$auth_pw || (

      // vanilla password check
      ($auth_user != $username || $auth_pw != $password ) && 

      // users check, with superuser* (don't check if auth_user is in $users array)
      ((!in_array($auth_user, $users) && substr($auth_user, -1) != '*') || !isset($x3_users[$auth_user]) || $x3_users[$auth_user] != $auth_pw)

    )) {

      // protect
      header('WWW-Authenticate: Basic realm="Private area."');
      header('HTTP/1.0 401 Unauthorized');

      // Cancel text
      header('content-type: ' . ($type == 'json' ? 'application/json' : 'text/html'));
      echo $type == 'json' ? '{"content":"<div class=\"not-authorized\"><i class=\"fa fa-ban\"></i></div>"}' : 'Not Authorized.';
      exit;
    }
  }
}

?>
