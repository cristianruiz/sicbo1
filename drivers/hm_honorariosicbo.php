<?php
class hm_honorariosicbo extends HmHonorariossicboMySqlDAO{
	var $mes;
	var $ano;
	var $periodo;
	public function hm_honorariosicbo($m,$a){
		$this->ano=$a;
		$this->mes=$m;
		switch ($this->mes) {
			case 'ENERO':
				$this->periodo='1'.$this->ano;
				
				break;
			case 'FEBRERO':
				$this->periodo='2'.$this->ano;
				
				break;
		}
		error_log("PERIODO A TRABAJAR: "+ $this->periodo);
		
		
	}
	public function get_periodo(){
		return $this->periodo;
	}
}