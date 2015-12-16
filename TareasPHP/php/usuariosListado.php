<?php 
	require_once "../config.php";
	require_once '../sql/sql.usuarios.php';
	if (!esAdministrador())
		{header('Location: ../index.php');}
?>

<html>
<head>
	<link type="text/css" rel="stylesheet" href="../estilos/<?php echo ESTILO_SITIO ?>/sitio.css">
	<link type="text/css" rel="stylesheet" href="../estilos/<?php echo ESTILO_SITIO ?>/listado.css">
</head>
<body>
<?php
	mostrarHeader("Listado Usuarios");
	
	comprobarAccesoAdministrador();
	
	$db=getDB();
	$sql="select * from Usuarios where id!=0";
    if ($usuarios = $db->query($sql))
    //if ($usuarios=obtenerUsuarios())
    { 
    	echo "<table id='box-table-a' summary='Usuarios'>";
    	echo "<thead>";
    	echo "<tr>";
    	echo "<th scope='col'>id</th>";
    	echo "<th scope='col'>Foto</th>";
    	echo "<th scope='col'>Usuario</th>";
    	echo "<th scope='col'>Nombre</th>";
    	echo "<th scope='col'>Apellido</th>";
    	echo "<th scope='col'>Fecha Nacimiento</th>";
    	echo "<th scope='col'>Mail</th>";
    	echo "<th scope='col'>Habilitado</th>";
    	echo "</tr>";
    	echo "</thead>";
    	echo "<tbody>";
	    while($usuario = $usuarios->fetch_object())
	    { 
	    	echo "<tr>";
	    	echo "<td><a href='usuariosRegistroModificar.php?id=".$usuario->id."'>".$usuario->id."</a></td>";
	    	echo "<td><img src=".DIR_FOTOPERFIL.$usuario->foto." /></td>";
	        echo "<td>".$usuario->usuario."</td>";
	        echo "<td>".$usuario->nombre."</td>";
	        echo "<td>".$usuario->apellido."</td>";
	        echo "<td>".$usuario->fechaNacimiento."</td>";
	        echo "<td>".$usuario->correoElectronico."</td>";
	        echo "<td>".(($usuario->habilitado==1)?"si":"no")."</td>";
	        echo "</tr>";
	    } 
	    echo "</tr></tbody></table>";
    }
	mysqli_close($db);
//}
?>	
<a href="usuariosRegistroCrear.php">Agregar usuario</a>	
</body>
</html>