<?php

function tareaEditable($idTarea)
{
	//solo creada por el usuario logueado o si usuario es administrador
	//TODO:
}

function tareaVisible($idTarea)
{
	//TODO:
}

function obtenerTarea($idTarea)
{
	$conn = getDB();
	$sql="SELECT * FROM tareas t WHERE id=$idTarea";
	if ($tarea = $conn->query($sql))
	{
		return $tarea->fetch_object();
	}
	else
	{
		die('Error : ('. $conn->errno .') '. $conn->error);
	}
	$conn->close();
	unset($sql);
}

function obtenerTareaUsuarios($idTarea)
{
	$conn = getDB();
	$sql="
			SELECT u.usuario 
			FROM tareas_usuarios tu
			INNER JOIN usuarios u on u.id=tu.usuario_id
			WHERE tu.tarea_id=$idTarea";
	if ($usuariosTarea = $conn->query($sql)) {
		return $usuariosTarea ;
	} else{ die('Error : ('. $conn->errno .') '. $conn->error);}
	$conn->close();
	unset($sql);
}

function editarTarea($id)
{
	if (tareaEditable($id))
	{
		//TODO:	
	}
}

function listarTareas() //UsuarioActual
{
	//TODO: evaluar si es admin
	$idUsuario=$_SESSION["idUsuario"];
	$conn = getDB();
	
	$sqlInvitado='
			SELECT t.id ,tarea, fechaCreacion FROM tareas t 
			inner join tareas_usuarios tu on tu.tarea_id=t.id 
			WHERE tu.usuario_id='.$idUsuario;
	$sqlPropietario='
			SELECT t.id ,tarea, fechaCreacion FROM tareas t
			WHERE t.usuarioCreador_id='.$idUsuario;
	$sqlPublicas='
			SELECT t.id ,tarea, fechaCreacion FROM tareas t
			inner join tareas_usuarios tu on tu.tarea_id=t.id 
			WHERE tu.usuario_id=0';
			

	$sql='('.$sqlInvitado.') UNION ('.$sqlPropietario.') UNION ('.$sqlPublicas.') ';
	$sql.='ORDER BY fechaCreacion DESC';
	
	
	if ($result = $conn->query($sql))
	{return $result;}
	else
	{
		die('Error listando tareas: ('. $conn->errno .') '. $conn->error);
	}
	$conn->close();
	unset($sql);
}

function listarTareasAdmin()
{
	$conn = getDB();

	$sql='
			SELECT * FROM tareas t
			ORDER BY fechaCreacion DESC';


	if ($result = $conn->query($sql))
	{return $result;}
	else
	{
		die('Error : ('. $conn->errno .') '. $conn->error);
	}
	$conn->close();
	unset($sql);
}

function guardarTarea()
{
	
	$resultado=false;
	
	
	$conn = getDB();
	$tituloTarea=$conn->real_escape_string($_POST["tituloTarea"]);
	$descripcion=$conn->real_escape_string($_POST["descripcion"]);
	
	$sql="INSERT INTO tareas (tarea,descripcion,usuarioCreador_id) 
			VALUES ('$tituloTarea','$descripcion',".$_SESSION["idUsuario"].")";
	
	$insert_row = $conn->query($sql);
	if($insert_row){$resultado=true;} else {die('Error : ('. $conn->errno .') '. $conn->error);}
	

	$idTarea=$conn->insert_id;

	if (isset($_POST["publico"]))//es publico
	{
		$sql='INSERT INTO tareas_usuarios (tarea_id,usuario_id) VALUES ('.$idTarea.',0)';
		$insert_row = $conn->query($sql);
		if($insert_row){$resultado=true;} else {die('Error : ('. $conn->errno .') '. $conn->error);}
	}
	/*var_dump($_POST['idsUsuarios'])."<br>";
	echo isset($_POST['idsUsuarios'])."<br>";
	echo "e:".empty($_POST['idsUsuarios'])."<br>";
	die();
	*/
	else if (isset($_POST['idsUsuarios']))
	{
		$idsUsuarios=$_POST['idsUsuarios'];
		$N = count($idsUsuarios);
		for($i=0; $i < $N; $i++)
		{
			//echo("usuario:".$idsUsuarios[$i] . "<br/>");
			$sql='INSERT INTO tareas_usuarios (tarea_id,usuario_id) VALUES ('.$idTarea.','.$idsUsuarios[$i].')';
			$insert_row = $conn->query($sql);
			if($insert_row){$resultado=true;} else {die('Error : ('. $conn->errno .') '. $conn->error);}
		}
	}
	

	return $resultado;
	$conn->close();
	unset($sql);
}

function modificarTarea()
{

	$resultado=false;

	$conn = getDB();
	$tituloTarea=$conn->real_escape_string($_POST["tituloTarea"]);
	$descripcion=$conn->real_escape_string($_POST["descripcion"]);
	$sqlUpdate="
			UPDATE tareas set 
			tarea='$tituloTarea',
			descripcion='$descripcion'
			WERE id=".$_POST["id"];
			
	$update = $conn->query($sqlUpdate);
	if($update){$resultado=true;} else {die('Error : ('. $conn->errno .') '. $conn->error);}

	return $resultado;
	$conn->close();
	unset($sqlUpdate);
}
?>