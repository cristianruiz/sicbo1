<?php 
include('../include_dao.php');
include("template/header.php");
include('../drivers/medicos.php'); 

$med = new Medicos();
$col = 'apellido';
$result = $med->getAll($col);

?>
<style type="text/css">
		/*Panel tabs*/
.panel-tabs {
    position: relative;
    bottom: 30px;
    clear:both;
    border-bottom: 1px solid transparent;
}

.panel-tabs > li {
    float: left;
    margin-bottom: -1px;
}

.panel-tabs > li > a {
    margin-right: 2px;
    margin-top: 4px;
    line-height: .85;
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
    color: #ffffff;
}

.panel-tabs > li > a:hover {
    border-color: transparent;
    color: #ffffff;
    background-color: transparent;
}

.panel-tabs > li.active > a,
.panel-tabs > li.active > a:hover,
.panel-tabs > li.active > a:focus {
    color: #fff;
    cursor: default;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    background-color: rgba(255,255,255, .23);
    border-bottom-color: transparent;
}
</style>

<div class="container">
             <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Sicbo</h3>
                    <span class="pull-right">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Admisión</a></li>
                            <li><a href="#tab2" data-toggle="tab">Venta de servicios</a></li>
                        </ul>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                        	<h4>Admision de pacientes</h4>
 
                        	<form id="form2" method="post">
                        		<div class="panel panel-info">
                        			<div class="panel-body">
                        				<div class="form-group">
                        					<div class="col-xs-2">
                        						<input type="text" class="form-control" id="txtRutNum2" placeholder="Rut" maxlength="8"></input>
                        					</div>
                        					<div class="col-xs-1">
                        						<input type="text" class="form-control" id="txtRutVer2" maxlength="1" disabled="true"></input>
                        					</div>
                        				</div>

                        				<br><br>
                        				<div class="form-group">
								            
								            <div class="col-xs-3">
								                <input type="text" class="form-control" placeholder="Nombres" id="txtNomPac" />
								            </div>
								            <div class="col-xs-3">
								                <input type="text" class="form-control" placeholder="A. Paterno" id="txtApat" />
								            </div>
								            <div class="col-xs-3">
								                <input type="text" class="form-control" placeholder="A. Materno" id="txtAmat" />
								            </div>
								            <div class="col-xs-1">
								            	<label>Fecha nac:</label>
								            </div>
								            <div class="col-xs-2">
								            	<input type="date" class="form-control" id="txtFnac"></input>
								            </div>
								        </div>

								        <br><br>

								        <div class="form-group">
								        	<div class="col-xs-1">
								        		<input type="text" class="form-control" id="txtEdad" placeholder="Edad"></input>
								        	</div>
								        	<div class="col-xs-1">
								        		<input type="radio" id="rdEdad" name="edad" value="1">Años</input>
								        		<input type="radio" id="rdEdad" name="edad" value="2">Meses</input>
								        		<input type="radio" id="rdEdad" name="edad" value="3">Dias</input>
								        	</div>
								        	<div class="col-xs-3">
								        		<strong>Sexo:</strong><br>
								        		<input type="radio" name="sexo" id="rdSexo" value="1">Masculino</input>
								        		<input type="radio" name="sexo" id="rdSexo" value="0">Femenino</input>
								        	</div>
								        	<div class="col-xs-3">
								        		<input type="text" class="form-control" placeholder="Dirección" id="txtDireccion"></input>
								        	</div>
								        	<div class="col-xs-3">
								        		<input type="text" class="form-control" id="txtTelefono" placeholder="Teléfono"></input>
								        	</div>
								        </div>
								        <br><br><br>
								        <div class="form-group">
								        	<div class="col-xs-3">
								        		<strong>Cuidad</strong>
								        		<select id="cboCiudad" class="form-control">
								        			<option value="1">OSORNO</option>
								        		    <option value="2">PUERTO MONTT</option>
								        		    <option value="3">VALDIVIA</option>
								        		</select>
								        	</div><br>
								        	<div class="col-xs-3">
								        		<input type="text" id="txtActividad" class="form-control" placeholder="Actividad"></input>
								        	</div>
								        	<div class="col-xs-3">
								        		<input type="text" id="txtEmail" class="form-control" placeholder="Email"></input>
								        	</div>
								        </div>
								        <br><br>
								        <div class="form-group">
								        	<div class="col-xs-3">
								        		<input type="submit" class="btn btn-primary" id="btnkPac" value="Guardar" onclick="guarda_pac()"></input>
								        	</div>
								        </div>
								    </div>
                        		</div>
                        	</form>

                        </div>
                        <div class="tab-pane" id="tab2">
                        	
                        	<form class="form-inline" name="form1" method="post" action="http://localhost/oa/public/home/getSerById">
			 	
						 	<div class="panel panel-info with-nav-tabs">
						 	  <div class="panel-body">
							    <div class="form-group">
							        <input type="text" class="form-control input" placeholder="Nro" style="width: 60px;">
							    </div>
							    
							    <button type="submit" class="btn btn-primary fuente_btn input">?</button>
							    <button type="submit" class="btn btn-primary fuente_btn input">Buscar</button>
							    &nbsp;

							    <div class="form-group">
							    	<label>Estado</label>
							       <input type="text" class="form-control input" id="txtestado" disabled="true">
							    </div>
							    &nbsp;&nbsp;
							    
							    <div class="form-group">
							    	<label>Fecha</label>
							    	<input type="date" required id="txtfecha" name="txtfecha" class="form-control input" value="<?php echo date("Y-m-d"); ?>"></input>
							    	<input type="time" required id="txthora" name="txthora" class="form-control input" value="<?php echo time("HH:mm"); ?>"></input>
							    </div>
							  </div>
						   </div>

			    <div class="panel panel-info">
			    	<div class="panel-body">
			    		<div class="form-group">
			    			<label>Centro Costo</label>
			    			<select id="cboCosto" name="cboCosto" class="form-control input fuente_btn">
			    				<option>LABORATORIO</option>
			    				<option>KINE</option>
			    			</select>

			    			
			    			<select id="cboTipCuenta" name="cboTipCuenta" class="form-control input fuente_btn">
			    				<option>TIPO CUENTA</option>
			    			</select>
			    			<input type="text" id="txtnroCuenta" name="txtnroCta" placeholder="N° Cuenta" class="form-control input"></input>
			    		</div>
			    		<br><br>
			    		<div class="form-group">
			    			<label>Clasificación</label>
			    			<select name="cboClasifica" id="cboClasifica" class="form-control input fuente_btn">
			    				<option>PACIENTE</option>
			    			</select>
			    			
			    			&nbsp;&nbsp;

			    			<label>Run Paciente</label>

			    			<input type="text" id="txtNomPac" name="txtNomPac" class="form-control input" maxlength="8" style="width: 130px;"></input>

			    			<input type="text" id="txtRutVer" name="txtRutVer" class="form-control input" style="width: 50px;"></input>

			    			<button type="button" class="btn btn-primary input fuente_btn" id="btnSinRut">No tiene Rut</button>
			    			&nbsp;
			    			<input type="text" id="txtnomPac" name="txtNomPac" class="form-control input" disabled="true" style="width: 250px;"></input>
			    		</div>
			    	</div>
			    </div>

			    <div class="panel panel-info">
			    	<div class="panel-body">
			    		<div class="form-group">
			    		  <label>Financiador</label>
			    		  <select name="cboFinan" id="cboFinan" class="form-control input fuente_btn">
			    		  	<option>FONASA</option>
			    		  	<option>PARTICULAR</option>
			    		  	<option>COLMENA</option>
			    		  </select>

			    		  &nbsp;
			    		  <label>Arancel</label>
			    		  <select name="cboArancel" id="cboArancel" class="form-control input fuente_btn">
			    		  	<option>PLAN 1</option>
			    		  	<option>PLAN 2</option>
			    		  	<option>PLAN 3</option>
			    		  </select>	

			    		  &nbsp;&nbsp;
			    		  <button type="button" id="btnMedicos" class="btn btn-primary input fuente_btn" data-toggle="modal" data-target="#myModal">Médicos</button>
						  <input type="text" id="txtNomMed" name="txtNomMed" class="form-control input" disabled="true"></input>
			    		</div>
			    	</div>
			    </div>

			    <div class="panel panel-info">
			    	<div class="panel-body">
			    		<div class="row">
			    			<div class="form-group">
			    				<input type="number" id="txtCodServ" name="txtCodServ" class="form-control input" style="width: 120px;"></input>

			    				<input type="text" id="txtNomServ" name="txtNomServ" class="form-control input" disabled="true"></input>

			    				<input type="number" id="txtCantServ" name="txtCantServ" class="form-control input" style="width: 60px;"></input>

			    				<input type="submit" value="Ok" class="btn btn-primary input fuente_btn" id="btnOKserv"></input>
			    				<label><h4>Servicios</h4></label>
		
			    			</div>
			    		</div>
			    	</div>
			    </div>
			</form>

                        </div>
                        
                    </div>
                </div>
            </div>
 </div>   
  <!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Lista de médicos</h4>
	      </div>
	      <div class="modal-body">
	        <div class="row">
			  <div class="form-group">
				<div class="col-lg-3">
					<input type="text" id="txtNomMed" name="txtNomMed" class="form-control" placeholder="Nombre medico"></input>
				</div>

			  </div>
			 </div>

			<br>

			 <div class="row">
			  	<div class="form-group">
			  	 <div class="col-lg-3">
			  		<SELECT NAME="toppings" MULTIPLE style="width: 200px;" class="form-control col-lg-3"> 
			  		 <?php foreach ($result as $item) {
			  		 	echo '<option value="'.$item->rutnum.'">'.$item->apellido.' '.$item->nombre.'</option>';
			  		 } ?>
			  		 
			  		</SELECT>

			  	</div>
			  	
			   </div>
			 </div>

			 <br>
			 <div class="row">
			 	<div class="col-lg-3">
			 		<select id="cboRol" class="form-control">
			 			<option value="1">Tratante</option>
			 			<option value="2">Informante</option>
			 		</select>
			 	</div>
			 </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	        <button type="button" id="btnModalOk" class="btn btn-primary" onclick="return confirm('OK');">Aceptar</button>
	      </div>
	    </div>
	  </div>
	</div>
 
</div>