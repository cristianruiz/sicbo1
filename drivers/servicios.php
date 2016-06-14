<?php
class Servicios extends OaServiciosMySqlDAO{
	public function get_all(){
		$datos = new ServiciosMySqlDAO();
		$res = $datos->queryAll();
		
		return $res;
	}
	
}