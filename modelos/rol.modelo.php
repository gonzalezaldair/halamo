<?php

require_once 'conexion.php';
class RolModelo{
	public function mdlmostrarrol($tabla, $item,$valor)
	{
		if($item != null){
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY Id DESC");

				$stmt -> bindParam(":".$item, $valor);

				$stmt -> execute();

				return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY Id DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;
	}

	public function mdlRolfuncionalidad($tabla, $item, $valor)
	{
		if($item != null){
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY $item DESC");

				$stmt -> bindParam(":".$item, $valor);

				$stmt -> execute();

				return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;
	}


	public function mdlcrearolfuncionalidad($tabla, $datosmodelo)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (ROL, FUNCIONALIDAD) VALUES (:rol, :funcionalidad)");
		$stmt -> bindParam(":rol", $datosmodelo["rol"], PDO::PARAM_INT);
		$stmt -> bindParam(":funcionalidad", $datosmodelo["funcionalidad"], PDO::PARAM_INT);
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



	public function mdlcrearrol($tabla, $datosmodelo)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Nombre, Descripcion) VALUES (:nombre, :descripcion)");
		$stmt -> bindParam(":nombre", $datosmodelo["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":descripcion", $datosmodelo["descripcion"], PDO::PARAM_STR);
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
	public function mdlactualizarrol($tabla, $datosmodelo)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Nombre= :nombre,Descripcion= :descripcion WHERE Id = :id");
		$stmt -> bindParam(":nombre", $datosmodelo["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":descripcion", $datosmodelo["descripcion"], PDO::PARAM_INT);
		$stmt -> bindParam(":id", $datosmodelo["id"], PDO::PARAM_STR);
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


	public static function mdlaeliminarrol($tabla, $valor)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE Id = :id");
		$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);
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