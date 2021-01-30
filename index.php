<?php

define("ROOT", dirname(__FILE__));

$debug= false;
if($debug){
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
}

// Redirigir al autoload donde se cargan todos los archivos necesarios para iniciar el sistema
include "core/autoload.php";

// funciones para iniciar sesion
ob_start();
session_start();
Core::$root="";

$lb = new Lb();
$lb->start();

?>