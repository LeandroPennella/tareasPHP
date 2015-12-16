<?php 
 

function mostrarHeader($tituloPagina)
{
	
	
comprobarAcceso();?>
<!-- 
<head>
	<link type="text/css" rel="stylesheet" href="../estilos/<?php echo ESTILO_SITIO?>/sitio.css">
</head>
 -->
<script type="text/javascript">
function cambiarVisibilidad(){
d= document.getElementById('menu').style ;
if (d.display== 'none')
{d.display='';}
else
{d.display= 'none';}
}
</script>
<header>

	
	<a href="#" onclick="cambiarVisibilidad();">V</a>
	<div ><?php echo NOMBRE_SITIO .">". $tituloPagina?></div>
	<div style=" float: right;">
		<?php echo $_SESSION["usuario"];?>	
		<a href="http://<?php echo RAIZ_URL?>/php/usuariosLogin.php?accionLogin=logout"  title="LogOut" > 
			<img src="../estilos/<?php echo ESTILO_SITIO ?>/imagenes/logout.png" width="40" height="40" ></img>
		</a>
	</div>
</header>
<ul style="position:fixed; top:20px; left:0px; display:none; background-color: lightGray;" id="menu">
	<?php if (esAdministrador()){?><li><a href="usuarioslistado.php">Listado</a></li><?php } ?>
	<li><a href="usuariosRegistroModificar.php">Modificar</a></li>
	<li><a href="tareasCrear.php">Nueva Tarea</a></li>
	<li><a href="tareaslistar.php">Lista de Tareas</a></li>
</ul>
<?php 
} ?>
<!-- https://raw.githubusercontent.https://raw.githubusercontent.com/wakatime/eclipse-wakatime/master/update-sitehttps://raw.githubusercontent.com/wakatime/eclipse-wakatime/master/update-sitecom/wakatime/eclipse-wakatime/master/update-site -->