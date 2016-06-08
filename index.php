<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
	<div class="container">
	 <form class="form-inline" name="form1" method="post">
	 	<div>
	 		<p><h4>Orden de atencióh4></p>
	 	</div>
	 	<div class="panel panel-info">
	 	  <div class="panel-body">
		    <div class="form-group">
		        <input type="text" class="form-control" placeholder="Nro" style="width: 60px;">
		    </div>

		    <button type="submit" class="btn btn-primary">?</button>
		    <button type="submit" class="btn btn-primary">Buscar</button>
		    &nbsp;

		    <div class="form-group">
		    	<label>Estado</label>
		       <input type="text" class="form-control" id="txtestado" disabled="true">
		    </div>
		    &nbsp;&nbsp;
		    
		    <div class="form-group">
		    	<label>Fecha</label>
		    	<input type="date" required id="txtfecha" name="txtfecha" class="form-control"></input>
		    	<input type="time" required id="txthora" name="txthora" class="form-control"></input>
		    </div>
		  </div>
	    </div>

	    <div class="panel panel-info">
	    	<div class="panel-body">
	    		<div class="form-group">
	    			<label>Centro Costo</label>
	    			<select id="cboCosto" name="cboCosto" class="form-control">
	    				<option>LABORATORIO</option>
	    				<option>KINE</option>
	    			</select>

	    			<select id="cboTipCuenta" name="cboTipCuenta" class="form-control">
	    				<option>TIPO CUENTA</option>
	    			</select>
	    			<input type="text" id="txtnroCuenta" name="txtnroCta" placeholder="N° Cuenta" class="form-control"></input>
	    		</div>
	    		<br><br>
	    		<div class="form-group">
	    			<label>Clasificaciólabel>
	    			<select name="cboClasifica" id="cboClasifica" class="form-control">
	    				<option>PACIENTE</option>
	    			</select>
	    		</div>
	    	</div>
	    </div>
	</form>
 </div>	

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>
