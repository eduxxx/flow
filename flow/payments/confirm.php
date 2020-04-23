<?php
require(__DIR__ . "/../../lib/FlowApi.class.php");

try {
	if(!isset($_POST["token"])) {
		throw new Exception("No se recibio el token", 1);
	}
	$token = filter_input(INPUT_POST, 'token');
	$params = array(
		"token" => $token
	);
	$serviceName = "payment/getStatus";
	$flowApi = new FlowApi();
	$response = $flowApi->send($serviceName, $params, "GET");
	
	print_r($response);
	
	
} catch (Exception $e) {
	echo "Error: " . $e->getCode() . " - " . $e->getMessage();
}
?>