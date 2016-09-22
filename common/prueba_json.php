<?php
include('../include_dao.php');
include ('../drivers/drv_medicos.php');
include ('../drivers/drv_insumos.php');
include ('../controller/cnt_ult_oa.php');
include ('../controller/cnt_prueba.php');

$u = new  Ult_oa_controller();
$action = $_GET['action'];

switch ($action){
    case 'prueba':

        break;
    default:
        echo 'un error';
        break;
}