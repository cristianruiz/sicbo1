<?php
include('../include_dao.php');
include ('../drivers/pacientes.php');
include ('../controller/cnt_ult_oa.php');
include ('../drivers/drv_ult_oa.php');

$p = new  MaePaciente();
$objPac = new  Pacientes();

$action = $_GET["action"];
$obj = json_decode($_GET['parametros']);

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
        //$objUlt = new Ult_oa();
        //$res = $objUlt->update($id,$numero);
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
    default:
        break;
}



/*$rutnum = substr($_POST['rut'], 0, -2);
//$rutver = substr($_POST['txtRutNum2'], -1, 1);
$nombre = $_POST['txtNomPac'];
/*$apat = $_POST['txtApat'];
$amat = $_POST['txtAmat'];
$f_nac = $_POST['txtFnac'];
$direccion = $_POST['txtDireccion'];
$telefono = $_POST['txtTelefono'];
$email = $_POST['txtEmail'];
$ciudad = $_POST['cboCiudad'];

$p->rutpaciente = $rutnum;
//$p->rutver = $rutver;
$p->nombre = $nombre;
$p->apellidopaterno = $apat;
$p->apellidomaterno = $amat;
$p->fechanacimiento = $f_nac;
$p->direccion = $direccion;
$p->telefono = $telefono;
$p->correlectronico = $email;
$p->codigociudad = $ciudad;
echo $p;
$id = $objPac->nuevoPaciente($p);*/

