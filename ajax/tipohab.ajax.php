<?php

require_once '../modelos/tipohab.modelo.php';
require_once '../controladores/tipohab.controlador.php';

class tablaTipohab{
	public function mostrartablatipohab()
	{
		$item = null;
		$valor = null;
		$habitacion = TipoHabControlador::ctrmostrartipohab($item, $valor);
		$datosJson = '{"data":[';
		for ($i=0; $i < count($habitacion); $i++) {
				$datosJson .='[
						"'.$habitacion[$i]["Id_th"].'",
						"'.$habitacion[$i]["Descripcion"].'"
					],';
		}
		//para quitar la ultima coma y evitar error de sintaxis JSON
		$datosJson = substr($datosJson,0,-1);
		$datosJson .=']}';
		echo $datosJson;

	}
}

$activarrol = new tablaTipohab();
$activarrol -> mostrartablatipohab();