	<!DOCTYPE html>
	<html>
	<head>
		<title>Venta de servicios</title>
			<meta charset="UTF-8">
       		<meta http-equiv="X-UA-Compatible" content="IE=edge">
       		<meta name="viewport" content="width=device-width, initial-scale=1">

       		<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

			<!-- Optional theme -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

			<link rel="stylesheet" type="text/css" href="css/styles_tabMenu.css">
			<link rel="stylesheet" type="text/css" href="css/styles.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

			<!-- Latest compiled and minified JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

			<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
			<script type="text/javascript" src="./js/script_venta.js"></script>
			<script type="text/javascript">
				function validar1(formulario) { 
				var rut1 = formulario.rut1.value; 
				var count = 0; 
				var count2 = 0; 
				var factor = 2; 
				var suma = 0; 
				var sum = 0; 
				var digito = 0; 
				count2 = rut1.length - 1; 
				while(count < rut1.length) { 

				sum = factor * (parseInt(rut1.substr(count2,1))); 
				suma = suma + sum; 
				sum = 0; 

				count = count + 1; 
				count2 = count2 - 1; 
				factor = factor + 1; 

				if(factor > 7) { 
				factor=2; 
				} 

				} 
				digito = 11 - (suma % 11); 

				if (digito == 11) { 
				digito = 0; 
				} 
				if (digito == 10) { 
				digito = "k"; 
				} 
				form.dv1.value = digito; 
				} 

				function mis_datos(){ 
				var key=window.event.keyCode; 
				if (key < 48 || key > 57){ 
				window.event.keyCode=0; 
				}} 

				function vaciar(control) 
				{ 
				control.value=''; 
				} 
			</script>
			 
	</head>
	<body>
	<div id="wrapper">
		
