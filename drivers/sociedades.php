<?php
class sociedad extends HmSociedadMySqlDAO{
	function getall(){
		return $this->queryAll();
	}
	function getnombrerazonsocial($rut){
		$rer=new HmSociedad();
		
		$rer=$this->queryByRutsociedad($rut);
		error_log("rerrrr");
		error_log(print_r($rer,true));
		return $rer[0]->razonsocial;
	}
	
}