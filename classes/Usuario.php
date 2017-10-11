<?php 

/**
* Clase Usuario
*/
class Usuario implements JsonSerializable
{
	public $id_usuario;
	public $nombre;
	public $apellido;
	public $nombre_usuario;
	public $email;
	public $password;

	/**
	 * Implementación del método de la interface JsonSerializable.
	 */
	public function jsonSerialize()
	{
		return [
			'id_usuario' => $this->id_usuario,
			'nombre' => $this->nombre,
			'apellido' => $this->apellido,
			'nombre_usuario' => $this->nombre_usuario,
			'email' => $this->email,
			'password' => $this->password
		];
	}

	/**
	 * Carga todos los datos de una fila en un objeto
	 *
	 * @param array $row
	 */
	public function loadDataFromArray($row)
	{
		$this->id_usuario = $row['ID'];
		$this->nombre = $row['NOMBRE'];
		$this->apellido = $row['APELLIDO'];
		$this->nombre_usuario = $row['NOMBRE_USUARIO'];
		$this->email = $row['EMAIL'];
		$this->password = $row['PASSWORD'];
	}

	/*
	 * Validacion de datos
	 */
	public static function userValidate($usuario = null, $password = null) 
	{
		if ($usuario !== null && $password !== null) {
			$db = DBConnection::getConnection();
			$query = "SELECT * 
				FROM usuario 
				WHERE ( 
					NOMBRE_USUARIO = ?
					OR EMAIL = ?
				)
				AND PASSWORD = ?";
			$stmt = $db->prepare($query);
			$stmt->execute([$usuario, $usuario, $password]);

			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($row) {

				$_SESSION['nombre'] = $row['NOMBRE'];
				$_SESSION['apellido'] = $row['APELLIDO'];
				$_SESSION['nombre_usuario'] = $row['NOMBRE_USUARIO'];
				$_SESSION['email'] = $row['EMAIL'];
				$_SESSION['password'] = $row['PASSWORD'];

				$obj = new Usuario;
				$obj->loadDataFromArray($row);
				echo json_encode($obj);
				
			} else {
				echo 'Los datos ingresados son incorrectos';
			}		
		}
	}


}