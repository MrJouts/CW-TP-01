<?php 

require_once '../autoload.php';

$reservas = Reserva::getAll();

echo json_encode($reservas, JSON_PRETTY_PRINT);

