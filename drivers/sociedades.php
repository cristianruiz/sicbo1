<?php
class sociedad extends HmSociedadMySqlDAO{
	function getall(){
		return $this->queryAll();
	}
	function getnombrerazonsocial($rut){
		$rer=new HmSociedad();
		
		$r=$this->queryByRutsociedad($rut);
		$rer=$r[0];
		error_log("RAZON SOCIAL: ".$rer->razonsocial);
		return $rer->razonsocial;
	}
	
}