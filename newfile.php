<?php

include 'include_dao.php';
include './drivers/servicios.php';
$r=new Servicios();
print_r($r->get_all());



?>