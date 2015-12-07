<?php


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
	header('Location: index.php');
	$mysqli->close();
    unset($sql); 
}



function logOut($redireccion)
{
	session_destroy();
	if (isset($redireccion)){header('Location: '.$redireccion);}
}


function estaLogueado()
{
	return $_SESSION["login"]=="true";
};


function comprobarAcceso()
{
	if (!estaLogueado())
	{
		header('Location: ../index.php');
	}
}

?>