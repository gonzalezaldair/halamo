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
			$persona = PersonaControlador::ctrmostrarpersona("Num_Documento", $usuario[$i]["PERSONA"]);
			$rol = RolControlador::ctrMostrarrol("Id", $usuario[$i]["ROL"]);
				$datosJson .='[
						"'.$usuario[$i]["usuario"].'",
						"'.$persona["Nombre"].'",
						"'.$rol["Nombre"].'",
						"'.$usuario[$i]["Log"].'",
						"'.$usuario[$i]["Activo"].'",
						"'.$usuario[$i]["Agregado"].'"
					],';
		}
		//para quitar la ultima coma y evitar error de sintaxis JSON
		$datosJson = substr($datosJson,0,-1);
		$datosJson .=']}';
		echo $datosJson;

	}
}

$activarpersona = new tablaUsuario();
$activarpersona -> mostrartablausuario();