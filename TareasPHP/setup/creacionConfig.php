<?php 
$cadenaCreacionConfig="<?php
define(\"SQL_HOST\",\"$host\");
define(\"SQL_US\",\"$usuarioBD\");
define(\"SQL_PW\",\"$contraseniaUsuarioBD\");
define(\"SQL_DB\",\"$nombreBD\");

define(\"URL_LOGIN\",\"login.php\");
define(\"DIR_LIBRERIAS\",\"scripts/\");
define(\"DIR_FOTOPERFIL\",\"../upload/\");

define(\"NOMBRE_SITIO\",\"$nombreSitio\");
define(\"ESTILO_SITIO\",\"$estiloSitio\");

\$_SESSION['ESTILO_SITIO']=ESTILO_SITIO;
		
setlocale(LC_TIME, \"spanish\");  
	
if(!isset(\$_SESSION)) {
	session_start();
}
	

require_once DIR_LIBRERIAS.\"header.php\";
require_once DIR_LIBRERIAS.\"sql.php\";
require_once DIR_LIBRERIAS.\"funcionesAutenticacion.php\";
require_once DIR_LIBRERIAS.\"header.php\";
		
\$raiz=\"localhost/TareasPHP\";
define (\"RAIZ_URL\",\"localhost/TareasPHP\");
?>";
?>