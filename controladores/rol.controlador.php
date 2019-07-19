<?php

class RolControlador{
	public static function ctrMostrarrol($item,$valor)
	{
		$tabla = "rol";
		$respuestarol = RolModelo::mdlmostrarrol($tabla,$item,$valor);
		return $respuestarol;
	}

	public static function ctrRolfuncionalidad($item,$valor)
	{
		$tabla = "rol_funcionalidad";
		$respuestarol = RolModelo::mdlRolfuncionalidad($tabla,$item,$_SESSION["rol"]);
		return $respuestarol;
	}
}