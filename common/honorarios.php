<?php
include('../include_dao.php');
include('../drivers/hm_honorariosicbo.php');
include('../drivers/drv_personanatural.php');
//include('../controller/cnt_honorarios.php');

$obj = json_decode($_GET["parametros"]);
//error_log(print_r($obj),true);
$action=$obj->action;
switch ($action) {
	case "guardapersonanatural":
		$rutnum=$obj->rutnum;
		$rutver=$obj->rutver;
		$nombre=$obj->nombre;
		$checked=$obj->checked;
		$rutsociedad=$obj->rutsociedad;
		$idhonorarioconsolidado=$obj->idhonorarioconsolidado;
		$error=false;
		$vigente=1;
		if ($checked){
			$esreceptor=0;
		} else {
			$esreceptor=1;
		}
		$t=new Transaction();
		$r=new drv_personanatural();
		if(!$r->guardapersonanatural($rutnum, $rutver, $nombre,$esreceptor,$vigente)){
			$error=true;
		} /*else {
			$t->rollback();
			$salida= array("res"=>"NO" );
		}*/
		if ($checked){
			if (!$r->guardasociedad($rutnum, $rutsociedad)){
				$error=true;
			}
		}
		$r->actualizarecepcionhonorario($idhonorarioconsolidado,$esreceptor);
		if ($error){
			$t->rollback();
			$salida= array("res"=>"NO" );
		} else {
			$t->commit();
			$salida=array("res"=>"OK");
		}
		//if (!$r->guardasociedad($rutnum, $rutsociedad))
		print(json_encode($salida));
		break;
	case "cargadatospersonanatural":
		error_log("AKIIII");
		$idhc = $obj->idhonorarioconsolidado;
		$r=new drv_personanatural();
		
		print_r(json_encode($r->cargadatosfromhonorariosicbo($idhc)));
		//$a=$r->cargadatosfromhonorariosicbo($idhc);
		
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