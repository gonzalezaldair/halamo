<?php
class TipoHabControlador{
	public static function ctrmostrartipohab($item,$valor)
	{
		$tabla = "tipo_habitacion";
		$respuestath = TipoHabModelo::mdlmostrartipohab($tabla,$item,$valor);
		return $respuestath;
	}

	public static function ctrcreartipoh()
	{
		if (isset($_POST["nombretipohab"])) {
			$tabla = "tipo_habitacion";
			$datoscontrolador = array('nombre' => $_POST["nombretipohab"], 'precio' =>$_POST["preciotipohab"]);
			$respuestamodelo = TipoHabModelo::mdlcreartipoh($tabla, $datoscontrolado);
			return $respuestamodelo;
		}
	}

	public static function ctrupdtipoh()
	{
		if (isset($_POST["codigotipoheditar"])) {
			$tabla = "tipo_habitacion";
			$datoscontrolador = array('codigo' => $_POST["codigotipoheditar"], 'nombre' => $_POST["nombretipohabeditar"], 'precio' =>$_POST["preciotipohabeditar"]);
			$respuestamodelo = TipoHabModelo::mdlupdtipoh($tabla, $datoscontrolador);
			return $respuestamodelo;
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