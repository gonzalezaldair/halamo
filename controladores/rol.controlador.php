<?php

class RolControlador{
	public static function ctrMostrarrol($item,$valor)
	{
		$tabla = "rol";
		$respuestarol = RolModelo::mdlmostrarrol($tabla,$item,$valor);
		return $respuestarol;
	}

	public static function ctrRolfuncionalidad($item,$valor)
	{
		$tabla = "rol_funcionalidad";
		$respuestarol = RolModelo::mdlRolfuncionalidad($tabla,$item,$_SESSION["rol"]);
		return $respuestarol;
	}

	public static function ctrregistrarrolfuncionalidad()
	{
		$respuesta = "";
		if (isset($_POST["rol"])) {
			$tabla = "rol_funcionalidad";
			$functionalidad = explode(",",$_POST["funcionalidad"]);
			for ($i=0; $i < count($functionalidad); $i++) {
				$datoscontrolador  = array('rol' => $_POST["rol"], 'funcionalidad' => $functionalidad[$i]);
				$respuestarol = RolModelo::mdlcrearolfuncionalidad($tabla, $datoscontrolador);
				if ($respuestarol != "ok") {
					$respuesta = $respuestarol;
				}else{
					$respuesta = "ok";
				}
			}
			return $respuesta;
			//$datoscontrolador  = array('rol' => $_POST["rol"], 'funcionalidad' => $_POST);
			//$respuestarol = RolModelo::mdlRolfuncionalidad($tabla);
			//return $respuestarol;
		}
	}


	public static function ctrcrearrol()
	{
		if (isset($_POST["nombre"])) {
			if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre"]) && preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["detalles"])) {
				$datoscontrolador = array('nombre' => $_POST["nombre"], 'descripcion' => $_POST["detalles"]);
				$respuestarolcrear = RolModelo::mdlcrearrol("rol", $datoscontrolador);
				echo $respuestarolcrear;
			}else{
				echo'<script>
									swal({
										title: "Advertencia !",
										text: "No se aceptan caracteres Especiales",
										type: "warning"
										});
									</script>';
			}
		}
	}

	public static function ctractualizarrol()
	{
		if (isset($_POST["roleditar"])) {
			if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombreeditar"]) && preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["detalleseditar"])) {
				$datoscontrolador = array('nombre' => $_POST["nombreeditar"], 'descripcion' => $_POST["detalleseditar"], 'id' => $_POST["roleditar"]);
				$respuestarolactu = RolModelo::mdlactualizarrol("rol", $datoscontrolador);
				echo $respuestarolactu;
			}else{
				echo'<script>
									swal({
										title: "Advertencia !",
										text: "No se aceptan caracteres Especiales",
										type: "warning"
										});
									</script>';
			}
		}
	}

	public static function ctraeliminarrol()
	{
		if (isset($_POST["idrol"])) {
			$respuestaeliminarrol = RolModelo::mdlaeliminarrol("rol",$_POST["idrol"]);
			return $respuestaeliminarrol;
		}
	}
}