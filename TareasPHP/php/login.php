<?php session_start(); ?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link type="text/css" rel="stylesheet" href="../estilos/<?php echo $_SESSION['ESTILO_SITIO']; ?>/sitio.css">
</head>
<body>
<?php

$clasePanel="panel panelLogin";
$claseError="error";
$direccionRegistro="registro.php";
if($clasePanel==""){$clasePanel="panelLogin";}
?>
<div class="<?php echo $clasePanel;?>">
	<h2>Ingreso</h2>
	<?php if($_SESSION["loginError"]=="true"){?>
	<div class=<?php echo $claseError;?>>Usuario y contraseña no coiniden</div>
	<?php $_SESSION["loginError"]="false";}?>
	
	<form  action="../index.php?accionLogin=validar" method="post" id="loginForm">
		<label for="usuario">Usuario</label>
		<input type="text" name="usuario" /><br/>
		<label for="contrasena">Contraseña</label>
		<input type="password" name="contrasena" /><br/>
		<a class="boton" href="javascript:{}" onclick="document.getElementById('loginForm').submit();">Ingresar</a>
	</form>
	
	<?php
	if($direccionRegistro!=""){?>
	<a  href="<?php echo $direccionRegistro?>">Registrarse</a>
	<?php }?>
</div>
</body>
</html>