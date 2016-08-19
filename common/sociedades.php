<?php
include('../include_dao.php');
include('../drivers/sociedades.php');

$obj = json_decode($_GET["parametros"]);

$action=$obj->action;
switch ($action) {
	case "getall":
		$s = new sociedad();
		$arr=$s->getall();
		$ret = Array();
		foreach($arr as &$t){
			$f= array(
					"id"=>$t->id,
					"rutsociedad"=>$t->rutsociedad,
					"razonsocial"=>utf8_encode($t->razonsocial),
					"selec"=>"false"
					
			);
			array_push($ret,$f);
		}
			
		print(json_encode($ret));
		break;
	default:
		break;
}
?>