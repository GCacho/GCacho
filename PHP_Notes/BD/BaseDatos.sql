/* Tipos de Datos 
int (n° de caracteres) ENTERO
integrer (n° de caracteres) ENTERO (max 4294967295)
varchar (n° de caracteres) STRING/ALFANUMÉRICO  (max 255 characteres)
char (n° de caracteres) STRING/ALFANUMÉRICO     (max 255 characteres)
float (n° de cifras, n° decimales) DECIMAL/COMAFLOTANTE
date, time timestamp

/* Operadores Lógicos
O               OR
Y               AND
No              NOT

/* Operadores de Comparación
Igual           =
Distinto        !=
Menor           <
Mayor           >
Menor o Igual   <=
Mayor o Igual   >=
Entre           between A and B
En              in
Es nulo         is null
No nulo         is not null
Como            like
No es como      not like

/* Comodines
Cualquier cantidad de caracteres    %
Un caracter desconosido             _

------Sting mas grandes-----
TEXT 65535 caracteres
MEDIUMTEXT 16 millones
LONGTEXT 4 billones de caracteres

------ENTEROS mas grandes-----
MEDIUMINT
BIGINT
*/

/*-----------------------------------Crear Base de Datos----------------------------------------*/
CREATE DATABASE PrimerBD;

/*-----------------------------------Crear Base de Datos----------------------------------------*/
------Instrucciones-------
USE labasededatos; -------Para seleccionar la base de datos---------
DROP DATABASE labasededatos; -------Borra la base de datos-------
DROP TABLE usuarios; ------Borra la tabla------
SHOW tables; --------Muestra las tablas
DESC nombretabla; ------Muestra los datos de la tabla seleccionada---------

/*-----------------------------------Crear Tablas----------------------------------------*/
CREATE TABLE usuarios( /*el numero dentro de parentesis (11) se refiere a la cantidad de caracteres máxima que se le van a ingresar "12345678911" 11 Numeros*/
id          int(11) auto_increment not null, /*auto_increment es para los id*/
usuarios    varchar(50) default 'Cacho Valdez', /*Te asigna dato por default siempre*/ 
email       varchar (50) not null, /*not null se refiere a que no podrá estar vacío este campo*/
password    varchar(50) not null,
CONSTRAINT pk_usuarios PRIMARY KEY(id) /*Le asigna llave primaria al id*/
);
/*-----------------------------------Crear Tablas----------------------------------------*/

/*-----------------------------------Modificar Tablas----------------------------------------*/
ALTER TABLE usuarios RENAME TO usuarios2; /*Renombra la tabla*/
ALTER TABLE usuarios CHANGE email correo varchar(50) NOT NULL; /*cambiar nombre de alguna columna en este caso de apellidos a apellido*/
ALTER TABLE usuarios MODIFY correo varchar (30) NOT NULL; /*Modificar columna sin cambiar nombre*/
ALTER TABLE usuarios ADD website varchar(100) NULL; /*Añadir Columna - Null significa que puede estar vacío este campo*/
ALTER TABLE usuarios ADD CONSTRAINT uq_email UNIQUE(email); /*Añadir restricción - ADD CONSTRAINT funciona para que no se pueda repetir el email en la base de datos*/
ALTER TABLE usuarios DROP website; /*Borrar columna*/
UPDATE usuarios SET nombre = 'Guillermito' WHERE id = 1; /* Actualizar datos de la Tabla */
DELETE FROM usuarios WHERE id = 5; /*Eliminar datos de la Tabla - Funciona con cualquier campo id, nombre, email, etc */
/*-----------------------------------Modificar Tablas----------------------------------------*/

/*-----------------------------------Ejemplo de Base de Datos----------------------------------------*/
/*-----------------------------------Crea una base de datos con 3 tablas enlazadas entre si por llaves primarias y foraneas----------------------------------------*/
CREATE DATABASE PrimerBD;
USE PrimerBD;
CREATE TABLE usuarios(
id              int (255) auto_increment NOT NULL,
nombre          varchar (50) NOT NULL,
apellido        varchar (50) NOT NULL,
email           varchar (50) NOT NULL,
password        varchar (50) NOT NULL,
fecharegistro   date NOT NULL,
CONSTRAINT      pk_usuarios PRIMARY KEY(id),
CONSTRAINT      uq_email UNIQUE (email) /*-----------UNIQUE Se refiere a que no se puede repetir este dato----------*/
)ENGINE=InnoDb; /*Permite que funcionen las Llaves FORANEAS*/

