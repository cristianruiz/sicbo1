<?php 

namespace App\Models;
defined("APPPATH") or die("Acceso denegado");

use \Core\Database;

class Cargo_model{

	public static function getO_A(){
		try{
			$connection = Database::instance();
			$sql = "select  a.NRO_OA,a.FECHA,a.C_SECCION,b.COD_DET FROM oa_ms a,detose_ms b "." WHERE a.NRO_OA=b.NRO_OA AND a.PERIODO=b.PERIODO AND " .
			" a.C_SECCION=b.C_SECCION AND a.C_SECCION=2 AND a.NRO_OA=10";
			$query = $connection->prepare($sql);
			$query->execute();
			return $query->fetchAll();
		}
		catch(\PDOException $e){
			print "Error!: " . $e->getMessage();
		}
	}

	public function getCargoByNro($nro){
		try {
			$connection = Database::instance();
			$sql = 'select  a.NRO_OA,a.FECHA,a.C_SECCION,b.COD_DET FROM oa_ms a,detose_ms b '.' WHERE a.NRO_OA=b.NRO_OA AND a.PERIODO=b.PERIODO AND ' .
				' a.C_SECCION=b.C_SECCION AND a.C_SECCION=2 AND a.NRO_OA='.$nro.'';

			$query = $connection->prepare($sql);
			$query->execute();
			return $query->fetchAll();
			
		} 
		catch (\PDOException $e) {
			print "Error: " . $e->getMessage();
		}
	}
}
