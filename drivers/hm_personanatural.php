<?php 
include('../controller/cnt_personatural.php');
class hm_personanatural extends HmPersonanaturalMySqlDAO{
	var $rutproveedor;
	public function cargadatosfromhonorariosicbo($idh){
		$dhm=new HmHonorarioconsolidadoMySqlDAO();
		$r = new HmHonorarioconsolidado();
		$r=$dhm->load($idh);
		return $r;
		//$r=$dhm->load($idh);
				
		
	}
}

?>