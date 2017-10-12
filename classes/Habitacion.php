<?php 

/**
* Habitacion
*/
class Habitacion implements JsonSerializable
{
	
	public $id_habitacion;
	public $numero_habitacion;
	public $tipo;
	public $estado;


	function __construct($id = null)
	{
		if($id !== null) {
			$db = DBConnection::getConnection();
			$query = "SELECT * FROM habitaciones
						WHERE ID_HABITACION = ?";
			$stmt = $db->prepare($query);
			$stmt->execute([$id]);

			$fila = $stmt->fetch();
			$this->loadDataFromArray($fila);
		}
	}


	public function jsonSerialize()
	{
		return [
			'id_habitacion' => $this->id_habitacion,
			'numero_habitacion' => $this->numero_habitacion,
			'tipo' => $this->tipo,
			'estado' => $this->estado
		];
	}

	public function loadDataFromArray($fila)
	{
		$this->id_habitacion = $fila['ID_HABITACION'];
		$this->numero_habitacion = $fila['NUMERO_HABITACION'];
		$this->tipo = $fila['TIPO'];
		$this->estado = $fila['ESTADO'];
	}

	public static function getNumeroHabitacion( $id = null) 
	{
		$db = DBConnection::getConnection();
		$query = "SELECT NUMERO_HABITACION FROM habitaciones WHERE ID_HABITACION = ? ";
		$stmt = $db->prepare($query);
		$stmt->execute([$id]);

		if ($fila = $stmt->fetch()) {
			$habitacion = new Habitacion;
			$habitacion->numero_habitacion = $fila['NUMERO_HABITACION'];

			return $habitacion->numero_habitacion;
		} else {
			return "Error al obtener el numero de la habitacion";
		}
	}

	/**
	 * Retorna todas las habitaciones
	 *
	 * @return array|Habitacion[]
	 */
	public static function getAll() 
	{
		$db = DBConnection::getConnection();
		$query = "SELECT * FROM habitaciones";
		$stmt = $db->prepare($query);
		$stmt->execute();
		
		$salida = [];

		while($row = $stmt->fetch()) {
			$obj = new Habitacion;
			$obj->loadDataFromArray($row);
			$salida[] = $obj;
		}
		return $salida;
	}

}

