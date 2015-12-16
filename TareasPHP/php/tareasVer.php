<?php
require_once "../config.php";
require_once '../sql/sql.tareas.php';
?>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="../estilos/<?php echo ESTILO_SITIO ?>/sitio.css">
	<link type="text/css" rel="stylesheet" href="../estilos/<?php echo ESTILO_SITIO ?>/listado.css">
</head>
<body>
<?php 
mostrarHeader("Ver Tarea");
$tarea=verTarea($_GET['id']);
echo $tarea->id;
echo $tarea->tarea;
?>
<a href="tareasModificar.php?id=<?=$_GET['id']?>">Modificar</a>
</body>
</html>