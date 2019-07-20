<?php

require_once '../modelos/rol.modelo.php';
require_once '../controladores/rol.controlador.php';

class tablaRol{
	public function mostrartablarol()
	{
		$item = null;
		$valor = null;
		$rol = RolControlador::ctrMostrarrol($item, $valor);
		$datosJson = '{"data":[';
		for ($i=0; $i < count($rol); $i++) {
				$datosJson .='[
						"'.$rol[$i]["Id"].'",
						"'.$rol[$i]["Nombre"].'",
						"'.$rol[$i]["Descripcion"].'"
					],';
		}
		//para quitar la ultima coma y evitar error de sintaxis JSON
		$datosJson = substr($datosJson,0,-1);
		$datosJson .=']}';
		echo $datosJson;

	}
}

$activarrol = new tablaRol();
$activarrol -> mostrartablarol();