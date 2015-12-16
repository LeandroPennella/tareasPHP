<?php
require_once "../config.php";
require_once '../scripts/tareasModificar.prc.php';
?>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="../estilos/<?php echo ESTILO_SITIO ?>/sitio.css">
	<link type="text/css" rel="stylesheet" href="../estilos/<?php echo ESTILO_SITIO ?>/listado.css">
	<!-- <style type="text/css">
	.menu{position:fixed; top:60px; left:0px; padding:0px; margin:0px; display:none; background-color: lightGray;}
	</style>
	 -->
</head>
<body>
<?php 
mostrarHeader("Modificar Tarea");
//$tarea=obtenerTarea($_GET['id']);
?>

<form action="tareasModificar.php" method="post" >
<input type="hidden" name="id" value="<?php imprimirPOST("id");?>" />

<table id='box-table-a' >
<thead>
	<tr><th colspan="2">Tarea</th></tr>
</thead>
			
<tr>
	<th>Titulo</th>
	<td><input type="text" name="titulo" value="<?php imprimirPOST("titulo");?>" /></td>
</tr>
<tr>
	<th>Descripcion</th>
	<td><input type="text" name="descripcion" value="<?php imprimirPOST("descripcion");?>"/></td>
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
	<td colspan="2"><input type="submit" name="submitTareaModificada" value="Enviar"/></td>
</tr>


</table>
</form>

</body>
</html>