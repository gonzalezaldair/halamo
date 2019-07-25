<?php

require_once '../modelos/habitacion.modelo.php';
require_once '../controladores/habitacion.controlador.php';

require_once '../modelos/tipohab.modelo.php';
require_once '../controladores/tipohab.controlador.php';

class tablaHabitacion{
	public function mostrartablahabitacion()
	{
		$item = null;
		$valor = null;
		$habitacion = HabitacionControlador::ctrmostrarhabitacion($item, $valor);
		$datosJson = '{"data":[';
		for ($i=0; $i < count($habitacion); $i++) {
			$botones = "<button type='button' id_habitacion='".$habitacion[$i]["Codigo"]."' class='upd btn btn-success btn-xs'><i class='fa fa-pencil-square-o'></i></button> <button  type='button' id_habitacion='".$habitacion[$i]["Codigo"]."' class='del btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></button>";
				$tipohabitacion = TipoHabControlador::ctrmostrartipohab("Id_th", $habitacion[$i]["TIPO_HABITACION"]);
				$datosJson .='[
						"'.$habitacion[$i]["Num_Habitacion"].'",
						"'.$habitacion[$i]["Disponible"].'",
						"'.$tipohabitacion["Descripcion"].'",
						"'.$habitacion[$i]["Imagen"].'",
						"'.$botones.'"
					],';
		}
		//para quitar la ultima coma y evitar error de sintaxis JSON
		$datosJson = substr($datosJson,0,-1);
		$datosJson .=']}';
		echo $datosJson;

	}
}

if (isset($_POST["acc"])) {
	switch ($_POST["acc"]) {
		case 'c':
			$crearhabitacion = new HabitacionControlador();
			$crearhabitacion ->ctrcrearhabitacion();
			break;
		case 'traer':
			$item = "Codigo";
			$valor = $_POST["idhabitacion"];
			$habitacion = HabitacionControlador::ctrmostrarhabitacion($item, $valor);
			echo json_encode($habitacion);
			break;
		case 'upd':
			$updhabitacion = new HabitacionControlador();
			$updhabitacion ->ctrupdhabitacion();
			break;
		case 'del':
			$delhabitacion = new HabitacionControlador();
			$delhabitacion ->ctrdelhabitacion();
			break;

		default:
			# code...
			break;
	}
}else{
	$activarrol = new tablaHabitacion();
	$activarrol -> mostrartablahabitacion();
}