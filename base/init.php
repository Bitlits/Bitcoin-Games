<?php


if(isset($_SERVER["HTTP_HOST"]))
	$domain = $_SERVER['HTTP_HOST'];
	$sub = array_shift(explode(".",$_SERVER['HTTP_HOST']));
if(isset($_SERVER["REQUEST_URI"])){
	$path = explode("?",$_SERVER['REQUEST_URI']);
	$var = explode("/",$path[0]);
}

$settings = array(
	"name" => "WorldCoin Casino",
	"url" => "http://worldcoincasino.com",
	"rate" => ".9",
	"altcoin" => "WorldCoin",
	"altcoinl" => "worldcoin",
	"identifier" => "altcoinrpc",
	"password" => "98sMMevZnMHnhgEjTEp3UXQNVHqjSBpn2vVfb3pLxCeZ",
	"port" => "8332",
	"altc" => "WDC",
	"altcl" => "wdc",
);


if(strpos($domain,"megacoincasino") !== false){
	$settings = array(
		"name" => "MegaCoin Casino",
		"url" => "http://megacoincasino.com",
		"rate" => ".9",
		"altcoin" => "MegaCoin",
		"altcoinl" => "megacoin",
		"identifier" => "altcoinrpc",
		"password" => "98sMMevZnMHnhgEjTEp3UXQNVHqjSBpn2vVfb3pLxCeZ",
		"port" => "8333",
		"altc" => "MEC",
		"altcl" => "mec",
	);
}elseif(strpos($domain,"protosharescasino") !== false){
	$settings = array(
		"name" => "ProtoShares Casino",
		"url" => "http://protosharescasino.com",
		"rate" => ".9",
		"altcoin" => "ProtoShares",
		"altcoinl" => "protoshares",
		"identifier" => "altcoinrpc",
		"password" => "98sMMevZnMHnhgEjTEp3UXQNVHqjSBpn2vVfb3pLxCeZ",
		"port" => "8334",
		"altc" => "PTS",
		"altcl" => "pts",
	);
}



require_once(VENDOR."/Mustache/Autoloader.php");
require_once(VENDOR."/jsonRPC/jsonRPCClient.php");
require_once(VENDOR."/storage/rb.php");
require_once(VENDOR."/ssh/Net/SSH2.php");


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

// echo "<!--\n";
// print_r($altcoin->getaccountaddress("slots"));
// echo "\n-->";


$altcoinInfo = $altcoin->getinfo();

?>