<?php 
include('../controller/cnt_personanatural.php');
class drv_personanatural extends HmPersonanaturalMySqlDAO{
	var $rutproveedor;
	public function cargadatosfromhonorariosicbo($idh){
		$dhm=new HmHonorarioconsolidadoMySqlDAO();
		$r = new HmHonorarioconsolidado();
		
		$r=$dhm->load($idh);
		
		$d= new cnt_personanatural();
		$nombre= $d->carganombredesdesicbo($r->rutmed);
		$this->rutproveedor=$r->rutmed;
		$ret= Array();
		$f=array(
					"rutmed"=>($r->rutmed),
					"nombre"=>$nombre);
		array_push($ret,$f);
		return $ret;
		
				
		
	}
}

?>