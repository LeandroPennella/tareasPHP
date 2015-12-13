<?php 
require_once '../config.php';
//require_once '../scripts/funcionesLogin.php';
if (!isset($_SESSION["login"])||($_SESSION["login"]!="true"))//no esta logueado
{
/*
	if (isset($_GET["accionLogin"])&&($_GET["accionLogin"]=="validar"))
	{
		
		validarLogin();
	}
	else
	{
	*/
		//header('Location: php/login.php');
		?>
		<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<link type="text/css" rel="stylesheet" href="../estilos/<?php echo ESTILO_SITIO ?>/sitio.css">
		</head>
		<body>
			<?php
			$clasePanel="panel panelLogin";
			$claseError="error";
			if($clasePanel==""){$clasePanel="panelLogin";}
			?>
			<div class="<?php echo $clasePanel;?>">
				<h2>Ingreso</h2>
				<?php  
					if(isset($_SESSION["loginError"]))
					{
						if ($_SESSION["loginError"]=="true")
						{?>
						<div class=<?php  echo $claseError;?>>Usuario y contraseña no coiniden</div>
						<?php  $_SESSION["loginError"]="false";
						}
					}
				?>
				
				<form  action="../scripts/login.prc.php" method="post" id="loginForm">
					<label for="usuario">Usuario</label>
					<input type="text" name="usuario" /><br/>
					<label for="clave">Contraseña</label>
					<input type="password" name="clave" /><br/>
					
					<a class="boton" href="javascript:{}" onclick="document.getElementById('loginForm').submit();">Ingresar</a> 
				</form>
				
				<a  href="usuariosRegistroCrear.php">Registrarse</a>

			</div>
		</body>
		</html>		
		<?php 
		
	//}
}
else // esta logueado
{

	if (isset($_GET["accionLogin"])&&($_GET["accionLogin"]=="logout"))
	{
		logOut("../index.php");//desloguearse
	}
	else
	{
		header('Location: menu.php');
	}

}

?>
