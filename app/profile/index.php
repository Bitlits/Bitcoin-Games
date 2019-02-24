<?php
/*
🦉 Justin Faler
🧪 https://github.com/Jfaler
🧠 Base 64: UHJvcGVydHkgb2YgQml0bGl0cy5jb20gLyBQbGVhc2UgY29udGFjdCBpbW1lZGlhdGVseSBpZiB0aGlzIHByb2R1Y3QgaXMgdW5saWNlbnNlZC4=
*/

$content = array(
	"title" => $settings["name"],
	"profile" => true,
	"genAddress"=>true
);

$user = R::findOne('user', 'key = ?', array($key));

if(is_object($user)){
	if($user->address!="")
		$content["genAddress"]=false;

	if($user->address!=""){
		$user->balance = $altcoin->getbalance($key);
	}
	$user->updated = time();
	R::store($user);	
	$content["user"]=$user->export();
}

$content = array_merge($content,$settings);
echo $m->render("pages/profile", $content);
// 🧬 Property of Bitlits.com ©2013-2019
?>
