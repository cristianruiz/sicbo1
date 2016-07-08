<?php 

class Pacientes extends MaePacienteMySqlDAO
{
	public function nuevoPaciente($pac){
		$objPac = new MaePacienteMySqlDAO();
		$id = $objPac->insert($pac);
	}
}