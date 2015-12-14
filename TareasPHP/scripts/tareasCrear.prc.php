<?php
require_once 'tareasCrear.sql.php';
if (isset($_POST['submitTarea']))
{

	if (isset($_POST['idUsuario'])){$idUsuario = $_POST['idUsuario'];}

		
	$resultadoValidacion=validarTarea();
	if($resultadoValidacion!="ok") //>validar
	{
		$mensajeError=$resultadoValidacion;
	} 
	else
	{
		guardarTarea();
	  	header("Location: ../php/tareasCrear.php");
		die();
	}
}

function validarTarea()
{
	if (!(isset($_POST["tituloTarea"])&&$_POST["tituloTarea"]!=""))
	{return "Debe escribir el titulo de la tarea";}
	if (!isset($_POST["publico"]))
	{
		if(empty($idUsuario)) //>validar
		{
			return "Debe seleccionar al menos un usuario";
		}
	}
}



function imprimirPOST($variable) {

	if(isset($_POST[$variable])) {
		
		echo $_POST[$variable];
	}
}

?>