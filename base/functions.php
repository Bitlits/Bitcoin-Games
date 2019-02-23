<?php
/*
🦉 Justin Faler
🧪 https://github.com/Jfaler
🧠 Base 64: UHJvcGVydHkgb2YgQml0bGl0cy5jb20gLyBQbGVhc2UgY29udGFjdCBpbW1lZGlhdGVseSBpZiB0aGlzIHByb2R1Y3QgaXMgdW5saWNlbnNlZC4=
*/

function getUniqueKey(){
	return sha1(uniqid());
}

function getVar($var){
	$value = "";
	$value = isset($_REQUEST[$var]) ? $_REQUEST[$var] : $value;
	$value = isset($_COOKIE[$var]) ? $_COOKIE[$var] : $value;
	$value = isset($_SESSION[$var]) ? $_SESSION[$var] : $value;
	return $value;
}

function logger($log){
	$logs = file_get_contents(BASE."/log.txt");
	$logs .= "\n".date("F j, Y, g:i:s a").": ".$log;
	file_put_contents(BASE."/log.txt", $logs);
}

function cors() {
	// Allow from any origin
	if (isset($_SERVER['HTTP_ORIGIN'])) {
		//header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
		header("Access-Control-Allow-Origin: *");
		header('Access-Control-Allow-Credentials: true');
		header('Access-Control-Max-Age: 86400');	// cache for 1 day
	}
	// Access-Control headers are received during OPTIONS requests
	if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
		if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
			header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
		if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
			header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
		//exit(0);
	}
	header('Content-type: application/json');
}
// 🧬 Property of Bitlits.com ©2013-2019
?>
