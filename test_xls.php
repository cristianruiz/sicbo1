<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */
include("include_dao.php");
$id=$_GET["idColegio"];
$f1=$_GET["f1"];
$f2=$_GET["f2"];

$VDAO=new VentasMySqlExtDAO();
$res=$VDAO->get_all_ventas($f1, $f2, $id);



/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';


// Create new PHPExcel object
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
            ->setCellValue('A1', 'PATENTE')
            ->setCellValue('B1', 'COMBUSTIBLE')
            ->setCellValue('C1', 'CANTIDAD')
            ->setCellValue('D1', 'P. UNIT.')
            ->setCellValue('E1', 'TOTAL')
            ->setCellValue('F1', 'FECHA')
            ->setCellValue('G1', 'RUT')
            ->setCellValue('H1', 'CURSO')
            ->setCellValue('I1', 'NOMBRE');
// Miscellaneous glyphs, UTF-8
$i=2;
foreach($res as $valor){
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $valor[0])
            ->setCellValue('B'.$i, $valor[1])
            ->setCellValue('C'.$i, $valor[2])
            ->setCellValue('D'.$i, $valor[3])
            ->setCellValue('E'.$i, $valor[4])
            ->setCellValue('F'.$i, $valor[5])
            ->setCellValue('G'.$i,$valor[6])
            ->setCellValue('H'.$i, $valor[7])
            ->setCellValue('I'.$i, $valor[8]);
    $i++;
}
/*foreach($res as $valor){
    for ($x='A';$x<='I';$x++){
        $celda = $x.$i;
        echo $celda."<br>";
        $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue($celda, $valor[$i]);
    }
    $i++;
    
} */


// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Reporte');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="01simple.xls"');
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
