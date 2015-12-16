<?php
require_once '../config.php';
require_once '../sql/sql.tareas.php';
if (isset($_POST["submitNotaNueva"]))
{
	cerrarTarea();
	
	$direccion='Location: ../php/tareasVer.php?id='.$_POST["id"];
	//die($direccion);
	header($direccion);
}



?>