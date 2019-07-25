<?php
class HabitacionControlador{
	public static function ctrmostrarhabitacion($item,$valor)
	{
		$tabla = "habitacion";
		$respuestafunc = HabitacionModelo::mdlmostrarhabitacion($tabla,$item,$valor);
		return $respuestafunc;
	}

	public static function ctrcrearhabitacion()
	{
		if (isset($_POST["numerohabitacion"])) {
			$datoscontrolador = array('numhab' => $_POST["numerohabitacion"], 'tipohab' => $_POST["tipohab"]);
			$respuestamodelo =HabitacionModelo::mdlcrearhabitacion("habitacion", $datoscontrolador);
			return $respuestamodelo;
		}
	}

	public static function ctrupdhabitacion()
	{
		if (isset($_POST["codigoeditar"])) {
			$datoscontrolador = array('codigo' => $_POST["codigoeditar"], 'numhab' => $_POST["numerohabitacioneditar"],  'tipohab' => $_POST["tipohabeditar"]);
			$respuestamodelo =HabitacionModelo::mdlupdhabitacion("habitacion", $datoscontrolador);
			return $respuestamodelo;
		}
	}


	public static function ctrdelhabitacion()
	{
		if (isset($_POST["idhabitacion"])) {
			$respuestamodelo =HabitacionModelo::mdldelhabitacion("habitacion", $_POST["idhabitacion"]);
			return $respuestamodelo;
		}
	}
}