<?php
require_once 'conexion.php';


class registroModelo{
	public function mdlformregistropersona($tabla, $datosmodelo)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Num_Documento, Nombre, Apellido,  TIPO_DOC) VALUES (:cedula, :nombre, :apellido, :tipodoc)");
		$stmt -> bindParam(":cedula", $datosmodelo["cedula"], PDO::PARAM_STR);
		$stmt -> bindParam(":nombre", $datosmodelo["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":apellido", $datosmodelo["apellido"], PDO::PARAM_STR);
		$stmt -> bindParam(":tipodoc", $datosmodelo["tipodoc"], PDO::PARAM_INT);
		if($stmt->execute())
		{
			return "ok";
		}
		else
		{
			$err = $stmt->errorInfo();
			return $err[2];
		}
		$stmt -> close();
		$stmt = null;
	}

	public function mdlformregistrouser($tabla, $datosmodelo)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, contrasena, Agregado, PERSONA) VALUES (:usuario, :contrasena,  :agregado, :persona)");
		$stmt -> bindParam(":usuario", $datosmodelo["correo"], PDO::PARAM_STR);
		$stmt -> bindParam(":contrasena", $datosmodelo["contrasena"], PDO::PARAM_STR);
		$stmt -> bindParam(":agregado", $datosmodelo["agregado"], PDO::PARAM_STR);
		$stmt -> bindParam(":persona", $datosmodelo["persona"], PDO::PARAM_STR);
		if($stmt->execute())
		{
			return "ok";
		}
		else
		{
			$err = $stmt->errorInfo();
			return $err[2];
		}
		$stmt -> close();
		$stmt = null;
	}
}