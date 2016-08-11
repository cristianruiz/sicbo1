<?php 
include('../include_dao.php');
include('../controller/cargos_controller.php');

$nrooa = $_POST['nrocargo'];
$cod_sec = $_POST['cod_sec'];
$objDet = new Cargos_controller();
$det = $objDet->getDetCargo($nrooa,$cod_sec);
print_r($det);