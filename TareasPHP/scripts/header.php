<?php 
 

function mostrarHeader($tituloPagina)
{

?>
<header>
	<a href="menu.php"><</a>
	<div ><?php echo $tituloPagina;?></div>
	
	<div style=" float: right;">	
		<?php echo $_SESSION["usuario"];?>	
		<a href="http://<?php echo RAIZ_URL?>/php/login.php?accionLogin=logout"  title="LogOut" > 
			<img src="../estilos/<?php echo ESTILO_SITIO ?>/imagenes/logout.png" width="40" height="40" ></img>
		</a>
	</div>
	
</header>

<?php } ?>
<!-- https://raw.githubusercontent.https://raw.githubusercontent.com/wakatime/eclipse-wakatime/master/update-sitehttps://raw.githubusercontent.com/wakatime/eclipse-wakatime/master/update-sitecom/wakatime/eclipse-wakatime/master/update-site -->