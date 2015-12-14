<?php
function guardarTarea()
{
	//echo "tarea :$tituloTarea<br/>";
	$conn = getDB();
	
	$sql='INSERT INTO tareas (tarea,usuarioCreador_id) VALUES';
	$sql.='('.$tituloTarea.','.$_SESSION["idUsuario"].')';
	$insert_row = $conn->query($sql);
	if($insert_row){
		$resultado=true;
	}
	
	
	
	if (isset($_POST["publico"]))
	{
		echo("es publico<br/>");
	}
	else {
		//echo("usuarios seleccionados: $N <br/>");
		$N = count($idUsuario);
		for($i=0; $i < $N; $i++)
		{
			echo("usuario:".$idUsuario[$i] . " ");
		}
	}
	break;

	
	$conn->close();
	unset($sql);
}
?>