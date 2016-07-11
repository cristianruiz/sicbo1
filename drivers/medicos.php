<?php 

class Medicos extends ZglbMedicosMySqlDAO{
	public function getAll($col){
		$datos = new ZglbMedicosMySqlDAO();
		$res = $datos->queryAllOrderBy($col);
		return $res;
	}
}