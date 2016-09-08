<?php
include('../include_dao.php');
include('../drivers/hm_honorariosicbo.php');
include('../drivers/drv_personanatural.php');
//include('../controller/cnt_honorarios.php');

$obj = json_decode($_GET["parametros"]);
//error_log(print_r($obj),true);
$action=$obj->action;
switch ($action) {
	case "guardapersonanatural":
		$rutnum=$obj->rutnum;
		$rutver=$obj->rutver;
		$nombre=$obj->nombre;
		$checked=$obj->checked;
		$rutsociedad=$obj->rutsociedad;
		$idhonorario=$obj->idhonorario;
		$error=false;
		$vigente=1;
		if ($checked){
			$esreceptor=0;
		} else {
			$esreceptor=1;
		}
		$t=new Transaction();
		$r=new drv_personanatural();
		if(!$r->guardapersonanatural($rutnum, $rutver, $nombre,$esreceptor,$vigente)){
			$error=true;
		} /*else {
			$t->rollback();
			$salida= array("res"=>"NO" );
		}*/
		if ($checked){
			if (!$r->guardasociedad($rutnum, $rutsociedad)){
				$error=true;
			}
			$s = new sociedad();
			$rutrazonsocial=$rutsociedad;
			$nombrerazonsocial=$s->getnombrerazonsocial($rutsociedad);
		} {
			$rutrazonsocial=$rutnum;
			$nombrerazonsocial=$nombre;
		}
		
		
		
		
		if (!$r->actualizarecepcionhonorariomensual($idhonorario, $rutnum, $esreceptor,$rutrazonsocial,$nombrerazonsocial)){
			$error=true;
		}
		if ($error){
			$t->rollback();
			$salida= array("res"=>"NO" );
		} else {
			$t->commit();
			$salida=array("res"=>"OK");
		}
		//if (!$r->guardasociedad($rutnum, $rutsociedad))
		print(json_encode($salida));
		break;
	case "cargadatospersonanatural":
		
		error_log("AKIIII");
		$idhc = $obj->idhonorarioconsolidado;
		$r=new drv_personanatural();
		
		print_r(json_encode($r->cargadatosfromhonorariosicbo($idhc)));
		//$a=$r->cargadatosfromhonorariosicbo($idhc);
		
		break;
	case "deldatospersonanatural":
		error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);
		$idhonorararioconsolidado=$obj->idhonorarioconsolidado;
		$p= new drv_personanatural();
		if ($p->resethonconsolidado_pn_soc($idhonorararioconsolidado)){
			$salida= array("res"=> "OK");
		} else {
			$salida= array("res"=> "ERROR");
		}
		
		print(json_encode($salida));
		break;
	case "honorariosmensual":
		$mes= $obj->mes;
		$ano= $obj->ano;
		
		$h=new hm_honorariosicbo($mes, $ano);
		$n=$h->cargaperiodo();
		
		
		
		$salida= array("res1"=> $n->idhonorario);
		print(json_encode($salida));

		break;
	case "listhonorarioconsolidado":
		
		//$idhonorario=$_GET["$idhonorario"];
		$idhonorario=$obj->idhonorario;
		$l= new hm_honorarioconsolidado(1,$idhonorario);
		print($l->getJSONHonorario());
		break;
		
	case "estadoperiodo" :
		error_log("llamando...");
		print("OK");
		break;
	case "excel":
		//error_reporting(E_ALL);
		//ini_set('display_errors', TRUE);
		//ini_set('display_startup_errors', TRUE);
		date_default_timezone_set('Europe/London');
		
		if (PHP_SAPI == 'cli')
			die('This example should only be run from a Web Browser');
		
			/** Include PHPExcel */
		require_once('../tools/xls/PHPExcel.php');
		$objPHPExcel = new PHPExcel();
		
		// Set document properties
		$objPHPExcel->getProperties()->setCreator("Cristian Ruiz")
		->setLastModifiedBy("Maarten Balliauw")
		->setTitle("Office 2007 XLSX Test Document")
		->setSubject("Office 2007 XLSX Test Document")
		->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
		->setKeywords("office 2007 openxml php")
		->setCategory("Test result file");
		
		// Add some data
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A1', 'RUT RECEPTOR')
		->setCellValue('B1', 'FORMULA')
		->setCellValue('C1', 'MONTO');
		// Miscellaneous glyphs, UTF-8
		$idhonorario=$obj->idhonorario;
		$c=new hm_honorarioconsolidado(1,$idhonorario);
		$arr=$c->dsetexcelformula();
		$i=2;
		foreach($arr as &$t){
			$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A'.$i, $t["receptorhonorario"])
			->setCellValue('B'.$i, $t["formula"])
			->setCellValue('C'.$i, $t["total"]);
			$i++;
		}
			
			
		
		$objPHPExcel->getActiveSheet()->setTitle('Reporte');
		
		
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);
		
		
		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="honorario.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
		
		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;
		/*$salida=array("res1"=>"OK");
		
		print(json_encode($salida));*/
		break;
	default:
		break;
}




?>