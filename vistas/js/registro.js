$(document).ready(function() {

/*=============================================
VALIDAR EMAIL REPETIDO
=============================================*/

var validarEmailRepetido = false;

$("#correo").on("change",function(){

	var email = $("#correo").val();

	var datos = new FormData();
	datos.append("idusuario", email);
	datos.append("accion", "traer");

	$.ajax({

		url:"ajax/usuario.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){

			if(respuesta == "false"){

				$(".alert").remove();
				validarEmailRepetido = false;

			}else{

				$("#regEmail").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> El correo electrónico ya existe en la base de datos, por favor ingrese otro diferente</div>')

					validarEmailRepetido = true;

			}

		}

	})

})

function validarcampos() {
	/*=============================================
				VALIDAR documento
	=============================================*/
	$("#documento").on("change", function() {
		var doc = $("#documento").val();
		console.log("doc", doc);
		if (doc != "") {
			var expresion = /^[a-zA-Z0-9]*$/;
			if (!expresion.test(doc)) {
				$("#documento").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> No se aceptan caracteres especiales</div>');
				return false;
			}
		}else{
			$("#documento").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
			return false;
		}
	});



	/*=============================================
				VALIDAR nombre
	=============================================*/
	$("#nombre").on("change", function() {
		var doc = $("#nombre").val();
		console.log("doc", doc);
		if (doc != "") {
			var expresion = /^[a-zA-Z0-9]*$/;
			if (!expresion.test(doc)) {
				$("#nombre").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> No se aceptan caracteres especiales</div>');
				return false;
			}
		}else{
			$("#nombre").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
			return false;
		}
	});

	/*=============================================
				VALIDAR apellido
	=============================================*/
	$("#apellido").on("change", function() {
		var doc = $("#apellido").val();
		console.log("doc", doc);
		if (doc != "") {
			var expresion = /^[a-zA-Z0-9]*$/;
			if (!expresion.test(doc)) {
				$("#apellido").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> No se aceptan caracteres especiales</div>');
				return false;
			}
		}else{
			$("#apellido").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
			return false;
		}
	});


	/*=============================================
				VALIDAR correo
	=============================================*/
	$("#correo").on("change", function() {
		var doc = $("#correo").val();
		console.log("doc", doc);
		if (doc != "") {
			var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
			if (!expresion.test(doc)) {
				$("#correo").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> No se aceptan caracteres especiales</div>');
				return false;
			}
		}else{
			$("#correo").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
			return false;
		}
	});

	/*=============================================
				VALIDAR correo
	=============================================*/
	$("#contrasena").on("change", function() {
		var doc = $("#contrasena").val();
		console.log("doc", doc);
		if (doc != "") {
			var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
			if (!expresion.test(doc)) {
				$("#contrasena").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> No se aceptan caracteres especiales</div>');
				return false;
			}
		}else{
			$("#contrasena").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
			return false;
		}
	});

	return true;
}

});