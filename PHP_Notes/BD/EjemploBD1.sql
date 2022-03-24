/*Diseñar y crear la base de datos de un concesionario de coshes*/
/*--------------Crear BD---------------*/
CREATE DATABASE IF NOT EXISTS CochesBD;
USE CochesBD;
/*--------------Crear tablas---------------*/
CREATE TABLE coches( 
id          int(10) auto_increment NOT NULL, 
modelo      varchar(25) NOT NULL, 
marca       varchar (25), 
precio      int(20) NOT NULL,
stock       int(255) NOT NULL,
CONSTRAINT pk_coches PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE grupos( 
id          int(10) auto_increment NOT NULL,
nombre      varchar (25) NOT NULL, 
ciudad      varchar (25) NOT NULL,
CONSTRAINT pk_grupos PRIMARY KEY (id)
)ENGINE=InnoDb;

CREATE TABLE vendedores( 
id          int(10) auto_increment NOT NULL, 
grupos_id      int(10) NOT NULL, 
jefe        int(10),
nombre      varchar (25) NOT NULL, 
apellidos   varchar (25),
cargo       varchar (25) NOT NULL,
fecha_alta  DATE,
sueldo      float (20,2), /*,2 es 2 decimales*/
comision    float (10,2),
CONSTRAINT pk_vendedores PRIMARY KEY(id),
CONSTRAINT fk_vendedores_clientes FOREIGN KEY(grupos_id) REFERENCES grupos(id),
CONSTRAINT fk_vendedores_jefe FOREIGN KEY (jefe) REFERENCES vendedores(id)
)ENGINE=InnoDb;

CREATE TABLE clientes( 
id          int(10) auto_increment NOT NULL, 
vendedores_id int(10), 
nombre      varchar (25) NOT NULL, 
ciudad      varchar (25),
gastado     float (50,2) NOT NULL,
fecha       DATE,
CONSTRAINT pk_clientes PRIMARY KEY(id),
CONSTRAINT fk_clientes_vendedores FOREIGN KEY(vendedores_id) REFERENCES vendedores(id)
)ENGINE=InnoDb;

CREATE TABLE encargos( 
id          int(10) auto_increment NOT NULL,
clientes_id  int(10) NOT NULL, 
coches_id    int(10) NOT NULL, 
cantidad    int(255),
fecha       DATE,
CONSTRAINT pk_encargos PRIMARY KEY(id), 
CONSTRAINT fk_encargos_clientes FOREIGN KEY(clientes_id) REFERENCES clientes(id),
CONSTRAINT fk_encargos_coches FOREIGN KEY(coches_id) REFERENCES coches(id)
)ENGINE=InnoDb;
/*--------------FIN Crear tablas---------------*/

/*--------------Llenar tablas---------------*/
/*Coches*/
INSERT INTO coches VALUES (NULL, 'Renault Clio', 'Renault', 120000, 13);
INSERT INTO coches VALUES (NULL, 'Seat Panda', 'Seat', 100000, 10);
INSERT INTO coches VALUES (NULL, 'R8', 'Audi', 585000, 5);
INSERT INTO coches VALUES (NULL, 'Porche Cayene', 'Porche', 650000, 9);
INSERT INTO coches VALUES (NULL, 'Lambo Aventador', 'Lamborgini', 170000, 2);
INSERT INTO coches VALUES (NULL, 'Ferrari', 'Spider', 245000, 80);
/*Grupos*/
INSERT INTO grupos VALUES (NULL, 'Vendedores A', 'La Paz');
INSERT INTO grupos VALUES (NULL, 'Vendedores B', 'Los Cabos');
INSERT INTO grupos VALUES (NULL, 'Vendedores A', 'CD Mex');
INSERT INTO grupos VALUES (NULL, 'Vendedores B', 'Cuernavaca');
INSERT INTO grupos VALUES (NULL, 'Directores Mecanicos', 'Mulegé');
INSERT INTO grupos VALUES (NULL, 'Vendedores A', 'Todos Santos');
INSERT INTO grupos VALUES (NULL, 'Vendedores A', 'Cuernavaca');
INSERT INTO grupos VALUES (NULL, 'Directores Mecanicos', 'Rosarito');
INSERT INTO grupos VALUES (NULL, 'Vendedores B', 'Todos Santos');
/*Vendedores*/
INSERT INTO vendedores VALUES (NULL, 1, 1, 'Guillermo', 'Cacho', 'Responsable de tienda', CURDATE(), 30000, 4);
INSERT INTO vendedores VALUES (NULL, 1, NULL, 'Alonso', 'Cañedo', 'Mecánico', CURDATE(), 15000, 3);
INSERT INTO vendedores VALUES (NULL, 2, 3, 'Frank', 'Martinez', 'Promotor', CURDATE(), 45000, 2);
INSERT INTO vendedores VALUES (NULL, 2, NULL, 'Monica', 'Zepeda', 'Vendedor', CURDATE(), 25000, 9);
INSERT INTO vendedores VALUES (NULL, 3, NULL, 'Laura', 'Mitotes', 'Mago', CURDATE(), 16000, 4);
INSERT INTO vendedores VALUES (NULL, 4, NULL, 'Libier', 'Mora', 'Brujo', CURDATE(), 10000, 3);
INSERT INTO vendedores VALUES (NULL, 5, NULL, 'Paola', 'Perez', 'Tank', CURDATE(), 7000, 5);
INSERT INTO vendedores VALUES (NULL, 6, NULL, 'Pamela', 'Peña', 'Volador de papantla', CURDATE(), 9000, 6);
INSERT INTO vendedores VALUES (NULL, 6, 9, 'Emma', 'Calderón', 'Cirquero', CURDATE(), 50000, 8);
/*Clientes*/
INSERT INTO clientes VALUES (NULL, 1, 'Construcciones Díaz', 'La Paz', 490000, CURDATE());
INSERT INTO clientes VALUES (NULL, 3, 'Fruteria Oscares', 'Los Cabos', 200000, CURDATE());
INSERT INTO clientes VALUES (NULL, 6, 'Jesus Colchones', 'La Paz', 170000, CURDATE());
INSERT INTO clientes VALUES (NULL, 2, 'Dr Octavio', 'New York', 3510000, CURDATE());
INSERT INTO clientes VALUES (NULL, 1, 'Carrazos inc', 'Cuernabalas',1200000 , CURDATE());
INSERT INTO clientes VALUES (NULL, 4, 'Coches Locos Sa de Cv', 'Mulegé', 1300000, CURDATE());
/*Encargos*/
INSERT INTO encargos VALUES (NULL, 1, 6, 2, CURDATE()); /*El cliente '1' compro el vehiculo '6' dos veces '2'*/
INSERT INTO encargos VALUES (NULL, 2, 2, 4, CURDATE());
INSERT INTO encargos VALUES (NULL, 3, 5, 1, CURDATE());
INSERT INTO encargos VALUES (NULL, 4, 3, 6, CURDATE());
INSERT INTO encargos VALUES (NULL, 5, 1, 10, CURDATE());
INSERT INTO encargos VALUES (NULL, 6, 4, 2, CURDATE());

/*Pequeño Ejercicio (Aumenta el precio de los coches en un 5%)*/
UPDATE coches SET precio = precio * 1.05;
/*Fin Pequeño Ejercicio*/

/*Pequeño Ejercicio 2 (Calcular la masa salarial de los empleados en un año)*/
SELECT SUM(sueldo) as 'Masa Salarial' FROM vendedores;
/*Fin Pequeño Ejercicio 2*/