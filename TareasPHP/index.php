<?php
if(!file_exists (  "config.php" ))
{
	//echo("no existe");
	header("Location: setup/indexInstalacion.php");
	die();
} 
else 
{// existe
//echo "s".isset($_SESSION);
	header("Location: php/tareasListar.php");
	die();
} ?>
