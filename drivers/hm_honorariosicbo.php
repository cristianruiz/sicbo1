<?php
include('hm_detallehonorariossicbo.php');
include('../controller/cnt_honorarios.php');
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
		$f= $this->execute($sqlQuery);
		
		$this->fecha=$f[0]['fecha'];
		
		
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
				$this->periodo='9'.$this->ano;
					
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
		error_log("PERIODO A TRABAJAR: ". $this->periodo);
		
		
	}
	public function get_periodo(){
		return $this->periodo;
	}
	public function existeperiodo(){
		
		$p= new HmHonorariossicboMySqlDAO();
		error_log("en existeperiodo ");
		$q= $p->queryByPeriodo($this->periodo);
		//print_r($q[0]);
		if ($q[0]->idhonorario >0)
			return true;
				else
			return false;		
		
	}
	
	public function cargaperiodo(){
		//$i=$this->existeperiodo();
		//error_log("AKI: ".$i);
		$t= new Transaction();
		$error=false;
	    if ($this->existeperiodo()){
	    	$p= new HmHonorariossicboMySqlDAO();
	    	$q= $p->queryByPeriodo($this->periodo);
	    	return $q[0];
	    } else {
		$h= new HmHonorariossicboMySqlDAO();
		$r=new HmHonorariossicbo();
		$r->estado=1;
		$r->fecha=$this->fecha;
		$r->periodo=$this->periodo;
		$r->usuario='cruiz';
		$h->insert($r);
		$params= array("ano"=>$this->ano,"mes"=>$this->mes);
		
		$client=new SoapClient('http://192.168.1.51:8080/cbows/admision?wsdl');
		$deth=new hm_detallehonorariossicbo();
		$deth->cargamensual($client->honorarios_pad($params)->return,$r);
		//carga honorarios consolidados
		$hc=new hm_honorarioconsolidado($r->periodo,$r->idhonorario);
		$num_rows=$hc->cargahonorarioconsolidaddo();
		if($num_rows==0) $error=true;
		if($error) {
			$t->rollback();
			$r->idhonorario=0;
		}
		else {
			$t->commit();
		}
		//==============================
		
		return $r;
	    }
	}
}