<?php
class Servicios extends OaServiciosMySqlDAO{
	public function get_all(){
		$datos = new OaServiciosMySqlDAO();
		$res = $datos->queryAll();
		
		return $res;
	}
	

	public function guardaServicio(){
		
	}
}