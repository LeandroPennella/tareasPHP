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
$tarea=obtenerTarea($_GET['id']);
?>
<table id='box-table-a' >
<thead>
	<tr><th colspan="2">Tarea</th></tr>
</thead>
<tr>
	<th>Titulo</th>
	<td><?=$tarea->tarea?></td>
</tr>
<tr>
	<th>Descripcion</th>
	<td><?=$tarea->descripcion?></td>
</tr>
<tr>	
	<th >Usuarios</th>
	<td>
	<?php $usuariosTarea=obtenerTareaUsuarios($_GET['id']);
	if ($usuariosTarea==null)
	{?>&nbsp;<?php }	else {
	while($usuario = $usuariosTarea->fetch_object())
	{?>
	<?= $usuario->usuario ?><br/>
		
	<?php }}?> 
	</td>
</tr>
</table>
<a href="tareasModificar.php?id=<?=$_GET['id']?>">Modificar</a>
<a href="tareasCompletar.php?id=<?=$_GET['id']?>">Completar</a>
</body>
</html>