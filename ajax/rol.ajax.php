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
			$botones = "<button type='button' id_rol='".$rol[$i]["Id"]."' class='upd btn btn-success btn-xs'><i class='fa fa-pencil-square-o'></i></button> <button  type='button' id_rol='".$rol[$i]["Id"]."' nombre_rol='".$rol[$i]["Nombre"]."' class='del btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></button>";
				$datosJson .='[
						"'.$rol[$i]["Id"].'",
						"'.$rol[$i]["Nombre"].'",
						"'.$rol[$i]["Descripcion"].'",
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
			$crearol = new RolControlador();
			$crearol ->ctrcrearrol();
			break;
		case 'upd':
			$updrol = new RolControlador();
			$updrol -> ctractualizarrol();
			break;
		case 'traer':
			$item = "Id";
			$valor = $_POST["idrol"];
			$rol = RolControlador::ctrMostrarrol($item, $valor);
			echo json_encode($rol);
			break;
		case 'del':
			$delrol = new RolControlador();
			$delrol -> ctraeliminarrol();
			break;
		case 'rolfun':
			$rolfunc = new RolControlador();
			$rolfunc -> ctrregistrarrolfuncionalidad();
			break;
		default:
			$activarrol = new tablaRol();
			$activarrol -> mostrartablarol();
			break;
	}
}else{
	$activarrol = new tablaRol();
	$activarrol -> mostrartablarol();
}