<?php

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

?>