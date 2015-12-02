<?php include '../inc/inc.registro.php'; ?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link type="text/css" rel="stylesheet" href="../estilos/<?php echo $_SESSION['ESTILO_SITIO']; ?>/sitio.css">
	<link type="text/css" rel="stylesheet" href="../estilos/<?php echo $_SESSION['ESTILO_SITIO']; ?>/registro.css">
	<link type="text/css" rel="stylesheet" href="../estilos/<?php echo $_SESSION['ESTILO_SITIO']; ?>/paneles.css">
</head>
<body>
<div class="panel panelRegistro">

		<?php if (isset($mensajeError)) { ?>
		<div class=<?php echo $claseError;?>><?=$mensajeError;?></div>
		<?php } ?>
	
	<h1>Formulario de Registro</h1>
	

		
		<form action="registro.php" method="post" enctype="multipart/form-data">
		<div>	
		<?php
		/*
		if (isset($_POST['submitImagen']))
		{ ?>
			<label>Imagen:	</label>			
			<?php
			$nombreFoto=procesarImagen(DIR_FOTOPERFIL);
			$rutaImagen=DIR_FOTOPERFIL.$nombreFoto;			
			?>
					
			<img src="<?php print ($rutaImagen); ?>" width="200" height="200"><br>
			<input type="text" name="nombreFoto" value="<?php print ($nombreFoto); ?>">
				
			<br>
		
		<?php 
		} else { ?>
			<input type="file" id="file" name="file" accept="image/*" ><br>
		<?php 
		} 
		*/
		?>	
		</div>
		<div>
				
			
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
			
			<?php if (!isset($_SESSION["registro"]["modo"])) { /*si es modificacion no se muestra la clave */ ?>

			<label>clave</label>
			<input type="password" name="clave"/>
			<br/>

			<label>repetir clave</label>
			<input type="password" name="repetirClave" />
			<br/>
			
			<?php } ?>
			
			<label>Foto</label>
			<input type="file" name="foto" ><br>
			
			<input type="submit" name="enviarFormulario" value="Enviar"/>
			</div>
		</form>
	</div>
<?php 
//}
?>
		


</body>
</html>