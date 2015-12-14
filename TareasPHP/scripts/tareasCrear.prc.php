<?php
if (isset($_POST['submitTarea']))
{
	//session_start();
	$esPublico=false;
	if (isset($_POST['idUsuario'])){$idUsuario = $_POST['idUsuario'];}
	//if (isset($_POST["publico"]) &&$_POST["publico"]==true){$esPublico=true;}
//	if (isset($_POST["tituloTarea"])){$tituloTarea=$_POST["tituloTarea"];}
		
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

function guardarTarea()
{
	echo "tarea :$tituloTarea<br/>";
	$N = count($idUsuario);
	if (isset($_POST["publico"]))
	{
		echo("es publico<br/>");
	}
	else {
		echo("usuarios seleccionados: $N <br/>");
		for($i=0; $i < $N; $i++)
		{
			echo("usuario:".$idUsuario[$i] . " ");
		}
	}
	break;
	
}

function imprimirPOST($variable) {

	if(isset($_POST[$variable])) {
		
		echo $_POST[$variable];
	}
}

?>