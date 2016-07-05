<?php
class Servicios extends OaServiciosMySqlDAO{
	public function json_buscador_servicios(){
		$sql="select codigoservicio,descripcion
				from mae_servicios";
		$sqlQuery=new SqlQuery($sql);
		

		return $this->getList($sql);
	}




}
?>