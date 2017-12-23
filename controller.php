<?php

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

?>