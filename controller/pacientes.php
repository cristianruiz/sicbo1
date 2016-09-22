<?php 
class Pac extends MaePacienteMySqlDAO{

	public function verificaPaciente($rut_num){
		$sql = 'select * from mae_paciente where rutpaciente = '.$rut_num.' ';
		$sqlQuery = new SqlQuery($sql);

		$arr = $this->execute($sqlQuery);$ret = Array();
		
		if (sizeof($arr) == 0){
			return "no";
		}else{
			return "si";
		}
	}

	public function insertaPaciente(){

	    $rutnum = $_GET['rutnum'];
        $rutver = $_GET['rutver'];
        $nombre = $_GET['nombre'];
        $apat = $_GET['apellidopaterno'];
        $amat = $_GET['apellidomaterno'];
        $fnac = $_GET['fechanacimiento'];
        $dir = $_GET['direccion'];
        $tel = $_GET['telefono'];
        $mail = $_GET['correoelectronico'];
        $ciudad = $_GET['codigociudad'];

	    $sql = 'INSERT INTO mae_paciente(rutpaciente,rutver,nombre,apellidopaterno,apellidomaterno,fechanacimiento,direccion
                                          telefono,correoelectronico,codigociudad)
                VALUES($rutnum,$rutver,$nombre,$apat,$amat,$fnac,$dir,$tel,$mail,$ciudad)';
        $sqlQuery = new SqlQuery($sql);

        if ($this->execute($sqlQuery)){
            echo 'Todo bien';
        }else{
            echo 'mal';
        }
    }
}