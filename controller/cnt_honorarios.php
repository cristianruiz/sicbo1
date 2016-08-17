<?php
class hm_honorarioconsolidado extends HmHonorarioconsolidadoMySqlDAO{
	var $periodo;
	var $idhonorariosicbo;
	public function hm_honorarioconsolidado($p,$id){
		$this->periodo=$p;
		$this->idhonorariosicbo=$id;
	}
	
	public function getJSONHonorario(){
		$sql="SELECT
					t1.id,
					concat(
						t1.rutmed,
						'-',
						IFNULL(t2.rutver, '?')
					)AS rutmed,
					IFNULL(t2.nombrecompleto, '-')AS medico,
					GROUP_CONCAT(
						DISTINCT(trim(t3.descripcionsicbo))SEPARATOR ','
					)AS nombrepad,
					t1.valor AS total,
					t1.tiporeceptor as receptor
				FROM
					hm_honorarioconsolidado t1
				LEFT JOIN hm_personanatural t2 ON t1.rutmed = t2.rutproveedor
				INNER JOIN hm_homocodigosformulas t3 ON t1.formula = t3.formula
				WHERE
					t1.idhonorariosicbo = ".$this->idhonorariosicbo."
				GROUP BY
					t1.id,
					t2.rutver,
					t2.nombrecompleto";
		
		$sqlQuery=new SqlQuery($sql);
		$arr=$this->execute($sqlQuery);$ret = Array();
			
		foreach($arr as &$t){
			$f= array(
					"id"=>$t["id"],
					"rutmed"=>($t["rutmed"]),
					"medico"=>($t["medico"]),
					"nombrepad"=>utf8_encode($t["nombrepad"]),
					"total"=>($t["total"]),
					"receptor"=>($t["receptor"])
					
			);
			array_push($ret,$f);
		}
		error_log("RETORNO: ".json_encode($ret));
		return(json_encode($ret));
	}
	public function cargahonorarioconsolidaddo(){
		$sql="insert hm_honorarioconsolidado(rutmed,formula,valor,idhonorariosicbo)
			select t1.rutmed as rutmed ,t2.formula as formula,sum(t1.monto) as valor,
			".$this->idhonorariosicbo." as idhonorariosicbo 
			from hm_detallehonorariossicbo t1,hm_homocodigosformulas t2
			where t1.codigo=t2.codigoservicio and t1.periodo=".$this->periodo."
			
			group by t1.rutmed,t2.formula";
		$sqlQuery = new SqlQuery($sql);
		$numrows=$this->executeInsert($sqlQuery);
		return $num_rows;
	}
}