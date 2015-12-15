<?php
require_once "../config.php";
$mysqli=getDB();

$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$clave = (isset($_POST['clave'])) ? $_POST['clave'] : '';

$usuario = $mysqli->real_escape_string(trim($usuario));
$clave = $mysqli->real_escape_string(trim($clave));
$clave =sha1($usuario.$clave);
$usuario = '"'.$usuario.'"';
$clave ='"'.$clave.'"';

if (!trim($usuario) || !trim($clave))
{
	$_SESSION["login"]="false";
	$_SESSION["loginError"]="true";
	//$_SESSION["login"]["Error"]="true";
	//$_SESSION['login']['msg'] = 'Complete todos los campos';
	header('Location: index.php');
	exit();
}


$sql="SELECT u.id FROM usuarios  u
inner join contrasenias c on c.usuario_id=u.id
where u.usuario=$usuario and c.clave=$clave";


if (($result=$mysqli->query($sql))&&($result->num_rows==1))
//if (sql_contarRegistros($mysqli, $sql)==1)
{
	$usuario = $result->fetch_object();
	$_SESSION["login"]="true";
	$_SESSION["usuario"]=$_POST["usuario"];
	$_SESSION["idUsuario"]=$usuario->id;
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
	
$mysqli->close();
unset($sql);
header('Location: ../php/usuariosLogin.php');
?>