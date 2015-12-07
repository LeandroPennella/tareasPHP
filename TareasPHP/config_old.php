<?php

define("SQL_URL","mysql16.000webhost.com");
define("SQL_US","a6408196_parcial");
define("SQL_PW","parcial0");
define("SQL_DBPARCIAL","a6408196_parcial");

define("URL_LOGIN","login.php");
define("DIR_LIBRERIAS","scripts/");
define("DIR_FOTOPERFIL","../upload/");

setlocale(LC_TIME, 'spanish');  
require_once "inc/inc.header.php";
//require_once "scripts/Listado.php";
require_once DIR_LIBRERIAS."sql.php";
require_once "scripts/funcionesLogin.php";
//require_once "http://".$_SERVER['SERVER_NAME'].DIR_LOGIN.URL_LOGIN;
$raiz=dirname($_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']);
?>