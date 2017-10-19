<?php

require_once '../setup/config.php';
require_once '../autoload.php';

$entry = file_get_contents('php://input');
$loginData = json_decode($entry, true); 

$usuario = Auth::login($loginData['usuario'],$loginData['password']);

echo json_encode($usuario);