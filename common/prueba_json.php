<?php
include('../include_dao.php');
include ('../drivers/drv_medicos.php');

$m = new  Medicos();
print_r($m->getAll());