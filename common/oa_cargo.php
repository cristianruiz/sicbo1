<?php
include('../include_dao.php');
include ('../drivers/pacientes.php');
include ('../controller/cnt_ult_oa.php');
include ('../drivers/drv_ult_oa.php');
include ('../drivers/drv_oa.php');
include ('../controller/cnt_cargos.php');

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
        //$res = $objOa->insertCabecera($cod_sec,$nro_oa,$periodo,$fecha,$nro_fi,$hora,$minuto,$rut_fin,$rut_pac,$tipo_pac,$tipo,$tipo_pago,$idtoth);
        echo $objOa->insertCabecera($cod_sec,$nro_oa,$periodo,$fecha,$nro_fi,$hora,$minuto,$rut_fin,$rut_pac,$tipo_pac,$tipo,$tipo_pago,$idtoth);
        break;
    case 'grabaDet_ins':
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);

        $cod_sec = $_GET['cod_sec'];
        $nro_oa = $_GET['nro_oa'];
        $periodo = $_GET['periodo'];
        $cod_det = $_GET['cod_det'];
        $tipo_det = $_GET['tipo_det'];
        $punit = $_GET['p_unit'];
        $cant = $_GET['cantidad'];
        $recargo = $_GET['recargo'];
        $folio = $_GET['folio'];
        $objOa2 = new O_a();
        $res2 = $objOa2->insertDetSer($cod_sec,$nro_oa,$periodo,$cod_det,$tipo_det,$punit,$cant,$recargo,$folio);
        break;
    case 'buscaFolio':
        $cod_sec = $_GET['cod_sec'];
        $nro_oa = $_GET['nro_oa'];
        $periodo = $_GET['periodo'];
        $objOa3 = new Cargos_controller();
        echo $objOa3->getFolio($cod_sec,$nro_oa,$periodo);
        break;
    default:
        break;
}



