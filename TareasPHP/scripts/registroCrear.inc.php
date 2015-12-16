<?php
//require_once "registroProcesarImagen.fnc.php";
require_once "registroFunciones.fnc.php";
require_once "registroFuncionesValidar.fnc.php";



if (isset($_POST['enviarFormulario'])) // se completo el formulario
{
	$respuestaRegistro=validarRegistro();
	
	if($respuestaRegistro=="ok") {
		
		
		if(guardarUsuario()) {
			$_SESSION['notificaciones']="Registro completado correctamente";
			header('Location: ../index.php');
		} else {
			//$_SESSION['notificaciones']="error al guardar el registro";
			$mensajeError="error al guardar el registro";
		}
	} else {
		$mensajeError=$respuestaRegistro;
	}
}
?>
