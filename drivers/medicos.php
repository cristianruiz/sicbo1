<?php 

class Medicos extends GlbMedicosMySqlDAO{
	public function getAll($col){
		$datos = new GlbMedicosMySqlDAO();
		$res = $datos->queryAllOrderBy($col);
		return $res;
	}
}