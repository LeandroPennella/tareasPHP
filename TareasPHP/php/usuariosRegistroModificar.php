
<?php
require_once "../config.php";
require_once '../scripts/registroFunciones.fnc.php';
//require_once '../scripts/registroProcesarImagen.fnc.php';
require_once '../scripts/registroModificar.inc.php';
?>


<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link type="text/css" rel="stylesheet" href="../estilos/<?php echo ESTILO_SITIO ?>/sitio.css">
	<link type="text/css" rel="stylesheet" href="../estilos/<?php echo ESTILO_SITIO ?>/registro.css">
	<link type="text/css" rel="stylesheet" href="../estilos/<?php echo ESTILO_SITIO ?>/paneles.css">
</head>
<body>
	<?php mostrarHeader("Modificar Registro");?>
<div class="panel panelRegistro">

	<?php 
	if (isset($mensajeError)) { ?>
	<div class="error"><?=$mensajeError;?></div>
	<?php 
	} ?>
	
	<h1>Formulario de Registro</h1>
<!-- 
		<?php 
//		if (!(isset($_POST['submitImagen'])||isset($_POST['nombreFoto'])))		{?>
		<form style="float: right;" action="usuariosRegistroCrear.php" method="post" enctype="multipart/form-data">
			<input type="file" id="file" name="file" accept="image/*" >
			<input type="submit" name="submitImagen" value="Submit">
		</form>
		<?php 
//		} ?>
 -->		
		<form action="usuariosRegistroModificar.php" method="post" enctype="multipart/form-data">
		<div style="float: right;">	

		<?php
/*
		if (isset($_POST['submitImagen'])) { 
			postFotoSubmit();
		} else 
*/			
		if (isset($_POST['nombreFoto']))
		{
			$rutaImagen=DIR_FOTOPERFIL.$_POST['nombreFoto'];
			?>
			<img src="<?php print ($rutaImagen); ?>" width="200" height="200"><br>
			<input type="text" name="nombreFoto" value="<?php echo $_POST['nombreFoto'] ?>" readonly="readonly" >
			<?php 
		} else { ?>
			<!--  <input type="file" id="file" name="file" accept="image/*" ><br>-->
		<?php 
		} 
		
		?>	
		</div>
		<div style="float: left;">
				
			<input type="hidden" name="id" value="<?php imprimirPOST("id");?>" />
		
			<label>Usuario</label>
			<input type="text" name="usuario" value="<?php imprimirPOST("usuario");?>" />
			<br/>
						
			<label>Nombre</label>
			<input type="text" name="nombre" value="<?php imprimirPOST("nombre");?>" />
			<br/>
				
			<label>Apellido</label>
			<input type="text" name="apellido" value="<?php imprimirPOST("apellido");?>"/>
			<br/>
				
			
			<label>Fecha</label>
			
				<select name="dia">
					<option value="" selected="selected">dia</option>
					<?php for($nDia=1;$nDia<=31;$nDia++)
						{?>
						<option value=<?=$nDia ?><?=opcionSeleccionado($nDia,"dia");?>><?=$nDia?></option>
					<?php } ?>
				</select>
				
				<select name="mes">
					<option value="" selected="selected">mes</option>
					<?php for($nMes=1;$nMes<=12;$nMes++)
						{	?>
						<option value=<?php print($nMes); ?><?=opcionSeleccionado($nMes,"mes");?>><?php print(strftime("%B",mktime(0, 0, 0, $nMes, 1, 2014)))?></option>
					<?php } ?>
				</select>
				
				<select name="anio">				
					<option value="" selected="selected">anio</option>
					<?php for($nAnio=2014;$nAnio>=1900;$nAnio--)
						{?>
						<option value=<?php print($nAnio) ?><?=opcionSeleccionado($nAnio,"anio");?>><?php print($nAnio) ?></option>
					<?php } ?>
				</select>
			
			<br>
			
			<label>eMail</label>
			<input type="text" name="eMail" value="<?php imprimirPOST("eMail");?>"/>
			<br/>
			
				
				
			<?php 
			if ($_POST['id']!=1){	//no se elimina al admin
			?>
			<label>Habilitado</label>
			<input type="checkbox" name="habilitado" <?= (isset($_POST["habilitado"])&&($_POST["habilitado"]==1))?"checked":"";?>> 
			<br/>
			<!--  <a href="../scripts/RegistroEliminar.prc.php?id=<?=$_POST['id']?>">Eliminar</a> -->
			<?php
			}
			?>
			<input type="submit" name="enviarFormulario" value="Enviar"/>
			
			</div>
		</form>
		
	</div>
<?php 
//}
?>
		


</body>
</html>