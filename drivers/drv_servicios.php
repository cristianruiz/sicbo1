<?php
class Servicios extends ZoaServiciosMySqlDAO{
	public function get_all(){
		$datos = new ZoaServiciosMySqlDAO();
		$res = $datos->queryAll();

		return(json_encode($res));
	}

	public function getServByCod($cod){
		$s = new ZoaServiciosMySqlDAO();
		$res = $s->load($cod);
		return(json_encode($res));
	}
	
	
}