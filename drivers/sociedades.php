<?php
class sociedad extends HmSociedadMySqlDAO{
	function getall(){
		return $this->queryAll();
	}
	function getnombrerazonsocial($rut){
		$rer=new HmSociedad();
		
		$r=$this->queryByRutsociedad($rut);
		$rer=$r[0];
		error_log("RAZON SOCIAL: ".$r->razonsocial);
		return $rer->razonsocial;
	}
	
}