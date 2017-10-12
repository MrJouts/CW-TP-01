<?php

header('Content-Type: application/json; charset=utf-8');



if($_SERVER['REQUEST_METHOD'] == "GET") {
	if(isset($_GET['id'])) {
		require 'reservas-leer-1.php';
	} else {
		require 'reservas-leer.php';
	}
} else if($_SERVER['REQUEST_METHOD'] == "POST") {
	require 'reservas-alta.php';
} else if($_SERVER['REQUEST_METHOD'] == "PUT") {
	require 'reservas-editar.php';
} else if($_SERVER['REQUEST_METHOD'] == "DELETE") {
	require 'reservas-eliminar.php';
}