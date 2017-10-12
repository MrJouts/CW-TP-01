<?php 

require_once '../autoload.php';

$habitaciones = Habitacion::getAll();

echo json_encode($habitaciones, JSON_PRETTY_PRINT);

