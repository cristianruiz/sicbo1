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
		$n=$h->cargaperiodo();
		
		
		
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