<?php
include('../include_dao.php');
include('../controller/cnt_secciones.php');

$objSec = new Secc();
print_r($objSec->json_buscador_secciones());

?>