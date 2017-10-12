<?php 

/**
* Clase Huesped
*/
class Huesped implements JsonSerializable
{
	
	public $id_huesped;
	public $nombre;
	public $apellido;
	public $nombreCompleto;
	public $direccion;
	public $email;
	public $telefono;

	/**
	 * Constructor de Huesped.
	 */
	function __construct($id = null)
	{
		if($id !== null) {
			$db = DBConnection::getConnection();
			$query = "SELECT * FROM huespedes
						WHERE ID_HUESPED = ?";
			$stmt = $db->prepare($query);
			$stmt->execute([$id]);

			$fila = $stmt->fetch();
			$this->loadDataFromArray($fila);
		}
	}

	/**
	 * Implementación del método de la interface JsonSerializable.
	 */
	public function jsonSerialize()
	{
		return [
			'id_huesped' => $this->id_huesped,
			'nombre' => $this->nombre,
			'apellido' => $this->apellido,
			'direccion' => $this->direccion,
			'email' => $this->email,
			'telefono' => $this->telefono
		];
	}

	/**
	 * Carga todos los datos de una fila en un objeto
	 *
	 * @param array $fila
	 */
	public function loadDataFromArray($fila)
	{
		$this->id_huesped = $fila['ID_HUESPED'];
		$this->nombre = $fila['NOMBRE'];
		$this->apellido = $fila['APELLIDO'];
		$this->direccion = $fila['DIRECCION'];
		$this->email = $fila['EMAIL'];
		$this->telefono = $fila['TELEFONO'];
	}


	/**
	 * Retorna el nombre completo de un huesped
	 * 
	 */
	public static function getNombreCompleto($id = null) 
	{
		$db = DBConnection::getConnection();
		$query = "SELECT CONCAT(NOMBRE,' ', APELLIDO)as nombreCompleto FROM huespedes WHERE ID_HUESPED = ? LIMIT 1";
		$stmt = $db->prepare($query);
		$stmt->execute([$id]);

		if ($fila = $stmt->fetch()) {
			$huesped = new Huesped;
			//$huesped->loadDataFromArray($fila);
			$huesped->nombreCompleto = $fila['nombreCompleto'];

			return $huesped->nombreCompleto;
		} else {
			return null;
		}
	}

	/**
	 * Carga la huesped en la base de datos
	 * 
	 */
	public static function cargarHuesped($formData) 
	{
		$db = DBConnection::getConnection();
		$query = "INSERT INTO huespedes (NOMBRE, APELLIDO, DIRECCION, EMAIL, TELEFONO)
			VALUES (:nombre, :apellido, :direccion, :email, :telefono)";
		$stmt = $db->prepare($query);
		$exito = $stmt->execute([
			'nombre' => $formData['NOMBRE'],
			'apellido' => $formData['APELLIDO'],
			'direccion' => $formData['DIRECCION'],
			'email' => $formData['EMAIL'],
			'telefono' => $formData['TELEFONO'],
		]);

		if($exito) {
			$obj = new Huesped;

			$formData['ID_HUESPED'] = $db->lastInsertId();
			$obj->loadDataFromArray($formData);

			return $obj->id_huesped;
		} else {
			echo 'error al cargar el huesped';
		}

	}

	public static function editarHuesped($id,$formData) 
	{
		if($id !== null) {
			$db = DBConnection::getConnection();
			$query = "UPDATE huespedes
				SET NOMBRE 			= :nombre,
						APELLIDO 		= :apellido,
						DIRECCION  	= :direccion,
						EMAIL				= :email,
						TELEFONO		= :telefono
				WHERE ID_HUESPED = :id";


			$stmt = $db->prepare($query);
			$exito = $stmt->execute([
				'nombre' => $formData['NOMBRE'],
				'apellido' => $formData['APELLIDO'],
				'direccion' => $formData['DIRECCION'],
				'email' => $formData['EMAIL'],
				'telefono' => $formData['TELEFONO'],
				'id' => $id,
			]);

			if ($exito) {
				return "ok";
			} else {
				return "error";
			}
		}
	} 



}
