<?php 
include('../include_dao.php');
include('../controller/cargos_controller.php');
//$obj = json_decode($_POST['parametros']);
//$action = $obj->action;

$nrooa = $_POST['nrocargo'];
$cod_sec = $_POST['cod_sec'];
$objDet = new Cargos_controller();
$det = $objDet->getDetCargo($nrooa,$cod_sec);
print_r($det);
