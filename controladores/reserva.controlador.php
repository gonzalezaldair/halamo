<?php
class ReservaControlador{
	public static function ctrmostrarreserva($item,$valor)
	{
		$tabla = "reservas";
		$respuestafunc = ReservaModelo::mdlmostrarreserva($tabla,$item,$valor);
		return $respuestafunc;
	}


	public static function ctrcrearreserva()
	{
		if (isset($_POST["fechainicio"])) {
			$tabla = "reservas";
			$datoscontrolador = array('fechaentrada' =>  $_POST["fechainicio"],'fechasalida' =>  $_POST["fechasalida"], 'descuento' => $_POST["descuento"], 'cliente' => $_POST["cliente"], 'habitacion' => $_POST["habitacion"], 'total' => $_POST["total"]);
			$respuestafunc = ReservaModelo::mdlcrearreserva($tabla,"Codigo",$datoscontrolador);
			return $respuestafunc;
		}
	}


	public static function ctrupdreserva()
	{
		if (isset($_POST["fechainicioeditar"])) {
			$tabla = "reservas";
			$datoscontrolador = array('fechaentrada' => $_POST["fechainicioeditar"],'fechasalida' => $_POST["fechasalidaeditar"], 'descuento' => $_POST["descuentoeditar"], 'cliente' => $_POST["clienteeditar"], 'habitacion' => $_POST["habitacioneditar"], 'total' => $_POST["totaleditar"]);
			$respuestafunc = ReservaModelo::mdlcrearreserva($tabla,"Codigo",$datoscontrolador);
			return $respuestafunc;
		}
	}

	public static function ctrdelreserva()
	{
		if (isset($_POST["idreserva"])) {
			$tabla = "reservas";
			$respuestafunc = ReservaModelo::mdleliminarreserva($tabla,"Codigo",$_POST["idreserva"]);
			return $respuestafunc;
		}
	}
}