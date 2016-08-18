<?php
include('../include_dao.php');


$obj = json_decode($_GET["parametros"]);

$action=$obj->action;
switch ($action) {
	case "getall":
		$s = new HmSociedadMySqlDAO();
		$arr=$s->queryAll();
		print_r($arr);
		//print(json_encode($arr));
		break;
	default:
		break;
}
?>