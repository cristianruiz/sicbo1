<?php

include('include_dao.php');
include('./controller/servicios.php');
$srv= new Servicios();
print_r($srv->json_buscador_servicios());



?>