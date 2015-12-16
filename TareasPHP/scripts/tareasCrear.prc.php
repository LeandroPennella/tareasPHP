<?php
require_once '../sql/sql.tareas.php';
require_once '../sql/sql.usuarios.php';
$usuarios = obtenerUsuarios();

if (isset($_POST['submitTarea']))
{
	if (isset($_POST['idsUsuarios'])){$idsUsuarios = $_POST['idsUsuarios'];}



	
	$resultadoValidacion=validarTarea();

	if($resultadoValidacion!="ok") //>validar
	{
		$mensajeError=$resultadoValidacion;
	} 
	else
	{
		guardarTarea();
	  	header("Location: ../php/tareasListar.php");
		die();
	}
}

function validarTarea()
{

	if (!(isset($_POST["titulo"])&&$_POST["titulo"]!=""))
	{
		return "Debe escribir el titulo de la tarea";
	}
	/*
	if (!isset($_POST["publico"]))
	{
		if(!isset($_POST['idsUsuarios'])) //>validar
		{
			return "Debe seleccionar al menos un usuario";
		}
	}
	*/
	return 'ok';
}



function imprimirPOST($variable) {

	if(isset($_POST[$variable])) {
		
		echo $_POST[$variable];
	}
}

?>