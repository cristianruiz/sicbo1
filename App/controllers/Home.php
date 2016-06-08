<?php
namespace App\Controllers;
defined("APPPATH") OR die("Acceso denegado");

use \Core\View,
	\App\Models\User,
	\App\Models\Cargo_model as Cargo_M;

class Home{
	
	public function index(){
		$data = '';
		View::set("data", $data);
		View::set("title","Venta de servicios");
		View::render("venta");
	}

	public function saludo($nombre){
		View::set("name", $nombre);
		View::set("title", "Custom MVC");
		View::render("home");
	}

	public function cargos(){
		$cargos = Cargo_M::getO_A();
		View::set("cargos",$cargos);
		View::set("title", "Cargos");
		View::render("cargos");
	}

	public function cargoByNro(){
		
		if($_REQUEST["nro"] == ""){
			print "<p>No a ingresado numero de cargo</p>";
		}else{
			$nro = $_REQUEST["nro"];
			$buscar = Cargo_M::getCargoByNro($nro);
			View::set("buscar",$buscar);
			View::render("detalle");
		}
		
	}
}