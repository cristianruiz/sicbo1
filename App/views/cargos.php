<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $title ?></title>
    </head>
    <body>
        <table class="table" border="1">
 
            <thead>
                <tr>
                    <th>Nro Cargo</th>
                    <th>Fecha</th>
                    <th>Seccion</th>
                    <th>Detalle</th>
                </tr>
            </thead>
           
                <?php
                foreach ($cargos as $user)
                {
                ?>
                <tr>
                    <td><?php echo $user["NRO_OA"] ?></td>
                    <td><?php echo $user["FECHA"] ?></td>
                    <td><?php echo $user["C_SECCION"] ?></td>
                    <td><?php echo $user["COD_DET"] ?></td>
                    
                </tr>
                <?php
                }
                ?>
            
        </table>
    </body>
</html>
