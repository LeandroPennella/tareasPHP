<?php

require_once "../config.php";
require_once "../scripts/registroProcesarImagen.fnc.php";
require_once '../sql/sql.usuarios.php';

function imprimirPOST($variable)
{
/*	if ($primeraPasada)
	{
		if (isset($_SESSION["registro"][$variable]))
		{
			echo $_SESSION["registro"][$variable];
		}
	}
	else
*/	{
		if(isset($_POST[$variable]))
		{
			echo $_POST[$variable];
		}
	}
}
/*
function inicio()
{
	comprobarAcceso();
	mostrarHeader("Modificar Usuario");
	$db=getDBparcial();
	$sql="select * from usuarios where id=".$_GET["id"];
	if ($result = $db->query($sql)) 
	{ 
    	return $result->fetch_object();
	}
	$db->close();
}
*/
function postFotoSubmit(){
?>
	<label>Imagen:	</label>			
	<?php
	$nombreFoto=procesarImagen(DIR_FOTOPERFIL);
	$rutaImagen=DIR_FOTOPERFIL.$nombreFoto;			
	?>
	<img src="<?php print ($rutaImagen); ?>" width="200" height="200"><br>
	<input type="text" name="nombreFoto" value="<?php print ($nombreFoto); ?>">
	<br>
<?php
}

function opcionSeleccionado($valorOpcion,$valorPost)
{
	//($i==substr($obj->fechaNacimiento , 8, 2))
	if (isset($_POST[$valorPost])&&$valorOpcion==$_POST[$valorPost]){echo ' selected="true" ';}
}


?>