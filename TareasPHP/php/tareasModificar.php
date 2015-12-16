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
mostrarHeader("Ver Tarea");
$tarea=verTarea($_GET['id']);
?>
<form action="tareasModificar.php" method="post">
<table id='box-table-a' >
<thead>
<tr>
<th colspan="2">Tarea</th>
</tr>
<tr>
<td>Titulo</td>
<td><input type="text" name="tituloTarea" value="<?=$tarea->tarea?>"/></td>
</tr>
</thead>
</table>
<p><input type="submit" name="submitModificarTarea" /></p>   
</form>
</body>
</html>