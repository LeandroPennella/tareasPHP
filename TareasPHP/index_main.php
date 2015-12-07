<?php

require_once "config.php";
?>
<html>
<head>
	<title>
	<?php
		echo $_SESSION["tituloPagina"];
	?>	
	</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link type="text/css" rel="stylesheet" href="estilos/<?php echo $_SESSION['ESTILO_SITIO']; ?>/sitio.css">
	<link type="text/css" rel="stylesheet" href="estilos/<?php echo $_SESSION['ESTILO_SITIO']; ?>/login.css">
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
</body>
</html>

