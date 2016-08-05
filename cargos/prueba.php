<?php 
include('../include_dao.php');
include ('template/header.php');
include('../drivers/pacientes.php');
include('../controller/pacientes.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script type="text/javascript">
    $(document).ready(function(){
      $('#button').click(function(){
        var rut = $('#txtrut').val();
        var nom = $('#txtnombre').val();
        var apat = $('#txtapat').val();
        var amat = $('#txtamat').val();

        JQuery.post("../drivers/pacientes.php", {
          rutpaciente : rut,
          nombre : nom,
          apellidopaterno : apat,
          apellidomaterno : amat
          }, function(data, textStatus){
            if(data == 1){
  
            $('#response').html("Registrado exitosamente!");
              
            $('#response').css('color','green');
              
            }else{
              
            $('#response').html("Error al guardar");
              
            $('#response').css('color','red');
              
            }
          });
      });
    });

	</script>
</head>
<body>
<div>
	<form>
		<div>
    <input type="text"  id="txtrut" placeholder="rut"></input>
      <input type="text"  id="txtnombre" placeholder="nombre"></input>
      <input type="text"  id="txtapat" placeholder="paterno"></input>
      <input type="text"  id="txtamat" placeholder="materno"></input>
      <input type="button" id="button" value="Insert" />
		</div>
    <br>
    <div id="response"></div>
	</form>
</div>
</body>
</html>