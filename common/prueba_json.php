<?php
include('../include_dao.php');
include ('../drivers/drv_medicos.php');
include ('../drivers/drv_insumos.php');

$m = new Insumos();
print_r($m->getAll());