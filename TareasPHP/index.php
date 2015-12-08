<?php
if(!file_exists (  "config.php" ))
{
	//header("Location: http://example.com/myOtherPage.php");
	//die();
	echo("no existe");
} 
else 
{// existe
//include_once 'index_main.php';


//	echo $_SESSION["login"]."<br>";
	//echo $_GET["accionLogin"]."<br>";
	
	//require_once "scripts/funcionesLogin.php";
	
	//echo basename($_SERVER['PHP_SELF']);

header("Location: php/menu.php");
die();


//include 'php/menu.php';
//header("Location: php/menu.php");
//die();

} ?>


















