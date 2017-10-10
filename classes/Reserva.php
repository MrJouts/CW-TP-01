<?php 

/**
* Reservas
*/
class Reserva implements JsonSerializable
{
	
	public $id_reserva;
	public $fecha_inicio;
	public $fecha_salida;
	public $fk_habitacion;
	public $fk_huesped;

	function __construct($id = null)
	{
		if($id !== null) {
			$db = DBConnection::getConnection();
			$query = "SELECT * FROM reservas
						WHERE ID_RESERVAS = ?";
			$stmt = $db->prepare($query);
			$stmt->execute([$id]);

			$fila = $stmt->fetch();
			$this->loadDataFromArray($fila);

			/*$this->id_pelicula = $id;
			$this->nombre = $fila['nombre'];
			$this->genero = $fila['genero'];
			$this->precio = $fila['precio'];
			$this->fecha = $fila['fecha'];
			$this->descripcion = $fila['descripcion'];*/
		}
	}


	public function jsonSerialize()
	{
		return [
			'id_reserva' => $this->id_reserva,
			'fecha_inicio' => $this->fecha_inicio,
			'fecha_salida' => $this->fecha_salida,
			'fk_habitacion' => $this->fk_habitacion,
			'fk_huesped' => $this->fk_huesped
		];
	}


	public function loadDataFromArray($fila)
	{
		$this->id_reserva = $fila['ID_RESERVA'];
		$this->fecha_inicio = $fila['FECHA_INICIO'];
		$this->fecha_salida = $fila['FECHA_SALIDA'];
		$this->fk_habitacion = $fila['FKHABITACION'];
		$this->fk_huesped = $fila['FKHUESPED'];
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

			$obj->fk_huesped = Huesped::getNombreCompleto($obj->fk_huesped);
			$obj->fk_habitacion = Habitacion::getNumeroHabitacion($obj->fk_habitacion);
			
			$salida[] = $obj;
		}
		return $salida;
	}

	public static function cargarReserva($formData) 
	{
		$db = DBConnection::getConnection();
		$query = "INSERT INTO reservas (FECHA_INICIO, FECHA_SALIDA, FKHABITACION, FKHUESPED)
			VALUES (:fecha_inicio, :fecha_salida, :fk_habitacion, :fk_huesped)";
		$stmt = $db->prepare($query);
		$exito = $stmt->execute([
			'fecha_inicio' => $formData['FECHA_INICIO'],
			'fecha_salida' => $formData['FECHA_SALIDA'],
			'fk_habitacion' => '1',
			'fk_huesped' => '1'
		]);

		if($exito) {
			$obj = new Reserva;
			// Obtenemos el id del
			// registro que insertamos.
			$formData['ID_RESERVA'] = $db->lastInsertId();
			$formData['FKHABITACION'] = '1';
			$formData['FKHUESPED'] = '1';
			$obj->loadDataFromArray($formData);

			return $obj;


		} else {
			echo "error";
		}
	}

}