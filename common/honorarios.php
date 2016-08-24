<?php
include('../include_dao.php');
include('../drivers/hm_honorariosicbo.php');
include('../drivers/hm_personanatural.php');
//include('../controller/cnt_honorarios.php');

$obj = json_decode($_GET["parametros"]);
//error_log(print_r($obj),true);
$action=$obj->action;
switch ($action) {
	case "cargadatospersonanatural":
		$idhc = $obj->idhonorarioconsolidado;
		$r=new hm_personanatural();
		
		print($r->cargadatosfromhonorariosicbo($idhc));
		break;
	case "honorariosmensual":
		$mes= $obj->mes;
		$ano= $obj->ano;
		
		$h=new hm_honorariosicbo($mes, $ano);
		$n=$h->cargaperiodo();
		
		
		
		$salida= array("res1"=> $n->idhonorario);
		print(json_encode($salida));

		break;
	case "listhonorarioconsolidado":
		//$idhonorario=$_GET["$idhonorario"];
		$idhonorario=$obj->idhonorario;
		$l= new hm_honorarioconsolidado(1,$idhonorario);
		print($l->getJSONHonorario());
		break;
		
	case "estadoperiodo" :
		error_log("llamando...");
		print("OK");
		break;
	default:
		break;
}




?>