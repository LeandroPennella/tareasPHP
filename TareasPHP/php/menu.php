<?php
require_once "../config.php";
session_start();
comprobarAcceso();


?>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="../estilos/<?php echo $_SESSION['ESTILO_SITIO']; ?>/sitio.css">
</head>
<body>
	<?php mostrarHeader("Menu");?>
	<ul>
		<li><a href="listado.php">Listado</a></li>
		<li><a href="registro.php?accion=Modificar">Modificar</a></li>
		<li><a href="tareas_crear.php">Nueva Tarea</a></li>
	</ul>
</body>
</html>