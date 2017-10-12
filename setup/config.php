<?php 

//sesiones
session_start();

//base de datos
$db = mysqli_connect('localhost', 'root', '', 'hotel_db');
mysqli_set_charset($db, 'utf8');

//botones
$botones = array( 	
	'reservas' => ['Reservas','glyphicon glyphicon-star'], 
	'habitaciones' => ['Habitaciones','glyphicon glyphicon-home'], 
	'perfil' => ['Perfil','glyphicon glyphicon-user'] 
);

if( isset( $_GET['cat'] ) ){
	$seccion = $_GET['cat'];
}else{
	$seccion = 'reservas';
}
$hay_error = false;

//switch
switch ( $seccion ) {
	case 'reservas': 
		$archivo = 'reservas.php';

	break;
	case 'habitaciones': 
		$archivo = 'habitaciones.php'; 
	break;	
	case 'perfil': 
		$archivo = 'perfil.php'; 
	break;	
	case 'logout': 
		$archivo = 'logout.php'; 
	break;
	default: 
		$hay_error= true;
		$archivo = 'reservas.php';
}