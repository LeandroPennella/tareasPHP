<?php
define("SQL_HOST","localhost");
define("SQL_US","usuarioBD");
define("SQL_PW","passwordBD");
define("SQL_DB","tareas");

define("URL_LOGIN","login.php");
define("DIR_LIBRERIAS","scripts/");
define("DIR_FOTOPERFIL","../fotoPerfil/");

define("NOMBRE_SITIO","tareas");
define("ESTILO_SITIO","estilo1");
		
setlocale(LC_TIME, "spanish");  
	
if(!isset($_SESSION)) {
	session_start();
}
	
require_once DIR_LIBRERIAS."header.fnc.php";
require_once DIR_LIBRERIAS."sql.php";
require_once DIR_LIBRERIAS."Autenticacion.fnc.php";

		
$raiz="localhost/TareasPHP";
define ("RAIZ_URL","localhost/TareasPHP");
?>