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
			$botones = "<button type='button' id_tipoh='".$habitacion[$i]["Id_th"]."' class='upd btn btn-success btn-xs'><i class='fa fa-pencil-square-o'></i></button> <button  type='button' id_tipoh='".$habitacion[$i]["Id_th"]."' class='del btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></button>";
			$precio = number_format ($habitacion[$i]["Precio"] , 2, "." , "," );
				$datosJson .='[
						"'.$habitacion[$i]["Id_th"].'",
						"'.$habitacion[$i]["Descripcion"].'",
						" $ '.$precio.'",
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
			$tipohabitacion = new TipoHabControlador();
			$tipohabitacion ->ctrcreartipoh();
			break;
		case 'upd':
			$tipohabitacion = new TipoHabControlador();
			$tipohabitacion ->ctrupdtipoh();
			break;
		case 'del':
			$tipohabitacion = new TipoHabControlador();
			$tipohabitacion ->ctrdeltipoh();
			break;
		case 'traer':
			$item = "Id_th";
			$valor = $_POST["idtipohabitacion"];
			$tipohabitacion = TipoHabControlador::ctrmostrartipohab($item, $valor);
			echo json_encode($tipohabitacion);
			break;
		case 'traerhab':
			$item = "TIPO_HABITACION";
			$valor = $_POST["idhabitacion"];
			$tipohabitacion = TipoHabControlador::ctrmostrarhabtipohab($item, $valor);
			echo json_encode($tipohabitacion);
			break;

		default:
			$activarrol = new tablaTipohab();
			$activarrol -> mostrartablatipohab();
			break;
	}
}else{
	$activarrol = new tablaTipohab();
	$activarrol -> mostrartablatipohab();
}