<?php

include('include_dao.php');
include('./controller/servicios.php');
$srv= new Serv();
print_r($srv->json_buscador_servicios());



?>