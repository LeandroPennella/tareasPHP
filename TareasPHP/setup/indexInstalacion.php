<?php ?>
<html>
<head>

<link type="text/css" rel="stylesheet" href="../estilos/estilo1/sitio.css">
<link type="text/css" rel="stylesheet" href="../estilos/estilo1/registro.css">
<link type="text/css" rel="stylesheet" href="../estilos/estilo1/paneles.css">
</head>
<body>
<div class="panel panelRegistro">
<form action="instalador.php" method="post">
 
 <p><label>usuario BD: </label>				<input type="text" name="usuarioBD" value="usuarioBD" /></p>
 <p><label>password BD: </label>	<input type="text" name="contraseniaUsuarioBD" value="passwordBD" /></p>
 <p><label>host: </label>					<input type="text" name="host" value="localhost" /></p>
 <p><label>nombreBD: </label>				<input type="text" name="nombreBD" value="tareas"/></p>
 <p><label>nombreSitio: </label>			<input type="text" name="nombreSitio" value="tareas"/></p>
 <p><label>estiloSitio:</label>				 
	 <select name="estiloSitio" >
		 <option value="estilo1" selected>Estilo n1</option>
		 <option value="estilo2">Estilo n2</option>
		 <option value="estilo3">Estilo n3</option>
	 </select>
 </p>
 <p><label>nombreUsuario: </label><input type="text" name="nombreUsuario" value="adminU"/></p>
 <p><label>contrasenia: </label><input type="text" name="contrasenia" value="adminC"/></p>
 <p><input type="submit" /></p>

<!--  
  <p><label>Usuario BD: </label>				<input type="text" name="usuarioBD"  /></p>
 <p><label>Password BD: </label>	<input type="text" name="contraseniaUsuarioBD"  /></p>
 <p><label>Host BD: </label>					<input type="text" name="host"  /></p>
 <p><label>Nombre BD: </label>				<input type="text" name="nombreBD" /></p>
 <p><label>Sitio: </label>			<input type="text" name="nombreSitio" /></p>
 <p><label>Eestilo:</label>				 
	 <select name="estiloSitio" >
		 <option value="estilo1" selected>Estilo n1</option>
		 <option value="estilo2">Estilo n2</option>
		 <option value="estilo3">Estilo n3</option>
	 </select>
 </p>
 <p><label>Usuario: </label><input type="text" name="nombreUsuario" /></p>
 <p><label>Password: </label><input type="text" name="contrasenia" /></p>
 <p><input type="submit" /></p>
 
 -->
</form>
</div>
</body>
</html>
