<?php 

/**
* Huesped
*/
class Huesped implements JsonSerializable
{
	
	public $id_huesped;
	public $nombre;
	public $apellido;
	public $nombreCompleto;
	public $dierccion;
	public $email;
	public $telefono;

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
	 * Retorna todas las reservas de la base de datos
	 * 
	 * @return array|Reservas[] 
	 */
	public static function getAll()
	{
		$db = DBConnection::getConnection();
		$query = "SELECT * FROM reservas";
		$stmt = $db->prepare($query);
		$stmt->execute();
		
		$salida = [];

		while($reserva = $stmt->fetch()) {
			$obj = new Reserva;
			$obj->loadDataFromArray($reserva);
			$salida[] = $obj;
		}
		return $salida;
	}


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




		// $salida = [];

		// while($fila = $stmt->fetch()) {
		// 	$obj = new Huesped;
		// 	$obj->loadDataFromArray($fila);
		// 	$salida[] = $obj;
		// }
		// return $salida;
	}

	public static function test($id = null) {
		echo $id;
	}

}