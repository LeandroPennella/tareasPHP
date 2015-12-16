<?php
require_once 'sql.php';
function obtenerUsuario($id)
{
	$connection = getDB();
	$sqlSelect="select * from usuarios where id='$id'";
	if($result = $connection->query($sqlSelect)) {
		return $result->fetch_object();
	} else {return "error:".$connection->error;}
	$connection->close;

}

function obtenerUsuarioActual()
{


	$usuario=$_SESSION["usuario"];
	$connection = getDB();
	$sqlSelect="select * from usuarios where usuario='$usuario'";
	//echo $sqlSelect;

	if($result = $connection->query($sqlSelect))
	{return $result->fetch_object();} else {return "error:".$connection->error;}
	$connection->close;

}

function obtenerUsuarios()
{
	$connUsuarios=getDB();
	
	if($usuariosPosibles = $connUsuarios->query("select * from usuarios where id !=0 and habilitado=1"))
	{
		return $usuariosPosibles;
	} else {
		return "error:".$connUsuarios->error;
	}
	$connUsuarios->close();
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
	if (isset($_POST["nombreFotoNueva"])&&$_POST["nombreFotoNueva"]!="")
	{$usuarioFoto ='"'.$connection->real_escape_string($_POST["nombreFotoNueva"]).'"';}
	else
	{$usuarioFoto ='"'.$connection->real_escape_string($_POST["nombreFoto"]).'"';}




	$usuarioNombre ='"'.$connection->real_escape_string($_POST["nombre"]).'"';
	$usuarioApellido ='"'.$connection->real_escape_string($_POST["apellido"]).'"';
	$usuarioFechaNacimiento ='"'.$_POST["anio"].'-'.$_POST["mes"]."-".$_POST["dia"].'"';
	$usuarioCorreoElectronico ='"'.$connection->real_escape_string($_POST["eMail"]).'"';
	//$usuarioClave ='"'.$connection->real_escape_string($_POST["clave"]).'"';
	$habilitado=(isset($_POST['habilitado']))?'true':'false';
	
	$sqlUpdate='UPDATE  usuarios SET ';
	$sqlUpdate .='nombre='.$usuarioNombre.',';
	$sqlUpdate .='apellido='.$usuarioApellido.',';
	$sqlUpdate .='fechaNacimiento='.$usuarioFechaNacimiento.',';
	$sqlUpdate .='correoElectronico='.$usuarioCorreoElectronico.',';
	$sqlUpdate .='foto='.$usuarioFoto.', ';
	$sqlUpdate .='habilitado='.$habilitado;//,';
	//$sqlUpdate .='claveAccesO='.$usuarioClave.'"';
	$sqlUpdate .=' WHERE ID='.$_POST["id"];
	//die($sqlUpdate);

	$insert_row = $connection->query($sqlUpdate);

	if($insert_row){$resultado=true; }
	else{die('Error : ('. $connection->errno .') '. $connection->error);$resultado=false;}



	//mysqli_query($connection, $sqlInsert);
	//mysqli_close($connection);
	$connection->close;
	return $resultado;
}
/*
function eliminarUsuario($id)
{
	$connection = getDB();
	$sqlContrasenia="update usuarios set habilitado=where id='$id'";
	
	if($result = $connection->query($sqlContrasenia))
	{
		$sqlUsuario="delete from usuarios where id='$id'";
		if($result = $connection->query($sqlUsuario))
		{return "ok";}
		//else{die('Error : ('. $connection->errno .') '. $connection->error);$resultado=false;}
			
	} 
	//else{die('Error : ('. $connection->errno .') '. $connection->error);$resultado=false;}
	return 'Error : ('. $connection->errno .') '. $connection->error;
	$connection->close;
}
*/
?>