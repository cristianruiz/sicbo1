<?php
include('../include_dao.php');


$obj = json_decode($_GET["parametros"]);
$action=$obj->action;
switch ($action) {
	case "getall":
		$s = new HmSociedadMySqlDAO();
		print(json_encode($s->queryAll()));
		break;
	default:
		break;
}
?>