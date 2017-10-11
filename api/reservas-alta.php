<?php 

require_once '../autoload.php';

$entrada = file_get_contents('php://input');
$data = json_decode($entrada, true);

$reserva = Reserva::cargarReserva($data);

echo json_encode($reserva);
