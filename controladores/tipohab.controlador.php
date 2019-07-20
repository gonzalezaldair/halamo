<?php
class TipoHabControlador{
	public static function ctrmostrartipohab($item,$valor)
	{
		$tabla = "tipo_habitacion";
		$respuestath = TipoHabModelo::mdlmostrartipohab($tabla,$item,$valor);
		return $respuestath;
	}
}