<?php
class ReservaControlador{
	public static function ctrmostrarreserva($item,$valor)
	{
		$tabla = "reserva";
		$respuestafunc = ReservaModelo::mdlmostrarreserva($tabla,$item,$valor);
		return $respuestafunc;
	}
}