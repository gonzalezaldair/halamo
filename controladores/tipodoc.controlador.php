<?php
class TipoDocControlador{
	public static function ctrmostrartipodoc($item,$valor)
	{
		$tabla = "tipo_documento";
		$respuestatipodoc = TipoDocModelo::mdlmostrartipodoc($tabla,$item,$valor);
		return $respuestatipodoc;
	}
}