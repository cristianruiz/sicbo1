<?php 
class Pac extends MaePacienteMySqlDAO{

	public function verificaPaciente($rut_num){
		$sql = 'select * from mae_paciente where rutpaciente = '.$rut_num.'';
		$sqlQuery = new SqlQuery($sql);

		$arr = $this->execute($sqlQuery);$ret = Array();
		
		if (sizeof($arr) == 0){
			return "no";
		}else{
			return "si";
		}
	}
}