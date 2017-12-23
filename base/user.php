<?php

session_start();

$key = getVar("key");
if($key=="")
	$key = getUniqueKey();
if(isset($_REQUEST["key"]) && $key!=$_REQUEST['key'])
	$key = $_REQUEST['key'];

setcookie("key", $key, time()+60*60*24*7*365, "/");
$_SESSION["key"]=$key;
$settings["key"]=$key;

$user = R::findOne('user', 'key = ?', array($key));

if(!is_object($user)){
	$user = R::dispense("user");
	$user->key = $key;
	$user->address = "";
	$user->balance = 0;
	$user->updated = time();
	$user->created = time();
	$user->type = $settings["altc"];
	$id = R::store($user);
	$user = R::load("user",$id);
}else{
	$user->balance = $altcoin->getbalance($key);
	$user->type = $settings["altc"];
	R::store($user);
}

?>