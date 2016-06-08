<?php 
include('header.php');
 ?>
<body>
<div class="container">
<div class="row">
    <div class="col-lg-6">
    <br><br>
    	<table  border="1" class="table table-hover">
     
                <thead>
                    <tr>
                        <th>Nro Cargo</th>
                        <th>Fecha</th>
                        <th>Seccion</th>
                        <th>Detalle</th>
                    </tr>
                </thead>
               
                    <?php
                    if(!empty($buscar)){
                        foreach ($buscar as $item)
                        {
                    ?>
                    <tr>
                        <td><?php echo $item["NRO_OA"] ?></td>
                        <td><?php echo $item["FECHA"] ?></td>
                        <td><?php echo $item["C_SECCION"] ?></td>
                        <td><?php echo $item["COD_DET"] ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                
             </table>
                   <?php }else{
                    echo "<br>";
                    echo "No hay resultados";
                   }
                    
                ?>
     </div>
     </div>
</div>
</div>
</body>
</html>