/*$.ajax({
	url: "ajax/persona.ajax.php",
	success:function(respuesta){
		console.log("respuesta", respuesta);
	}
})*/
$(document).ready(function() {
  /*=============================
cargar la tabla de persona
=============================*/

tablapersona();

  /*=============================
CREAR PERSONA
=============================*/

crearpersona();

  /*=============================
TRAER DATOS PERSONA
=============================*/

traerdatoseditarpersona();

  /*=============================
EDITAR PERSONA
=============================*/

editarpersona();

 /*=============================
ELIMINAR PERSONA
=============================*/

eliminarpersona();

 /*=============================
ELIMINAR PERSONA
=============================*/


validarsiexistepersona();

});
var tablapersona = function()
{
  $('#tablapersona').DataTable({
    "ajax": "ajax/persona.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": {

      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando _START_ al _END_ de _TOTAL_ registros",
      "sInfoEmpty": "Mostrando 0 al 0 de un total de 0 registros",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    }
  });
}


var crearpersona = function()
{
  $("#crearPersona").on("click", function(){
    var formenuevapersona = $("#nuevaPersonaform").serialize();
    $.ajax({
        method: "POST",
        url: "ajax/persona.ajax.php",
        data: formenuevapersona
      }).done(function(data) {
        console.log("data", data);
        if (data)
        {
          tablapersona();
          alert("exitos");
          $("#NuevaPersona").modal("hide");
        }else{
          alert("error");
        }
      });
  });
}



var traerdatoseditarpersona = function ()
{
  $("#tablapersona").on("click", "button.upd", function(){
    idpersona = $(this).attr("id_persona");
    $.ajax({
        method: "POST",
        url: "ajax/persona.ajax.php",
        data: {"acc": "traer", "idpersona": idpersona}
      }).done(function(data) {
        var json = jQuery.parseJSON(data);
        $('#tipodoceditar').val(json.cedula);
        $('#cedulaeditar').val(json.Num_Documento);
        $('#nombreeditar').val(json.Nombre);
        $('#apellidoeditar').val(json.Apellido);
        $('#telefonoeditar').val(json.Movil);
        $('#direccioneditar').val(json.Direccion);
        $("#editarpersonamodal").modal("show");
      });
  });
}


var editarpersona = function()
{
  $("#editarPersona").on("click", function(){
    var formeditar = $("#editarPersonaform").serialize();
    $.ajax({
        method: "POST",
        url: "ajax/persona.ajax.php",
        data: formeditar
      }).done(function(data) {
        console.log("data", data);
        if (data)
        {
          tablapersona();
          alert("exitos");
        }else{
          alert("error");
        }
        $("#editarpersonamodal").modal("hide");
      });
  });
}



var eliminarpersona = function ()
{
  $("#tablapersona").on("click", "button.del", function(){
    idpersona = $(this).attr("id_persona");
    $.ajax({
        method: "POST",
        url: "ajax/persona.ajax.php",
        data: {"acc": "del", "idpersona": idpersona}
      }).done(function(data) {
        console.log("data", data);
        if (data)
        {
          tablapersona();
          alert("exitos");
        }else{
          alert("error");
        }
      });
  });
}

var validarsiexistepersona = function()
{
  $("#cedula").on("change", function(){
    cedulavalida = $(this).val();
    $.ajax({
        method: "POST",
        url: "ajax/persona.ajax.php",
        data: {"acc": "traer", "idpersona": cedulavalida}
      }).done(function(data) {
        var json = jQuery.parseJSON(data);
        console.log("json", json);
        if (json != false)
        {
           $("#cedula").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> Persona ya existe.</div>');
           $("#crearPersona").attr("disabled", true);
        }else{
          $("#crearPersona").removeAttr("disabled");
        }
      });
  });
}