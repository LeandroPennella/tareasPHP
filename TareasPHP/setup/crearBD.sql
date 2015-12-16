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

/*
CREATE TABLE lugares
(
	`id` INT NOT NULL AUTO_INCREMENT
	, PRIMARY KEY (id)
	,`nombre` VARCHAR(250)  NULL 
	,`dreccion` VARCHAR(250)  NULL 
	,`coordenadas` VARCHAR(250)  NULL 
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE comentario_rolHabilitado
(
	`id` INT NOT NULL AUTO_INCREMENT
	, PRIMARY KEY (id)
	,`comentario_id` INT NOT NULL 
	,`rolHabilitado_id` INT NOT NULL 
)ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE auditoria
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`tarea_id` INT NOT NULL 
	,`completado` VARCHAR(250)  NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE georeferencia
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`tarea_id` INT NOT NULL 
	,`lugar_id` INT  NULL 
	,`direccion` VARCHAR(250)  NULL 
	,`coordenadas` VARCHAR(250)  NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE comentario_usuarioHabilitado
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`comentario_id` INT NOT NULL 
	,`usuarioHabilitado_id` INT NOT NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE fechas
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`Tarea_id` INT NOT NULL 
	,`fechaLimita` DATETIME NOT NULL 
	,`horaDesde` DATETIME  NULL 
	,`horaHasta` DATETIME  NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE asignaciones
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`tarea_id` INT NOT NULL 
	,`usuarioAsignado_id` INT NOT NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE adjuntos
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`titulo` VARCHAR(250) NOT NULL 
	,`ruta` VARCHAR(250) NOT NULL 
	,`comentario_id` INT NOT NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE comentarios
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`poyecto_id` INT NOT NULL 
	,`comentario` VARCHAR(250) NOT NULL 
	,`fecha` DATETIME NOT NULL 
	,`comentarioContestacion_id` INT NOT NULL 
	,`autor_id` INT NOT NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE imagenes
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`comentario_id` INT NOT NULL 
	,`foto` VARCHAR(250)  NULL 
	,`titulo` VARCHAR(250) NOT NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE proyectos
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`nombre` VARCHAR(250) NOT NULL 
	,`proyectoPadre_id` INT NOT NULL 
	,`fechaInicio` DATETIME NOT NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE listas
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`lista` VARCHAR(250)  NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE tareasComentarios
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`tarea_id` INT NOT NULL 
	,`comentario` VARCHAR(250)  NULL 
	,`usuario_id` INT NOT NULL 
	,`comentarioComentado_id` INT NOT NULL 
	,`fechaHora` DATETIME  NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE etiquetas
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`etiqueta` VARCHAR(250)  NULL 
	,`etiquetaPadre_id` INT  NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE tarea_Etiqueta
(
	`tarea_id` INT NOT NULL 
	,`etiqueta_id` INT NOT NULL 
	,`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;

*/

ALTER TABLE rol_usuario ADD FOREIGN KEY (rol_id) REFERENCES roles(id);
ALTER TABLE rol_usuario ADD FOREIGN KEY (usuario_id) REFERENCES usuarios(id);
ALTER TABLE contrasenias ADD FOREIGN KEY (usuario_id) REFERENCES usuarios(id);
ALTER TABLE tareas ADD FOREIGN KEY (usuarioCreador_id) REFERENCES usuarios(id);
ALTER TABLE tareas_usuarios ADD FOREIGN KEY (tarea_id) REFERENCES tareas(id);
ALTER TABLE tareas_usuarios ADD FOREIGN KEY (usuario_id) REFERENCES usuarios(id);
/*
ALTER TABLE proyectos ADD FOREIGN KEY (proyectoPadre_id) REFERENCES proyectos(id);
ALTER TABLE imagenes ADD FOREIGN KEY (comentario_id) REFERENCES comentarios(id);
ALTER TABLE adjuntos ADD FOREIGN KEY (comentario_id) REFERENCES comentarios(id);
ALTER TABLE comentario_rolHabilitado ADD FOREIGN KEY (comentario_id) REFERENCES comentarios(id);
ALTER TABLE comentario_usuarioHabilitado ADD FOREIGN KEY (comentario_id) REFERENCES comentarios(id);

ALTER TABLE comentarios ADD FOREIGN KEY (autor_id) REFERENCES usuarios(id);
ALTER TABLE comentario_rolHabilitado ADD FOREIGN KEY (rolHabilitado_id) REFERENCES roles(id);
ALTER TABLE comentario_usuarioHabilitado ADD FOREIGN KEY (usuarioHabilitado_id) REFERENCES usuarios(id);
ALTER TABLE comentarios ADD FOREIGN KEY (poyecto_id) REFERENCES proyectos(id);

ALTER TABLE fechas ADD FOREIGN KEY (tarea_id) REFERENCES Tareas(id);
ALTER TABLE georeferencia ADD FOREIGN KEY (tarea_id) REFERENCES tareas(id);
ALTER TABLE auditoria ADD FOREIGN KEY (tarea_id) REFERENCES tareas(id);
ALTER TABLE asignaciones ADD FOREIGN KEY (tarea_id) REFERENCES auditoria(tarea_id);
ALTER TABLE asignaciones ADD FOREIGN KEY (usuarioAsignado_id) REFERENCES usuarios(id);
ALTER TABLE tareasComentarios ADD FOREIGN KEY (tarea_id) REFERENCES tareas(id);
ALTER TABLE tareasComentarios ADD FOREIGN KEY (comentarioComentado_id) REFERENCES tareasComentarios(id);
ALTER TABLE tareasComentarios ADD FOREIGN KEY (usuario_id) REFERENCES usuarios(id);
ALTER TABLE tarea_Etiqueta ADD FOREIGN KEY (tarea_id) REFERENCES tareas(id);
ALTER TABLE etiquetas ADD FOREIGN KEY (etiquetaPadre_id) REFERENCES etiquetas(id);
ALTER TABLE tarea_Etiqueta ADD FOREIGN KEY (etiqueta_id) REFERENCES etiquetas(id);
*/
-- ALTER TABLE Listas ADD FOREIGN KEY (id) REFERENCES Tareas(Lista_id); -- nose porque no anda
-- ALTER TABLE Lugares ADD FOREIGN KEY (id) REFERENCES Georeferencia(lugar_id); -- no siempre se relacione con un lugar

INSERT INTO roles (rol) VALUES ('Administrador');

INSERT INTO usuarios (id, usuario) VALUES (-1,'anonimo');
UPDATE usuarios SET id = 0 where id = -1;
INSERT INTO usuarios (usuario) VALUES ('adminU');
INSERT INTO contrasenias (clave,usuario_id) VALUES ('',0);
INSERT INTO contrasenias (clave,usuario_id) VALUES ('c792940730693ab15e258c4e253b2e767b1b57a0',1);
INSERT INTO rol_usuario(rol_id,usuario_id) VALUE (1,1)
