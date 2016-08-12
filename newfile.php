<?php

include('include_dao.php');
/*
include('./controller/servicios.php');
$srv= new Serv();
print_r($srv->json_buscador_servicios());
*/
include('drivers/hm_honorariosicbo.php');
$h= new hm_honorariosicbo('OCTUBRE', 2016);


if ($h->existeperiodo())
	echo "SI";
else 
	echo "NO";



?>