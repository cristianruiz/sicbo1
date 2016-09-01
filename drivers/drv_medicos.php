<?php 

class Medicos extends MaeMedicosMySqlDAO{
	public function getAll(){
		$objMed = new MaeMedicosMySqlDAO();
		$res = $objMed->queryAll();
		return (json_encode($res));
	}
}