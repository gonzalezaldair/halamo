<?php
class PersonaControlador{
	public static function ctrmostrarpersona($item,$valor)
	{
		$tabla = "persona";
		$respuestaper = PersonaModelo::mdlmostrarpersona($tabla,$item,$valor);
		return $respuestaper;
	}
}