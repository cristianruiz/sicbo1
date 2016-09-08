<?php
class sociedad extends HmSociedadMySqlDAO{
	function getall(){
		return $this->queryAll();
	}
	function getnombrerazonsocial($rut){
		$rer=new HmSociedad();
		
		$rer=$this->queryByRutsociedad($rut);
		return $rer->razonsocial;
	}
	
}