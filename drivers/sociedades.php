<?php
class sociedad extends HmSociedadMySqlExtDAO{
	function getall(){
		return $this->queryAll();
	}
}