<?php

include 'include_dao.php';
$combo = new OaServiciosMySqlDAO();
$res= $combo->queryAll();
print_r($res);

?>