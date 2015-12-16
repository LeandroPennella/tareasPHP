<?php
require_once '../config.php';
require_once '../sql/sql.usuarios.php';
$id=$_GET["id"];
if (($_SESSION["idUsuario"]==$id)||(esAdministrador()))
{
	eliminarUsuario($id);
}
if ($_SESSION["idUsuario"]==$id)
{
	header('Location:../php/usuariosLogin.php?accionLogin=logout');
}
else if (esAdministrador())
{
	header('Location:../php/usuariosListado');
}

?>