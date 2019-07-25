<?php

require_once "conexion.php";

class HabitacionModelo{
	public function mdlmostrarhabitacion($tabla, $item,$valor)
	{
		if($item != null){
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY $item DESC");

				$stmt -> bindParam(":".$item, $valor);

				$stmt -> execute();

				return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY Codigo DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;
	}


	public static function mdlcrearhabitacion($tabla, $datosmodelo)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Num_Habitacion, TIPO_HABITACION) VALUES (:numhab, :tipohab)");
		$stmt -> bindParam(":numhab", $datosmodelo["numhab"], PDO::PARAM_INT);
		$stmt -> bindParam(":tipohab", $datosmodelo["tipohab"], PDO::PARAM_INT);
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

	public static function mdlupdhabitacion($tabla, $datosmodelo)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Num_Habitacion= :numhab,TIPO_HABITACION= :tipohab WHERE Codigo = :codigo");
		$stmt -> bindParam(":numhab", $datosmodelo["numhab"], PDO::PARAM_INT);
		$stmt -> bindParam(":tipohab", $datosmodelo["tipohab"], PDO::PARAM_INT);
		$stmt -> bindParam(":codigo", $datosmodelo["codigo"], PDO::PARAM_INT);
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


	public static function mdldelhabitacion($tabla, $datosmodelo)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE Codigo = :codigo");
		$stmt -> bindParam(":codigo", $datosmodelo, PDO::PARAM_INT);
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