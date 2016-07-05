<?php
class Servicios extends MaeServiciosMySqlDAO{
	public function json_buscador_servicios(){
		$sql="select codigoservicio,descripcion
				from mae_servicios";
		$sqlQuery=new SqlQuery($sql);
		

		return $this->getList($sqlQuery);
	}




}
?>