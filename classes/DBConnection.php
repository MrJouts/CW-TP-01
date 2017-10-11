<?php 
/**
 * Clase de conexión con la base en modo Singleton.
 */
class DBConnection
{
	/** @var PDO conexión a la base de datos */
	private static $db;

	private function __construct()
	{}


	/**
	 * Retorna una instancia de PDO en modo Singleton
	 *
	 * @return PDO
	 */
	public static function getConnection()
	{
		if (DBConnection::$db === null) {
			$db_host = "localhost";
			$db_user = "root";
			$db_pass = "";
			$db_base = "hotel_db";
			$db_dsn = "mysql:host=$db_host;dbname=$db_base;charset=utf8";
			DBConnection::$db = new PDO($db_dsn, $db_user, $db_pass);
		}
		return DBConnection::$db;
	}
}