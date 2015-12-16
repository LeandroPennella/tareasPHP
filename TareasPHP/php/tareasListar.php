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
mostrarHeader("Listar Tareas");
if (esAdministrador())
{$tareas=listarTareasAdmin();}
else 
{
$tareas=listarTareas();}
?> 
<table id='box-table-a' >
<thead>
<tr>
	<th>Ver</th>
	<th>Tarea</th>
	<th>Cerrada</th>
</tr>
</thead>



<?php 
while($tarea = $tareas->fetch_object())
{
	echo "<tr>";
	echo "<td><a href='tareasVer.php?id=".$tarea->id."'>+</a></td>";
	echo "<td>".$tarea->titulo."</td>";
	echo "<td>".(($tarea->cerrada==1)?"cerrada":"")."</td>";
	echo "</tr>";
}

?>
</table>
<a href="tareasCrear.php">Nueva Tarea</a>
</body>
</html>