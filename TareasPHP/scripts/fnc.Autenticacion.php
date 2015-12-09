<?php
function logOut($redireccion)
{
	session_destroy();
	if (isset($redireccion)){header('Location: '.$redireccion);}
}


function estaLogueado()
{
	return $_SESSION["login"]=="true";
};


function comprobarAcceso()
{
	if (!estaLogueado())
	{
		header('Location: http://'.RAIZ_URL.'/php/login.php');
	}
}
?>