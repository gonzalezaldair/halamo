<?php
class TipoHabControlador{
	public static function ctrmostrartipohab($item,$valor)
	{
		$tabla = "tipo_habitacion";
		$respuestath = TipoHabModelo::mdlmostrartipohab($tabla,$item,$valor);
		return $respuestath;
	}

	public static function ctrmostrarhabtipohab($item,$valor)
	{
		$tabla = "habitacion";
		$respuestath = TipoHabModelo::mdlmostrarhabtipohab($tabla,$item,$valor);
		return $respuestath;
	}

	public static function ctrcreartipoh()
	{
		if (isset($_POST["nombretipohab"])) {
			if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre"]) && preg_match('/^[0-9.]+$/', $_POST["contrasena"])) {
				$tabla = "tipo_habitacion";
				$datoscontrolador = array('nombre' => $_POST["nombretipohab"], 'precio' =>$_POST["preciotipohab"]);
				$respuestamodelo = TipoHabModelo::mdlcreartipoh($tabla, $datoscontrolado);
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

	public static function ctrupdtipoh()
	{
		if (isset($_POST["codigotipoheditar"])) {
			if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombretipohabeditar"]) && preg_match('/^[0-9.]+$/', $_POST["nombretipohabeditar"])) {
				$tabla = "tipo_habitacion";
				$datoscontrolador = array('codigo' => $_POST["codigotipoheditar"], 'nombre' => $_POST["nombretipohabeditar"], 'precio' =>$_POST["preciotipohabeditar"]);
				$respuestamodelo = TipoHabModelo::mdlupdtipoh($tabla, $datoscontrolador);
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

	public static function ctrdeltipoh()
	{
		if (isset($_POST["idtipohabitacion"])) {
			$tabla = "tipo_habitacion";
			$respuestamodelo = TipoHabModelo::mdldeltipoh($tabla,$_POST["idtipohabitacion"]);
			return $respuestamodelo;
		}
	}
}