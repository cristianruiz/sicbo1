<?php 
include('../controller/cnt_personanatural.php');
class drv_personanatural extends HmPersonanaturalMySqlDAO{
	var $rutproveedor;
	public function actualizarecepcionhonorariomensual($idhonorariosicbo,$rutnum,$esreceptor){
		/*$h= new HmHonorarioconsolidadoMySqlDAO();
		$ho= new HmHonorarioconsolidado();
		$ho=$h->load($idhonorarioconsolidado);
		$ho->tiporeceptor=$esreceptor;
		$numrows=$h->update($ho);
		print_r("NUMERO 
		de filas actualizadas: ".$numrows);*/
		$h = new hm_honorarioconsolidado(1,$idhonorariosicbo);
		$numrows=$h->actualizarecepcionhonorariomensual($rutnum, $esreceptor);
		if ($numrows>=0){
			error_log("Se actualizaron ".$numrows." Registros");
			return true;
		} else {
			return false;
		}
		
		
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
	public function resethonconsolidado_pn_soc($id){
		$error=false;
		$dhm=new HmHonorarioconsolidadoMySqlDAO();
		$r = new HmHonorarioconsolidado();
		$t=new Transaction();
		$r=$dhm->load($id);
		$r->tiporeceptor=1;
		$dhm->update($r);
		$hsmdao=new HmSociosmiembrosMySqlDAO();
		$hsmdao->deleteByRutproveedor($r->rutmed);
		$hmpndao= new HmPersonanaturalMySqlDAO();
		$hmpndao->deleteByRutproveedor($r->rutmed);
		$t->commit();
		$error=true;
		return $error;
		
		
	}
}

?>