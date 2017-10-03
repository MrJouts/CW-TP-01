<?php 

//sesiones
session_start();

//base de datos
$db = mysqli_connect('localhost', 'root', '', 'hotel_db');
mysqli_set_charset($db, 'utf8');

//botones
$botones = array( 	
	'reservas' => 'Reservas', 
	'habitaciones' => 'Habitaciones', 
	'perfil' => 'Perfil' 
);

if( isset( $_GET['cat'] ) ){
	$seccion = $_GET['cat']; //reg || recuperar
}else{
	$seccion = 'reservas';
}
$hay_error = false;

//switch
switch ( $seccion ) {
	case 'reservas': 
		$archivo = 'reservas.php'; 
		$icono = 'glyphicon glyphicon-calendar';
	break;
	case 'habitaciones': 
		$archivo = 'habitaciones.php'; 
		$icono = 'glyphicon glyphicon-film';
	break;	
	case 'perfil': 
		$archivo = 'perfil.php'; 
		$icono = 'glyphicon glyphicon-user';
	break;
	default: 
		$hay_error= true;
		$archivo = 'reservas.php';
		$icono = 'glyphicon glyphicon-calendar';
}