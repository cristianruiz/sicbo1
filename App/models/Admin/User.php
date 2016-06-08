<?php
namespace App\Models\Admin;
defined("APPPATH") or die("Acceso denegado");

use \Core\Database;

class User{

	public static function getO_A(){
		try{
			$connection = Database::instance();
			$sql = "SELECT * FROM oa_ms WHERE PERIODO=102015 AND C_SECCION=2";
			$query = $connection->prepare($sql);
			$query->execute();
			return $query->fetchAll();
		}
		catch(\PDOException $e){
			print "Error!: " . $e->getMessage();
		}
	}
}