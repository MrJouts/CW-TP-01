<?php 

require_once 'autoload.php';


//$huesped = new Huesped('1');


// $huesped2 = Huesped::getNombreCompleto('1');

// $habitacion = Habitacion::getNumeroHabitacion('2');


$datos = [
	'FECHA_INICIO' => '2017-01-01',
	'FECHA_SALIDA' => '2017-01-01',
	'NOMBRE' => 'Juan',
	'APELLIDO' => 'Perez',
	'DIRECCION' => 'Calle 123',
	'EMAIL' => 'j@mail.com',
	'TELEFONO' => '438972274',
	'HABITACION' => '3'
];


$reserva = Reserva::cargarReserva($datos);



// $data = [
// 	'NOMBRE' => 'Juan',
// 	'APELLIDO' => 'Perez',
// 	'DIRECCION' => 'Calle 123',
// 	'EMAIL' => 'j@mail.com',
// 	'TELEFONO' => '438972274',
// ];

// $huesped3 = Huesped::cargarHuesped($data);



// echo '<pre>';
// print_r($huesped3);
// echo '</pre>';
// // echo '<pre>';
// // print_r($huesped);
// // echo '</pre>';


// echo '<pre>';
// print_r($huesped2);
// echo '</pre>';

// echo '<pre>';
// print_r($habitacion);
// echo '</pre>';

echo '<pre>';
print_r($reserva);
echo '</pre>';


