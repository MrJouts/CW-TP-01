<?php 	

require_once '../autoload.php';

$id = $_GET['id'];

$reserva = Reserva::getReservaCompleta($id);

echo json_encode($reserva);