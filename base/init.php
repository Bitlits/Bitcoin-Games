<?php
/*
🦉 Justin Faler
🧪 https://github.com/Jfaler
🧠 Base 64: UHJvcGVydHkgb2YgQml0bGl0cy5jb20gLyBQbGVhc2UgY29udGFjdCBpbW1lZGlhdGVseSBpZiB0aGlzIHByb2R1Y3QgaXMgdW5saWNlbnNlZC4=
*/

if(isset($_SERVER["HTTP_HOST"]))
	$domain = $_SERVER['HTTP_HOST'];
	$sub = array_shift(explode(".",$_SERVER['HTTP_HOST']));
if(isset($_SERVER["REQUEST_URI"])){
	$path = explode("?",$_SERVER['REQUEST_URI']);
	$var = explode("/",$path[0]);
}

$settings = array(
	"name" => "Bitcoin Casino",
	"url" => "http://bitlits.com",
	"rate" => ".9",
	"altcoin" => "Bitcoin",
	"altcoinl" => "bitcoin",
	"identifier" => "altcoinrpc",
	"password" => "98sMMevZnMHnhgEjTEp3UXQNVHqjSBpn2vVfb3pLxCeZ",
	"port" => "8332",
	"altc" => "BTC",
	"altcl" => "btc",
);

if(strpos($domain,"bitlits") !== false){
	$settings = array(
		"name" => "Litecoin Casino",
		"url" => "http://ltc.bitlits.com",
		"rate" => ".9",
		"altcoin" => "Litecoin",
		"altcoinl" => "litecoin",
		"identifier" => "altcoinrpc",
		"password" => "98sMMevZnMHnhgEjTEp3UXQNVHqjSBpn2vVfb3pLxCeZ",
		"port" => "8333",
		"altc" => "LTC",
		"altcl" => "ltc",
	);
}elseif(strpos($domain,"bitlits") !== false){
	$settings = array(
		"name" => "Dogecoin Casino",
		"url" => "http://doge.bitlits.com",
		"rate" => ".9",
		"altcoin" => "Dogecoin",
		"altcoinl" => "dogecoin",
		"identifier" => "altcoinrpc",
		"password" => "98sMMevZnMHnhgEjTEp3UXQNVHqjSBpn2vVfb3pLxCeZ",
		"port" => "8334",
		"altc" => "DOGE",
		"altcl" => "doge",
	);
}

require_once(VENDOR."/Mustache/Autoloader.php");
require_once(VENDOR."/jsonRPC/jsonRPCClient.php");
require_once(VENDOR."/storage/rb.php");
require_once(VENDOR."/ssh/Net/SSH2.php");

// Replace with MySQL username & password
R::setup('sqlite:'.BASE.'/data.sqlite','root','password');

Mustache_Autoloader::register();
$m = new Mustache_Engine(
	array(
		'loader' => new Mustache_Loader_FilesystemLoader(VIEWS),
		'partials_loader' => new Mustache_Loader_FilesystemLoader(VIEWS."/partials")
	)
);

$altcoin = new jsonRPCClient('http://'.$settings["identifier"].':'.$settings["password"].'@localhost:'.$settings["port"]);


require_once(BASE."/functions.php");
require_once(BASE."/user.php");

$altcoinInfo = $altcoin->getinfo();
// 🧬 Property of Bitlits.com ©2013-2019
?>
