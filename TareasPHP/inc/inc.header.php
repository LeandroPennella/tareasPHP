<?php 
session_start();
function mostrarHeader($tituloPagina)
{?>
<header>
	<a href="menu.php"><</a>
	<div ><?php echo $tituloPagina;?></div>
	<div style=" float: right;">	
		<?php echo $_SESSION["usuario"];?>	
		<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/index.php?accionLogin=logout"  title="LogOut" > <img src="../estilos/<?php echo $_SESSION['ESTILO_SITIO']; ?>/imagenes/logout.png" width="40" height="40""</a>
	</div>
</header>

<?php } ?>