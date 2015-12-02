<?php
  $idUsuario = $_POST['idUsuario'];
  if(empty($idUsuario)) 
  {
    echo("You didn't select any buildings.");
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