<?php 

define("SQL_HOST","127.0.0.1");
define("SQL_US","root");
define("SQL_PW","");
define("SQL_DB","tareas");

define("URL_LOGIN","login.php");
define("DIR_LIBRERIAS","scripts/");
define("DIR_FOTOPERFIL","../upload/");

define("NOMBRE_SITIO","tareas");
define("ESTILO_SITIO","estilo1");
setlocale(LC_TIME, 'spanish');  

if(!isset($_SESSION)) {
	session_start();
}

require_once "scripts/header.php";
//require_once "scripts/Listado.php";
require_once DIR_LIBRERIAS."sql.php";


require_once "scripts/funcionesAutenticacion.php";
require_once 'scripts/header.php';
//require_once "http://".$_SERVER['SERVER_NAME'].DIR_LOGIN.URL_LOGIN;
//$raiz=dirname($_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']);
$raiz="localhost/TareasPHP";
define ("RAIZ_URL","localhost/TareasPHP");


$_SESSION['ESTILO_SITIO']=ESTILO_SITIO;

?>