<?php 
include ('template/header.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script type="text/javascript">
$(document).ready(function(){
  
  var boton_rut;
  
  boton_rut = $('#btnok');
  
  boton_rut.on('click', function(){
    
     var valor_input, valor_rut;
    
    valor_input = $('#txtrut');
    valor_rut = valor_input.val();
    
    if(valor_rut === ''){
      alert('No tiene nada el input');
      return false;
    }else{
      alert("Si tiene valor el input");
    }
    
  }); 
  
});
	</script>
</head>
<body>
<div>
	<form name="form1" method="post">
		<div>
			<input type="text" name="txtrut" id="txtrut"></input>
			<button type="submit" id="btnok" name="btnok" onclick="validar()">OK</button>
		</div>
	</form>
</div>
</body>
</html>