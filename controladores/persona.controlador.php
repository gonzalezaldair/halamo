<?php
class PersonaControlador{
	public static function ctrmostrarpersona($item,$valor)
	{
		$tabla = "persona";
		$respuestaper = PersonaModelo::mdlmostrarpersona($tabla,$item,$valor);
		return $respuestaper;
	}

	public static function ctrcrearpersona()
	{
		if (isset($_POST["cedula"])) {
			if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["cedula"]) && preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre"]) && preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["apellido"]) && preg_match('/^[0-9]+$/', $_POST["telefono"]) && preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["direccion"]) && preg_match('/^[0-9]+$/', $_POST["tipodoc"])) {
				$datoscontrolador = array('cedula' => $_POST["cedula"], 'nombre' => $_POST["nombre"], 'apellido' => $_POST["apellido"], 'movil' => $_POST["telefono"], 'direccion' => $_POST["direccion"], 'tipodoc' => $_POST["tipodoc"]);
				$respuestapercrear = PersonaModelo::mdlcrearpersona("persona", $datoscontrolador);
				return $respuestapercrear;
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

	public static function ctractualizarpersona()
	{
		if (isset($_POST["cedulaeditar"])) {
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombreeditar"]) && preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["apellidoeditar"]) && preg_match('/^[0-9]+$/', $_POST["telefonoeditar"]) && preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["direccioneditar"])) {
				$datoscontrolador = array('cedula' => $_POST["cedulaeditar"], 'nombre' => $_POST["nombreeditar"], 'apellido' => $_POST["apellidoeditar"], 'movil' => $_POST["telefonoeditar"], 'direccion' => $_POST["direccioneditar"],'TIPOCLIENTE' => $_POST["tipoclienteeditar"]);
				$respuestaperactualizar = PersonaModelo::mdlactualizarpersona("persona", $datoscontrolador);
				echo $respuestaperactualizar;
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

	public static function ctraeliminarpersona()
	{
		if (isset($_POST["idpersona"])) {
			$respuestaeliminarpersona = PersonaModelo::mdlaeliminarpersona("persona",$_POST["idpersona"]);
			return $respuestaeliminarpersona;
		}
	}
}