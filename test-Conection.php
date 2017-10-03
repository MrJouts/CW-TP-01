<?php 

require 'autoload.php';

DBConnection::getConnection();



try {
	$per = new Usuario('cmartinez@medicus.com','1234');
	//Header('Location:index.php');

} catch(Exception $e) {
 echo "error" . $e->getMessage();

}

