<?php

class RegistroControlador{
	public static function ctrformregistro()
	{
		if (isset($_POST["documento"])) {
			if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["correo"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["contrasena"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["documento"]) && preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre"]) && preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["apellido"]))
			{
				$tipodoc = $_POST["tipodoc"];
				$cedula = $_POST["documento"];
				$nombre = $_POST["nombre"];
				$apellido = $_POST["apellido"];
				$correo = $_POST["correo"];
				$pass = $_POST["contrasena"];
				$datoscontrolador = array('cedula' => $cedula, 'nombre' => $nombre, 'apellido' => $apellido, 'tipodoc' => $tipodoc);
				$registropersona = registroModelo::mdlformregistropersona("persona", $datoscontrolador);
				$encrypt =crypt($_POST["contrasena"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				$fecha = date('Y-m-d');
				$datoscontroladoruser = array('correo' => $correo, 'contrasena' => $encrypt, 'agregado' => $fecha, 'persona' => $cedula);
				$registrouser = registroModelo::mdlformregistrouser("usuario", $datoscontroladoruser);
				if ($registropersona == "ok" && $registrouser == "ok") {
					echo '<script> swal({
						          title: "Exitos !",
						          text: "Registro Exitoso",
						          type: "success"
						        },function(){
						          window.location = "login";
						        });';
				}
			}else{
				echo'<script>
									swal({
										title: "Advertencia !",
										text: "No se aceptan caracteres Especiales",
										type: "warning"
										});
									</script>';
			}
		}
	}
}