<?php 

class Cargos extends OaCargoMySqlDAO{
	public function getCargoByNro($nro){
		$datos = new OaCargoMySqlDAO();
		$res = $datos->load($nro);
		return $res;
	}
}
