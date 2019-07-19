<?php

class LoginControlador{
	public static function ctrlogin()
	{
		if (isset($_POST["correologin"])) {
			if (preg_match('/^[a-zA-Z0-9@._]+$/', $_POST["correologin"])&&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["contrasenalogin"])) {
			   	$encriptar = crypt($_POST["contrasenalogin"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				$datosController = array("usuario"=>$_POST["correologin"],
				                     "password"=>$encriptar);
				$tabla = "usuario";
				$respuestalogin = LoginModelo::mdllogin($tabla,$datosController);
				if ($respuestalogin["usuario"] ==  $_POST["correologin"] && $respuestalogin["contrasena"] == $encriptar) {
					session_start();
					$_SESSION["validar"] = true;
					$_SESSION["usuario"] = $respuestalogin["usuario"];
					$_SESSION["rol"] = $respuestalogin["ROL"];
					echo '<script> window.location = "inicio"; </script>';
				}else{
					echo '<div class="alert alert-danger">Error al ingresar '.$_POST["correologin"].' '.$_POST["contrasenalogin"].'</div>';
				}
			}
		}
	}
}