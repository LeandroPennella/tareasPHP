<?php

require_once "../config.php";
require_once "../scripts/registroProcesarImagen.fnc.php";


function imprimirPOST($variable)
{
/*	if ($primeraPasada)
	{
		if (isset($_SESSION["registro"][$variable]))
		{
			echo $_SESSION["registro"][$variable];
		}
	}
	else
*/	{
		if(isset($_POST[$variable]))
		{
			echo $_POST[$variable];
		}
	}
}
/*
function inicio()
{
	comprobarAcceso();
	mostrarHeader("Modificar Usuario");
	$db=getDBparcial();
	$sql="select * from usuarios where id=".$_GET["id"];
	if ($result = $db->query($sql)) 
	{ 
    	return $result->fetch_object();
	}
	$db->close();
}
*/
function opcionSeleccionado($valorOpcion,$valorPost)
{
	//($i==substr($obj->fechaNacimiento , 8, 2))
	if (isset($_POST[$valorPost])&&$valorOpcion==$_POST[$valorPost]){echo ' selected="true" ';}
}

function obtenerUsuarioActual()
{
	
	
	$mail=$_SESSION["usuario"];
	$connection = getDBparcial();
	$sqlSelect="select * from usuarios where correoElectronico='$mail'";
	//echo $sqlSelect;
	
	if($result = $connection->query($sqlSelect))
	{return $result->fetch_object();}
	$connection->close;
	
}


function guardarUsuario()
{		
	$connection = getDB();
	$usuarioFoto=(isset($_POST["nombreFoto"])&&$_POST["nombreFoto"]!="")?$connection->real_escape_string(trim($_POST["nombreFoto"])):"";
	$usuarioFoto ='"'.$usuarioFoto.'"';
	$usuarioUsuario =$connection->real_escape_string(trim($_POST["usuario"]));
	$usuarioNombre ='"'.$connection->real_escape_string(trim($_POST["nombre"])).'"';
	$usuarioApellido ='"'.$connection->real_escape_string(trim($_POST["apellido"])).'"';
	$usuarioFechaNacimiento ='"'.$_POST["anio"].'-'.$_POST["mes"]."-".$_POST["dia"].'"';
	$usuarioCorreoElectronico ='"'.$connection->real_escape_string(trim($_POST["eMail"])).'"';
	$usuarioClave =$connection->real_escape_string(trim($_POST["clave"]));

	$usuarioClave = sha1($usuarioUsuario.$usuarioClave);

	$usuarioUsuario ='"'.$usuarioUsuario .'"';
	$usuarioClave = '"'.$usuarioClave.'"';
	
	
	$sqlInsert='INSERT INTO usuarios (usuario,nombre, apellido, fechaNacimiento,correoElectronico, foto) VALUES ';
	$sqlInsert.='('.$usuarioUsuario.','.$usuarioNombre.','.$usuarioApellido.','.$usuarioFechaNacimiento.','.$usuarioCorreoElectronico.','.$usuarioFoto.')';
	
	 
	$insert_row = $connection->query($sqlInsert);
	$resultado=false;

	if($insert_row){
		echo "guardando_guardo usuario"."<br/>";
		$idNuevoUsuario=$connection->insert_id;
		
		$sqlInsert='INSERT INTO contrasenias (clave,usuario_id) VALUES';
		$sqlInsert.='('.$usuarioClave.','.$idNuevoUsuario.')';
		$insert_row = $connection->query($sqlInsert);
		if($insert_row){
			$resultado=true;
		} 
		
	}

	if ($resultado==false)
		{die('Error : ('. $connection->errno .') '. $connection->error);}
	
	//mysqli_query($connection, $sqlInsert);
	//mysqli_close($connection);
	$connection->close();

	return $resultado;

}

function modificarUsuario()
{		
	$connection = getDB();
	if ($_POST["nombreFotoNueva"]=="")
	{$usuarioFoto ='"'.$connection->real_escape_string($_POST["nombreFoto"]).'"';}
	else
	{$usuarioFoto ='"'.$connection->real_escape_string($_POST["nombreFotoNueva"]).'"';}
	
	$usuarioNombre ='"'.$connection->real_escape_string($_POST["nombre"]).'"';
	$usuarioApellido ='"'.$connection->real_escape_string($_POST["apellido"]).'"';
	$usuarioFechaNacimiento ='"'.$_POST["anio"].'-'.$_POST["mes"]."-".$_POST["dia"].'"';
	$usuarioCorreoElectronico ='"'.$connection->real_escape_string($_POST["eMail"]).'"';
	$usuarioClave ='"'.$connection->real_escape_string($_POST["clave"]).'"';

	$sqlInsert='UPDATE  usuarios SET ';
	$sqlInsert .='nombre='.$usuarioNombre.',';
	$sqlInsert .='apellido='.$usuarioApellido.',';
	$sqlInsert .='fechaNacimiento='.$usuarioFechaNacimiento.',';
	$sqlInsert .='correoElectronico='.$usuarioCorreoElectronico.',';
	$sqlInsert .='foto='.$usuarioFoto;//,';
	//$sqlInsert .='claveAccesO='.$usuarioClave.'"';
	$sqlInsert .=' WHERE ID='.$_POST["id"];
	
	//echo $sqlInsert;
	
	//MySqli Insert Query

	$insert_row = $connection->query($sqlInsert);
	
	if($insert_row){$resultado=true; }
	else{die('Error : ('. $connection->errno .') '. $connection->error);$resultado=false;}


	
	//mysqli_query($connection, $sqlInsert);
	//mysqli_close($connection);
	$connection->close;
	return $resultado;
}
?>