<?php

require_once "conexion.php";

class PersonaModelo{
	public function mdlmostrarpersona($tabla, $item,$valor)
	{
		if($item != null){
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY Num_Documento DESC");

				$stmt -> bindParam(":".$item, $valor);

				$stmt -> execute();

				return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY Num_Documento DESC");

			$stmt -> execute();

			return $stmt -> fetchAll(PDO::FETCH_ASSOC);

		}

		$stmt -> close();

		$stmt = null;
	}

	public function mdlcrearpersona($tabla, $datosmodelo)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Num_Documento, Nombre, Apellido, Direccion, TIPO_DOC, Movil) VALUES (:cedula, :nombre, :apellido, :direccion, :tipodoc, :movil)");
		$stmt -> bindParam(":cedula", $datosmodelo["cedula"], PDO::PARAM_STR);
		$stmt -> bindParam(":nombre", $datosmodelo["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":apellido", $datosmodelo["apellido"], PDO::PARAM_STR);
		$stmt -> bindParam(":direccion", $datosmodelo["direccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":tipodoc", $datosmodelo["tipodoc"], PDO::PARAM_INT);
		$stmt -> bindParam(":movil", $datosmodelo["movil"], PDO::PARAM_INT);
		if($stmt->execute())
		{
			return true;
		}
		else
		{
			$err = $stmt->errorInfo();
			return $err[2];
		}
		$stmt -> close();
		$stmt = null;
	}
	public function mdlactualizarpersona($tabla, $datosmodelo)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Nombre= :nombre,Apellido=:apellido,Direccion=:direccion,Movil=:movil WHERE Num_Documento = :cedula");
		$stmt -> bindParam(":nombre", $datosmodelo["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":apellido", $datosmodelo["apellido"], PDO::PARAM_STR);
		$stmt -> bindParam(":direccion", $datosmodelo["direccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":movil", $datosmodelo["movil"], PDO::PARAM_INT);
		$stmt -> bindParam(":cedula", $datosmodelo["cedula"], PDO::PARAM_STR);
		if($stmt->execute())
		{
			return true;
		}
		else
		{
			$err = $stmt->errorInfo();
			return $err[2];
		}
		$stmt -> close();
		$stmt = null;
	}


	public static function mdlaeliminarpersona($tabla, $valor)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE Num_Documento = :cedula");
		$stmt -> bindParam(":cedula", $valor, PDO::PARAM_STR);
		if($stmt->execute())
		{
			return true;
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