CREATE TABLE categorias(
id          int (255) auto_increment NOT NULL,
puesto      varchar (50) NOT NULL,
CONSTRAINT  pk_categorias PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE datosextra(
id              int (255) auto_increment NOT NULL,
usuario_id      int (255) NOT NULL,
categorias_id   int (255) NOT NULL,
telefono        varchar (25) NOT NULL,
direccion       varchar (100) NOT NULL,
cumpleaños      date NOT NULL,
CONSTRAINT      pk_datosextra PRIMARY KEY(id), /*Llave Primaria*/
CONSTRAINT      fk_datosextra_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id),/*Llave Foranea*/
CONSTRAINT      fk_datosextra_categorias FOREIGN KEY(categorias_id) REFERENCES categorias(id) ON DELETE CASCADE /*Si se borra algo dentro de la llave enlazada con la cascada se actualiza en las tablas*/
)ENGINE=InnoDb;
/*-----------------------------------Ejemplo de Base de Datos----------------------------------------*/
/*-----------------------------------Insertar datos a la Base de Datos----------------------------------------*/
/*-----------------------------------Insertar datos a la tabla de usuarios----------------------------------------*/
INSERT INTO usuarios VALUES(NULL,'Guillermo', 'Cacho', 'guillermo.cacho@gmail.com', '1234', '2021-03-25'); /*En la tabla de usuarios está id=null porque incrementa solito, nombre, apellido, email, password, fecha(se ingrea en formato americano (AÑO-MES-DIA)*/
INSERT INTO usuarios VALUES(NULL,'Raúl', 'Martínez', 'Raul_Ma@gmail.com', 'elRauls123', '2021-03-26');
INSERT INTO usuarios VALUES(NULL,'Enrique', 'Cianci', 'KikeC_2000@gmail.com', 'Kikes2000', '2021-03-27');
INSERT INTO usuarios VALUES(NULL,'Pepe', 'Musk', 'ElPepeMusk@gmail.com', 'Muskito1998', '1998-08-25');
/*-----------------------------------Insertar datos a la tabla de usuarios----------------------------------------*/
/*-----------------------------------Insertar datos a la tabla de categorías----------------------------------------*/
INSERT INTO categorias VALUES(NULL,'Admin');
INSERT INTO categorias VALUES(NULL,'Maestro');
INSERT INTO categorias VALUES(NULL,'Alumno');
INSERT INTO categorias VALUES(NULL,'Tutor');
/*-----------------------------------Insertar datos a la tabla de categorías----------------------------------------*/
/*-----------------------------------Insertar datos a la tabla de Entradas----------------------------------------*/
INSERT INTO datosextra VALUES(NULL, 1, 1, '7774298512', 'Mi casita', '1995-09-24'); /*El Primer número se refiere al usuario, el segundo número a la categoría*/
INSERT INTO datosextra VALUES(NULL, 2, 2, '6121212451', 'Su Casa', '1990-05-15');
INSERT INTO datosextra VALUES(NULL, 3, 3, '6124568753', 'Otra casa', '2001-08-06');
INSERT INTO datosextra VALUES(NULL, 4, 4, '6124598744', 'la misma casa', '1986-07-21');
/*-----------------------------------Insertar datos a la tabla de Entradas----------------------------------------*/
/*-----------------------------------Insertar datos a la Base de Datos----------------------------------------*/

/*-----------------------------------Mostrar datos de la Base de Datos----------------------------------------*/
SELECT * FROM usuarios; /*Muestra todos los datos de una tabla*/
SELECT * FROM usuarios ORDER BY nombre DESC; /*Ordena los datos numérica o alfabeticamente de la tabla dependiendo de la columna seleccionada DESC es para que sea descendente ASC ascendente*/
SELECT nombre, CURDATE() AS 'Fecha Acual' From usuarios; /*Ingresa la fecha actual*/
SELECT nombre, DAYNAME(fecharegistro) AS 'Día de Registro' From usuarios; /*Ingresa la fecha actual tambien existe DAYOFMONTH, DAYOFWEEK, Month, Year, Day, CURTIME(), SYSDATE() etc*/

/*--------------Consulta con condición "Where"-----------------*/
SELECT * FROM usuarios WHERE id = '2';
SELECT * FROM usuarios WHERE nombre = 'Guillermo';

