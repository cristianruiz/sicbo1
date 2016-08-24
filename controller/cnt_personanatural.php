<?php 
class cnt_personanatural extends HmPersonanaturalMySqlDAO{
	function carganombredesdesicbo($r){
		$sql="select *
		from hm_detallehonorariossicbo
			where rutmed='".$r."' 
			order by iddetallehonorario desc limit 0,1";
		$sqlQuery = new SqlQuery($sql);
		$arr=$this->execute($sqlQuery);
		$ret = Array();
		foreach($arr as &$t){
			$f= array(
					"medico"=>$t["medico"]
			);
			array_push($ret,$f);
		}
		return(json_encode($ret));
	}
}
?>