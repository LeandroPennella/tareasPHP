<?php
session_start();
require_once "config.php";
require "scripts/funcionesLogin.php";
?>
<html>
<head>
	<title>
	<?php
		echo NOMBRE_SITIO;
	?>	
	</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="estilos/<?php echo ESTILO_SITIO ?>"> 
	<link type="text/css" rel="stylesheet" href="estilos/login.css">
</head>
<body>
<?php
echo $_SESSION["login"]."<br>";
echo $_GET["accionLogin"]."<br>";

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
?>
?>
</body>
</html>