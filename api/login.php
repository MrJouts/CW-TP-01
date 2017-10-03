<?php

include '../setup/config.php';

header('Content-Type: application/json; charset=utf-8');

$entrada = file_get_contents('php://input');
$loginData = json_decode($entrada, true); 

$usuario = mysqli_real_escape_string($db, $loginData['usuario']);
$password = mysqli_real_escape_string($db, $loginData['password']);

$query = "SELECT * FROM usuarios
		WHERE NOMBRE_USUARIO = '$usuario'
		AND   PASSWORD = '$password'
		LIMIT 1";

$res = mysqli_query($db, $query);

$fila = mysqli_fetch_assoc($res);

print_r($fila);