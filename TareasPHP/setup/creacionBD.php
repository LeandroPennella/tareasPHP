<?php


$SQLEliminarTablasBD="SELECT CONCAT(  `drop table `, table_name,  `; ` ) 
FROM information_schema.tables
WHERE table_schema =  `tareas`
";


//$SQLCrearBD="CREATE database tareas";
  
$SQLCrearTablasBD="
-- Create Table: Lugares
-- ------------------------------------------------------------------------------
CREATE TABLE Lugares
(
	`id` INT NOT NULL AUTO_INCREMENT
	, PRIMARY KEY (id)
	,`nombre` VARCHAR(250)  NULL 
	,`Dreccion` VARCHAR(250)  NULL 
	,`coordenadas` VARCHAR(250)  NULL 
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE comentario_rolHabilitado
(
	`id` INT NOT NULL AUTO_INCREMENT
	, PRIMARY KEY (id)
	,`comentario_id` INT NOT NULL 
	,`rolHabilitado_id` INT NOT NULL 
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Create Table: rol_usuario
-- ------------------------------------------------------------------------------
CREATE TABLE rol_usuario
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`rol_id` INT NOT NULL 
	,`usuario_id` INT NOT NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Create Table: Auditoria
-- ------------------------------------------------------------------------------
CREATE TABLE Auditoria
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`Tarea_id` INT NOT NULL 
	,`Completado` VARCHAR(250)  NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Create Table: Georeferencia
-- ------------------------------------------------------------------------------
CREATE TABLE Georeferencia
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`tarea_id` INT NOT NULL 
	,`lugar_id` INT  NULL 
	,`Direccion` VARCHAR(250)  NULL 
	,`coordenadas` VARCHAR(250)  NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Create Table: comentario_usuarioHabilitado
-- ------------------------------------------------------------------------------
CREATE TABLE comentario_usuarioHabilitado
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`comentario_id` INT NOT NULL 
	,`usuarioHabilitado_id` INT NOT NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Create Table: Fechas
-- ------------------------------------------------------------------------------
CREATE TABLE Fechas
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`Tarea_id` INT NOT NULL 
	,`fechaLimita` DATETIME NOT NULL 
	,`horaDesde` DATETIME  NULL 
	,`horaHasta` DATETIME  NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Create Table: Asignaciones
-- ------------------------------------------------------------------------------
CREATE TABLE Asignaciones
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`tarea_id` INT NOT NULL 
	,`usuarioAsignado_id` INT NOT NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Create Table: adjuntos
-- ------------------------------------------------------------------------------
CREATE TABLE adjuntos
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`titulo` VARCHAR(250) NOT NULL 
	,`ruta` VARCHAR(250) NOT NULL 
	,`comentario_id` INT NOT NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Create Table: comentarios
-- ------------------------------------------------------------------------------
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


-- Create Table: imagenes
-- ------------------------------------------------------------------------------
CREATE TABLE imagenes
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`comentario_id` INT NOT NULL 
	,`foto` VARCHAR(250)  NULL 
	,`titulo` VARCHAR(250) NOT NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Create Table: Proyectos
-- ------------------------------------------------------------------------------
CREATE TABLE Proyectos
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`nombre` VARCHAR(250) NOT NULL 
	,`proyectoPadre_id` INT NOT NULL 
	,`fechaInicio` DATETIME NOT NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Create Table: Usuarios
-- ------------------------------------------------------------------------------
CREATE TABLE Usuarios
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`Usuario` VARCHAR(250)  NULL 
	,`foto` VARCHAR(250)  NULL 
	,`nombre` VARCHAR(250)  NULL 
	,`mail` VARCHAR(250)  NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Create Table: roles
-- ------------------------------------------------------------------------------
CREATE TABLE roles
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`rol` VARCHAR(250) NOT NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Create Table: Tareas
-- ------------------------------------------------------------------------------
CREATE TABLE Tareas
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`Tarea` VARCHAR(250) NOT NULL 
	,`Lista_id` INT NOT NULL 
	,`Prioridad` INT  NULL 
	,`usuarioCreador_id` INT NOT NULL 
	,`fechaCreacion` DATETIME NOT NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Create Table: Listas
-- ------------------------------------------------------------------------------
CREATE TABLE Listas
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`Lista` VARCHAR(250)  NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Create Table: TareasComentarios
-- ------------------------------------------------------------------------------
CREATE TABLE TareasComentarios
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


-- Create Table: Etiquetas
-- ------------------------------------------------------------------------------
CREATE TABLE Etiquetas
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`Etiqueta` VARCHAR(250)  NULL 
	,`EtiquetaPadre_id` INT  NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Create Table: Tarea_Etiqueta
-- ------------------------------------------------------------------------------
CREATE TABLE Tarea_Etiqueta
(
	`Tarea_id` INT NOT NULL 
	,`Etiqueta_id` INT NOT NULL 
	,`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Create Table: Contrasenia
-- ------------------------------------------------------------------------------
CREATE TABLE Contrasenias
(
	`id` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (id)
	,`contrasenia` VARCHAR(50) NOT NULL 
	,`usuario_id` INT NOT NULL 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Create Foreign Key: Proyectos.proyectoPadre_id -> Proyectos.id
ALTER TABLE Proyectos ADD FOREIGN KEY (proyectoPadre_id) REFERENCES Proyectos(id);


-- Create Foreign Key: imagenes.comentario_id -> comentarios.id
ALTER TABLE imagenes ADD FOREIGN KEY (comentario_id) REFERENCES comentarios(id);


-- Create Foreign Key: adjuntos.comentario_id -> comentarios.id
ALTER TABLE adjuntos ADD FOREIGN KEY (comentario_id) REFERENCES comentarios(id);


-- Create Foreign Key: comentario_rolHabilitado.comentario_id -> comentarios.id
ALTER TABLE comentario_rolHabilitado ADD FOREIGN KEY (comentario_id) REFERENCES comentarios(id);


-- Create Foreign Key: comentario_usuarioHabilitado.comentario_id -> comentarios.id
ALTER TABLE comentario_usuarioHabilitado ADD FOREIGN KEY (comentario_id) REFERENCES comentarios(id);


-- Create Foreign Key: rol_usuario.rol_id -> roles.id
ALTER TABLE rol_usuario ADD FOREIGN KEY (rol_id) REFERENCES roles(id);


-- Create Foreign Key: rol_usuario.usuario_id -> Usuarios.id
ALTER TABLE rol_usuario ADD FOREIGN KEY (usuario_id) REFERENCES Usuarios(id);


-- Create Foreign Key: comentarios.autor_id -> Usuarios.id
ALTER TABLE comentarios ADD FOREIGN KEY (autor_id) REFERENCES Usuarios(id);


-- Create Foreign Key: comentario_rolHabilitado.rolHabilitado_id -> roles.id
ALTER TABLE comentario_rolHabilitado ADD FOREIGN KEY (rolHabilitado_id) REFERENCES roles(id);


-- Create Foreign Key: comentario_usuarioHabilitado.usuarioHabilitado_id -> Usuarios.id
ALTER TABLE comentario_usuarioHabilitado ADD FOREIGN KEY (usuarioHabilitado_id) REFERENCES Usuarios(id);


-- Create Foreign Key: comentarios.poyecto_id -> Proyectos.id
ALTER TABLE comentarios ADD FOREIGN KEY (poyecto_id) REFERENCES Proyectos(id);


-- Create Foreign Key: Tareas.usuarioCreador_id -> Usuarios.id
ALTER TABLE Tareas ADD FOREIGN KEY (usuarioCreador_id) REFERENCES Usuarios(id);


-- Create Foreign Key: Fechas.Tarea_id -> Tareas.id
ALTER TABLE Fechas ADD FOREIGN KEY (Tarea_id) REFERENCES Tareas(id);


-- Create Foreign Key: Georeferencia.tarea_id -> Tareas.id
ALTER TABLE Georeferencia ADD FOREIGN KEY (tarea_id) REFERENCES Tareas(id);


-- Create Foreign Key: Lugares.id -> Georeferencia.lugar_id
ALTER TABLE Lugares ADD FOREIGN KEY (id) REFERENCES Georeferencia(lugar_id);


-- Create Foreign Key: Auditoria.Tarea_id -> Tareas.id
ALTER TABLE Auditoria ADD FOREIGN KEY (Tarea_id) REFERENCES Tareas(id);


-- Create Foreign Key: Asignaciones.tarea_id -> Auditoria.Tarea_id
ALTER TABLE Asignaciones ADD FOREIGN KEY (tarea_id) REFERENCES Auditoria(Tarea_id);


-- Create Foreign Key: Asignaciones.usuarioAsignado_id -> Usuarios.id
ALTER TABLE Asignaciones ADD FOREIGN KEY (usuarioAsignado_id) REFERENCES Usuarios(id);


-- Create Foreign Key: TareasComentarios.tarea_id -> Tareas.id
ALTER TABLE TareasComentarios ADD FOREIGN KEY (tarea_id) REFERENCES Tareas(id);


-- Create Foreign Key: TareasComentarios.comentarioComentado_id -> TareasComentarios.id
ALTER TABLE TareasComentarios ADD FOREIGN KEY (comentarioComentado_id) REFERENCES TareasComentarios(id);


-- Create Foreign Key: TareasComentarios.usuario_id -> Usuarios.id
ALTER TABLE TareasComentarios ADD FOREIGN KEY (usuario_id) REFERENCES Usuarios(id);


-- Create Foreign Key: Tarea_Etiqueta.Tarea_id -> Tareas.id
ALTER TABLE Tarea_Etiqueta ADD FOREIGN KEY (Tarea_id) REFERENCES Tareas(id);


-- Create Foreign Key: Etiquetas.EtiquetaPadre_id -> Etiquetas.id
ALTER TABLE Etiquetas ADD FOREIGN KEY (EtiquetaPadre_id) REFERENCES Etiquetas(id);


-- Create Foreign Key: Contrasenia.usuario_id -> Usuarios.id
ALTER TABLE Contrasenias ADD FOREIGN KEY (usuario_id) REFERENCES Usuarios(id);


-- Create Foreign Key: Listas.id -> Tareas.Lista_id
ALTER TABLE Listas ADD FOREIGN KEY (id) REFERENCES Tareas(Lista_id);


-- Create Foreign Key: Tarea_Etiqueta.Etiqueta_id -> Etiquetas.id
ALTER TABLE Tarea_Etiqueta ADD FOREIGN KEY (Etiqueta_id) REFERENCES Etiquetas(id);


";

$SQLInsertarDatos="

INSERT INTO roles (rol) VALUES ('Administrador');
INSERT INTO usuarios (usuario) VALUES ('Leandro');
INSERT INTO contrasenia (contrasenia,usuario_id) VALUES ('Leandro',1);
";



?>