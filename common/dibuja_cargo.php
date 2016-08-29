<?php 
include('../include_dao.php');
include('../controller/cnt_cargos.php');
include ('../drivers/servicios.php');
include ('../drivers/pacientes.php');
include ('../controller/cnt_secciones.php');

$action = $_GET['action'];

switch ($action) {
	case "cargo_cabecera":
		$nrooa = $_GET['nrocargo'];
		$cod_sec = $_GET["cod_sec"];
		$objCar = new Cargos_controller();
		print_r($objCar->buscaCargo($nrooa,$cod_sec));
		break;
    case "p_unit":
        $codigo = $_GET['codigo'];
        $objSrv = new Servicios();
        print_r($objSrv->getServByCod($codigo));
        break;
    case "buscapac":
        $rut = $_GET["rut"];
        $objPac = new Pacientes();
        print_r($objPac->buscaPac($rut));
        break;
    case "getNombreSec";
        $codigo = $_GET['codigo'];
        $objSec = new Secc();
        print_r($objSec->getNombreByCod($codigo));
	default:
        $nrooa = $_GET["nrocargo"];
        $cod_sec = $_GET["cod_sec"];
        $objDet = new Cargos_controller();
        $det = $objDet->getDetCargo($nrooa,$cod_sec);
        print_r($det);
		break;
}
