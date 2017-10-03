<?php 

class Usuario implements JsonSerializable
{
	public $id_usuario;
	public $nombre;
	public $email;
	public $password;

	public function __construct($email = null, $password = null) 
	{
		if ($email !== null && $password !== null) {
			$db = DBConnection::getConnection();
			$query = "SELECT * 
				FROM usuario 
				WHERE email = ?
				AND password = ?";
			$stmt = $db->prepare($query);
			$stmt->execute([$email, $password]);

			
				$fila = $stmt->fetch();

				if ($fila) {
					echo "success";

					$this->id_usuario = $fila['ID'];
					$this->nombre = $fila['NOMBRE'];
					$this->email = $fila['EMAIL'];
					$this->password = $fila['PASSWORD'];
					
				} else {
					throw new Exception('Datos incorrectos');
				}
		
			
		}
	}

	public function jsonSerialize()
	{
		return [
			'id_usuario' => $this->id_usuario,
			'nombre' => $this->nombre,
			'email' => $this->email,
			'password' => $this->password
		];
	}

	// public function loadDataFromArray($fila)
	// {
	// 	$this->id_pelicula 	= $fila['id_pelicula'];
	// 	$this->nombre 		= $fila['nombre'];
	// 	$this->precio 		= $fila['precio'];
	// 	$this->genero 		= $fila['genero'];
	// 	$this->fecha 		= $fila['fecha'];
	// 	$this->descripcion 	= $fila['descripcion'];
	// }

}