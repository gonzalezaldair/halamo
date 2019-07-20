<?php
class HabitacionControlador{
	public static function ctrmostrarhabitacion($item,$valor)
	{
		$tabla = "habitacion";
		$respuestafunc = HabitacionModelo::mdlmostrarhabitacion($tabla,$item,$valor);
		return $respuestafunc;
	}
}