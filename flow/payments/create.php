<?php

require(__DIR__ . "/../../lib/FlowApi.class.php");
$varPOST = json_decode(file_get_contents('php://input'), true);
extract($varPOST);
$params = array(
	"currency" => "CLP",
	"paymentMethod" => 1,
	"urlConfirmation" => Config::get("BASEURL") . "/flow/payments/confirm.php",
	"urlReturn" => Config::get("BASEURL") ."/flow/payments/result.php"
);
foreach ($varPOST as $key => $value) {
	if($key == "numeroOrden"){
		$params["commerceOrder"] = $value;	
	}if($key == "correoCliente"){
		$params["email"] = $value;	
	}else{
		$params[$key] = $value;
	}
}

$serviceName = "payment/create";

try {
	$flowApi = new FlowApi;
	$response = $flowApi->send($serviceName, $params,"POST");
	$redirect = $response["url"] . "?token=" . $response["token"];
	echo $redirect;
} catch (Exception $e) {
	echo $e->getCode() . " - " . $e->getMessage();
}

?>