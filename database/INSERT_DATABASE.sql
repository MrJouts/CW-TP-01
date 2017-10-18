USE hotel_db;

INSERT INTO usuarios (NOMBRE, APELLIDO, NOMBRE_USUARIO, EMAIL, PASSWORD)
VALUES 
	('Emiliano', 'Hotes', 'eh', 'emiliano.hotes@davinci.edu.ar', '1234'),
	('Santiago', 'Gallino', 'sg', 'santiago.gallino@davinci.edu.ar', '1234');

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
	('2017-06-10', '2017-12-05', 1, 1),
	('2017-06-10', '2017-06-24', 2, 4),
	('2017-06-10', '2017-06-24', 3, 6),
	('2017-06-10', '2017-06-24', 4, 2),
	('2017-06-10', '2017-06-24', 5, 3),
	('2017-06-10', '2017-06-24', 6, 5);