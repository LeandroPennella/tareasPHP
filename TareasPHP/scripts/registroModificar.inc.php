<?php
//require_once "registroProcesarImagen.fnc.php";
require_once "registroFunciones.fnc.php";
require_once "registroFuncionesValidar.fnc.php";


if (!isset($_POST['enviarFormulario']))	//vacio
{

	if (isset($_GET["id"]))
	
	{

		if (esAdministrador()==true)
		{	

			$usuario=obtenerUsuario($_GET['id']);
			$_POST["id"]=$_GET['id'];
		} else  {

			$_SESSION["mensaje"]="no esta autorizado";
			header('Location: ../index.php');

		}
		
	}
	else
	{$usuario=obtenerUsuarioActual();}
	
	$_POST["id"]=$usuario->id;
	$_POST["usuario"]=$usuario->usuario;
	$_POST["nombre"]=$usuario->nombre;
	$_POST["apellido"]=$usuario->apellido;
	$_POST["eMail"]=$usuario->correoElectronico;
	$fecha = explode("-", $usuario->fechaNacimiento);  
	$_POST["dia"]=$fecha[2];
	$_POST["mes"]=$fecha[1];
	$_POST["anio"]=$fecha[0];
	$_POST["nombreFoto"]=$usuario->foto;
	$_POST["habilitado"]=$usuario->habilitado;
	
}
else // se completo el formulario
{
	$validacionRegistro=validarRegistro();
	
	
	if($validacionRegistro=="ok") {

		if(modificarUsuario()) {
			$_SESSION['notificaciones']="Registro modificado correctamente";
			if (esAdministrador()) {
				header('Location: usuariosListado.php');
			} else {
				header('Location: ../index.php');
			}
		} else {
			//$_SESSION['notificaciones']="error al guardar el registro";
			$mensajeError="error al guardar el registro";
		}
	} else {
		$mensajeError=$validacionRegistro;
		
	}
}
?>
