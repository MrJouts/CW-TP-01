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

	/**
	 * Realiza una busqueda en la base de datos que coincida con los datos 
	 * ingresados por el usuario.
	 *
	 * @param string $usuario
	 * @param string $password
	 * @return Usuario|null
	 */
	public static function getByUserAndPass($usuario, $password)
	{
		$db = DBConnection::getConnection();
		$query = "SELECT * 
			FROM usuarios 
			WHERE ( 
				NOMBRE_USUARIO = :user
				OR EMAIL = :user
			)
			AND PASSWORD = :pass
			LIMIT 1";
		$stmt = $db->prepare($query);

		$stmt->execute([
			'user' => $usuario,
			'pass' => $password
		]);

		if($row = $stmt->fetch()) {
			$user = new Usuario;
			$user->loadDataFromArray($row);

			return $user;
		} else {
			return null;
		}
	}

}