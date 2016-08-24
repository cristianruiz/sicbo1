<?php 
class cnt_personanatural extends HmPersonanaturalMySqlDAO{
	function carganombredesdesicbo($r){
		$sql="select *
		from hm_detallehonorariossicbo
			where rutmed='".$r."' 
			order by iddetallehonorario desc limit 0,1";
		$sqlQuery = new SqlQuery($sql);
		$arr=$this->execute($sqlQuery);
		
		print_r($arr["medico"]);
		return($arr["medico"]);
	}
}
?>