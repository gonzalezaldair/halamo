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
TRAER DATOS PERSONA
=============================*/

traerdatoseditarpersona();


});

var traerdatoseditarpersona = function ()
{
  $("#tablapersona").on("click", "button.upd", function(){
    idpersona = $(this).attr("id_persona");
    datos = new FormData();
    datos.append('acc', 'traerdatos');
    datos.append('idpersona', idpersona);
    $.ajax({
        method: "POST",
        url: "ajax/persona.ajax.php",
        data: datos
      }).done(function(data) {
        //console.log("data", data);
        /*var json = jQuery.parseJSON(data);
        $('#tipodoceditar').val(json[0].cedula);
        $('#cedulaeditar').val(json[0].nombres);
        $('#nombreeditar').val(json[0].telefono);
        $('#apellidoeditar').val(json[0].fijo);
        $('#telefonoeditar').val(json[0].correo);
        $('#correoeditar').val(json[0].direccion);
        $('#direccioneditar').val(json[0].alias);*/
        $("#editarPersona").modal("show");
      });
  });
}


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