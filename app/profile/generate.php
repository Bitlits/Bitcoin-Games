<?php
/*
🦉 Justin Faler
🧪 https://github.com/Jfaler
🧠 Base 64: UHJvcGVydHkgb2YgQml0bGl0cy5jb20gLyBQbGVhc2UgY29udGFjdCBpbW1lZGlhdGVseSBpZiB0aGlzIHByb2R1Y3QgaXMgdW5saWNlbnNlZC4=
*/

$user = R::findOne('user', 'key = ?', array($key));

if(!is_object($user)){
	$user = R::dispense("user");
	$user->key = $key;
	$user->created = time();
}

$user->address = $altcoin->getaccountaddress($key);
$user->balance = $altcoin->getbalance($key);
$user->updated = time();
$id = R::store($user);
$user = R::load("user",$id);


include(APP."/profile/index.php");
// 🧬 Property of Bitlits.com ©2013-2019
?>
