<?php
	require_once "../config.php";
	require_once '../scripts/sql.tareas.php';
	$tareas=listarTareas();
	?>
<html>

<head>

	<link type="text/css" rel="stylesheet" href="../estilos/<?php echo ESTILO_SITIO ?>/sitio.css">
	<link type="text/css" rel="stylesheet" href="../estilos/<?php echo ESTILO_SITIO ?>/listado.css">
</head>
<body>
<?php mostrarHeader("Listar Tareas");?> 
<table id='box-table-a' >
<thead>
<tr><th>Ver</th><th>Tarea</th></tr>
</thead>



<?php 
while($tarea = $tareas->fetch_object())
{
	echo "<tr>";
	echo "<td><a href='tareasVer.php?id=".$tarea->id."'>+</a></td>";
	echo "<td>".$tarea->tarea."</td>";
	echo "</tr>";
}

?>
</table>
</body>
</html>