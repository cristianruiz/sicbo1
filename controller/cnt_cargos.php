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
                FROM zoa_detallecargo a
                LEFT  JOIN mae_insumos b ON a.codigodetalle=b.codigoinsumo
                WHERE periodo= '.$periodo.' AND nrocargo='.$nrooa.' AND codigoseccion='.$cod_sec.' ';
        $sqlQuery = new  SqlQuery($sql);
        $arr = $this->execute($sqlQuery);$ret = Array();

        foreach ($arr as $t) {
            $f = array(
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

    public function getFolio($cod_sec,$nro_oa,$periodo){

        $sql = ' SELECT * FROM zoa_cargo WHERE codigoseccion='.$cod_sec.' AND nrocargo='.$nro_oa.' AND periodo='.$periodo.' ';
        $sqlQuery = new  SqlQuery($sql);

        $arr = $this->execute($sqlQuery);$ret = Array();

        foreach ($arr as $t) {
            $f = array(
                'folio'=>$t['folio']
            );
            array_push($ret,$f);
        }
        //echo json_encode($ret);
        return(json_encode($ret));
    }

    public function insertCab_oa($cod_sec,$nro_oa,$periodo,$fecha,$nro_fi,$hora,$minuto,$rut_fin,$rut_pac,$tipo_pac,$tipo,$tipo_pag,$idtoth){
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);

        $sql = 'INSERT INTO zoa_cargo(codigoseccion,nrocargo,periodo,fecha,nroficha,hora,minuto
                                      rutfinanciador,rutpaciente,tipopaciente,tipo
                                      tipopago,idtoth)
                       VALUES ('.$cod_sec.','.$nro_oa.','.$periodo.','.$fecha.','.$nro_fi.','.$hora.','.$minuto.'
                                '.$rut_fin.','.$rut_pac.','.$tipo_pac.','.$tipo.','.$tipo_pag.','.$idtoth.') ';

        $sqlQuery = new  SqlQuery($sql);

        if ($this->execute($sqlQuery)){
            echo 'Todo bien';
        }else{
            echo 'mal';
        }
    }
}
