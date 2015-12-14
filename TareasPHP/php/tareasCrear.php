<?php
	require_once "../config.php"; 
	//session_start();
	
	//comprobarAcceso();
	$db=getDB();
	$sql="select * from Usuarios";
    if ($result = $db->query($sql)) 
    { 
?>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="../estilos/<?php echo ESTILO_SITIO ?>/sitio.css">
	<link type="text/css" rel="stylesheet" href="../estilos/<?php echo ESTILO_SITIO ?>/listado.css">
</head>
<body>
	<?php
	if (isset($_SESSION["mensajeError"])){
		?>
		<div class="error">
		<?php echo $_SESSION["mensajeError"] ?>
		</div>
		<?php 
	}
	?>
	<form action="../scripts/prc.tareasCrear.php" method="post">
		<table>
			<tr>
				<td>
				<label for="Tarea">Tarea</label>
				<input type="text" name="tarea" /><br/>
				</td>
				<td>
					<table id='box-table-a' summary='Usuarios'>
			    		<thead>
			    			<tr>
						    	<th scope='col'>incluir</th>
						    	<th scope='col'>usuario</th>

					    	</tr>
				    	</thead>
				    	<tbody>
				    	<?php
					    while($obj = $result->fetch_object())
					    { 
					    	echo "<tr>";
					    	echo "<td><input type='checkbox' name='idUsuario[]' value='".$obj->id."'></td>\n";
					    	
					        echo "<td>".$obj->usuario."</td>";

					        echo "</tr>";
					    } 
				    }
					$db->close();
				    
					?>
				    </tr></tbody></table>
				</td>
			</tr>
		</table>
  		<p><input type="submit" /></p>   
	</form>
	</body>
</html>