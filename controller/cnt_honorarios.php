<?php
class hm_honorarioconsolidado extends HmHonorarioconsolidadoMySqlDAO{
	var $periodo;
	var $idhonorariosicbo;
	public function hm_honorarioconsolidado($p,$id){
		$this->periodo=$p;
		$this->idhonorariosicbo=$id;
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