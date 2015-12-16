<?php
function logOut($redireccion)
{
	session_destroy();
	if (isset($redireccion)){header('Location: '.$redireccion);}
}





function comprobarAcceso()
{
	if (!estaLogueado())
	{
		header('Location: http://'.RAIZ_URL.'/php/usuariosLogin.php');
	}
}

function comprobarAccesoAdministrador()
{
	if (!(estaLogueado()&&esAdministrador()))
	{
		header('Location: http://'.RAIZ_URL.'/php/usuariosLogin.php');
	}
}

function estaLogueado()
{
	return (isset($_SESSION["login"])&&$_SESSION["login"]=="true");
}

function esAdministrador($id=null)
{
	if (estaLogueado())
	{
	$idUsuario=($id==null)?$_SESSION["idUsuario"]:$id;
	$sql="SELECT distinct 1 FROM usuarios  u
	inner join rol_usuario ru on u.id=ru.usuario_id
	inner join roles r on r.id=ru.rol_id
	where (u.id=$idUsuario) and r.rol='Administrador'";

	$mysqli = new mysqli(SQL_HOST,SQL_US,SQL_PW,SQL_DB);
	if (mysqli_connect_error()) {die('Error de Conexión (' . mysqli_connect_errno() . ') '. mysqli_connect_error());}
	if (sql_contarRegistros($mysqli, $sql)==1)
	{return true;}
	else {
	return false;}
	$mysqli->close();
	unset($sql);
	}
}
?>