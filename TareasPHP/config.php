<?php 

define("SQL_HOST","mysql9.000webhost.com");
define("SQL_US","a1306188_tareas");
define("SQL_PW","Generica_T");
define("SQL_DB","a1306188_tareas");

define("URL_LOGIN","login.php");
define("DIR_LIBRERIAS","scripts/");
define("DIR_FOTOPERFIL","../upload/");
define("NOMBRE_SITIO","tareas");
define("ESTILO_SITIO","estilo1");
setlocale(LC_TIME, 'spanish');  

require_once "inc/inc.header.php";
//require_once "scripts/Listado.php";
require_once DIR_LIBRERIAS."sql.php";
require_once "scripts/funcionesLogin.php";
//require_once "http://".$_SERVER['SERVER_NAME'].DIR_LOGIN.URL_LOGIN;
$raiz=dirname($_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']);

$_SESSION['ESTILO_SITIO']=ESTILO_SITIO;

?>