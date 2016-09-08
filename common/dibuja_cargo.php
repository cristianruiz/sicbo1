<?php 
include('../include_dao.php');
include('../controller/cnt_cargos.php');
include ('../drivers/drv_servicios.php');
include ('../drivers/pacientes.php');
include ('../controller/cnt_secciones.php');
include ('../drivers/drv_secciones.php');
include ('../drivers/drv_insumos.php');

$action = $_GET["action"];

switch ($action) {
	case "cargo_cabecera":
		$nrooa = $_GET['nrocargo'];
		$cod_sec = $_GET["cod_sec"];
		$objCar = new Cargos_controller();
		print_r($objCar->buscaCargo($nrooa,$cod_sec));
		break;
    case "getServicio":
        $nrooa = $_GET["nrocargo"];
        $cod_sec = $_GET["cod_sec"];
        $codigo = $_GET["codigo"];
        $objSrv = new Servicios();
        print_r($objSrv->getServByCod($codigo));
        break;
    case "buscapac":
        $rut = $_GET["rut"];
        $objPac = new Pacientes();
        print_r($objPac->buscaPac($rut));
        break;
    case "getNombreSec";
        $nrooa = $_GET["nrocargo"];
        $codigo = $_GET["cod_sec"];
        $objSec = new Secciones();
        print_r($objSec->getByCodigo($codigo));
        break;
    case "getNombreInsumo";
        $nrooa = $_GET["nrocargo"];
        $codigo = $_GET["cod_sec"];
        $codIns = $_GET["codigo"];
        $objIns = new Insumos();
        print_r($objIns->getInsByCodigo($codIns));
        break;
    case "getDetInsumos":
        $nrooa = $_GET["nrocargo"];
        $cod_sec = $_GET["cod_sec"];
        $objIns2 = new Cargos_controller();
        print_r($objIns2->getDetInsumos($nrooa,$cod_sec));
        break;
	default:
        $nrooa = $_GET["nrocargo"];
        $cod_sec = $_GET["cod_sec"];
        $objDet = new Cargos_controller();
        $det = $objDet->getDetCargo($nrooa,$cod_sec);
        print_r($det);
        break;
}
