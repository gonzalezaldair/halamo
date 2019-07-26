<?php
class ReservaControlador{
	public static function ctrmostrarreserva($item,$valor)
	{
		$tabla = "reservas";
		$respuestafunc = ReservaModelo::mdlmostrarreserva($tabla,$item,$valor);
		return $respuestafunc;
	}


	public static function ctrcrearreserva()
	{
		if (isset($_POST["fechainicio"])) {
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["persona"]) && preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["habitacion"])) {
				$tabla = "reservas";
				$datoscontrolador = array('fechaentrada' =>  $_POST["fechainicio"],'fechasalida' =>  $_POST["fechasalida"], 'descuento' => $_POST["descuento"], 'cliente' => $_POST["persona"], 'habitacion' => $_POST["habitacion"], 'total' => $_POST["totalreal"]);
				$respuestafunc = ReservaModelo::mdlcrearreserva($tabla,$datoscontrolador);
				echo $respuestafunc;
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


	public static function ctrupdreserva()
	{
		if (isset($_POST["codigoeditar"])) {
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["personaeditar"]) && preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["habitacioneditar"])) {
					$tabla = "reservas";
					$datoscontrolador = array('codigo' =>$_POST["codigoeditar"],'fechaentrada' => $_POST["fechainicioeditar"],'fechasalida' => $_POST["fechasalidaeditar"], 'descuento' => $_POST["descuentoeditar"],  'habitacion' => $_POST["habitacioneditar"], 'total' => $_POST["totalrealeditar"]);
					$respuestafunc = ReservaModelo::mdlupdreserva($tabla,$datoscontrolador);
					echo $respuestafunc;
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

	public static function ctrdelreserva()
	{
		if (isset($_POST["idreserva"])) {
			$tabla = "reservas";
			$respuestafunc = ReservaModelo::mdleliminarreserva($tabla,"Codigo",$_POST["idreserva"]);
			echo $respuestafunc;
		}
	}

	public static function ctrbuscarhabitacionocupada()
	{
		if (isset($_POST["fechaentrada"])) {
				$respuesta1 = ReservaModelo::mdlbuscarhabitacionocupada("Fecha_Entrada",$_POST["fechaentrada"], $_POST["fechasalida"], $_POST["habitacion"]);
				$respuesta2 = ReservaModelo::mdlbuscarhabitacionocupada("Fecha_Salida",$_POST["fechaentrada"], $_POST["fechasalida"], $_POST["habitacion"]);
				$respuestafunc =  $respuesta1+$respuesta2;
				echo $respuestafunc;
		}
	}
}