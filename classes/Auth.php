<?php

/**
 * Clase administradora de la Autenticación.
 */
class Auth
{
	/**
	 * Intenta loguear al usuario con los datos
	 * provistos.
	 *
	 * @param string $usuario
	 * @param string $password
	 */
	public static function login($usuario, $password)
	{
		$user = Usuario::getByUserAndPass($usuario, $password);

		if($user !== null) {
			$_SESSION['usuario'] = $user;
			return $user;
		} else {
			return false;
		}
	}

	public static function isLogged()
	{
		return isset($_SESSION['usuario']) && !empty($_SESSION['usuario']);
	}

	public static function getUser()
	{
		return $_SESSION['usuario'];
	}

}