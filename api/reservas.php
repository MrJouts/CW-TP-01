<?php

header('Content-Type: application/json; charset=utf-8');



if($_SERVER['REQUEST_METHOD'] == "GET") {
	require 'reservas-leer.php';
} else if($_SERVER['REQUEST_METHOD'] == "POST") {
	require 'reservas-alta.php';
} else if($_SERVER['REQUEST_METHOD'] == "PUT") {
	require 'reservas-editar.php';
}