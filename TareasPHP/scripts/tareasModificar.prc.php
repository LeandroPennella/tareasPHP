<?php
require_once '../sql/sql.tareas.php';

if (isset($_POST['submitTareaModificada']))
{
	$resultadoValidacion=validarTarea();

	if($resultadoValidacion!="ok") //>validar
	{
		$mensajeError=$resultadoValidacion;
	}
	else
	{
		modificarTarea();
		header("Location: ../php/tareasVer.php?id=".$_POST["id"]);
		die();
	}
}

function validarTarea()
{
	if (!(isset($_POST["tituloTarea"])&&$_POST["tituloTarea"]!=""))	{
		return "Debe escribir el titulo de la tarea";
	}
	return 'ok';
}

function imprimirPOST($variable) {

	if(isset($_POST[$variable])) {

		echo $_POST[$variable];
	}
}