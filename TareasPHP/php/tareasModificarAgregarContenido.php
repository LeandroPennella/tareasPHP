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

if (!tareaVisible($_GET['id'])){header('Location: tareasListar.php');}

mostrarHeader("Ver Tarea");

$tarea=obtenerTarea($_GET['id']);
?>
<table id='box-table-a' >
	<thead>
		<tr><th colspan="2">Tarea</th></tr>
	</thead>
	<tr>
		<th>Titulo</th>
		<td><?=$tarea->titulo?></td>
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
	<tr>
		<th>Contenidos</th>
		<td>
		<form action="../scripts/tareasModificarAgregarContenido.prc.php" method="post">
			<input type="hidden" name="id" value="<?= $_GET["id"] ?>">
			<input type="text" name="nota">
			<input type="submit" name="submitNotaNueva">
		</form>
		
		</td>
	</tr>
</table>


	<?php 
	if (tareaEditable($_GET["id"]))
	{?>
	<a href="tareasModificar.php?id=<?=$_GET['id']?>">Modificar</a><br/>
	<?php 
	} ?>
	<a href="tareasCompletar.php?id=<?=$_GET['id']?>">Completar</a><br/>
	<a href="tareasModificarAgregarContenido.php?id=<?=$_GET['id']?>">Agregar Contenidos</a><br/>
	<a href="tareasListar.php">Listado</a><br/>
</body>
</html>