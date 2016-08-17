
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
		
		<link rel="stylesheet" href="../gui/js/jqw/jqwidgets/styles/jqx.base.css" type="text/css" />
		
		<link rel="stylesheet" href="../gui/css/fontawesome/css/font-awesome.min.css" type="text/css" />
		
		
	
	</head>
	<body>
	<div id='content'>
	<div class="container">
	 <form class="form-inline" name="form1" method="post">
	 	<div>
	 		<p><h4>GENERACIÓN DE HONORARIOS PAD</h4></p>
	 	</div>
	 	<div class="panel panel-info">
	 	  <div class="panel-body">
		    <div class="form-group">
		    	<label>Ingrese Período de Control:</label>
		    	<br>
		    	<label>Mes:</label>
		        <div class="form-group" id="comboMes"></div> 
		        <label>Año:</label>
		        <div class="form-group" id="comboAno"></div> 
		       <!--  <button type="button" class="btn btn-xs" >Buscar</button>  -->
		       <input type="button" id="btnBuscar" value="Buscar" />
		       
		       <div id="jqxLoader"></div>
		       
		    	<div id="cargando"></div>
		    	
		    	
		    	 <br>
		    	<div class="form-group" id="grillaSicbo"></div>
		        
		    

		    
		    
		    
		    
		    
		  </div></div></div>
	    

	    <div class="panel panel-info">
	    	<div class="panel-body">
	    		<div class="form-group">
	    			<label>Centro Costo</label>
	    			<input id="jqxInput" />
	    			<label style="font-family: Verdana; font-size: 10px;">ex: Ana</label>
         <div style="font-family: Verdana; font-size: 13px;" id='selectionlog'>
        </div>
	    			
	    		</div>
	    		
	    	</div>
	    </div>
	</form>
 </div>	

		
 		
	</div>
	
	
	
	
	
	<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		
		<!--  REFERENCIAS AL FRAMEWORK JQW -->
		
    	<script type="text/javascript" src="../gui/js/jqw/scripts/demos.js"></script>
    	<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxcore.js"></script>
    	<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxdata.js"></script>
    	<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxinput.js"></script>
    	<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxbuttons.js"></script>
    	<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxscrollbar.js"></script>
    	<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxlistbox.js"></script>
    	<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxcombobox.js"></script>
    	<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxdropdownlist.js"></script>
    	<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxgrid.js"></script>
    	<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxloader.js"></script>
    	
		<!-- ==============cruiz=============== -->
		  <script type="text/javascript" src="../gui/js/util.js"></script> 
		<script type="text/javascript" src="./js/fn_principal.js"></script>
		
		
			<!-- CODIGO JS  -->
		<script type="text/javascript">
	
        </script>
		<!-- =================fin codigo JS cruiz====================== -->
	</body>
</html>
