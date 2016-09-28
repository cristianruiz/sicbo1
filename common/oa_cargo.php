<?php
include('../include_dao.php');
include ('../drivers/pacientes.php');
include ('../controller/cnt_ult_oa.php');
include ('../drivers/drv_ult_oa.php');
include ('../drivers/drv_oa.php');

$p = new  MaePaciente();
$objPac = new  Pacientes();

$action = $_GET["action"];

switch ($action){
    case 'buscaUltimo':
        $cod_sec = $_GET['cod_sec'];
        $ano = $_GET['ano'];
        $mes = $_GET['mes'];
        $numero = ['nuevo'];
        $objUoa = new Ult_oa_controller();
        print_r($objUoa->getUltimo($cod_sec,$mes,$ano));
        break;
    case 'updUltimo':
        $cod_sec = $_GET['cod_sec'];
        $ano = $_GET['ano'];
        $mes = $_GET['mes'];
        $numero = $_GET['nuevo'];
        $id = $_GET['id'];
        $objUoa = new Ult_oa_controller();
        $res = $objUoa->updUltimo($numero,$id);
        break;
    case 'insertUltimo':
        $cod_sec = $_GET['cod_sec'];
        $ano = $_GET['ano'];
        $mes = $_GET['mes'];
        $numero = $_GET['nuevo'];
        $nroNuevo = 1;
        $objUoa = new Ult_oa();
        $res = $objUoa->insertUltimo($cod_sec,$mes,$ano,$nroNuevo);
        break;
    case 'grabaCargo':
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);

        $cod_sec = $_GET['cod_sec'];
        $nro_oa = $_GET['nro_oa'];
        $periodo = $_GET['periodo'];
        $fecha = $_GET['fecha'];
        $nro_fi = $_GET['nro_fi'];
        $hora = $_GET['hora'];
        $minuto = $_GET['min'];
        $rut_fin = $_GET['rut_fin'];
        $rut_pac = $_GET['rut_pac'];
        $tipo_pac = $_GET['tipo_pac'];
        $tipo = $_GET['tipo'];
        $tipo_pago = $_GET['tipo_pago'];
        $idtoth = $_GET['idtoth'];
        $objOa = new  O_a();
        $res = $objOa->insertCabecera($cod_sec,$nro_oa,$periodo,$fecha,$nro_fi,$hora,$minuto,$rut_fin,$rut_pac,$tipo_pac,$tipo,$tipo_pago,$idtoth);
        //$objCargo = new  Cargos_controller();
        //$res = $objCargo->insertCab_oa($cod_sec,$nro_oa,$periodo,$fecha,$nro_fi,$hora,$minuto,$rut_fin,$rut_pac,$tipo_pac,$tipo,$tipo_pago,$idtoth);
        break;
    default:
        break;
}



