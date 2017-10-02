<?php 

$db = mysqli_connect('localhost', 'root', '', 'hotel_test');


$entrada = file_get_contents('php://input');
$data = json_decode($entrada, true);

$numeroHabitacion = mysqli_real_escape_string($db, $data['numeroHabitacion']);


$query = "INSERT into habitaciones (NUMERO) 
	VALUES ('$numeroHabitacion')";

$exito = mysqli_query($db, $query);