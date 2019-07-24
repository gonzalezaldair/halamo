<?php

require_once "conexion.php";

class UsuarioModelo{
	public function mdlmostrarusuario($tabla, $item,$valor)
	{
		if($item != null){
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY $item DESC");

				$stmt -> bindParam(":".$item, $valor);

				$stmt -> execute();

				return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY usuario DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;
	}



	public function mdlcrearusuario($tabla, $datosmodelo)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, contrasena, ROL, Agregado, PERSONA) VALUES (:usuario, :contrasena, :rol, :agregado, :persona)");
		$stmt -> bindParam(":usuario", $datosmodelo["correo"], PDO::PARAM_STR);
		$stmt -> bindParam(":contrasena", $datosmodelo["contrasena"], PDO::PARAM_STR);
		$stmt -> bindParam(":rol", $datosmodelo["rol"], PDO::PARAM_INT);
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
	public function mdlactualizarusuario($tabla, $datosmodelo)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET contrasena= :contrasena,ROL= :rol WHERE usuario = :usuario");
		$stmt -> bindParam(":contrasena", $datosmodelo["contrasena"], PDO::PARAM_STR);
		$stmt -> bindParam(":rol", $datosmodelo["rol"], PDO::PARAM_INT);
		$stmt -> bindParam(":usuario", $datosmodelo["usuario"], PDO::PARAM_STR);
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


	public static function mdlaeliminarusuario($tabla, $valor)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE usuario = :usuario");
		$stmt -> bindParam(":usuario", $valor, PDO::PARAM_STR);
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