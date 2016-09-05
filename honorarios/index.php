
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
		
		<link rel="stylesheet" href="../gui/css/toastr.css" type="text/css" />
		
		<link rel="stylesheet" href="../gui/css/estilos.css" type="text/css" />
		
		
	
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
		       <input type="button" id="btnExcel" value="Excel" />
		       <div id="jqxLoader"></div>
		       
		    	<div id="cargando"></div>
		    	
		    	
		    	 <br>
		    	<div class="form-group" id="jqxgrid"></div>
		        
		    
 </div></div></div>
	    

	    
	</form>
 </div>	

		
 		
	</div>
	
	
	
	<!--  MODAL FORMULARIO MAESTROS PERSONANATURAL/SOCIEDAD -->
	
	 <!-- Modal -->
       <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel">Registro de Receptor Honorario</h4>
             </div>
             <div class="modal-body">

                    <br/>

                <div class="row">
                  <div class="form-group">
                  	  <div class="col-xs-2">
                  	  Rut: 
                  	  </div>
                      <div class="col-xs-6">
                          <input id="rutnum" /> - <input id="rutver" />
                          
                      </div>
                      
                  </div>
              </div>
              <br />
              <div class="row">
                  <div class="form-group">
                      <div class="col-xs-2">
                  	  Nombre:
                  	  </div>
                      <div class="col-xs-10">
                          <input id="nombre" />
                      </div>
                  </div>
              </div>

             <br />
             <div class="row">
                  <div class="form-group">
                      <div class="col-xs-4">
                  	  Percibe Honorarios a<br>traves de Sociedad:
                  	  </div>
                      <div class="col-xs-1">
                          <input id="chkpn" />
                      </div>
                      <div class="col-xs-2">
                          <!--  <input type="button" id="btnGuardarPN" value="Guardar" /> -->
                      </div>
                  </div>
              </div>

             <br />

                    <div class="row" id="titulo">
                           <div class="form-group">
                            <div class="col-xs-4">
                            Seleccione Sociedad a la que pertenece
                            </div>
                            
                       </div>
                    </div> </div>
                    
                    <div class="row" id="titulo1">
                           <div class="form-group">
                            <div class="col-xs-4" >
                            	<div  id="gridsociedades"></div>
                            
                            </div>
                            
                       </div>
                    </div> 
                    
		 
                    <br/>
          <div class="modal-footer">
          <div class="col-xs-2">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>

            <div class="col-xs-2">
            	<input type="button" id="btnGuardarPS" value="Guardar"></div>
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal" onclick="GuardarPS()">Guardar</button> -->
            </div>
           </div>

           </div>
         </div>
       
	
	<!--  //MODAL FORMULARIO MAESTROS PERSONANATURAL/SOCIEDAD -->
	
	
	<!--  MODAL MODIFICAR RECEPTOR -->
	
	 <!-- Modal -->
       <div class="modal fade" id="frmModReceptor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel">MODIFICACION DATOS RECEPTOR</h4>
             </div>
             <div class="modal-body">
Desea Modificar los datos de : 
                    <br/>
                    <div id="lblNombreamodificar" ></div>

             </div>  
             
          <div class="modal-footer">
          <div class="form-group"> 
          <div class="col-xs-2">
                <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
            </div>
           
            <div class="col-xs-3">
            	<input type="button" id="btnAceptaModifica" value="ACEPTAR"></div>
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal" onclick="GuardarPS()">Guardar</button> -->
            </div>
           </div>
			</div>
           </div>
         </div>

    
	
	<!--  //MODAL DIALOGO MODIFICAR RECEPTOR -->
	
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
    	<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxgrid.selection.js"></script>
    	<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxgrid.columnsresize.js"></script>
    	<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxgrid.edit.js"></script>
    	<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxcheckbox.js"></script>
    	
    	<!--  T O A S T R -->
		
    	<script type="text/javascript" src="../gui/js/toastr.min.js"></script>
    	
		<!-- ==============cruiz=============== -->
		  <script type="text/javascript" src="../gui/js/util.js"></script> 
		<script type="text/javascript" src="./js/fn_principal.js"></script>
		
		
			<!-- CODIGO JS  -->
		<script type="text/javascript">
	
        </script>
		<!-- =================fin codigo JS cruiz====================== -->
	</body>
</html>
