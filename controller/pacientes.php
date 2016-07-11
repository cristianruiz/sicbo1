<?php 

class Pac extends MaePacienteMySqlDAO{

	public function verificaPaciente($rut_num){
		$sql = 'select * from mae_paciente where rutpaciente = '.$rut_num.'';
		$sqlQuery = new SqlQuery();
		
	}
}