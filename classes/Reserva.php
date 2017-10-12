<?php 

/**
* Clase Reservas
*/
class Reserva implements JsonSerializable
{
	
	public $id_reserva;
	public $fecha_inicio;
	public $fecha_salida;
	public $fk_habitacion;
	public $fk_huesped;

	/**
	 * Constructor de Resevas.
	 */
	function __construct($id = null)
	{
		if($id !== null) {
			$db = DBConnection::getConnection();
			$query = "SELECT * FROM reservas
						WHERE ID_RESERVA = ?";
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
			'id_reserva' => $this->id_reserva,
			'fecha_inicio' => $this->fecha_inicio,
			'fecha_salida' => $this->fecha_salida,
			'fk_habitacion' => $this->fk_habitacion,
			'fk_huesped' => $this->fk_huesped
		];
	}

	/**
	 * Carga todos los datos de una fila en un objeto
	 *
	 * @param array $fila
	 */
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

	/**
	 * Carga la reserva en la base de datos
	 * 
	 */
	public static function cargarReserva($formData) 
	{
		$db = DBConnection::getConnection();

		$FK_HUESPED = Huesped::cargarHuesped($formData);

		$query = "INSERT INTO reservas (FECHA_INICIO, FECHA_SALIDA, FKHABITACION, FKHUESPED)
			VALUES (:fecha_inicio, :fecha_salida, :fk_habitacion, :fk_huesped)";
		$stmt = $db->prepare($query);
		$exito = $stmt->execute([
			'fecha_inicio' => $formData['FECHA_INICIO'],
			'fecha_salida' => $formData['FECHA_SALIDA'],
			'fk_habitacion' => $formData['HABITACION'],
			'fk_huesped' => $FK_HUESPED,
		]);

		if($exito) {
			$obj = new Reserva;

			$formData['ID_RESERVA'] = $db->lastInsertId();
			$formData['FKHABITACION'] = $formData['HABITACION'];
			$formData['FKHUESPED'] = $FK_HUESPED;
			$obj->loadDataFromArray($formData);
			$obj->huesped = $formData['NOMBRE'];

			return $obj; 

		} else {
			return null;
		}
	}


	public static function getReservaCompleta($id = null) 
	{
		if($id !== null) {
			$db = DBConnection::getConnection();
			$query = "SELECT * FROM reservas
						WHERE ID_RESERVA = ?";
			$stmt = $db->prepare($query);
			$stmt->execute([$id]);

			$salida = [];

			$fila = $stmt->fetch();

			$objReserva = new Reserva;
			$objReserva->loadDataFromArray($fila);
			$objHabitacion = new Habitacion($objReserva->fk_habitacion);
			$objHuesped = new Huesped($objReserva->fk_huesped);

			$salida['reserva'] = $objReserva;
			$salida['habitacion'] = $objHabitacion;
			$salida['huesped'] = $objHuesped;

			return $salida;
		}
	} 

	public static function editarReserva($id = null, $formData) 
	{
		if($id !== null) {

			Huesped::editarHuesped($formData['ID_HUESPED'],$formData);

			$db = DBConnection::getConnection();
			$query = "UPDATE reservas
				SET FECHA_INICIO 		= :fecha_inicio,
						FECHA_SALIDA 		= :fecha_salida,
						FKHABITACION  	= :fk_habitacion,
						FKHUESPED				= :fk_huesped
				WHERE ID_RESERVA = :id";


			$stmt = $db->prepare($query);

			$exito = $stmt->execute([
				'fecha_inicio' => $formData['FECHA_INICIO'],
				'fecha_salida' => $formData['FECHA_SALIDA'],
				'fk_habitacion' => $formData['HABITACION'],
				'fk_huesped' => $formData['ID_HUESPED'],
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



