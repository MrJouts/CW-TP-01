<?php 

require_once '../autoload.php';

$entrada = file_get_contents('php://input');

$reservas = Reserva::getAll();

echo json_encode($reservas, JSON_PRETTY_PRINT);

