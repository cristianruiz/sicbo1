<?php
namespace App\Models;
defined("APPPATH") OR die("Acceso denegado");

class User{
	
	public static function getAll(){
		return ["id" => 1, "nombre" => "Erwin"];
	}
}