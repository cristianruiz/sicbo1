<?php 
class Cargos_controller extends ZoaCargoMySqlDAO{

	public function buscaCargo($nrooa,$cod_sec){
		$hoy = getdate();
		$mes = $hoy['mon']-2;
		$periodo = $mes. $hoy['year'];

		$sql = 'SELECT * FROM zoa_cargo where nrocargo='.$nrooa.' and periodo = '.$periodo.' and codigoseccion= '.$cod_sec.' ';
		$sqlQuery = new SqlQuery($sql);
		$arr=$this->execute($sqlQuery);$ret = Array();
		 
		 foreach($arr as &$t){
		 	$f= array(
		 			"codigoseccion"=>$t["codigoseccion"],
		 			"nrocargo"=>$t["nrocargo"],
		 			"periodo"=>$t["periodo"],
		 			"fecha"=>$t["fecha"],
		 			"nroficha"=>$t["nroficha"],
		 			"rutpaciente"=>$t["rutpaciente"],
		 			"rutfinanciador"=>$t["rutfinanciador"],
		 	);
		 	array_push($ret,$f);
		 }
		 
		 return(json_encode($ret)); 
	}

	public function getDetCargo($nrooa,$cod_sec){
		$hoy = getdate();
		$mes = $hoy['mon']-2;
		$periodo = $mes. $hoy['year'];

		
		$sql = 'SELECT * FROM zoa_detallecargo  where nrocargo='.$nrooa.' and periodo = '.$periodo.' and codigoseccion = '.$cod_sec.' ';
		$sqlQuery = new SqlQuery($sql);
		$arr=$this->execute($sqlQuery);$ret = Array();
		 
		 foreach($arr as &$t){
		 	$f= array(
		 			"nrocargo"=>$t["nrocargo"],
		 			"codigodetalle"=>$t["codigodetalle"],
		 			"preciounitario"=>$t["preciounitario"],
		 			"cantidadentregada"=>$t["cantidadentregada"],
		 	);
		 	array_push($ret,$f);
		 }
		 
		 return(json_encode($ret)); 
	}
}
