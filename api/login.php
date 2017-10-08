<?php

include '../setup/config.php';
include '../autoload.php';


$entry = file_get_contents('php://input');
$loginData = json_decode($entry, true); 

$usuario = Usuario::userValidate($loginData['usuario'],$loginData['password']);

