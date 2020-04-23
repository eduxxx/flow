<?php

 $COMMERCE_CONFIG = array(
 	"apiKey" => "7A6DAE0F-0D2B-44EE-94CC-27L8EB0DEE53", 
	"SECRETKEY" => "5f065b3b3bd4626c45b26fd547c3c847ebb800b8", 
	"APIURL" => "https://sandbox.flow.cl/api", 
 	"BASEURL" => "http://localhost/FLOW" 
 );
 
 class Config {
 	
	static function get($name) {
		global $COMMERCE_CONFIG;
		if(!isset($COMMERCE_CONFIG[$name])) {
			throw new Exception("No existe configuracion", 1);
		}
		return $COMMERCE_CONFIG[$name];
	}
 }
