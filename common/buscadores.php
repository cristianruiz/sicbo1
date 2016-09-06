<?php
include('../include_dao.php');
include ('../controller/cnt_medicos.php');
include('../controller/cnt_secciones.php');
include('../controller/servicios.php');
include ('../drivers/drv_insumos.php');

$action = $_REQUEST['action'];

switch ($action){
    case "buscaProf":
        $objMed = new Med();
        print_r($objMed->getAllMedicos());
        break;
    case  "buscaSec":
        $objSec = new Secc();
        print_r($objSec->json_buscador_secciones());
        break;
    case  "buscaServ":
        $srv= new Serv();
        print_r($srv->json_buscador_servicios());
        break;
    case  "buscaInsumo":
        $objIns = new Insumos();
        print_r($objIns->getAll());
        break;
    default:
        break;
}



