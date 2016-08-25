<?php 
class cnt_personanatural extends HmPersonanaturalMySqlDAO{
	function carganombredesdesicbo($r){
		$sql="select medico
		from hm_detallehonorariossicbo
			where rutmed='".$r."' 
			order by iddetallehonorario desc limit 0,1";
		//print_r($sql."<br>");
		$sqlQuery = new SqlQuery($sql);
		$arr=$this->execute($sqlQuery);
		
		return($arr[0]["medico"]);
	}
}
?>