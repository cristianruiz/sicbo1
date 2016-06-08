<?php
/**
 * User: jorgeveliz
 * Date: 6/7/16
 * Time: 4:47 PM
 */
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <title>Modulo Caja</title>
    <link rel="stylesheet" href="../public/components/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/components/jqwidgets/styles/jqx.base.css">
    <link rel="stylesheet" href="../public/components/jqwidgets/styles/jqx.bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container">
        <h2>MODULO CAJA</h2>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#cargos">Cargos</a></li>
            <li><a data-toggle="tab" href="#bonos">Bonos</a></li>
            <li><a data-toggle="tab" href="#boletas">Boletas</a></li>
            <li><a data-toggle="tab" href="#pagar">Pagar</a></li>
        </ul>

        <div class="tab-content">
            <div id="cargos" class="tab-pane fade in active">
                <h3>CARGOS</h3>
                <div id="jqxgrid"></div>
            </div>
            <div id="bonos" class="tab-pane fade">
                <h3>BONOS</h3>
                <div id="jqxgrid1"></div>
            </div>
            <div id="boletas" class="tab-pane fade">
                <h3>BOLETAS</h3>
                <div id="jqxgrid2"></div>
            </div>
            <div id="pagar" class="tab-pane fade">
                <h3>PAGAR</h3>
                <div id="jqxgrid3"></div>
            </div>
        </div>
        
    </div>
</body>
<script src="../public/components/jquery/jquery.min.js"></script>
<script src="../public/components/bootstrap/js/bootstrap.min.js"></script>
<script src="../public/components/jqwidgets/jqxcore.js"></script>
<script src="../public/components/jqwidgets/jqxdata.js"></script>
<script src="../public/components/jqwidgets/jqxbuttons.js"></script>
<script src="../public/components/jqwidgets/jqxscrollbar.js"></script>
<script src="../public/components/jqwidgets/jqxmenu.js"></script>
<script src="../public/components/jqwidgets/jqxcheckbox.js"></script>
<script src="../public/components/jqwidgets/jqxlistbox.js"></script>
<script src="../public/components/jqwidgets/jqxdropdownlist.js"></script>
<script src="../public/components/jqwidgets/jqxgrid.js"></script>
<script src="../public/components/jqwidgets/jqxgrid.selection.js"></script>
<script src="../public/js/gridCargos.js"></script>
<script src="../public/js/gridBonos.js"></script>
<script src="../public/js/gridBoletas.js"></script>
<script src="../public/js/gridPagar.js"></script>
</html>
