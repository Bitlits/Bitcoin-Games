<?php
/*
🦉 Justin Faler
🧪 https://github.com/Jfaler
🧠 Base 64: UHJvcGVydHkgb2YgQml0bGl0cy5jb20gLyBQbGVhc2UgY29udGFjdCBpbW1lZGlhdGVseSBpZiB0aGlzIHByb2R1Y3QgaXMgdW5saWNlbnNlZC4=
*/

cors();

$output = array("status"=>"success");

$hl = array(
	"0"=>0.1,
	"1"=>0.2,
	"2"=>0.3,
	"3"=>0.4,
	"4"=>0.5,
	"5"=>0.6,
	"6"=>0.7,
	"7"=>0.8,
	"8"=>0.9,
	"9"=>1.0,
	"a"=>1.5,
	"b"=>2.0,
	"c"=>2.5,
	"d"=>3.0,
	"e"=>4.0,
	"f"=>5.0,
);

$gameID = intval(getVar("gameID"));
$gameID = $gameID != null ? $gameID : intval($var[4]);
$game = R::load("game",$gameID);
if(is_object($game)){
	$output["deposit"] = $game->deposit;
	$output["txid"] = "";
	$transactions = $altcoin->listtransactions(strval($gameID));
	if(isset($transactions[0]) && isset($transactions[0]["txid"])){
		$txid = $transactions[0]["txid"];
		$amount = $transactions[0]["amount"];
		$rate = 1;
		$choices = explode(",", $game->choice);

		if($game->type=="r2"){
			for($i=0;$i<2;$i++){
				if(hexdec($txid[$i])==$choices[$i])
					$rate = $rate * 2.5;
			}
			$rate = $rate == 1 ? 0 : $rate;
		}elseif($game->type=="p3"){
			for($i=0;$i<3;$i++){
				if(hexdec($txid[$i])==$choices[$i])
					$rate = $rate * 2.5;
			}
			$rate = $rate == 1 ? 0 : $rate;
		}elseif($game->type=="hl"){
			$rate = $hl[$txid[0]];
		}

		$payment = $rate * $amount;

		$game->txid = $txid;
		$game->amount = $amount;
		$game->rate = $rate;
		$game->payment = $payment;
		$game->status = $game->status == "pending" ? "stored" : $game->status;
		R::store($game);

		$output["txid"] = $txid;
		$output["rate"] = $rate;
		$output["payment"] = $payment;

		if($game->status == "stored"){
			if($payment > 0.0){
				try{
					@$sent = $altcoin->sendtoaddress($game->address, floatval($payment));
					if(strlen($sent) > 10){
						$game->status = "paid";
						$game->paid_txid = $sent;
					}else{
						$game->status = "error";
					}
				}catch(Exception $e){
					logger("Failed to make payment of $payment to {$game->address} with gameID: $gameID");
					$game->status = "error";
				}
			}else{
				$game->status = "finished";
			}
			R::store($game);
		}
	}
}else{
	$output["deposit"] = "";
	$output["status"] = "failed";
	$output["txid"] = "";
}

echo json_encode($output);
// 🧬 Property of Bitlits.com ©2013-2019
?>
