<form action="instalador.php" method="post">
 <p>usuario BD: <input type="text" name="usuarioBD" value="usuarioBD" /></p>
 <p>contrasenia usuario BD: <input type="text" name="contraseniaUsuarioBD" value="passwordBD" /></p>
 <p>host: <input type="text" name="host" value="localhost" /></p>
 <p>nombreBD: <input type="text" name="nombreBD" value="tareas"/></p>
 <p>nombreSitio: <input type="text" name="nombreSitio" value="tareas"/></p>
 <p>estiloSitio: 
 <select name="estiloSitio" >
	 <option value="estilo1" selected>Estilo n1</option>
	 <option value="estilo2">Estilo n2</option>
	 <option value="estilo3">Estilo n3</option>
 </select>
 </p>
 
 <p>nombreUsuario: <input type="text" name="nombreUsuario" value="adminU"/></p>
 <p>contrasenia: <input type="text" name="contrasenia" value="adminC"/></p>
 
  <p><input type="submit" /></p>
</form>
<?php

?>