<?php
class Servicios extends ServiciosMySqlDAO{
	public function get_all(){
		$datos = new ServiciosMySqlDAO();
		$res = $datos->queryAll();
		
		return $res;
	}
	
}