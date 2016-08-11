<?php

$obj = json_decode($_GET["datos"]);
$m=$obj->mes;
$salida= array("res1"=>$m);
print(json_encode($salida));

?>
