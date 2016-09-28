<?php
include ('../drivers/pacientes.php');

$objPac = new Pacientes();
$data = json_decode($_GET['data']);
$objPac->nuevoPaciente($data);

