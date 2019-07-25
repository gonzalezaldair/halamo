
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
			$botones = "<button type='button' id_persona='".$persona[$i]["Num_Documento"]."' class='upd btn btn-success btn-xs'><i class='fa fa-pencil-square-o'></i></button> <button  type='button' nombre_persona='".$persona[$i]["Nombre"]."' id_persona='".$persona[$i]["Num_Documento"]."' class='del btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></button>";
			$tipodoc = TipoDocControlador::ctrmostrartipodoc("Id_tp",$persona[$i]["TIPO_DOC"]);
			$nombre = $persona[$i]["Nombre"]. " ".$persona[$i]["Apellido"];
				$datosJson .='[
						"'.$persona[$i]["Num_Documento"].'",
						"'.$nombre.'",
						"'.$persona[$i]["Direccion"].'",
						"'.$tipodoc["Descripcion"].'",
						"'.$persona[$i]["Movil"].'",
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
			$crearpersona = new PersonaControlador();
			$crearpersona -> ctrcrearpersona();
			break;
		case 'traer':
			$item = "Num_Documento";
			$valor = $_POST["idpersona"];
			$traerdatospersona = PersonaControlador::ctrmostrarpersona($item, $valor);
			echo json_encode($traerdatospersona);
			break;
		case 'upd':
			$actualizarpersona = new PersonaControlador();
			$actualizarpersona -> ctractualizarpersona();
			break;
		case 'del':
			$eliminarpersona = new PersonaControlador();
			$eliminarpersona -> ctraeliminarpersona();
			break;

		default:
			$activarpersona = new tablaPersona();
			$activarpersona -> mostrartablapersona();
			break;
	}
}else{
	$activarpersona = new tablaPersona();
	$activarpersona -> mostrartablapersona();
}