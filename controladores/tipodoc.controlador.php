<?php
class TipoDocControlador{
	public static function ctrmostrartipodoc($item,$valor)
	{
		$tabla = "tipo_documento";
		$respuestafunc = TipoDocModelo::mdlmostrartipodoc($tabla,$item,$valor);
		return $respuestafunc;
	}
}