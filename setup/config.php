<?php 

//base de datos
$db = mysqli_connect('localhost', 'root', '', 'hotel_db');
mysqli_set_charset($db, 'utf8');

//botones
$botones = array( 	
	'reservas' => ['Reservas','glyphicon glyphicon-bed']
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

	case 'logout': 
		$archivo = 'logout.php'; 
	break;

	default: 
		$hay_error= true;
		$archivo = 'reservas.php';
}