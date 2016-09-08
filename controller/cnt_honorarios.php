<?php
class hm_honorarioconsolidado extends HmHonorarioconsolidadoMySqlDAO{
	var $periodo;
	var $idhonorariosicbo;
	public function hm_honorarioconsolidado($p,$id){
		$this->periodo=$p;
		$this->idhonorariosicbo=$id;
	}
	public function actualizarecepcionhonorariomensual($idhonorario,$rutnum,$esreceptor,$rutrazonsocial,$nombrerazonsocial){
		$sql="update hm_honorarioconsolidado set tiporeceptor=".$esreceptor.",
				rutrazonsocial=".$rutrazonsocial.",nombrerazonsocial=".$nombrerazonsocial." 
				where rutmed=".$rutnum." 
				and idhonorariosicbo=".$this->idhonorariosicbo;
		$sqlQuery = new SqlQuery($sql);
		$numrows=$this->executeInsert($sqlQuery);
		return $num_rows;
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
	t1.tiporeceptor AS receptor,
	ifnull(
		w.razonsocial,
		'PERSONA NATURAL'
	)AS razonsocial
FROM
	hm_honorarioconsolidado t1
LEFT JOIN hm_personanatural t2 ON t1.rutmed = t2.rutproveedor
INNER JOIN hm_homocodigosformulas t3 ON t1.formula = t3.formula
LEFT JOIN(
	SELECT
		r2.rutproveedor,
		r1.razonsocial
	FROM
		hm_sociedad r1
	INNER JOIN hm_sociosmiembros r2 ON r1.rutsociedad = r2.rutsociedad
)w ON w.rutproveedor = t2.rutproveedor
WHERE
	t1.idhonorariosicbo = ".$this->idhonorariosicbo."
GROUP BY
	t1.id,
	t2.rutver,
	t2.nombrecompleto,
	w.razonsocial";
		
		$sqlQuery=new SqlQuery($sql);
		$arr=$this->execute($sqlQuery);$ret = Array();
			
		foreach($arr as &$t){
			$f= array(
					"id"=>$t["id"],
					"rutmed"=>($t["rutmed"]),
					"medico"=>utf8_encode($t["medico"]),
					"nombrepad"=>utf8_encode($t["nombrepad"]),
					"total"=>($t["total"]),
					"receptor"=>($t["receptor"]),
					"razonsocial"=>utf8_encode($t["razonsocial"]),
					
			);
			array_push($ret,$f);
		}
		error_log("RETORNO: ".print_r(json_encode($ret),true));
		return(json_encode($ret));
	}
	public function cargahonorarioconsolidaddo(){
		error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);
		/*$sql="insert hm_honorarioconsolidado(rutmed,formula,valor,idhonorariosicbo)
			select t1.rutmed as rutmed ,t2.formula as formula,sum(t1.monto) as valor,
			".$this->idhonorariosicbo." as idhonorariosicbo 
			from hm_detallehonorariossicbo t1,hm_homocodigosformulas t2
			where t1.codigo=t2.codigoservicio and t1.periodo=".$this->periodo."
			
			group by t1.rutmed,t2.formula";*/
		/*$sql="insert hm_honorarioconsolidado(rutmed,formula,valor,idhonorariosicbo,tiporeceptor) 
			select t1.rutmed as rutmed ,t2.formula as formula,sum(t1.monto) as valor,
			".$this->idhonorariosicbo." as idhonorariosicbo ,
			ifnull(t3.esreceptor,1) as tiporeceptor
			from hm_detallehonorariossicbo t1 inner join hm_homocodigosformulas t2 on t1.codigo=t2.codigoservicio
            left  join hm_personanatural t3 on t1.rutmed=t3.rutproveedor
			where   t1.periodo=".$this->periodo." 
			and t1.rutmed<>81949100
			
			group by t1.rutmed,t2.formula,t3.esreceptor";*/
		
		$sql="insert hm_honorarioconsolidado(rutmed,formula,valor,idhonorariosicbo,tiporeceptor,rutrazonsocial,nombrerazonsocial)
			select t1.rutmed as rutmed ,t2.formula as formula,sum(t1.monto) as valor,
			".$this->idhonorariosicbo." as idhonorariosicbo ,
			ifnull(t3.esreceptor,1) as tiporeceptor,
			
			case t3.esreceptor
			when 1 then t3.rutproveedor
				when 0 then w.rutsociedad
				else '0'
			
			end as rutrazonsocial,
			case t3.esreceptor
			when 1 then t3.nombrecompleto
				when 0 then w.razonsocial
				else 'ASIGNAR'
			
			end as nombrerazonsocial
			from hm_detallehonorariossicbo t1 inner join hm_homocodigosformulas t2 on t1.codigo=t2.codigoservicio
            left  join hm_personanatural t3 on t1.rutmed=t3.rutproveedor
			left join 		(select r1.rutsociedad,r1.razonsocial,r2.rutproveedor
							from hm_sociedad r1 inner join hm_sociosmiembros r2 
							on r1.rutsociedad=r2.rutsociedad )  w on t1.rutmed=w.rutproveedor
			where    t1.periodo=".$this->periodo." and t1.rutmed<>81949100
group by t1.rutmed,t2.formula,t3.esreceptor,rutrazonsocial,nombrerazonsocial";	
		$sqlQuery = new SqlQuery($sql);
		try{
		$numrows=$this->executeInsert($sqlQuery);
		} catch(Exception $e){
			print_r("ERROR:".$e->getMessage());
			$numrows=0;
		}
		return $numrows;
	}
	public function dsetexcelformula(){
		/*$sql="select ifnull(x.receptorhonorario,'FALTA INFORMACION') as receptorhonorario,x.formula as formula,sum(x.valor) as total
 from 

(
SELECT
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
	t1.tiporeceptor AS receptor,
	ifnull(
		w.razonsocial,
		'PERSONA NATURAL'
	)AS razonsocial,
case t1.tiporeceptor
	when 1 then t2.rutproveedor
	when 0 then w.rutsociedad
end as receptorhonorario,
t3.formula as formula,t1.valor as valor
FROM
	hm_honorarioconsolidado t1
LEFT JOIN hm_personanatural t2 ON t1.rutmed = t2.rutproveedor
INNER JOIN hm_homocodigosformulas t3 ON t1.formula = t3.formula
LEFT JOIN(
	SELECT
		r2.rutproveedor,
		r1.rutsociedad,
		r1.rutver,
		r1.razonsocial
	FROM
		hm_sociedad r1
	INNER JOIN hm_sociosmiembros r2 ON r1.rutsociedad = r2.rutsociedad
)w ON w.rutproveedor = t2.rutproveedor
WHERE
	t1.idhonorariosicbo = ".$this->idhonorariosicbo."
GROUP BY
	t1.id,
	t2.rutver,
	t2.nombrecompleto,
	w.razonsocial,
	w.rutsociedad

) x
group by x.receptorhonorario,x.formula";*/
		$sql="select rutrazonsocial,formula,sum(valor)
from hm_honorarioconsolidado
where idhonorariosicbo=".$this->idhonorariosicbo."
group by rutrazonsocial,formula";
		$sqlQuery=new SqlQuery($sql);
		$arr=$this->execute($sqlQuery);
		return $arr;
	}
}