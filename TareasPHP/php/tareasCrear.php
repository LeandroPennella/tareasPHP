<?php
	require_once "../config.php"; 
	require_once '../scripts/tareasCrear.prc.php';
?>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="../estilos/<?php echo ESTILO_SITIO ?>/sitio.css">
	<link type="text/css" rel="stylesheet" href="../estilos/<?php echo ESTILO_SITIO ?>/listado.css">
</head>
<body>
<?php mostrarHeader("Menu");?>
	<?php
	if (isset($mensajeError)){
		?>
		<div class="error"><?php echo $mensajeError ?></div>
		<?php 
	}
	?>
	<form action="tareasCrear.php" method="post">
		<table>
			<tr>
				<td>
					<label for="Tarea">Tarea</label>
					<input type="text" name="tituloTarea" value="<?=imprimirPOST("tituloTarea")?>"/><br/>
				</td>
				<td>
					<!-- Tarea Publica -->
					<table id='box-table-a' summary='publico'>
						<thead>
			    			<tr>
						    	<th scope='col'>publico</th>
						    	</tr></thead><tr><td>
									<input type="checkbox" name="publico" <?php echo isset($_POST["publico"])?"checked":"";?>> publico
								</tr>
							</tr>
					</table>
					
					<!-- Tarea Privada > Usuarios-->
					<table id='box-table-a' summary='Usuarios'>
			    		<thead>
			    			<tr>
						    	<th scope='col'>incluir</th>
						    	<th scope='col'>usuario</th>

					    	</tr>
				    	</thead>
				    	<tbody>
				    	<?php
					    while($usuario = $usuarios->fetch_object())
					    { 
					    	if ((!esAdministrador($usuario->id))&&($usuario->id!=$_SESSION['idUsuario']))
					    	{
						    	echo "<tr>";
						    	echo "	<td><input type='checkbox' name='idsUsuarios[]' value='".$usuario->id."'></td>\n";
						        echo "	<td>".$usuario->usuario."</td>";
						        echo "</tr>";
					    	}
					    } 
				    
						?>
				    </tr></tbody></table>
				</td>
			</tr>
		</table>
  		<p><input type="submit" name="submitTarea" /></p>   
	</form>
	</body>
</html>