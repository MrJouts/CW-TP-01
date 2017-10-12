<?php 

require_once '../autoload.php';

$entrada = file_get_contents('php://input');
$data = json_decode($entrada, true);

$id = $_GET['id'];
$reserva = Reserva::eliminarReserva($id,$data);

echo json_encode($reserva);