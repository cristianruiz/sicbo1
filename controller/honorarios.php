<?php
$obj = json_decode($_GET["parametros"]);
$action=$obj->action;
switch ($action) {
	case "honorariosmensual":
		$mes= $obj->mes;
		$ano= $obj->ano;
		$params= array("ano"=>$ano,"mes"=>$mes);
		print_r($params);
		$client=new SoapClient('http://192.168.1.51:8080/cbows/admision?wsdl');
		echo( $client->honorarios_pad($params)->return);


		break;
	case "estadoperiodo" :
		error_log("llamando...");
		print("OK");
		break;
	default:
		break;
}




?>