/*--------------Ejemplo "Where" 1 (Obtiene el nombre y apellido de la tabla de usuarios de la gente que se registró en el año 2021)-----------------*/
SELECT nombre, apellido FROM usuarios WHERE YEAR(fecharegistro) = 2021;
/*--------------Ejemplo "Where" 2 (Obtiene el correo de la gente que tenga en el apellido la letra 'a' y la contraseña sea 1234)-----------------*/
SELECT email FROM usuarios WHERE apellido LIKE '%a%' AND password = '1234'; /*Utilizamos comodín entre la 'a' para referirnos a que puede ser cualquier tipo de caracter o letra*/
/*--------------Ejemplo "Where" 3 (Obtiene el correo de la gente que tenga id PAR)-----------------*/
SELECT id, email FROM usuarios WHERE id % 2 = 0; /*Agregar != para que sean impares*/
/*--------------Ejemplo "Where" 4 (Obtiene el nombre [en mayuscula] que tenga más de 5 letras y que se hayan registrado antes del 2020)-----------------*/
SELECT UPPER(nombre) AS 'Nombre' FROM usuarios WHERE LENGTH(nombre) > 5 AND YEAR(fecharegistro) > 1996;

/*--------------Ordenar Datos-----------------*/
SELECT * FROM usuarios ORDER BY id DESC; /*ASC en vez de DESC para ordenar de forma ascendente*/
/*--------------Ordenar Datos-----------------*/
/*-----------------------------------Mostrar datos de la Base de Datos----------------------------------------*/

/*-----------------------------------Funciones para busquedas----------------------------------------*/
SELECT MIN(id) AS 'Minimo ID' From usuarios;
SELECT MAX(id) AS 'Máximo ID' From usuarios;
SELECT SUM(id) AS 'Suma ID' FROM usuarios;
SELECT AVG(id) AS 'Promedio de ID' FROM usuarios;
/*-----------------------------------Funciones para busquedas----------------------------------------*/

/*-------------------------------------------Sub-Consultas (Sacar usuarios con datosextra)------------------------------------------------*/
INSERT INTO usuarios VALUES(NULL,'Un Usuario', 'Sin DatosExtra', 'elusuariosinextra@gmail.com', 'xzxzx', '1975-11-11'); /*Lo insertamos para que no este enlazado con los datos extra*/
SELECT * FROM usuarios WHERE id IN (SELECT usuario_id FROM datosextra); /*Aparecen todos los usuarios menos los que no tienen datos extra*/
/*------Ejercicio 1 Sub-Consultas (Mostrar usuarios que cumplan años después del año 2000)------*/
SELECT nombre, apellido From usuarios WHERE id IN (SELECT usuario_id FROM datosextra WHERE YEAR(cumpleaños) > 2000);
/*------Ejercicio 2 Sub-Consultas (Mostrar nombre y apellido de los usuarios que sean alumnos)------*/
INSERT INTO usuarios VALUES(NULL,'Otro Alumno', 'Buena onda', 'otroalumno@gmail.com', 'elalumno1', '2005-05-21'); /*Lo insertamos para que haya 2 alumnos en la base de datos*/
INSERT INTO datosextra VALUES(NULL, 6, 3, '6121234567', 'la casa del otro alumno', '2005-05-21'); /*Le asignamos la catrgoria dependiendo del id que se le asigne al insertarlo que en este caso es el id 6 y el 3 se refiere a la categoría alumno*/
SELECT nombre, apellido FROM usuarios WHERE id IN (SELECT usuario_id FROM datosextra WHERE categorias_id = 3); /*Muestra nombre y apellido de usuarios que son alumnos*/
/*-------------------------------------------Sub-Consultas------------------------------------------------*/

/*-------------------------------------------Consultas Multitabla (Consulta varias tablas en una sola sentencia) ¡¡¡¡¡No recomendado!!!!!------------------------------------------------*/
SELECT x.id, n.nombre, a.apellido, p.puesto, t.telefono, d.direccion FROM datosextra x, usuarios n, usuarios a, categorias p, datosextra t, datosextra d WHERE x.usuario_id = n.id AND x.categorias_id = n.id; /*Muestra distintos datos de todas las tablas*/
/*-------------------------------------------Consultas Multitabla (Consulta varias tablas en una sola sentencia) ¡¡¡¡¡No recomendado!!!!!------------------------------------------------*/

