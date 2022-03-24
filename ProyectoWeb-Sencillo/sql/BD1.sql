/*Crear Base de Datos*/
CREATE DATABASE dbproyecto;
USE dbproyecto;
/*Crear Tablas*/
CREATE TABLE usuarios(
id              int (255) auto_increment NOT NULL,
nombre          varchar (50) NOT NULL,
apellidos       varchar (50),
email           varchar (50) NOT NULL,
password        varchar (255) NOT NULL,
fecharegistro   date NOT NULL,
CONSTRAINT      pk_usuarios PRIMARY KEY(id),
CONSTRAINT      uq_email UNIQUE (email) /*-----------UNIQUE Se refiere a que no se puede repetir este dato----------*/
)ENGINE=InnoDb;

CREATE TABLE categorias(
id              int (255) auto_increment NOT NULL,
nombre          varchar (50) NOT NULL,
CONSTRAINT      pk_usuarios PRIMARY KEY(id),
CONSTRAINT      uq_email UNIQUE (nombre)
)ENGINE=InnoDb;

CREATE TABLE entradas(
id              int (255) auto_increment NOT NULL,
usuario_id      int (255) NOT NULL,
categorias_id   int (255) NOT NULL,
titulo          varchar (100) NOT NULL,
descripcion     TEXT NOT NULL,
fecha           DATE NOT NULL,
CONSTRAINT      pk_entradas PRIMARY KEY(id),
CONSTRAINT      fk_entradas_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id),/*Llave Foranea*/
CONSTRAINT      fk_entradas_categorias FOREIGN KEY(categorias_id) REFERENCES categorias(id) ON DELETE CASCADE
)ENGINE=InnoDb;


