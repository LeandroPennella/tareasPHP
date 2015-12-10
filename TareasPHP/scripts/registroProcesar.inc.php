<?php

require_once '../config.php';
require_once "registroProcesarImagen.fnc.php";
require_once "registroFunciones.fnc.php";
require_once "registroValidar.fnc.php";
$claseError="error";
//function imprimirFormulario($tiposDocumento,$carreras)
//{
	


if (isset($_POST['enviarFormulario']))//segunda pasada
{
//	$primeraPasada=false;
	//session_unset("registro");  
	$respuestaRegistro=validarRegistro();
	if (isset($_SESSION["registro"]["modo"])&&$_SESSION["registro"]["modo"]=="modificar")
	{
		if(modificarUsuario())
		{
			$_SESSION['notificaciones']="Registro modificado correctamente";
			header('Location: ../index.php');
			session_unset("registro");
		}
		else
		{
			$mensajeError=$respuestaRegistro;
		}
	}
	
	if($respuestaRegistro=="ok")
	{
		if(guardarUsuario())
		{
			$_SESSION['notificaciones']="Registro completado correctamente";
			header('Location: ../index.php');
		}				
	}
	else
	{
		$mensajeError=$respuestaRegistro;
	}
}

else

//primera pasada

{
	//$primeraPasada=true;
	if (isset($_GET["accion"])&&($_GET["accion"]=="Modificar"))
	{
		
		$_SESSION["registro"]["modo"]="modificar";
		
		$usuario=obtenerUsuarioActual();
		$_POST["usuario"]=$usuario->usuario;
		$_POST["nombre"]=$usuario->nombre;
		$_POST["apellido"]=$usuario->apellido;
		$_POST["eMail"]=$usuario->correoElectronico;
		$fecha = explode("-", $usuario->fechaNacimiento);  
		$_POST["dia"]=$fecha[2];
		$_POST["mes"]=$fecha[1];
		$_POST["anio"]=$fecha[0];
		
	}
}

?>