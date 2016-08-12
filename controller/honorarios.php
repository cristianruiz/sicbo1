<?php
include('../include_dao.php');
include('../drivers/hm_honorariosicbo.php');
$obj = json_decode($_GET["parametros"]);
$action=$obj->action;
switch ($action) {
	case "honorariosmensual":
		$mes= $obj->mes;
		$ano= $obj->ano;
		
		$h=new hm_honorariosicbo($mes, $ano);
		$n=$h->nuevoperiodo();
		
		$params= array("ano"=>$ano,"mes"=>$mes);
		//print_r($params);
		$client=new SoapClient('http://192.168.1.51:8080/cbows/admision?wsdl');
		$deth=new hm_detallehonorariossicbo();
		$deth->cargamensual($client->honorarios_pad($params)->return);
		
		//$salida= array("res1"=> $client->honorarios_pad($params)->return);
		$salida= array("res1"=> $n->idhonorario);
		print(json_encode($salida));

		break;
	case "estadoperiodo" :
		error_log("llamando...");
		print("OK");
		break;
	default:
		break;
}




?>