	<!DOCTYPE html>
	<html>
	<head>
		<title>Buscar Cargos</title>
			<meta charset="utf-8">
       		<meta http-equiv="X-UA-Compatible" content="IE=edge">
       		<meta name="viewport" content="width=device-width, initial-scale=1">

       		<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

			<!-- Optional theme -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

			<!-- Latest compiled and minified JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
			 <script>
			 	$(document).ready(function() {
				    $("#nro").keydown(function (e) {
				        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
				            (e.keyCode == 65 &amp;&amp; e.ctrlKey === true) || 
				            (e.keyCode >= 35 &amp;&amp; e.keyCode <= 39)) {
				                 return;
				        }
				 
				        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) &amp;&amp; (e.keyCode < 96 || e.keyCode > 105)) {
				            e.preventDefault();
				        }
				    });
				});
    	</script>
	</head>
	<body>