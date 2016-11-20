<?php

cors();

$games = R::find('game', ' status != ? ORDER BY time DESC LIMIT 30',array("pending"));

$data["status"] = "success";

if(!empty($games)){
	$data["transactions"] = R::exportAll($games);
}else{
	$data["status"] = "failed";
}

foreach($data["transactions"] as $key=>$trans){
	$data["transactions"][$key]["payment"] = strval(number_format($trans["payment"], 5));
	$data["transactions"][$key]["amount"] = strval(number_format($trans["amount"], 5));
}

echo json_encode($data);

?>