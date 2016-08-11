<?php 
class Ciudad extends MaeCiudadMySqlDAO{
	public function getCiudades(){
		$objCiu = new MaeCiudadMySqlDAO();
		$res = $objCiu->queryAll();
		return $res;
	}
}