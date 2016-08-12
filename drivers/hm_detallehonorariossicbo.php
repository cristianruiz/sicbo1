<?php
class hm_detallehonorariossicbo extends HmDetallehonorariossicboMySqlDAO{
	public function cargamensual($datos){
		/*{"FECHADIGITACION":"2016-06-03","PACIENTE":"LUIS ARNOLDO GOMEZ BRAVO ","NRO_OA":56845,"CODIGO":2501016,
		"CANTIDAD":1,"FECHA":"2016-05-30","FUNCION":"1er CIRUJANO ","MONTO":221582,"RUT_MED":10220626,
		"NOMBREPAD":"Hiperplasia De La Prostata ","MEDICO":"GJURANOVIC SARDY MARKO ","NRO_FI":207103} */
		$data = json_decode($datos,true);
		print_r("HOLA<br>");
		print_r($data);
		/*foreach ($data as $dato){
			error_log("dato");
		}*/
		
	}
}