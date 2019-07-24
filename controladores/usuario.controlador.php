<?php
class UsuarioControlador{
	public static function ctrmostrarusuario($item,$valor)
	{
		$tabla = "usuario";
		$respuestafunc = UsuarioModelo::mdlmostrarusuario($tabla,$item,$valor);
		return $respuestafunc;
	}


	public static function ctrcrearusuario()
	{
		if (isset($_POST["correo"])) {
			$fecha = date('Y-m-d');
			$encrypt =crypt($_POST["contrasena"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
			$datoscontrolador = array('correo' => $_POST["correo"], 'contrasena' => $encrypt,  'rol' => $_POST["rol"], 'persona' => $_POST["persona"], "agregado" => $fecha);
			$respuestausercrear = UsuarioModelo::mdlcrearusuario("usuario", $datoscontrolador);
			echo $respuestausercrear;
		}
	}

	public static function ctractualizarusuario()
	{
		if (isset($_POST["correoeditar"])) {
			$encrypt =crypt($_POST["contrasenaeditar"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
			$datoscontrolador = array('usuario' => $_POST["correoeditar"], 'rol' => $_POST["roleditar"], 'contrasena' => $encrypt);
			$respuestauseractualizar = UsuarioModelo::mdlactualizarusuario("usuario", $datoscontrolador);
			return $respuestauseractualizar;
		}
	}

	public static function ctraeliminarusuario()
	{
		if (isset($_POST["idusuario"])) {
			$respuestaeliminarusuario = UsuarioModelo::mdlaeliminarusuario("usuario",$_POST["idusuario"]);
			return $respuestaeliminarusuario;
		}
	}
}