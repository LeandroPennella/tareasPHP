<?php require_once "../config.php";
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
	
	comprobarAcceso();
	$db=getDB();
	$sql="select * from Usuarios";
    if ($result = $db->query($sql)) 
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
    	echo "</tr>";
    	echo "</thead>";
    	echo "<tbody>";
	    while($obj = $result->fetch_object())
	    { 
	    	echo "<tr>";
	    	echo "<td><a href='usuariosRegistroModificar.php?id=".$obj->id."'>".$obj->id."</a></td>";
	    	echo "<td><img src=".DIR_FOTOPERFIL.$obj->foto." /></td>";
	        echo "<td>".$obj->usuario."</td>";
	        echo "<td>".$obj->nombre."</td>";
	        echo "<td>".$obj->apellido."</td>";
	        echo "<td>".$obj->fechaNacimiento."</td>";
	        echo "<td>".$obj->correoElectronico."</td>";
	        echo "</tr>";
	    } 
	    echo "</tr></tbody></table>";
    }
	mysqli_close($db);
//}
?>		
</body>
</html>