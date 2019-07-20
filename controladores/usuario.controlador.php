<?php
class UsuarioControlador{
	public static function ctrmostrarusuario($item,$valor)
	{
		$tabla = "usuario";
		$respuestafunc = UsuarioModelo::mdlmostrarusuario($tabla,$item,$valor);
		return $respuestafunc;
	}
}