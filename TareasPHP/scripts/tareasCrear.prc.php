<?php
session_start();

if (isset($_POST['idUsuario'])){$idUsuario = $_POST['idUsuario'];}
  
  if(empty($idUsuario)) 
  {
  	$_SESSION["mensajeError"]="Debe seleccionar al menos un usuario";
  	header("Location: ../php/tareas_crear.php");
	die();
  } 
  else
  {
 	echo "tarea :".$_POST['tarea']."<br/>";
  	$N = count($idUsuario);
    echo("usuarios seleccionados: $N <br/>");
    for($i=0; $i < $N; $i++)
    {
      echo("usuario:".$idUsuario[$i] . " ");
    }
  }
?>