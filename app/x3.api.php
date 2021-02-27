<?php

// x3.api.php

// conditions
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) 
	&& strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' 
	&& $_SERVER["REQUEST_METHOD"] == "POST" 
	&& isset($_SERVER['HTTP_REFERER']) 
	&& stripos($_SERVER['HTTP_REFERER'], $_SERVER['HTTP_HOST']) !== false 
	&& isset($_POST['action'])
	){

	// no cache
	header("Expires: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Pragma: no-cache");

	// get action
	$action = $_POST['action'];

	// get cache time for auto-cache
	if($action === 'get_cache_time'){
		$file = '../content/auto-cache.json';
		if(@file_exists($file) && @filesize($file) > 5){
			$filetime = @filemtime($file);
			echo $filetime ? $filetime : '';
		} else {
			echo '';
		}

	// X3 mailer
	} else if($action === 'email'){

		// json response
		function json_response($success = false, $msg = false, $debug = false){
			header('content-type: application/json; charset=utf-8');
			$arr = array('success' => $success);
			if($msg) $arr['msg'] = $msg;
			if($debug) $arr['debug'] = $debug;
			exit(json_encode($arr));
		}

		// Get email (input)
		$email = isset($_POST['email']) ? $_POST['email'] : (isset($_POST['Email']) ? $_POST['Email'] : false);

		// Make sure fields are populated correctly
		if(empty($_POST['honey1']) 
			&& $_POST['honey2'] == 'alpaca' 
			&& (!$email || filter_var($email, FILTER_VALIDATE_EMAIL)) 
			&& !empty($_POST['page'])
			) {

			// Get config
			require './x3.config.inc.php';
			$settings = X3Config::$config["back"]["mail"];

			// Get "TO" string, first check "to_email" POST field is set, then check X3 settings "to" (recipient)
			$to_string = isset($_POST['recipient']) && !empty($_POST['recipient']) ? $_POST['recipient'] : (isset($settings['to']) && !empty($settings['to']) ? $settings['to'] : false);

			// continue only if to_string is set
			if(empty($to_string)) json_response(false, 'No email recipients specified.');

			// add to email arrays, sanitize and validate
			$email_array = explode(',', $to_string);
			$to_array = array();
			$bcc_array = array();
			foreach($email_array as $email_entry) {
				$is_bcc = stripos($email_entry, 'bcc:') !== false;
				if($is_bcc) $email_entry = str_ireplace('bcc:', '', $email_entry);
				$sanitized = @filter_var($email_entry, FILTER_SANITIZE_EMAIL);
				if($sanitized && filter_var($sanitized, FILTER_VALIDATE_EMAIL)) {
					if($is_bcc) {
						array_push($bcc_array, $sanitized);
					} else {
						array_push($to_array, $sanitized);
					}
				}
			}

			// add to to_array if empty
			if(empty($to_array) && !empty($bcc_array)) array_push($to_array, array_shift($bcc_array));

			// continue only if $to_array still contains emails after filtering
			if(empty($to_array)) json_response(false, 'No valid email recipients specified.');

			// get IP
			function get_client_ip() {
				$vars = array('HTTP_CF_CONNECTING_IP', 'HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR');
				foreach ($vars as $var) {
					if(isset($_SERVER[$var])) {
						$ip = filter_var($_SERVER[$var], FILTER_VALIDATE_IP);
						if($ip) return $ip;
					}
				}
				return 'IP not found';
			}

			// array_filter_key for custom fields
			function array_filter_key(array $array, $callback){
				$matchedKeys = array_filter(array_keys($array), $callback);
				return array_intersect_key($array, array_flip($matchedKeys));
			}

			// EMAIL!!!

			// vars
			if(isset($_POST['name']) && !empty($_POST['name'])) {
				$name = strip_tags(trim($_POST["name"]));
				$name = str_replace(array("\r","\n"),array(" "," "),$name);
			} else {
				$name = '';
			}
			if($email) $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
			$template_strict = false;
			if(isset($_POST['template_strict']) && !empty($_POST['template_strict'])) {
				$template_strict = true;
				$template = trim($_POST['template_strict']);
			} else if(isset($_POST['template']) && !empty($_POST['template'])){
				$template = trim($_POST['template']);
			} else {
				$template = $settings['template'] ? $settings['template'] : false;
			}
			if(isset($_POST['template_subject']) && !empty($_POST['template_subject'])) {
				$subject = $_POST['template_subject'];
			} else {
				$subject = $settings['subject'] ?: '%domain% | New message from %name%';
			}
			$subject = strip_tags(trim($subject));
			if(isset($settings['from'])) $from = filter_var(trim($settings['from']), FILTER_SANITIZE_EMAIL);

			// initiate X3 PHPMailer router
			require './x3.mail.inc.php';
			$mail = x3_mail($settings['use_smtp']);

			// utf-8
			$mail->CharSet = 'UTF-8';

			// From
			if(isset($from)) $mail->setFrom($from);

			// To
			foreach($to_array as $to_entry) {
				$mail->addAddress($to_entry);
			}

			// Bcc
			if(!empty($bcc_array)) foreach($bcc_array as $bcc_entry) {
				$mail->addBCC($bcc_entry);
			}

			// ReplyTo
			if($email) $mail->addReplyTo($email, ($name ? $name : ''));

			// SUBJECT replace hardcoded
			$subject = str_replace('%name%', ($name ? $name : '[NO NAME]'), $subject);
			$subject = str_replace('%email%', ($email ? $email : '[NO EMAIL]'), $subject);
			$subject = str_replace('%domain%', $_SERVER['HTTP_HOST'], $subject);
			if(strpos($subject, '%ip%') !== false) $subject = str_replace('%ip%', get_client_ip(), $subject);

			// MESSAGE replace hardcoded
			$message = $template;
			if(strpos($message, '%ip%') !== false) $message = str_replace('%ip%', get_client_ip(), $message);

			// CUSTOM fields
			$ignore = array('honey1', 'honey2', 'template', 'template_strict', 'template_subject', 'action', 'recipient');
			$custom = array_filter_key($_POST, function($a) use ($ignore){
				return !in_array($a, $ignore);
			});
			if(isset($custom['page'])) $custom['page'] = urldecode($custom['page']);
			foreach ($custom as $key => $value) {
				$val = nl2br(strip_tags(trim($value)));
				if(!empty($val)){

					// subject
					if(stripos($subject, '%'.$key.'%') !== false) $subject = str_ireplace('%'.$key.'%', $val, $subject);

					// message
					if($template && stripos($template, '%'.$key.'%') !== false){
			    	$message = str_ireplace('%'.$key.'%', $val, $message);
			    } else if(!$template_strict){
			    	if(!empty($message)) $message .= '<br><br>';
			    	$message .= '<strong>' . str_ireplace('_', ' ', $key) . '</strong><br>' . $val;
			    }
				}
			}

			// Set msg
			$mail->msgHTML($message);
			$mail->Subject = $subject;

			// SMTP
			if($settings['use_smtp']) {
				$mail->isSMTP();

				// host
				$mail->Host = $settings['host'] ?: 'smtp.gmail.com';

				// auth
				$smtp_auth = $settings['SMTPAuth'] ? true : false;
				$mail->SMTPAuth = $smtp_auth;
				if($smtp_auth){
					$mail->Username = trim($settings['username']);
					$mail->Password = trim($settings['password']);
				}

				 // secure
				$insecure = $settings['SMTPSecure'] == 'none';
				if($insecure) $mail->SMTPAutoTLS = false;
				if(!$insecure) $mail->SMTPSecure = $settings['SMTPSecure'];
				if(!$settings['verify_peer']) $mail->SMTPOptions = array('ssl' => array(
	        'verify_peer' => false,
	        'verify_peer_name' => false,
	        'allow_self_signed' => true
			  ));
				$mail->Port = $settings['port'] ?: 587; // 25|587|465

				// debug
				$mail->SMTPDebug = 3;//($settings['debug'] ? 3 : 0); // 0|1|2|3
				$mail->Debugoutput = 'echo'; // echo, because it goes into console, not HTML output
			}

			// send
			ob_start();
			$success = $mail->send();
			$debug = $success ? false : ob_get_contents();
			ob_end_clean();

			// respond
			json_response($success, $success ? $settings['response_text'] : $mail->ErrorInfo, $debug);

		} else {
			json_response(true, 'thnx');
		}
	}
}

?>