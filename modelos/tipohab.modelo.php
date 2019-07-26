<?php

require_once "conexion.php";

class TipoHabModelo{
	public function mdlmostrartipohab($tabla, $item,$valor)
	{
		if($item != null){
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY $item DESC");

				$stmt -> bindParam(":".$item, $valor);

				$stmt -> execute();

				return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY Id_th DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;
	}

	public function mdlmostrarhabtipohab($tabla, $item,$valor)
	{

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY $item DESC");

		$stmt -> bindParam(":".$item, $valor);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
	}

	public function mdlcreartipoh($tabla, $datosmodelo)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO tipo_habitacion(Descripcion, Precio) VALUES (:descripcion, :precio)");
		$stmt -> bindParam(":descripcion", $datosmodelo["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":precio", $datosmodelo["precio"]);
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
	public function mdlupdtipoh($tabla, $datosmodelo)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Descripcion = :nombre, Precio = :precio WHERE Id_th = :tipoh");
		$stmt -> bindParam(":nombre", $datosmodelo["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":precio", $datosmodelo["precio"]);
		$stmt -> bindParam(":tipoh", $datosmodelo["id"]);
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


	public function mdldeltipoh($tabla, $valor)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE Id_th = :id");
		$stmt -> bindParam(":id", $valor);
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