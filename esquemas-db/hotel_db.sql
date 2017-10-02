DROP DATABASE IF EXISTS hotel_db;
CREATE DATABASE hotel_db;
USE hotel_db;

CREATE TABLE habitaciones( 
	ID_HABITACIONES INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	NUMERO_HABITACION SMALLINT(4) NOT NULL,
	TIPO ENUM('matrimonial', 'single', 'double'),
	ESTADO ENUM('ocupada', 'reservada', 'libre')
);

CREATE TABLE huespedes( 
	ID_HUESPEDES INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	NOMBRE VARCHAR(50) NOT NULL,
	APELLIDO VARCHAR(50) NOT NULL,
	DNI VARCHAR(50),
	DIRECCION VARCHAR(50),
	EMAIL VARCHAR(100),
	TELEFONO INT 
);

CREATE TABLE reservas( 
	ID_RESERVAS INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	FECHA_INICIO DATETIME,
	FECHA_SALIDA DATETIME,
	FKHABITACION INT UNSIGNED,
	FKHUESPED INT UNSIGNED,

	FOREIGN KEY (FKHABITACION) REFERENCES habitaciones(ID_HABITACIONES),
	FOREIGN KEY (FKHUESPED) REFERENCES huespedes(ID_HUESPEDES)
);



INSERT INTO habitaciones (NUMERO_HABITACION, TIPO, ESTADO)
VALUES
	('101', 'matrimonial', 'libre'),
	('101', 'single', 'ocupada'),
	('101', 'double', 'reservada');

INSERT INTO huespedes (NOMBRE, APELLIDO, DNI, DIRECCION, EMAIL, TELEFONO)
VALUES
	('Carlos', 'Dacunto', NULL, NULL, NULL, NULL);


INSERT INTO reservas (FECHA_INICIO, FECHA_SALIDA, FKHABITACION, FKHUESPED)
VALUES
	('2017-06-10', '2017-06-24', 1, 1),
	('2017-06-10', '2017-06-24', 1, 1),
	('2017-06-10', '2017-06-24', 1, 1);