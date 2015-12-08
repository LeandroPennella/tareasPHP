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
    $N = count($idUsuario);
 
    echo("You selected $N door(s): ");
    for($i=0; $i < $N; $i++)
    {
      echo($idUsuario[$i] . " ");
    }
  }
?>