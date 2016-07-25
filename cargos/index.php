<?php 
include('../include_dao.php');
include("template/header.php");
include('../drivers/medicos.php');
include('../drivers/servicios.php');
include('../drivers/pacientes.php');
include('../drivers/ciudad.php');
include('../controller/pacientes.php');
include('../controller/cargos_controller.php');
date_default_timezone_set("Chile/Continental");

$med = new Medicos();
$col = 'apellido';
$result = $med->getAll($col);

$ciu = new Ciudad();
$res_ciu = $ciu->getCiudades();


/*
//edita paciente
if (isset($_POST['btnEditaPac'])) {
										
	$p = new MaePaciente();
	$pDriver = new Pacientes();

	$rutnum = $_POST['txtRutNum2'];
	//$rutver = $_POST['txtRutVer2'];
	$nombre = $_POST['txtNomPac'];
	$apat = $_POST['txtApat'];
	$amat = $_POST['txtAmat'];
	$f_nac = $_POST['txtFnac'];
	$direccion = $_POST['txtDireccion'];
	$telefono = $_POST['txtTelefono'];
	$email = $_POST['txtEmail'];
	$ciudad = $_POST['cboCiudad'];

	$p->rutpaciente = $rutnum;
	$p->rutver = $rutver;
	$p->nombre = $nombre;
	$p->apellidopaterno = $apat;
	$p->apellidomaterno = $amat;
	$p->fechanacimiento = $f_nac;
	$p->direccion = $direccion;
	$p->telefono = $telefono;
	$p->correlectronico = $email;
	$p->codigociudad = $ciudad;
	$id = $objPac->editaPaciente($p);
}
*/
?>
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
 
                        	<form id="form2" name="form2" method="post">
                        		<div class="panel panel-info">
                        			<div class="panel-body">
                        				<div class="form-group">
                        					<div class="col-xs-2">
                        						<input type="text" class="form-control" name="txtRutNum2" onkeypress="return isNumber(event)" placeholder="Rut" maxlength="10" id="txtRutNum2" oninput="checkRut(this)"></input>
                        					</div>
                        				</div>

                        				<br><br>
                        				<div class="form-group">
								            
								            <div class="col-xs-3">
								                <input type="text" class="form-control" placeholder="Nombres" name="txtNomPac" />
								            </div>
								            <div class="col-xs-3">
								                <input type="text" class="form-control" placeholder="A. Paterno" name="txtApat" />
								            </div>
								            <div class="col-xs-3">
								                <input type="text" class="form-control" placeholder="A. Materno" name="txtAmat" />
								            </div>
								            <div class="col-xs-1">
								            	<label>Fecha nac:</label>
								            </div>
								            <div class="col-xs-2">
								            	<input type="date" class="form-control" name="txtFnac"></input>
								            </div>
								        </div>

								        <br><br>

								        <div class="form-group">
								        	<div class="col-xs-1">
								        		<input type="text" class="form-control" id="txtEdad" onkeypress="return isNumber(event)" placeholder="Edad"></input>
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
								        		<input type="text" class="form-control" placeholder="Dirección" name="txtDireccion"></input>
								        	</div>
								        	<div class="col-xs-3">
								        		<input type="text" class="form-control" name="txtTelefono" placeholder="Teléfono"></input>
								        	</div>
								        </div>
								        <br><br><br>
								        <div class="form-group">
								        	<div class="col-xs-3">
								        		<strong>Cuidad</strong>
								        		<select name="cboCiudad" class="form-control">
								        		<?php foreach ($res_ciu as $item) {
								        			echo '<option value="'.$item->codigociudad.'">'.$item->nombreciudad.'</option>';
								        		}
								        		 ?>
								        		</select>
								        	</div><br>
								        	<div class="col-xs-3">
								        		<input type="text" name="txtActividad" class="form-control" placeholder="Actividad"></input>
								        	</div>
								        	<div class="col-xs-3">
								        		<input type="text" name="txtEmail" class="form-control" placeholder="Email"></input>
								        	</div>
								        </div>
								        <br><br>
								        <div class="form-group">
								        	<div class="col-xs-2">
												<button type="submit" class="btn btn-primary" id="btnokPac" name="btnokPac" id="btnokPac">
												    <span class="glyphicon glyphicon-floppy-saved"></span> Guardar
												</button>
								        	</div>
								        	<div class="col-xs-2">
												<button type="submit" class="btn btn-primary" name="btnEditaPac">
												    <span class="glyphicon glyphicon-pencil"></span> Modificar
												</button>
								        	</div>
								        </div>
								    </div>
                        		</div>

                        	</form>
                        	<?php 
                        		//Guarda nuevo paciente

								if (isset($_POST["btnokPac"])) {
																		
									$rutnum = substr($_POST['txtRutNum2'], 0, -2);
									$pac = new Pac();

									if ($pac->verificaPaciente($rutnum) == "no") {
										//echo "<script>alert('El rut está disponible.')</script>";
										$p = new MaePaciente();
										$pDriver = new Pacientes();

										//$rutnum = substr($_POST['txtRutNum2'], 0, -2);
										$rutver = substr($_POST['txtRutNum2'], -1, 1);
										$nombre = $_POST['txtNomPac'];
										$apat = $_POST['txtApat'];
										$amat = $_POST['txtAmat'];
										$f_nac = $_POST['txtFnac'];
										$direccion = $_POST['txtDireccion'];
										$telefono = $_POST['txtTelefono'];
										$email = $_POST['txtEmail'];
										$ciudad = $_POST['cboCiudad'];

										$p->rutpaciente = $rutnum;
										$p->rutver = $rutver;
										$p->nombre = $nombre;
										$p->apellidopaterno = $apat;
										$p->apellidomaterno = $amat;
										$p->fechanacimiento = $f_nac;
										$p->direccion = $direccion;
										$p->telefono = $telefono;
										$p->correlectronico = $email;
										$p->codigociudad = $ciudad;

										$id = $pDriver->nuevoPaciente($p);
										//print_r($p);
										echo "<script>guarda_pac()</script>";
																			
										}else{
											echo "<script>alert('El rut ya está registrado.')</script>";
											echo "<script>$('#txtRutNum2').focus();</script>";
										}									
									}
                        	 ?>

                </div>


          <!--Panel 2: Cargo -->
          <div class="tab-pane" id="tab2">
                        	
             <form class="form-inline" name="form1" method="post">
			 	
						 	<div class="panel panel-info with-nav-tabs">
						 	  <div class="panel-body">
							    <div class="form-group">
							    	<input type="text" id="txtnrooa" name="txtnrooa" placeholder="Nro" class="form-control input" style="width: 50px;" onkeypress="return isNumber(event)"></input>
							    </div>
							    
							    <button type="button" class="btn btn-primary fuente_btn input">Buscar</button>
							    &nbsp;

							    <div class="form-group">
							    	<label>Estado</label>
							       <input type="text" class="form-control input" name="txtestado" disabled="true">
							    </div>
							    &nbsp;&nbsp;
							    <div class="form-group">
							    	<label>Fecha</label>
							    	<input type="date" required id="txtfecha" name="txtfecha" class="form-control input" value="<?php echo date("Y-m-d"); ?>"></input>
							    	<input type="time" required id="txthora" name="txthora" class="form-control input" value="<?php echo date("H:i"); ?>"></input>
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
			    			<input type="text" id="txtnroCuenta" name="txtnroCta" onkeypress="return isNumber(event)" placeholder="N° Cuenta" class="form-control input"></input>
			    		</div>
			    		<br><br>
			    		<div class="form-group">
			    			<label>Clasificación</label>
			    			<select name="cboClasifica" id="cboClasifica" class="form-control input fuente_btn">
			    				<option>PACIENTE</option>
			    			</select>
			    			
			    			&nbsp;&nbsp;

			    			<label>Run Paciente</label>

			    			<input type="text" id="txtRutNum3" name="txtRutNum3" onkeypress="return isNumber(event)" class="form-control input" maxlength="8" style="width: 130px;"></input>

			    			<button data-user="" type="button" id="btnbuscaPac" name="btnbuscaPac" class="btn btn-primary input" >
			    			<span class="glyphicon glyphicon-search"></span></button>
			    			&nbsp;

			    			<button type="button" class="btn btn-primary input fuente_btn" name="btnSinRut" id="btnSinRut">No tiene Rut</button>
			    			&nbsp;
			    			<div id="response-container" style="float: right;"></div>
			    			
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
			    				<div class="form-group">
					    			<label>Servicio</label>
					    			<input type="text" name="jqxinput" id="jqxInput" />
					    			<label style="font-family: Verdana; font-size: 10px;">ej: Hemograma</label>

					    			&nbsp;&nbsp;
					    			<label>Cantidad</label>
					    			<input type="text" id="txtCantServ" name="txtCantServ" onkeypress="return
			    				 		isNumber(event)" class="form-control input" style="width: 60px;"></input>
				        			<div style="font-family: Verdana; font-size: 13px;" id='selectionlog'></div>
				        			<label id="lblcant"></label>
	    						</div>
			    			</div>
			    		</div>	
               		</div>
            	</div>
          </form>
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
					<input type="text" id="txtNomMed2" name="txtNomMed2" class="form-control" placeholder="Nombre medico"></input>
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
	        <button type="button" class="btn btn-primary" id="btnModalOk">Aceptar</button>
	      </div>
	    </div>
	  </div>
	</div>	
			
</body>
</html>
</div>							
