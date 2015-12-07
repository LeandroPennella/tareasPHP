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
	require_once "config.php";
	if (!isset($_SESSION["login"])||($_SESSION["login"]!="true"))//no esta logueado
	{
		if (isset($_GET["accionLogin"])&&($_GET["accionLogin"]=="validar"))
		{
			validarLogin();
		}
		else
		{
			header('Location: php/login.php');
		}
	}
	else // esta logueado
	{
	
		if (isset($_GET["accionLogin"])&&($_GET["accionLogin"]=="logout"))
		{
			logOut("index.php");//desloguearse
		}
		else
		{
			header('Location: php/menu.php');
		}
	
	}

} ?>


















