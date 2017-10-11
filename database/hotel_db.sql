DROP DATABASE IF EXISTS hotel_db;
CREATE DATABASE hotel_db;
USE hotel_db;

CREATE TABLE usuario (
	ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	NOMBRE VARCHAR(50),
	APELLIDO VARCHAR(50),
	NOMBRE_USUARIO VARCHAR(50) NOT NULL,
	EMAIL VARCHAR(100) NOT NULL,
	PASSWORD VARCHAR(40)
);

CREATE TABLE habitaciones( 
	ID_HABITACION INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	NUMERO_HABITACION SMALLINT(4) NOT NULL,
	TIPO ENUM('matrimonial', 'single', 'double'),
	ESTADO ENUM('ocupada', 'reservada', 'libre')
);

CREATE TABLE huespedes( 
	ID_HUESPED INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	NOMBRE VARCHAR(50) NOT NULL,
	APELLIDO VARCHAR(50) NOT NULL,
	DIRECCION VARCHAR(50),
	EMAIL VARCHAR(100),
	TELEFONO VARCHAR(20)
);

CREATE TABLE reservas( 
	ID_RESERVA INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	FECHA_INICIO DATETIME,
	FECHA_SALIDA DATETIME,
	FKHABITACION INT UNSIGNED,
	FKHUESPED INT UNSIGNED,

	FOREIGN KEY (FKHABITACION) REFERENCES habitaciones(ID_HABITACIONES),
	FOREIGN KEY (FKHUESPED) REFERENCES huespedes(ID_HUESPEDES)
);


INSERT INTO usuario (NOMBRE, APELLIDO, NOMBRE_USUARIO, EMAIL, PASSWORD)
VALUES 
	('Carlos', 'Martinez', 'cm', 'c@m.com', '1234');

INSERT INTO habitaciones (NUMERO_HABITACION, TIPO, ESTADO)
VALUES
	('101', 'matrimonial', 'libre'),
	('102', 'single', 'ocupada'),
	('103', 'double', 'reservada'),
	('104', 'double', 'reservada'),
	('201', 'double', 'ocupada'),
	('202', 'double', 'libre'),
	('203', 'double', 'ocupada'),
	('204', 'double', 'libre'),
	('301', 'double', 'libre'),
	('302', 'double', 'reservada'),
	('303', 'double', 'libre'),
	('304', 'double', 'reservada');

INSERT INTO huespedes (NOMBRE, APELLIDO, DIRECCION, EMAIL, TELEFONO)
VALUES
	('Carlos', 'Dacunto', 'Catamarca 1543', 'cdacunto@gmail.com', '114849329'),
	('Analia', 'Ortiz', 'Rio de Janeiro 986', 'analia.ortiz@hotmail.com', '1156439803'),
	('Juan', 'Ledesma', 'Rivadavia 5433', 'juanpi@gmail.com', '47672983'),
	('Federico', 'Espinoza', 'Franklin 11', 'ferpinoa@yahoo.com.ar', '1589323829'),
	('Susana', 'Castro', 'Fragata Sarmiento 224', 'susimania@gmail.com', '22980932'),
	('Sebastian', 'Churros', 'Rosario 554', 'sebas_2017@yahoo.com', '1587478439');


INSERT INTO reservas (FECHA_INICIO, FECHA_SALIDA, FKHABITACION, FKHUESPED)
VALUES
	('2017-06-10', '2017-12-05T21:50', 1, 1),
	('2017-06-10', '2017-06-24', 2, 3),
	('2017-06-10', '2017-06-24', 3, 4),
	('2017-06-10', '2017-06-24', 4, 2),
	('2017-06-10', '2017-06-24', 5, 6),
	('2017-06-10', '2017-06-24', 6, 5);