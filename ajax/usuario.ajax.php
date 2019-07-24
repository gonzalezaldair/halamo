<?php

require_once '../modelos/persona.modelo.php';
require_once '../controladores/persona.controlador.php';

require_once '../modelos/usuario.modelo.php';
require_once '../controladores/usuario.controlador.php';

require_once '../modelos/rol.modelo.php';
require_once '../controladores/rol.controlador.php';

class tablaUsuario{
	public function mostrartablausuario()
	{
		$item = null;
		$valor = null;
		$usuario = UsuarioControlador::ctrmostrarusuario($item, $valor);
		$datosJson = '{"data":[';
		for ($i=0; $i < count($usuario); $i++) {
			$botones = "<button type='button' id_usuario='".$usuario[$i]["usuario"]."' class='upd btn btn-success btn-xs'><i class='fa fa-pencil-square-o'></i></button> <button  type='button' id_usuario='".$usuario[$i]["usuario"]."' class='del btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></button>";
			if ($usuario[$i]["Activo"] == "Y") {
				$estado = "<button type='button' class='btn btn-success btn-md'><i class='fa fa-arrow-up'></i></button>";
			}else{
				$estado = "<button type='button' class='btn btn-warning btn-md'><i class='fa fa-arrow-down'></i></button>";
			}
			$persona = PersonaControlador::ctrmostrarpersona("Num_Documento", $usuario[$i]["PERSONA"]);
			$rol = RolControlador::ctrMostrarrol("Id", $usuario[$i]["ROL"]);
				$datosJson .='[
						"'.$usuario[$i]["usuario"].'",
						"'.$rol["Nombre"].'",
						"'.$usuario[$i]["Agregado"].'",
						"'.$usuario[$i]["Log"].'",
						"'.$estado.'",
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
			$crearusuario = new UsuarioControlador();
			$crearusuario ->ctrcrearusuario();
			break;
		case 'upd':
			$actualizarusuario = new UsuarioControlador();
			$actualizarusuario -> ctractualizarusuario();
			break;
		case 'del':
			$eliminarusuario = new UsuarioControlador();
			$eliminarusuario -> ctraeliminarusuario();
			break;
		case 'traer':
			$item = "usuario";
			$valor = $_POST["idusuario"];
			$traerusuario = UsuarioControlador::ctrmostrarusuario($item, $valor);
			echo json_encode($traerusuario);
			break;

		default:
			$activarpersona = new tablaUsuario();
			$activarpersona -> mostrartablausuario();
			break;
	}
}else{
	$activarpersona = new tablaUsuario();
	$activarpersona -> mostrartablausuario();
}