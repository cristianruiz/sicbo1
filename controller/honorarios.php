<?php
$action=$_GET["action"];
switch ($action) {
	case "honorariosmensual":
		$mes= $_GET["mes"];
		$ano= $_GET["ano"];
		$params= array("ano"=>$ano,"mes"=>$mes);
		print_r($params);
		$client=new SoapClient('http://192.168.1.51:8080/cbows/admision?wsdl');
		echo( $client->honorarios_pad($params)->return);


		break;
	case "estadoperiodo" :
		echo("OK");
		break;
	default:
		break;
}




?>