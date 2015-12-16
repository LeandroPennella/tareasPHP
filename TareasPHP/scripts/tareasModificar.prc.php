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
} else {
	$tarea=obtenerTarea($_GET["id"]);
	$_POST["id"]=$tarea->id;
	$_POST["titulo"]=$tarea->titulo;
	$_POST["descripcion"]=$tarea->descripcion;
	}

function validarTarea()
{
	if (!(isset($_POST["titulo"])&&$_POST["titulo"]!=""))	{
		return "Debe escribir el titulo de la tarea";
	}
	return 'ok';
}

function imprimirPOST($variable) {

	if(isset($_POST[$variable])) {

		echo $_POST[$variable];
	}
}