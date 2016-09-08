<?php 
class Cargos_controller extends ZoaCargoMySqlDAO{

	public function buscaCargo($nrooa,$cod_sec){
		$hoy = getdate();
		$mes = $hoy['mon']-3;
		$periodo = $mes. $hoy['year'];

		$sql = 'SELECT * FROM zoa_cargo a
                         LEFT JOIN mae_paciente b ON a.rutpaciente=b.rutpaciente
                        where a.nrocargo='.$nrooa.' and a.periodo = '.$periodo.' and a.codigoseccion= '.$cod_sec.' ';
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
		$mes = $hoy['mon']-3;
		$periodo = $mes. $hoy['year'];

		
		$sql = 'SELECT *,cantidadentregada * preciounitario as total,b.descripcion 
                FROM zoa_detallecargo a
                LEFT JOIN mae_servicios b ON a.codigodetalle=b.codigoservicio
                where nrocargo='.$nrooa.' and periodo = '.$periodo.' and codigoseccion = '.$cod_sec.' ';
		$sqlQuery = new SqlQuery($sql);
		$arr=$this->execute($sqlQuery);$ret = Array();
		 
		 foreach($arr as &$t){
		 	$f= array(
		 			"nrocargo"=>$t["nrocargo"],
		 			"codigodetalle"=>$t["codigodetalle"],
		 			"preciounitario"=>$t["preciounitario"],
		 			"cantidadentregada"=>$t["cantidadentregada"],
                    "iddetalle"=>$t["iddetalle"],
                    "total"=>$t["total"],
                    "descripcion"=>$t["descripcion"],
		 	);
		 	array_push($ret,$f);
		 }
		 
		 return(json_encode($ret)); 
	}

	public function getDetInsumos($nrooa,$cod_sec){
	    $periodo = 62016;
        $sql = 'SELECT a.*,b.descripcion
                FROM oa_detalleinsumo a
                LEFT  JOIN mae_insumos b ON a.codigoinsumo=b.codigoinsumo
                WHERE periodo= '.$periodo.' AND nrocargo='.$nrooa.' AND codigoseccion='.$cod_sec.' ';
        $sqlQuery = new  SqlQuery($sql);
        $arr = $this->execute($sqlQuery);$ret = Array();

        foreach ($arr as $t) {
            $f = array(
                "nrocargo"=>$t["nrocargo"],
                "codigoinsumo"=>$t["codigoinsumo"],
                "preciounitario"=>$t["preciounitario"],
                "cantidadentregada"=>$t["cantidadentregada"],
                "iddetalle"=>$t["iddetalle"],
                "total"=>$t["total"],
                "descripcion"=>$t["descripcion"],
            );
            array_push($ret,$f);
        }
        return(json_encode($ret));
    }
}
