<?php
	require_once "../config.php";
	comprobarAcceso();
?>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="../estilos/<?php echo ESTILO_SITIO?>/sitio.css">
</head>
<body>
	<?php mostrarHeader("Menu");?>
	<ul>
		<li><a href="usuarioslistado.php">Listado</a></li>
		<li><a href="registro.php?accion=Modificar">Modificar</a></li>
		<li><a href="tareas_crear.php">Nueva Tarea</a></li>
	</ul>
</body>
</html>