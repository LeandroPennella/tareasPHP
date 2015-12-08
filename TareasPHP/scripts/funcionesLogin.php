<?php

require_once "sql.php";

function validarLogin()
{	

	
	$mysqli = new mysqli(SQL_HOST,SQL_US,SQL_PW,SQL_DB);
	if (mysqli_connect_error()) {die('Error de Conexión (' . mysqli_connect_errno() . ') '. mysqli_connect_error());}
	
	
	
	$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
	$clave = (isset($_POST['contrasena'])) ? $_POST['contrasena'] : '';

	$usuario = '"'.$mysqli->real_escape_string(trim($usuario)).'"';
	$clave = '"'.$mysqli->real_escape_string(trim($clave)).'"';
	
	if (!trim($usuario) || !trim($clave)) 
	{
		$_SESSION["login"]="false";
		$_SESSION["loginError"]="true";
		//$_SESSION["login"]["Error"]="true";
		//$_SESSION['login']['msg'] = 'Complete todos los campos';
		header('Location: index.php');
		exit();
	}
	//$clave = '"'.sha1($usuario . $clave).'"' ;

	
	$sql="SELECT distinct 1 FROM usuarios  u 
	inner join contrasenias c on c.usuario_id=u.id
	where u.usuario=$usuario and c.contrasenia=$clave";

	
	//echo (sql_contarRegistros($mysqli, $sql));
	
	//echo "accion: ".$_GET["accionLogin"];
	//echo "<br/>";
	//echo "accion: ".$_GET["accionLogin"];
	//echo "<br/>";
	//echo "accion: ".$_GET["accionLogin"];
	//echo "<br/>";
	
	if (sql_contarRegistros($mysqli, $sql)==1)
	{
		$_SESSION["login"]="true";
		$_SESSION["usuario"]=$_POST["usuario"];
		$_SESSION["loginError"]="false";
		//$_SESSION["login"]["Error"]="false";
	}
	else // logueo incorrecto
	{
		$_SESSION["login"]="false";
		$_SESSION["loginError"]="true";
		//$_SESSION["login"]["Error"]="true";
		//$_SESSION['login']['msg'] = 'Logueo incorrecto';
	}			
	
	echo "<hr/>";
	echo "--validarLogin----------------------";
	echo "<br/>";
	echo "login: ".$_SESSION["login"];
	echo "<br/>";
	echo "loginError: ".$_SESSION["loginError"];
	echo "<br/>";
	echo "usuario: ".$_SESSION["usuario"];
	echo "<br/>";
	echo "<hr/>";
	?><a href="login.php">ir</a><?php 
	
	//header('Location: login.php');
	
	//echo "<br/>";
	//echo "accion: ".$_GET["accionLogin"];
	//echo "<br/>";
	//echo "accion: ".$_GET["accionLogin"];
	//echo "<br/>";
	
	$mysqli->close();
    unset($sql); 
    
}





?>