<?php include("template/header.php") ?>

<div class="container">
	 <form class="form-inline" name="form1" method="post">
	 	<div>
	 		<p><h4>Orden de atención</h4></p>
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
	    			<label>Clasificación</label>
	    			<select name="cboClasifica" id="cboClasifica" class="form-control">
	    				<option>PACIENTE</option>
	    			</select>
	    			
	    			&nbsp;&nbsp;

	    			<label>Run Paciente</label>

	    			<input type="text" id="txtNomPac" name="txtNomPac" class="form-control" maxlength="8" style="width: 130px;"></input>

	    			<input type="text" id="txtRutVer" name="txtRutVer" class="form-control" style="width: 50px;"></input>

	    			<button type="button" class="btn btn-primary" id="btnSinRut">No tiene Rut</button>
	    			&nbsp;
	    			<input type="text" id="txtnomPac" name="txtNomPac" class="form-control" disabled="true" style="width: 250px;"></input>
	    		</div>
	    	</div>
	    </div>

	    <div class="panel panel-info">
	    	<div class="panel-body">
	    		<div class="form-group">
	    		  <label>Financiador</label>
	    		  <select name="cboFinan" id="cboFinan" class="form-control">
	    		  	<option>FONASA</option>
	    		  	<option>PARTICULAR</option>
	    		  	<option>COLMENA</option>
	    		  </select>

	    		  &nbsp;
	    		  <label>Arancel</label>
	    		  <select name="cboArancel" id="cboArancel" class="form-control">
	    		  	<option>PLAN 1</option>
	    		  	<option>PLAN 2</option>
	    		  	<option>PLAN 3</option>
	    		  </select>	

	    		  &nbsp;&nbsp;
	    		  <button type="button" id="btnMedicos" class="btn btn-primary">Médicos</button>
	    		  <input type="text" id="txtNomMed" name="txtNomMed" class="form-control" disabled="true"></input>
	    		</div>
	    	</div>
	    </div>
	</form>
 </div>
</div>