<?php
class Serv extends MaeServiciosMySqlDAO{
	public function json_buscador_servicios(){
		$sql="select codigoservicio,concat(codigoservicio,'->',descripcion)  as descripcion
				from mae_servicios";
		$sqlQuery=new SqlQuery($sql);
		

		 $arr=$this->execute($sqlQuery);$ret = Array();
		 
		 foreach($arr as &$t){
		 	$f= array(
		 			"codigoservicio"=>$t["codigoservicio"],
		 			"descripcion"=>utf8_encode($t["descripcion"]),
		 	);
		 	array_push($ret,$f);
		 }
		 
		 return(json_encode($ret)); 
	}


}
?>