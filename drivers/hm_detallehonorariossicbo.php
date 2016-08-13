<?php
class hm_detallehonorariossicbo extends HmDetallehonorariossicboMySqlDAO{
	public function cargamensual($datos,$hon){
		/*{"FECHADIGITACION":"2016-06-03","PACIENTE":"LUIS ARNOLDO GOMEZ BRAVO ","NRO_OA":56845,"CODIGO":2501016,
		"CANTIDAD":1,"FECHA":"2016-05-30","FUNCION":"1er CIRUJANO ","MONTO":221582,"RUT_MED":10220626,
		"NOMBREPAD":"Hiperplasia De La Prostata ","MEDICO":"GJURANOVIC SARDY MARKO ","NRO_FI":207103} */
		$data = json_decode($datos,true);
		
		$det = new HmDetallehonorariossicbo();
		
		foreach ($data as $dato){
			$det->cantidad=$dato["CANTIDAD"];
			$det->codigo=$dato["CODIGO"];
			$det->fecha=$dato["FECHA"];
			$det->fechadigitacion=$dato["FECHADIGITACION"];
			$det->funcion=$dato["FUNCION"];
			$det->idhonorario=$hon->idhonorario;
			$det->medico=$dato["MEDICO"];
			$det->monto=$dato["MONTO"];
			$det->nombrepad=$dato["NOMBREPAD"];
			$det->nrofi=$dato["NRO_FI"];
			$det->nrooa=$dato["NRO_OA"];
			$det->paciente= ($dato["PACIENTE"]);
			$det->periodo=$hon->periodo;
			$det->rutmed=$dato["RUT_MED"];
			$this->insert($det);
			
		}
		
	}
}