/*-----------------------------------------!!!!!!!!!!!!!!!!!!!!!!! INNER JOIN (Una de las funciones mas utilizadas para las consultas de bases de datos) !!!!!!!!!!!!!!!!!!!!----------------------------------------*/
SELECT d.id, u.nombre, u.apellido, d.telefono, c.puesto FROM datosextra d /*Se asignan la variables dependioendo de a la tabla que pertenecen y se coloca en el FROM la tabla de enlace (datosextra)*/
INNER JOIN usuarios u ON d.usuario_id = u.id /*Se asigna el inner join para las tablas extra (u para usuarios) y se compara el id de la tabla datos extra con la llave secundaria de usuarios*/
INNER JOIN categorias c ON d.categorias_id = c.id; /*Se repite el proceso de arriba pero agregando ahora categorias*/
/*-----------------------------------------!!!!!!!!!!!!!!!!!!!!!!! INNER JOIN (Una de las funciones mas utilizadas para las consultas de bases de datos) !!!!!!!!!!!!!!!!!!!!----------------------------------------*/

/*----------------------------------------Crear Vistas (FUNCIONA PARA GUARDAR CONSULTAS COMPLEJAS "Como en una función")-----------------------------------------*/
CREATE VIEW recoptablas AS /*despues de as se agrega el código que queremos repetir o optimizar*/
SELECT d.id, u.nombre, u.apellido, d.telefono, c.puesto FROM datosextra d 
INNER JOIN usuarios u ON d.usuario_id = u.id 
INNER JOIN categorias c ON d.categorias_id = c.id;
/*----------------------------------------Crear Vistas-----------------------------------------*/
/*-----Mostrar Vistas------*/
SELECT * FROM recoptablas;
/*---*/
SELECT * FROM recoptablas WHERE puesto = 'Admin';
/*-----Mostrar Vistas------*/

/*-----Borrar Vistas------*/
DROP VIEW recoptablas;
/*-----Borrar Vistas------*/


/*----------------------------------------Pruebas------------------------------------------------*/
SELECT d.id, u.nombre, u.apellido, d.telefono, c.puesto FROM datosextra d
INNER JOIN usuarios u ON d.usuario_id = u.id 
INNER JOIN categorias c ON d.categorias_id = c.id;


SELECT id_usuario FROM datos_extra_alumnos WHERE generacion_inicio >= 2018;

SELECT correo FROM datos_extra_tutor WHERE id_usuario >= 1770 AND id_usuario <= 1936;

SELECT * FROM `usuarios` WHERE `id_usuario` = 1771; /*id Gaby mendoza*/

SELECT * FROM `usuarios` WHERE `id_usuario` = 1857; /*id papa gaby*/

SELECT * FROM `parentesco_tutor` WHERE `id_alumno` = 1771; /*Encuentra a los papas*/

/*1857 y 1858 papas de gaby*/

CREATE VIEW papas AS
SELECT pt.id_alumno as 'id del hijo', pt.id_padre, u.nombre as 'Nombre Padre', u.apellido_paterno as 'Apellido Padre', det.correo as 'Correo Padre' FROM datos_extra_tutor det
INNER JOIN usuarios u ON det.id_usuario = u.id_usuario
INNER JOIN parentesco_tutor pt ON det.id_usuario = pt.id_padre                                                                                     /*id usuario = id_padre*/

SELECT pt.id_padre, pt.id_alumno, det.correo FROM parentesco_tutor pt
INNER JOIN usuarios u ON det.id_usuario = u.id_usuario;

SELECT * FROM `papas` WHERE `id_alumno` >= 1770 AND `id_alumno` <= 1936;


/*SELECT * FROM usuarios WHERE `tipo` = 3;    Obtiene a todos los papas de usuarios*/

SELECT id_usuario, nombre, apellido_paterno, apellido_materno, tipo FROM usuarios WHERE (tipo = 3 OR tipo = 2) AND (id_usuario >= 1770 AND id_usuario >= 1936); /*Obtiene papás y alumnos de la generación 2018*/



SELECT p.`id del hijo`, u.nombre as 'nombre alumno', u.apellido_paterno as 'apellido alumno', p.id_padre as 'id del padre', p.`Nombre Padre`, p.`Apellido Padre`, p.`Correo Padre` FROM papas p
INNER JOIN usuarios u ON p.`id del hijo`=u.id_usuario