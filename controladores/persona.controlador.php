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
			$datoscontrolador = array('cedula' => $_POST["cedula"], 'nombre' => $_POST["nombre"], 'apellido' => $_POST["apellido"], 'movil' => $_POST["telefono"], 'direccion' => $_POST["direccion"], 'tipodoc' => $_POST["tipodoc"]);
			$respuestapercrear = PersonaModelo::mdlcrearpersona("persona", $datoscontrolador);
			return $respuestapercrear;
		}
	}

	public static function ctractualizarpersona()
	{
		if (isset($_POST["cedulaeditar"])) {
			$datoscontrolador = array('cedula' => $_POST["cedulaeditar"], 'nombre' => $_POST["nombreeditar"], 'apellido' => $_POST["apellidoeditar"], 'movil' => $_POST["telefonoeditar"], 'direccion' => $_POST["direccioneditar"]);
			$respuestaperactualizar = PersonaModelo::mdlactualizarpersona("persona", $datoscontrolador);
			return $respuestaperactualizar;
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