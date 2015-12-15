<?php

function tareaEditable($idTarea)
{
	//TODO:
}

function tareaVisible($idTarea)
{
	//TODO:
}

function verTarea($idTarea)
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
	$idUsuario=0;
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
			WHERE t.id not in (select tarea_id from tareas_usuarios)';

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
	echo "guardando:";
	$resultado=false;
	
	$conn = getDB();
	
	$sql='INSERT INTO tareas (tarea,usuarioCreador_id) VALUES ("'.$_POST["tituloTarea"].'",'.$_SESSION["idUsuario"].')';
	
	$insert_row = $conn->query($sql);
	if($insert_row){$resultado=true;} else {die('Error : ('. $conn->errno .') '. $conn->error);}
	

	$idTarea=$conn->insert_id;

	if (!isset($_POST["publico"]))//no es publico
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
?>