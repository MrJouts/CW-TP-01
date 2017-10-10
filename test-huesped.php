<?php 

require_once 'autoload.php';


//$huesped = new Huesped('1');


$huesped2 = Huesped::getNombreCompleto('1');

$habitacion = Habitacion::getNumeroHabitacion('2');

$test = Huesped::test('1');


$datos = [
	'FECHA_INICIO' => '2017-01-01',
	'FECHA_SALIDA' => '2017-01-01',
];


$reserva = Reserva::cargarReserva($datos);


// echo '<pre>';
// print_r($huesped);
// echo '</pre>';


echo '<pre>';
print_r($huesped2);
echo '</pre>';

echo '<pre>';
print_r($habitacion);
echo '</pre>';

echo '<pre>';
print_r($reserva);
echo '</pre>';



print_r($test);
