<?php 
include('../include_dao.php');
include('../controller/cnt_cargos.php');

$action = $_POST['action'];
$nrocargo = $_POST['nrocargo'];
$cod_sec = $_POST['cod_sec'];

switch ($action) {
	case "cargo_cabecera":
		$nrooa = $_POST['nrocargo'];
		$cod_sec = $_POST["cod_sec"];
		$objCar = new Cargos_controller();
		print_r($objCar->buscaCargo($nrooa,$cod_sec));
		break;
	case "cargo_det":
		$nrooa = $_POST["nrocargo"];
		$cod_sec = $_POST["cod_sec"];
		$objDet = new Cargos_controller();
		$det = $objDet->getDetCargo($nrooa,$cod_sec);
		print_r($det);
		break;
	
	default:
		break;
}
