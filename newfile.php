<?php

include('include_dao.php');

include('./controller/servicios.php');
$srv= new Serv();
print_r($srv->json_buscador_servicios());


/*
include('drivers/hm_honorariosicbo.php');
$h= new hm_honorariosicbo('OCTUBRE', 2016);


if ($h->existeperiodo())
	echo "SI";
else 
	echo "NO";
*/

/*
include('drivers/hm_detallehonorariossicbo.php');
error_log("INICIO");
$r= new hm_detallehonorariossicbo();
$params= array("ano"=>2016,"mes"=>"MAYO");
//print_r($params);
$client=new SoapClient('http://192.168.1.51:8080/cbows/admision?wsdl');
$r->cargamensual($client->honorarios_pad($params)->return);
*/

?>