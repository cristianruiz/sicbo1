<?php
class hm_honorariosicbo extends HmHonorariossicboMySqlDAO{
	var $mes;
	var $ano;
	var $periodo;
	var $fecha;
	public function hm_honorariosicbo($m,$a){
		$this->ano=$a;
		$this->mes=$m;
		$sql= "select current_date() as fecha";
		$sqlQuery = new SqlQuery($sql);
		$this->fecha=$this->execute($sqlQuery);
		//error_log("FECHA: ".$fecha[0][0]);
		switch ($this->mes) {
			case 'ENERO':
				$this->periodo='1'.$this->ano;
				
				break;
			case 'FEBRERO':
				$this->periodo='2'.$this->ano;
				
				break;
			case 'MARZO':
				$this->periodo='3'.$this->ano;
			
				break;
			case 'ABRIL':
				$this->periodo='4'.$this->ano;
			
				break;
			case 'MAYO':
				$this->periodo='5'.$this->ano;
			
				break;
			case 'JUNIO':
				$this->periodo='6'.$this->ano;
					
				break;
			case 'JULIO':
				$this->periodo='7'.$this->ano;
			
				break;
			case 'AGOSTO':
				$this->periodo='8'.$this->ano;
			
				break;
			case 'SEPTIEMBRE':
				$this->periodo='10'.$this->ano;
					
				break;
			case 'OCTUBRE':
				$this->periodo='10'.$this->ano;
					
				break;
			case 'NOVIEMBRE':
				$this->periodo='11'.$this->ano;
					
				break;
			case 'DICIEMBRE':
				$this->periodo='12'.$this->ano;
					
				break;
			
		}
		error_log("PERIODO A TRABAJAR: "+ $this->periodo);
		
		
	}
	public function get_periodo(){
		return $this->periodo;
	}
	public function existeperiodo(){
		$h= new HmHonorariossicboMySqlDAO();
		$r=$h->queryByPeriodo($this->periodo);
		
	}
	
	public function nuevoperiodo(){
		$h= new HmHonorariossicboMySqlDAO();
		$r=new HmHonorariossicbo();
		$r->estado=1;
		$r->fecha=$this->fecha[0][0];
		$r->periodo=$this->periodo;
		$r->usuario='cruiz';
		
		$h->insert($r);
		return $r->idhonorario;
	}
}