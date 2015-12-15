<?php

  
$SQLCrearTablasBD="

DROP DATABASE IF EXISTS tareas;

CREATE SCHEMA IF NOT EXISTS `tareas`;

GRANT ALL PRIVILEGES ON tareas.* TO 'usuarioBD'@'localhost';

USE `tareas`;
		
CREATE TABLE usuarios
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`usuario` VARCHAR(250)  NULL 
	,`foto` VARCHAR(250)  NULL 
	,`nombre` VARCHAR(250)  NULL 
	,`apellido` VARCHAR(250)  NULL
	,`fechaNacimiento` DATE  NULL
	,`correoElectronico` VARCHAR(250)  NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE contrasenias
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`clave` VARCHAR(50) NOT NULL 
	,`usuario_id` INT NOT NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE rol_usuario
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`rol_id` INT NOT NULL 
	,`usuario_id` INT NOT NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE tareas
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`tarea` VARCHAR(250) NOT NULL 
	,`lista_id` INT NOT NULL 
	,`prioridad` INT  NULL 
	,`usuarioCreador_id` INT NOT NULL 
	,`fechaCreacion` DATETIME NOT NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE roles
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`rol` VARCHAR(250) NOT NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE tareas_usuarios (
  `id` int(11) NOT NULL,
  `tarea_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
		
";


$SQLCrearTablasBDRelaciones="
ALTER TABLE rol_usuario ADD FOREIGN KEY (rol_id) REFERENCES roles(id);
ALTER TABLE rol_usuario ADD FOREIGN KEY (usuario_id) REFERENCES usuarios(id);
ALTER TABLE contrasenias ADD FOREIGN KEY (usuario_id) REFERENCES usuarios(id);
ALTER TABLE tareas ADD FOREIGN KEY (usuarioCreador_id) REFERENCES usuarios(id);
ALTER TABLE tareas_usuarios ADD FOREIGN KEY (tarea_id) REFERENCES tareas(id);
ALTER TABLE tareas_usuarios ADD FOREIGN KEY (usuario_id) REFERENCES usuarios(id);
";

/*
$SQLInsertarDatos="

INSERT INTO roles (rol) VALUES ('Administrador');
INSERT INTO usuarios (usuario) VALUES ('Leandro');
INSERT INTO contrasenias (contrasenia,usuario_id) VALUES ('Leandro',1);
";
*/


?>