<?php 
include('../include_dao.php');
include('../controller/cargos_controller.php');

$nrooa = $_POST['nrocargo'];
$cod_sec = $_POST['cod_sec'];
$objCar = new Cargos_controller();
print_r($objCar->buscaCargo($nrooa,$cod_sec));

