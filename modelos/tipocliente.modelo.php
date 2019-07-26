<?php

require_once 'conexion.php';

class TipoClienteModelo{
	public function mdlmostrartipocliente($tabla, $item,$valor)
	{
		if($item != null){
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY $item DESC");

				$stmt -> bindParam(":".$item, $valor);

				$stmt -> execute();

				return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY Id_tc DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;
	}

	public function mdlcrearcliente($tabla,$datosmodelo)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Descripcion, Descuento) VALUES (:nombre, :descuento)");
		$stmt -> bindParam(":nombre", $datosmodelo["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":descuento", $datosmodelo["descuento"]);
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



	public function mdlupdcliente($tabla,$datosmodelo)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Descripcion= :nombre,Descuento= :descuento WHERE Id_tc = :id");
		$stmt -> bindParam(":nombre", $datosmodelo["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":descuento", $datosmodelo["descuento"]);
		$stmt -> bindParam(":id", $datosmodelo["codigo"]);
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


	public function mdldelcliente($tabla,$datosmodelo)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM tipo_cliente WHERE Id_tc = :id");
		$stmt -> bindParam(":id", $datosmodelo, PDO::PARAM_INT);
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