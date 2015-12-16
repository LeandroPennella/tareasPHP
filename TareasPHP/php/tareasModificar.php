<?php
require_once "../config.php";
require_once '../script/tareasModificar.prc.php';
?>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="../estilos/<?php echo ESTILO_SITIO ?>/sitio.css">
	<link type="text/css" rel="stylesheet" href="../estilos/<?php echo ESTILO_SITIO ?>/listado.css">
</head>
<body>
<?php 
mostrarHeader("Modificar Tarea");
$tarea=obtenerTarea($_GET['id']);
?>

<form action="tareasModificar.php" method="post" e">
<input type="hidden" name="id" value="<?php imprimirPOST("id");?>" />

<table id='box-table-a' >
<thead>
	<tr><th colspan="2">Tarea</th></tr>
</thead>
			
<tr>
	<th>Titulo</th>
	<td><input type="text" name="tarea" value="<?php imprimirPOST["tarea"]?>"/></td>
</tr>
<tr>
	<th>Descripcion</th>
	<td><input type="text" name="descripcion" value="<?php imprimirPOST["descripcion"]?>"/></td>
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
<input type="submit" name="submitTareaModificada" value="Enviar"/>
</table>
</form>

</body>
</html>