<?php

require_once '../modelos/reserva.modelo.php';
require_once '../controladores/reserva.controlador.php';


require_once '../modelos/persona.modelo.php';
require_once '../controladores/persona.controlador.php';

class tablaReservas{
	public function mostrarreservas()
	{
		$item = null;
		$valor = null;
		$reservas = ReservaControlador::ctrmostrarreserva($item, $valor);
		$datosJson = '{"data":[';
		for ($i=0; $i <count($reservas) ; $i++) {
			$persona = PersonaControlador::ctrmostrarpersona("Num_Documento", $reservas[$i]["PERSONA"]);
			$botones = "<button type='button' id_reserva='".$reservas[$i]["Codigo"]."' class='upd btn btn-success btn-xs'><i class='fa fa-pencil-square-o'></i></button> <button  type='button' id_reserva='".$reservas[$i]["Codigo"]."' class='del btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></button>";
			$total = number_format ( $reservas[$i]["Total"] , 2, "." , "," );
			$nombre = $persona["Nombre"]." ".$persona["Apellido"];
			if ($reservas[$i]["Estado"] == 0) {
				$estado = "<span class='label label-warning'>Reservada</span>";
			}elseif ($reservas[$i]["Estado"] == 1) {
				$estado = "<span class='label label-danger'>Ocupada</span>";
			}elseif ($reservas[$i]["Estado"] == 2) {
				$estado = "<span class='label label-success'>Cancelada</span>";
			}
			$datosJson .='[
						"'.$reservas[$i]["Codigo"].'",
						"'.$reservas[$i]["Fecha_Entrada"].'",
						"'.$reservas[$i]["Fecha_Salida"].'",
						"'.$reservas[$i]["Descuento"].'",
						" $ '.$total.'",
						"'.$persona["Num_Documento"].'",
						"'.$nombre.'",
						"'.$reservas[$i]["HABITACION"].'",
						"'.$estado.'",
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
			$crearreserva = new ReservaControlador();
			$crearreserva -> ctrcrearreserva();
			break;
		case 'upd':
			$updreserva = new ReservaControlador();
		    $updreserva ->  ctrupdreserva();
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
		case 'buscarh':
			$buscarh = new ReservaControlador();
			$buscarh ->ctrbuscarhabitacionocupada();
			/*$buscarh = ReservaControlador::ctrbuscarhabitacionocupada();
			echo json_encode($buscarh);*/
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