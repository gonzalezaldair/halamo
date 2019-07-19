<?php
require_once 'conexion.php';

class LoginModelo {
	public static function mdllogin($tabla, $datosmodelo)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE usuario = :usuario");

		$stmt -> bindParam(":usuario", $datosmodelo["usuario"], PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();
	}
}