<?php

require_once '../modelos/reserva.modelo.php';
require_once '../controladores/reserva.controlador.php';

class tablaReservas{
	public function mostrarreservas()
	{
		$item = null;
		$valor = null;
		$reservas = ReservaControlador::ctrmostrarreserva($item, $valor);
		$datosJson = '{"data":[';
		for ($i=0; $i <count($reservas) ; $i++) {
			$botones = "<button type='button' id_reserva='".$reservas[$i]["Codigo"]."' class='liquidar btn btn-warning btn-xs'><i class='fa fa-usd'></i></button> <button type='button' id_reserva='".$reservas[$i]["Codigo"]."' class='upd btn btn-success btn-xs'><i class='fa fa-pencil-square-o'></i></button> <button  type='button' id_reserva='".$reservas[$i]["Codigo"]."' class='del btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></button>";
			$total = number_format ( $reservas[$i]["Total"] , 2, "." , "," );
			$datosJson .='[
						"'.$reservas[$i]["Codigo"].'",
						"'.$reservas[$i]["Fecha_Ingreso"].'",
						"'.$reservas[$i]["Fecha_Salida"].'",
						"'.$reservas[$i]["DescuentoReserva"].'",
						" $ '.$total.'",
						"'.$reservas[$i]["CLIENTE"].'",
						"'.$reservas[$i]["HABITACION"].'",
						"'.$botones.'"
					],';
		}

		$datosJson = substr($datosJson,0,-1);
		$datosJson .=']}';
		echo $datosJson;
	}
}

if (isset($_POST["acc"])) {
	switch ($_POST["acc"]) {
		case 'c':
			# code...
			break;
		case 'upd':
			# code...
			break;
		case 'traer':
			$item = "Codigo";
			$valor = $_POST["idreserva"];
			$reservas = ReservaControlador::ctrmostrarreserva($item, $valor);
			echo  json_encode($reservas);
			break;
		case 'del':
			$delreserva = new ReservaControlador();
			$delreserva ->ctrdelreserva();
			break;

		default:
			$activartabla = new tablaReservas();
			$activartabla -> mostrarreservas();
			break;
	}
}else{
	$activartabla = new tablaReservas();
	$activartabla -> mostrarreservas();
}