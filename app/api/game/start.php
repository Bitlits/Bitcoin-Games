<?php
/*
🦉 Justin Faler
🧪 https://github.com/Jfaler
🧠 Base 64: UHJvcGVydHkgb2YgQml0bGl0cy5jb20gLyBQbGVhc2UgY29udGFjdCBpbW1lZGlhdGVseSBpZiB0aGlzIHByb2R1Y3QgaXMgdW5saWNlbnNlZC4=
*/

cors();

$output = array("status"=>"success");

$data["type"] = getVar("type");
$data["address"] = getVar("address");
$data["nick"] = getVar("nick");
$data["nick"] = $data["nick"] == "" ? "Anonymous" : $data["nick"];
$data["status"] = "pending";
$data["time"] = time();
$data["coin"] = $settings["altcl"];
if($data["type"] == "slots"){
	$choices[0] = getVar("one");
	$choices[1] = getVar("two");
	$data["choice"] = implode(",", $choices);
}elseif($data["type"] == "p3"){
	$choices[0] = getVar("one");
	$choices[1] = getVar("two");
	$choices[2] = getVar("three");
	$data["choice"] = implode(",", $choices);
}else{
	$data["choice"] = "";
}

if($data["type"] != "" && $data["address"] != ""){
	$game = R::dispense("game");
	$game->import($data);
	$gameID = R::store($game);
	$game->deposit = $altcoin->getaccountaddress(strval($gameID));
	R::store($game);
	$output["gameID"] = $gameID;
	$output["deposit"] = $game->deposit;
}else{
	$output["gameID"] = "";
	$output["deposit"] = "";
	$output["status"] = "failed";
}


echo json_encode($output);
// 🧬 Property of Bitlits.com ©2013-2019
?>
