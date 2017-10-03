<?php 

/**
* Reservas
*/
class Reservas
{
	
	public $id_reservas;
	public $feha_inicio;
	public $fecha_fin;
	public $habitacion;
	public $huesped;

	function __construct($id = null)
	{
		if($id !== null) {
			$db = DBConnection::getConnection();
			$query = "SELECT * FROM peliculas
						WHERE id_pelicula = ?";
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
}