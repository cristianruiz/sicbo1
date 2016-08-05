<?php
class Servicios extends ZoaServiciosMySqlDAO{
	public function get_all(){
		$datos = new ZoaServiciosMySqlDAO();
		$res = $datos->queryAll();
		
		return $res;
	}
	

	public function getServByCod($cod){
		$s = new ZoaServiciosMySqlDAO();
		$res = $s->load($cod);
		return $res;
	}
	
	
}