<?php

require_once "conexion.php";

class ReservaModelo{
	public function mdlmostrarreserva($tabla, $item,$valor)
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


	public function mdlcrearreserva($tabla, $datosmodelo)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Fecha_Entrada, Fecha_Salida, Descuento, Total, PERSONA, HABITACION) VALUES (:fecha1, :fecha2, :descuento, :total,:cliente, :habitacion)");
		$stmt -> bindParam(":fecha1", $datosmodelo["fechaentrada"], PDO::PARAM_STR);
		$stmt -> bindParam(":fecha2", $datosmodelo["fechasalida"], PDO::PARAM_STR);
		$stmt -> bindParam(":descuento", $datosmodelo["descuento"]);
		$stmt -> bindParam(":total", $datosmodelo["total"]);
		$stmt -> bindParam(":cliente", $datosmodelo["cliente"], PDO::PARAM_STR);
		$stmt -> bindParam(":habitacion", $datosmodelo["habitacion"], PDO::PARAM_INT);
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

	public function mdlupdreserva($tabla, $datosmodelo)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Fecha_Entrada=:fecha1,Fecha_Salida= :fecha2,Descuento= :descuento,Total= :total,HABITACION= :habitacion WHERE Codigo = :codigo");
		$stmt -> bindParam(":fecha1", $datosmodelo["fechaentrada"], PDO::PARAM_STR);
		$stmt -> bindParam(":fecha2", $datosmodelo["fechasalida"], PDO::PARAM_STR);
		$stmt -> bindParam(":descuento", $datosmodelo["descuento"]);
		$stmt -> bindParam(":total", $datosmodelo["total"]);
		$stmt -> bindParam(":habitacion", $datosmodelo["habitacion"]);
		$stmt -> bindParam(":codigo", $datosmodelo["codigo"]);
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


	public function mdleliminarreserva($tabla, $item, $valor)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = :$item");
		$stmt -> bindParam(":".$item, $valor);
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


	public function mdlbuscarhabitacionocupada($item,$fecha1,$fecha2,$habitacion)
	{
		$stmt = Conexion::conectar()->prepare("SELECT count(*) FROM reservas, habitacion WHERE habitacion.Codigo = reservas.HABITACION and habitacion.Codigo = $habitacion and reservas.Estado <> 2 and reservas.$item BETWEEN '$fecha1' and '$fecha2'");
		if ($stmt->execute()) {
			return $stmt -> fetchColumn();
		}else{
			$err = $stmt->errorInfo();
			return $err[2];
		}
		/*$stmt->execute();
		return $stmt -> fetch();*/
		$stmt -> close();
		$stmt = null;
	}
}