<?php
include('../include_dao.php');


$obj = json_decode($_GET["parametros"]);

$action=$obj->action;
switch ($action) {
	case "getall":
		$s = new HmSociedadMySqlDAO();
		$arr=$s->queryAll();
		$ret = Array();
			
		foreach($arr as &$t){
			$f= array(
					"id"=>$t["id"],
					"rutsociedad"=>($t["rutsociedad"]),
					"razonsocial"=>utf8_encode($t["razonsocial"]),
					"selec"=>"true"
					
			);
			array_push($ret,$f);
		}
			
		return(json_encode($ret));
		break;
	default:
		break;
}
?>