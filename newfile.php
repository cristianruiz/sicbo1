<?php

include 'include_dao.php';
$combo = new ServiciosMySqlDAO();
$res= $combo->queryAll();
print_r($res);

?>