<?php 

class Pacientes extends MaePacienteMySqlDAO
{
	
	public function nuevoPaciente($pac){
		$objPac = new MaePacienteMySqlDAO();	
		$id = $objPac->insert($pac);
	}

	public function editaPaciente($pac){
		$objPac = new MaePacienteMySqlDAO();
		$id = $objPac->update($pac);
	}

	public function buscaPac($rut){
		$objPac = new MaePacienteMySqlDAO();
		$resPac = $objPac->queryByRutpaciente($rut);
		return $resPac;
	}
}