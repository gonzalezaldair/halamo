<?php
class HabitacionControlador{
	public static function ctrmostrarhabitacion($item,$valor)
	{
		$tabla = "habitacion";
		$respuestafunc = HabitacionModelo::mdlmostrarhabitacion($tabla,$item,$valor);
		return $respuestafunc;
	}

	public static function ctrcrearhabitacion()
	{
		if (isset($_POST["numerohabitacion"])) {
			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["numerohabitacion"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["tipohab"])) {
				$datoscontrolador = array('numhab' => $_POST["numerohabitacion"], 'tipohab' => $_POST["tipohab"]);
				$respuestamodelo =HabitacionModelo::mdlcrearhabitacion("habitacion", $datoscontrolador);
				return $respuestamodelo;
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

	public static function ctrupdhabitacion()
	{
		if (isset($_POST["codigoeditar"])) {
			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["numerohabitacioneditar"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["tipohabeditar"])) {
				$datoscontrolador = array('codigo' => $_POST["codigoeditar"], 'numhab' => $_POST["numerohabitacioneditar"],  'tipohab' => $_POST["tipohabeditar"]);
			$respuestamodelo =HabitacionModelo::mdlupdhabitacion("habitacion", $datoscontrolador);
			return $respuestamodelo;
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


	public static function ctrdelhabitacion()
	{
		if (isset($_POST["idhabitacion"])) {
			$respuestamodelo =HabitacionModelo::mdldelhabitacion("habitacion", $_POST["idhabitacion"]);
			return $respuestamodelo;
		}
	}
}