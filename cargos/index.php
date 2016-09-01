<?php 
include('../include_dao.php');
include("template/header.php");
include('../drivers/medicos.php');
include('../drivers/servicios.php');
include('../drivers/pacientes.php');
include('../drivers/ciudad.php');
include('../controller/pacientes.php');
include('../controller/cnt_cargos.php');
include ('../drivers/drv_financiador.php');
date_default_timezone_set("Chile/Continental");

$ciu = new Ciudad();
$res_ciu = $ciu->getCiudades();

$objFin = new  Financiador();
$res_fin = $objFin->getAll();


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
                        						<input type="text" class="form-control input-sm" id="txtRutNum2" name="txtRutNum2" onkeypress="return isNumber(event)" placeholder="Rut" maxlength="10" id="txtRutNum2" oninput="checkRut(this)"></input>
                        					</div>
                        				</div>

                        				<br>
                        				<div class="form-group">

								            <div class="col-xs-3">
								                <input type="text" class="form-control input-sm" placeholder="Nombres" name="txtNomPac" id="txtNomPac" />
								            </div>
								            <div class="col-xs-3">
								                <input type="text" class="form-control input-sm" placeholder="A. Paterno" name="txtApat" id="txtApat" />
								            </div>
								            <div class="col-xs-3">
								                <input type="text" class="form-control input-sm" placeholder="A. Materno" id="txtAmat" name="txtAmat" />
								            </div>
								            <div class="col-xs-1">
								            	<label class="input-sm">Fecha nac:</label>
								            </div>
								            <div class="col-xs-2">
								            	<input type="date" class="form-control input-sm" id="txtFnac" name="txtFnac"></input>
								            </div>
								        </div>

								        <br><br>

								        <div class="form-group">
								        	<div class="col-xs-1">
								        		<input type="text" class="form-control input-sm" id="txtEdad" onkeypress="return isNumber(event)" placeholder="Edad"></input>
								        	</div>
								        	<div class="col-xs-1">
								        		<strong class="input-sm">Edad:</strong><br>
								        		<input type="radio" id="rdEdad" name="edad" value="1" >Años</input>
								        		<input type="radio" id="rdEdad" name="edad" value="2" >Meses</input>
								        		<input type="radio" id="rdEdad" name="edad" value="3" >Dias</input>
								        	</div>
								        	<div class="col-xs-3">
								        		<strong class="input-sm">Sexo:</strong><br>
								        		<input type="radio" name="sexo" id="rdSexo" value="1">Masculino</input>
								        		<input type="radio" name="sexo" id="rdSexo" value="0">Femenino</input>
								        	</div>
								        	<div class="col-xs-3">
								        		<input type="text" class="form-control input-sm" placeholder="Dirección" name="txtDireccion"></input>
								        	</div>
								        	<div class="col-xs-3">
								        		<input type="text" class="form-control input-sm" name="txtTelefono" id="txtTelefono" placeholder="Teléfono"></input>
								        	</div>
								        </div>
								        <br><br><br>
								        <div class="form-group">
								        	<div class="col-xs-3">
								        		<strong class="input-sm">Cuidad</strong>
								        		<select name="cboCiudad" id="cboCiudad" class="form-control input-sm">
								        		<?php foreach ($res_ciu as $item) {
								        			echo '<option value="'.$item->codigociudad.'">'.$item->nombreciudad.'</option>';
								        		}
								        		 ?>
								        		</select>
								        	</div><br>
								        	<div class="col-xs-3">
								        		<input type="text" name="txtActividad" id="txtActividad" class="form-control input-sm" placeholder="Actividad"></input>
								        	</div>
								        	<div class="col-xs-3">
								        		<input type="text" name="txtEmail" id="txtEmail" class="form-control input-sm" placeholder="Email"></input>
								        	</div>
								        </div>
								        <br><br>
								        <div class="form-group">
								        	<div class="col-xs-2">
												<button type="submit" class="btn btn-primary btn-sm" id="btnokPac" name="btnokPac" id="btnokPac">
												    <span class="glyphicon glyphicon-floppy-saved"></span> Guardar
												</button>
								        	</div>
								        	<div class="col-xs-2">
												<button type="submit" class="btn btn-primary btn-sm" name="btnEditaPac">
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
			 	
						 	<div class="panel panel-info with-nav-tabs panel-margen">
						 	  <div class="panel-body panel-body-margen">
							    <div class="form-group">
									<button type="button" class="btn btn-primary fuente_btn input" data-toggle="modal" data-target="#myModal2">
										<span class="glyphicon glyphicon-search">
									</button>
							    	<input type="text" id="txtcodsec" name="txtcodsec" placeholder="Sec." class="form-control input" style="width: 50px;" onkeypress="return isNumber(event)" ></input>
							    	
							    	&nbsp;

							    	<input type="text" id="txtnrooa" name="txtnrooa" placeholder="Nro" class="form-control input" style="width: 50px;" onkeypress="return isNumber(event)"></input>
							    </div>

							    &nbsp;

							    <div class="form-group">
									<label id="lblsec"></label>
							    	<label>Estado</label>
							       <input type="text" class="form-control input" name="txtestado" disabled="true" style="width: 100px">
							    </div>
							    &nbsp;&nbsp;
							    <div class="form-group">
							    	<label>Fecha</label>
							    	<input type="date" required id="txtfecha" name="txtfecha" class="form-control input" value="<?php echo date("Y-m-d"); ?>" style="width: 160px"></input>
							    	<input type="time" required id="txthora" name="txthora" class="form-control input" value="<?php echo date("H:i"); ?>"></input>
							    </div>
							  </div>
						   </div>

			    <div class="panel panel-info panel-margen">
			    	<div class="panel-body panel-body-margen">
			    		<div class="form-group">
			    			<label>Centro Costo</label>
			    			<select id="cboCosto" name="cboCosto" class="form-control input fuente_btn">
			    				<option>LABORATORIO</option>
			    				<option>KINE</option>
			    			</select>

			    			
			    			<select id="cboTipCuenta" name="cboTipCuenta" class="form-control input fuente_btn">
			    				<option>TIPO CUENTA</option>
			    			</select>
			    			<input type="text" id="txtnroCta" name="txtnroCta" onkeypress="return isNumber(event)" placeholder="N° Cuenta" class="form-control input" style="width: 150px;"></input>
			    		</div>
			    		<br><br>
			    		<div class="form-group">
			    			<label>Clasificación</label>
			    			<select name="cboClasifica" id="cboClasifica" class="form-control input fuente_btn">
			    				<option>PACIENTE</option>
			    			</select>
			    			
			    			&nbsp;&nbsp;

			    			<label>Run Paciente</label>

			    			<input type="text" id="txtRutNum3" name="txtRutNum3"  onkeypress="return isNumber(event)" class="form-control input" maxlength="8" style="width: 130px;"></input>

			    			&nbsp;
			    			<button type="button" class="btn btn-primary input fuente_btn" name="btnSinRut" id="btnSinRut">No tiene Rut</button>
			    			&nbsp;
			    			<div id="response-container" style="float: right;"></div>
			    			
			    		</div>
			    	</div>
			    </div>
			    

			    <div class="panel panel-info panel-margen">
			    	<div class="panel-body panel-body-margen">
			    		<div class="form-group">
			    		  <label>Financiador</label>
			    		  <select name="cboFinan" id="cboFinan" class="form-control input fuente_btn">
			    		  	<?php foreach ($res_fin as $item){
			    		  		echo '<option value="'.$item->codigofinanciador.'">'.$item->nombrefinanciador.'</option>';
							}  ?>
			    		  </select>
			    		  &nbsp;
			    		  <label>Arancel</label>
			    		  <select name="cboArancel" id="cboArancel" class="form-control input fuente_btn">
			    		  	<option>PLAN 1</option>
			    		  	<option>PLAN 2</option>
			    		  	<option>PLAN 3</option>
			    		  </select>	

			    		  &nbsp;&nbsp;
			    		  <button type="button" id="btnMedicos" class="btn btn-primary input fuente_btn" data-toggle="modal" data-target="#myModal">Profesionales</button>
						  <input type="text" id="txtNomMed" name="txtNomMed" class="form-control input" disabled="true"></input>
			    		</div>
			    	</div>
			    </div>

			    <div class="panel panel-info panel-margen">
			    	<div class="panel-body panel-body-margen">
			    		<div class="row">

							<div class="form-group">
								&nbsp;&nbsp;
								<button type="button" id="btnModalServ" class="btn btn-primary input fuente_btn" data-toggle="modal" data-target="#myModal3">
									<span class="glyphicon glyphicon-search">
								</button>

								<input type="text" id="txtcodserv" name="txtcodserv" placeholder="Código" onkeypress="return
			    			 		isNumber(event)" class="form-control input" style="width: 100px">

								<input type="text" name="txtNomServ" id="txtNomServ" class="form-control input" style="width: 250px"/>

					    			&nbsp;&nbsp;
								<input type="text" id="txtCantServ" name="txtCantServ" onkeypress="return
			    			 		isNumber(event)" class="form-control input" style="width: 60px;" placeholder="Cant."></input>
								<div style="font-family: Verdana; font-size: 13px;" id='selectionlog'></div>
								<label id="lblcant"></label>
							</div>

			    		</div>	
               		</div>
            	</div>

                 <div id="jqxLoader"></div>

                 <div id="cargando"></div>

                 <div class="form-group" id="jqxgrid"></div>
          </form>
        </div>
 </div>   
  <!-- Modal profesionales -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Lista de médicos</h4>
	      </div>
	      <div class="modal-body">
	        <div class="row">


					<div id="cboRolProf" style="margin-right: 0px;"></div>


					  &nbsp;&nbsp;
					  <input type="text" id="jqxInput3" name="jqxInput3"/>

			 </div>

			<br>

			 <div class="row">
			  	<div class="form-group">
					<div class="col-xs-4">
						Tratante
						<input type="hidden" name="ruttra" id="ruttra">
						<input type="text" id="txtMedtra" class="form-control input">
					</div>
					<div class="col-xs-4">
							Informante
						<input type="hidden" name="rutminf" id="rutminf">
						<input type="text" id="txtmedInf" class="form-control input">
					</div>
					<div class="col-xs-4">
						Tecnólogo
						<input type="hidden" name="ruttecno" id="ruttecno">
						<input type="text" id="txttecnologo" class="form-control input">
					</div>
			  	
			   </div>
			 </div>

			 <br>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	        <button type="button" class="btn btn-primary" id="btnModalOk">Aceptar</button>
	      </div>
	    </div>
	  </div>
	</div>
					<!-- Modal Seccion -->
					<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Elegir sección</h4>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="form-group">
											<div class="col-lg-3">
												<input type="text" name="jqxInput2" id="jqxInput2"/>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

						<!-- Modal Buscador servicios -->
						<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">Buscador de servicios</h4>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="form-group">
												<div class="col-lg-3">
													<input type="text" name="jqxInput" id="jqxInput"/>
													<label style="font-family: Verdana; font-size: 10px;">ej: Hemograma</label>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>



						</body>
</html>
</div>							
