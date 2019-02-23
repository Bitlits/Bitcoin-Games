<?php
/*
🦉 Justin Faler
🧪 https://github.com/Jfaler
🧠 Base 64: UHJvcGVydHkgb2YgQml0bGl0cy5jb20gLyBQbGVhc2UgY29udGFjdCBpbW1lZGlhdGVseSBpZiB0aGlzIHByb2R1Y3QgaXMgdW5saWNlbnNlZC4=
*/

$dir = $var;
$dir = array_filter($dir);
$len = count($dir);

if($len>0){
	for($i=0;$i<$len;$i++){
		if(file_exists(APP."/".implode("/",$dir).".php")){
			include(APP."/".implode("/",$dir).".php");
			break;
		}elseif(file_exists(APP."/".implode("/",$dir)."/index.php")){
			include(APP."/".implode("/",$dir)."/index.php");
			break;
		}
		$last = array_pop($dir);
	}
}else{
	//include(APP."/index.php");
	header("Location: /index.html");
}

// 🧬 Property of Bitlits.com ©2013-2019
?>
