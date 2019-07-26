<?php

require_once "../modelos/tipocliente.modelo.php";
require_once "../controladores/tipocliente.controlador.php";
class tablacliente{
	public function mostrartablacliente()
	{
		$item = null;
		$valor = null;
		$cliente= TipoClienteControlador::ctrmostrartipocliente($item, $valor);
		$datosJson = '{"data":[';
		for ($i=0; $i < count($cliente); $i++) {
			$botones = "<button type='button' id_cliente='".$cliente[$i]["Id_tc"]."' class='upd btn btn-success btn-xs'><i class='fa fa-pencil-square-o'></i></button> <button  type='button' id_cliente='".$cliente[$i]["Id_tc"]."'  class='del btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></button>";
				$datosJson .='[
						"'.$cliente[$i]["Id_tc"].'",
						"'.$cliente[$i]["Descripcion"].'",
						"'.$cliente[$i]["Descuento"].'",
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
			$crear = new TipoClienteControlador();
			$crear ->ctrcrearcliente();
			break;
		case 'upd':
			$crear = new TipoClienteControlador();
			$crear ->ctrupdcliente();
			break;
		case 'traer':
			$item = "id_tc";
			$valor = $_POST["idcliente"];
			$cliente= TipoClienteControlador::ctrmostrartipocliente($item, $valor);
			echo  json_encode($cliente);
			break;
		case 'del':
			$crear = new TipoClienteControlador();
			$crear ->ctrdelcliente();
			break;

		default:
			# code...
			break;
	}
}else{
	$activartabla = new tablacliente();
	$activartabla ->mostrartablacliente();
}