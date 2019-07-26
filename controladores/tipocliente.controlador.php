<?php


class TipoClienteControlador{
	public static function ctrmostrartipocliente($item,$valor)
	{
		$tabla = "tipo_cliente";
		$respuestaper = TipoClienteModelo::mdlmostrartipocliente($tabla,$item,$valor);
		return $respuestaper;
	}

	public static function ctrcrearcliente()
	{
		if (isset($_POST["nombre"])) {
			if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre"]) && preg_match('/^[0-9.]+$/', $_POST["descuento"])) {
				$datoscontrolador = array('nombre' => $_POST["nombre"], 'descuento' => $_POST["descuento"]);
				$respuesta = TipoClienteModelo::mdlcrearcliente("tipo_cliente",$datoscontrolador);
				echo $respuesta;
			}
		}
	}


	public static function ctrupdcliente()
	{
		if (isset($_POST["codigoeditar"])) {
			if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombreeditar"]) && preg_match('/^[0-9.]+$/', $_POST["descuentoeditar"])) {
				$datoscontrolador = array('codigo' => $_POST["codigoeditar"],'nombre' => $_POST["nombreeditar"], 'descuento' => $_POST["descuentoeditar"]);
				$respuesta = TipoClienteModelo::mdlupdcliente("tipo_cliente",$datoscontrolador);
				echo $respuesta;
			}
		}
	}


	public static function ctrdelcliente()
	{
		if (isset($_POST["idcliente"])) {
				$respuesta = TipoClienteModelo::mdldelcliente("tipo_cliente",$_POST["idcliente"]);
				echo $respuesta;
			}
	}
}