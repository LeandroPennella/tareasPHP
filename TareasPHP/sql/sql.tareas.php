<?php

function tareaVisible($idTarea)
{
	//solo creada por el usuario logueado o si usuario es administrador
	//TODO:
	$idUsuarioActual=$_SESSION["idUsuario"];
	$conn = getDB();
	$sql="
			SELECT * FROM tareas t 
			WHERE t.id=$idTarea
				AND 
				(
					(usuarioCreador_id=$idUsuarioActual)
					OR 
					(t.id in 
						(
							select tu.tarea_id from 
							tareas_usuarios tu 
							where tu.usuario_id=$idUsuarioActual 
								and tu.tarea_id=t.id
						)
					)
				)";
	if ($editable= $conn->query($sql))
	{
		return $editable->num_rows>0;
	}
	else
	{
		die('Error : ('. $conn->errno .') '. $conn->error);
	}
	$conn->close();
	unset($sql);
}

function tareaEditable($idTarea)
{
	$idUsuarioActual=$_SESSION["idUsuario"];
	$conn = getDB();
	$sql="
			SELECT * FROM tareas t 
			where 
			usuarioCreador_id=$idUsuarioActual 
			AND t.id=$idTarea"; 
	if ($editable= $conn->query($sql))
	{
		return $editable->num_rows>0;
	}
	else
	{
		die('Error : ('. $conn->errno .') '. $conn->error);
	}
	$conn->close();
	unset($sql);
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
			SELECT t.id ,titulo,  fechaCreacion, c.cerrada FROM tareas t 
			LEFT JOIN tareascerradas c on c.tarea_id=t.id 
			inner join tareas_usuarios tu on tu.tarea_id=t.id 
			WHERE tu.usuario_id='.$idUsuario;
	$sqlPropietario='
			SELECT t.id ,titulo, fechaCreacion, c.cerrada FROM tareas t 
			LEFT JOIN tareascerradas c on c.tarea_id=t.id 
			WHERE t.usuarioCreador_id='.$idUsuario;
	$sqlPublicas='
			SELECT t.id ,titulo, fechaCreacion, c.cerrada FROM tareas t 
			LEFT JOIN tareascerradas c on c.tarea_id=t.id 
			inner join tareas_usuarios tu on tu.tarea_id=t.id 
			WHERE tu.usuario_id=0';
			

	$sql='('.$sqlInvitado.') UNION ('.$sqlPropietario.') UNION ('.$sqlPublicas.') ';
	$sql.='ORDER BY fechaCreacion DESC';
	//die ($sql);
	
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
			SELECT *, c.cerrada
			FROM tareas t
			LEFT JOIN tareascerradas c on c.tarea_id=t.id
			
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
	$titulo=$conn->real_escape_string($_POST["titulo"]);
	$descripcion=$conn->real_escape_string($_POST["descripcion"]);
	
	$sql="INSERT INTO tareas (titulo,descripcion,usuarioCreador_id) 
			VALUES ('$titulo','$descripcion',".$_SESSION["idUsuario"].")";
	
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
	$titulo=$conn->real_escape_string($_POST["titulo"]);
	$descripcion=$conn->real_escape_string($_POST["descripcion"]);
	$sqlUpdate="
			UPDATE tareas set 
			titulo='$titulo',
			descripcion='$descripcion' 
			WHERE id=".$_POST["id"];
			
	$update = $conn->query($sqlUpdate);
	if($update){$resultado=true;} else {die('Error : ('. $conn->errno .') '. $conn->error);}

	return $resultado;
	$conn->close();
	unset($sqlUpdate);
}

function agregarNota()
{
	$conn = getDB();
	$nota=$conn->real_escape_string($_POST["nota"]);
	
	$sql="
			INSERT INTO tareasnotas 
				(nota,tarea_id,usuario_id) 
			VALUES 
				('$nota',".$_POST["id"].",".$_SESSION["idUsuario"].")";
	
	if ($nota= $conn->query($sql))
	{
		return $conn->insert_id;	
	} else { die('Error : ('. $conn->errno .') '. $conn->error); 	}
	$conn->close();
	unset($sql);
}

function obtenerTareaNotas($idTarea)
{
	$conn = getDB();
	$sql="
	SELECT  u.usuario, n.fechaCreacion, n.nota	
	FROM tareasnotas n
	inner join usuarios u on u.id=n.usuario_id
	WHERE n.tarea_id=$idTarea";
	if ($notasTarea = $conn->query($sql)) {
		return $notasTarea ;
	} else{ die('Error : ('. $conn->errno .') '. $conn->error);}
	$conn->close();
	unset($sql);
}

function cerrarTarea()
{
	$idNota=agregarNota();
	$conn = getDB();
	$nota=$conn->real_escape_string($_POST["nota"]);
	
	$sqlCierre="
	INSERT INTO tareascerradas
	(nota_id,tarea_id,usuario_id)
	VALUES
	($idNota,".$_POST["id"].",".$_SESSION["idUsuario"].")";
	
	if ($nota= $conn->query($sqlCierre))
	{
		return true;
	} else { die('Error : ('. $conn->errno .') '. $conn->error); 	}
	$conn->close();
	unset($sql);
}
function abrirTarea()
{
	$idNota=agregarNota();
	$conn = getDB();
	$nota=$conn->real_escape_string($_POST["nota"]);

	$sqlCierre="
	INSERT INTO tareascerradas
	(nota_id,tarea_id,usuario_id,cerrada)
	VALUES
	($idNota,".$_POST["id"].",".$_SESSION["idUsuario"].",0)";

	if ($nota= $conn->query($sqlCierre))
	{
		return true;
	} else { die('Error : ('. $conn->errno .') '. $conn->error); 	}
	$conn->close();
	unset($sql);
}
?>