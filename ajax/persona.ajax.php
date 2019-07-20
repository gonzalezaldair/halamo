<?php

require_once '../modelos/persona.modelo.php';
require_once '../controladores/persona.controlador.php';

require_once '../modelos/tipodoc.modelo.php';
require_once '../controladores/tipodoc.controlador.php';

class tablaPersona{
	public function mostrartablapersona()
	{
		$item = null;
		$valor = null;
		$persona = PersonaControlador::ctrmostrarpersona($item, $valor);
		$datosJson = '{"data":[';
		for ($i=0; $i < count($persona); $i++) {
			$tipodoc = TipoDocControlador::ctrmostrartipodoc("Id_tp",$persona[$i]["TIPO_DOC"]);
				$datosJson .='[
						"'.$persona[$i]["Num_Documento"].'",
						"'.$persona[$i]["Nombre"].'",
						"'.$persona[$i]["Apellido"].'",
						"'.$persona[$i]["Direccion"].'",
						"'.$persona[$i]["Correo"].'",
						"'.$tipodoc["Descripcion"].'",
						"'.$persona[$i]["Movil"].'"
					],';
		}
		//para quitar la ultima coma y evitar error de sintaxis JSON
		$datosJson = substr($datosJson,0,-1);
		$datosJson .=']}';
		echo $datosJson;

	}
}

$activarpersona = new tablaPersona();
$activarpersona -> mostrartablapersona();