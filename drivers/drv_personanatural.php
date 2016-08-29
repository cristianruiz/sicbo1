<?php 
include('../controller/cnt_personanatural.php');
class drv_personanatural extends HmPersonanaturalMySqlDAO{
	var $rutproveedor;
	public function actualizarecepcionhonorario($idhonorarioconsolidado,$esreceptor){
		$h= new HmHonorarioconsolidadoMySqlDAO();
		$ho= new HmHonorarioconsolidado();
		$ho=$h->load($idhonorarioconsolidado);
		$ho->tiporeceptor=$esreceptor;
		$h->update($ho);
		
	}
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
		$soc= new HmSociosmiembrosMySqlDAO();
		$soco= new HmSociosmiembro();
		$soco->rutproveedor=$rutnum;
		$soco->rutsociedad=$rutsociedad;
		error_log(print_r($soco,true));
		$soc->insert($soco);
		if (($soco->id)>0){
			return true;
		} else {
			return false;
		}
		
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