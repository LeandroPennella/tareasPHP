<?php
require_once '../config.php';
require_once '../sql/sql.tareas.php';
if (isset($_POST["submitNotaNueva"]))
{
	agregarNota();
	
	$direccion='Location: ../php/tareasVer.php?id='.$_POST["id"];
	//die($direccion);
	header($direccion);
}



?>