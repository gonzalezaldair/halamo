<?php
class FuncionalidadControlador{
	public static function ctrmostrarfuncionalidad($item,$valor)
	{
		$tabla = "funcionalidades";
		$respuestafunc = FuncionalidadModelo::mdlmostrarfuncionalidad($tabla,$item,$valor);
		return $respuestafunc;
	}
}