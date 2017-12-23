<?php

$settings["jackpotWeek"] = date("Ymd",strtotime("this week"));
$settings["jackpotMonth"] = date("Ym");


$jackpotWeek = R::findOne('jackpot',' key = ? ', array($settings["jackpotWeek"]));
if(!is_object($jackpotWeek)){
	$jackpotWeek = R::dispense("jackpot");
	$jackpotWeek->key = $settings["jackpotWeek"];
	$jackpotWeek->type = "weekly";
	$jackpotWeek->address = $bitcoin->getaccountaddress($settings["jackpotWeek"]);
	$jackpotWeek->balance = $bitcoin->getbalance($settings["jackpotWeek"]) * $settings["rate"];
	$jackpotWeek->updated = time();
	$id = R::store($jackpotWeek);
	$jackpotWeek = R::load("jackpot",$id);
}

$jackpotMonth = R::findOne('jackpot',' key = ? ', array($settings["jackpotMonth"]));
if(!is_object($jackpotMonth)){
	$jackpotMonth = R::dispense("jackpot");
	$jackpotMonth->key = $settings["jackpotMonth"];
	$jackpotMonth->type = "monthly";
	$jackpotMonth->address = $bitcoin->getaccountaddress($settings["jackpotMonth"]);
	$jackpotMonth->balance = $bitcoin->getbalance($settings["jackpotMonth"]) * $settings["rate"];
	$jackpotMonth->updated = time();
	$id = R::store($jackpotMonth);
	$jackpotMonth = R::load("jackpot",$id);
}


$settings["jackpotWeekAddress"] = $jackpotWeek->address;
$settings["jackpotWeekBalance"] = $jackpotWeek->balance;
$settings["jackpotMonthAddress"] = $jackpotMonth->address;
$settings["jackpotMonthBalance"] = $jackpotMonth->balance;


?>