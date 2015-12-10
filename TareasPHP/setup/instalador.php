<?php
//todo reemplazar variables por posts
//todo tratar de separar las secuencias sql



//include ("creacionConfig.php");

	
	
	//Variables externas
	$host=$_POST['host'];
	$usuarioBD=$_POST['usuarioBD'];
	$contraseniaUsuarioBD=$_POST['contraseniaUsuarioBD'];
	$nombreBD=$_POST['nombreBD'];
	$nombreSitio=$_POST['nombreSitio'];
	$estiloSitio=$_POST['estiloSitio'];
	$nombreUsuario=$_POST['nombreUsuario'];
	$contrasenia=$_POST['contrasenia'];
	printf("variables inicializadas.\n<br>");
	
	crearBD($host,$nombreBD,$usuarioBD,$contraseniaUsuarioBD,$nombreUsuario,$contrasenia);
	
	crearConfig($host,$usuarioBD,$contraseniaUsuarioBD,$nombreBD,$nombreSitio,$estiloSitio);
	
	//rename ("..\index.php" , "index_instalar.ph");
	//print("instalador desactivado<br>");
	//rename ("indexFinal.php" , "..\index.php");
	//print("fin de la instalacion<br>");
	//copy("indexFinal.php" , "..\index.php");
	//http_redirect ("..\index.php");
	header('Location: indexFinal.php');

function crearBD($host,$nombreBD,$usuarioBD,$contraseniaUsuarioBD,$nombreUsuario,$contrasenia)
{
	include ("creacionBD.php");
	$rol="Administrador";
	//conectar a BD
	$mysqli=new mysqli($host,$usuarioBD,$contraseniaUsuarioBD);
	if ($mysqli->connect_errno) {printf("Falló la conexión: %s\n<br>", $mysqli->connect_error);exit();}
	printf("Conexion Abierta.\n<br>");

	//* Eliminar BD - sacar
	//if($mysqli->query($SQLEliminarBD)===true){printf("Base de datos eliminadas exitosamente.\n<br>");}

	//* Crear BD - dinamizar nomnbreBD
	$SQLCrearBD="CREATE database ".$nombreBD;
	if($mysqli->query($SQLCrearBD)===true){printf("Base de datos creada exitosamente.\n<br>");}

	//Seleccionar Tablas
	$mysqli->select_db($nombreBD);
	printf("Base de datos seleccionada exitosamente.\n<br>");

	//Crear Tablas
	if ($mysqli->multi_query($SQLCrearTablasBD))
	{
		do{} while($mysqli->more_results() && $mysqli->next_result());
	}
	else
	{ 
		print "<br>Error al crear tablas - <i>Error:</i> ".$mysqli->error()." <i>Código:</i> ".$mysqli->errno(); 	
		exit(); 
	} 


	//Agregar Rol Administrador
	if ($stmt = $mysqli->prepare("INSERT INTO roles (rol) VALUES (?);"))
	{
		$stmt->bind_param('s', $rol);
		$stmt->execute();
		$idRol = $stmt->insert_id;
		$stmt->close();
		printf("rol insertado.id=".$idRol."\n<br>");
	}

	//Crear usuario
	if ($stmt = $mysqli->prepare("INSERT INTO usuarios (usuario) VALUES (?);"))
	{
		$stmt->bind_param('s', $nombreUsuario);
		$stmt->execute();
		$idUsuario = $stmt->insert_id;
		$stmt->close();
		printf("usuario insertado.id=".$idUsuario."\n<br>");
	}

	$contrasenia=sha1($usuarioCorreoElectronico.$usuarioClave);
	//Agregar contraseña a usuario
	if ($stmt = $mysqli->prepare("INSERT INTO contrasenias (clave, usuario_id) VALUES (?,?);"))
	{
		$stmt->bind_param('si', $contrasenia,$idUsuario);
		$stmt->execute();
		$stmt->close();
		printf("contrasenia insertada.\n<br>");
	}

	//promover usuario a Administrador
	if ($stmt = $mysqli->prepare("INSERT INTO rol_usuario (rol_id, usuario_id) VALUES (?,?);"))
	{
		$stmt->bind_param('si', $idRol,$idUsuario);
		$stmt->execute();
		$stmt->close();
		printf("usuario Promovido.\n<br>");
	}

	//cerrar bd
	$mysqli->close();
	printf("Conexion Cerrada.\n<br>");
}

function crearConfig($host,$usuarioBD,$contraseniaUsuarioBD,$nombreBD,$nombreSitio,$estiloSitio)
{
	//crear config.php
	include ("creacionConfig.php");

	
	$archivoConfig=fopen("..\config.php","w+");
	fwrite($archivoConfig,$cadenaCreacionConfig);
	fclose($archivoConfig);

	printf("Archvo  config creado.\n<br>");
}
?>