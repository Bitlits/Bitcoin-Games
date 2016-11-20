<?php

$address = getVar("address");
$amount = getVar("amount");

$user = R::findOne('user', 'key = ?', array($key));

if(is_object($user)){

	$balance = $altcoin->getbalance($key);

	logger("Withdrawing $amount with $balance in account for $key");

	if($balance < $amount){
		$amount = $balance;
		logger("Tried to withdraw more than $key has");
	}


	if($amount > 0){
		// There seems to be no transaction fee on anything less than 100... so no need for this... right now
		// if($amount == $balance)
		// 	$amount -= .0001; //Make sure we can pay transaction fee
		$altcoin->sendfrom($key, $address, floatval($amount));
		logger("Withdrawn $amount for $key");
	}

	$balance = $balance - $amount; // - .0001;

	$user->updated = time();
	$user->balance = $balance;
	R::store($user);
}

include(APP."/profile/index.php");

?>