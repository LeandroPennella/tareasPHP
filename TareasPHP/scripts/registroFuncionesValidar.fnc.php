<?php

require_once '../sql/sql.usuarios.php';
//validar;
function validarRegistro()
{
	//$fotoValida=$_POST["fotoNueva"]!="";//||($_POST["fotoNueva"]!="")); //TODO: validar?
	$usuarioValido=$_POST["usuario"]!="";//(preg_match('/[^a-Z]/',$_POST["nombre"]));
	$nombreValido=$_POST["nombre"]!=""&&solo_letras($_POST["nombre"]);//(preg_match('/[^a-Z]/',$_POST["nombre"]));
	$apellidoValido=$_POST["apellido"]&&solo_letras($_POST["apellido"]);//preg_match('/[^a-Z]/',$_POST["apellido"]));
	$mailValido=filter_var($_POST["eMail"], FILTER_VALIDATE_EMAIL);
	$fechaCargada=($_POST["mes"]>0&&$_POST["mes"]<13&&$_POST["dia"]>0&&$_POST["dia"]<31&&$_POST["anio"]>0);
	$fechaValida=($fechaCargada&&checkdate($_POST["mes"], $_POST["dia"], $_POST["anio"]));
	if(!isset($_POST['id'])){ //si no es modificacion
		$claveCargada=($_POST["clave"]!="");
		$clavesIguales=($_POST["clave"]==$_POST["repetirClave"]);
	}
	
	/*
		$error["tipo"]="fecha";
		$error["mensaje"]="fecha invalida";
	*/
	//if (!$fotoValida){return "Error al cargar la foto";}
	if (!$usuarioValido){return "Introducir un usuario valido";}
	if (!$nombreValido){return "Introducir un nombre valido";}
	if (!$apellidoValido){return "Introducir un apellido valido";}
	if (!$mailValido){return "Introducir un mail valido";}
	if (!$fechaCargada){return "Introducir una fecha de nacimiento ";}
	if (!$fechaValida){return "Introducir una fecha de nacimiento valida";}
	if(!isset($_POST['id'])){ //si no es modificacion
		if (!$claveCargada){return "Introducir una clave";}
		if (!$clavesIguales){return "las claves no concuerdan";}
	}
	
	if(registroExistente()){return "el usuario ya existe";}
	//else 		
	return "ok";
	
}

function solo_letras($cadena)
{ 
	$permitidos = " abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZñÑáéíóúÁÉÍÓÚ"; 
	for ($i=0; $i<strlen($cadena); $i++)
	{ 
		if (strpos($permitidos, substr($cadena,$i,1))===false){return false;} 
	}  
	return true; 
} 
?>