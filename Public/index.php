<?php
//directorio del proyecto
define("PROJECTPATH", dirname(__dir__));

//DIRECTORIO APP
define("APPPATH", PROJECTPATH . '/App');

//autoload con namespace
function autoload_classes($class_name){
	$filename = PROJECTPATH . '/' . str_replace('\\', '/', $class_name) . '.php';
	if (is_file($filename)) {
		include_once $filename;
	}
}

//registramos el autoload autoload_classes
spl_autoload_register('autoload_classes');

//instanciamos la app
$app = new \Core\App;

//lanzamos la app
$app->render();