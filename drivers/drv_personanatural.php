<?php 
include('../controller/cnt_personanatural.php');
class drv_personanatural extends HmPersonanaturalMySqlDAO{
	var $rutproveedor;
	public function guardapersonanatural($rutmed,$rutver,$nombre,$esreceptor,$vigente){
		$pn=new HmPersonanaturalMySqlDAO();
		$pno=new HmPersonanatural();
		$pno->rutproveedor=$rutmed;
		$pno->rutver=$rutver;
		$pno->nombrecompleto=$nombre;
		$pno->esreceptor=$esreceptor;
		$pno->vigente=$vigente;
		$pn->insert($pno);
		if (($pno->id)>0){
			return true;
		} else {
			return false;
		}
		
	}
	public function guardasociedad($rutnum,$rutsociedad) {
		
	}
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
		//array_push($ret,$f);
		return $f;
		
				
		
	}
}

?>