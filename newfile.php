<?php

include('include_dao.php');
/*
include('./controller/servicios.php');
$srv= new Serv();
print_r($srv->json_buscador_servicios());
*/
include('drivers/hm_honorariosicbo.php');
$h= new hm_honorariosicbo('JUNIO', 2016);

print_r($h->get_periodo());



?>