<?php

require_once '../modelos/habitacion.modelo.php';
require_once '../controladores/habitacion.controlador.php';

class tablaHabitacion{
	public function mostrartablahabitacion()
	{
		$item = null;
		$valor = null;
		$habitacion = HabitacionControlador::ctrmostrarhabitacion($item, $valor);
		$datosJson = '{"data":[';
		for ($i=0; $i < count($habitacion); $i++) {
				$datosJson .='[
						"'.$habitacion[$i]["Codigo"].'",
						"'.$habitacion[$i]["Disponible"].'",
						"'.$habitacion[$i]["Num_Habitacion"].'",
						"'.$habitacion[$i]["Precio"].'",
						"'.$habitacion[$i]["TIPO_HABITACION"].'",
						"'.$habitacion[$i]["Imagen"].'"
					],';
		}
		//para quitar la ultima coma y evitar error de sintaxis JSON
		$datosJson = substr($datosJson,0,-1);
		$datosJson .=']}';
		echo $datosJson;

	}
}

$activarrol = new tablaHabitacion();
$activarrol -> mostrartablahabitacion();