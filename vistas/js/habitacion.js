/*$.ajax({
	url: "ajax/habitacion.ajax.php",
	success:function(respuesta){
		console.log("respuesta", respuesta);
	}
})*/
$(document).ready(function() {
  /*=============================
cargar la tabla de aritculos ma
=============================*/
  tablahabitacion();

 /*=============================
CREAR HABITACION
=============================*/

  crearhabitacion();


   /*=============================
editar HABITACION
=============================*/


traerdatoshabitacion();

editarhabitacion();



/*=============================
eliminar HABITACION
=============================*/


eliminarhabitacion();

});




var tablahabitacion = function()
{
  $('#tablahabitacion').DataTable({
    "ajax": "ajax/habitacion.ajax.php",
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

var crearhabitacion = function()
{
  $("#crearhabitacion").on("click", function(){
    formdatahabitacion = $("#nuevahabitacionform").serialize();
    $.ajax({
        method: "POST",
        url: "ajax/habitacion.ajax.php",
        data: formdatahabitacion
      }).done(function(data) {
        console.log("data", data);
        if (data = "ok")
        {
          swal({
          title: "Exitos !",
          text: "Registro Exitoso",
          type: "success"
        },function()
        {
          window.location = "habitaciones";
        });
        }else{
          swal({
          title: "Advertencia !",
          text: "Hubo un error al ejecutar la accion",
          type: "warning"
        });
        }
        $("#Nuevahabitacionmodal").modal("hide");
      });
  });
}


var traerdatoshabitacion = function()
{
  $("#tablahabitacion").on("click", "button.upd", function(){
    idhabitacion = $(this).attr('id_habitacion');
    $.ajax({
        method: "POST",
        url: "ajax/habitacion.ajax.php",
        data: {"acc": "traer", "idhabitacion": idhabitacion}
      }).done(function(data) {
        var ruta = "vistas/dist/img/";
        var json = jQuery.parseJSON(data);
        $('#codigoeditar').val(json.Codigo);
        $('#numerohabitacioneditar').val(json.Num_Habitacion);
        $('#tipohabeditar').val(json.TIPO_HABITACION);
        $('#imghabitacion').attr('src', ruta+json.Imagen);
        $("#editarhabitacionmodal").modal("show");
      });
  });
}

var editarhabitacion = function()
{
  $("#editarhabitacion").on("click", function(){
    formdatahabitacion = $("#editarhabitacionform").serialize();
    $.ajax({
        method: "POST",
        url: "ajax/habitacion.ajax.php",
        data: formdatahabitacion
      }).done(function(data) {
        console.log("data", data);
        if (data = "ok")
        {
          swal({
          title: "Exitos !",
          text: "Registro Exitoso",
          type: "success"
        },function()
        {
          window.location = "habitaciones";
        });
        }else{
          swal({
          title: "Advertencia !",
          text: "Hubo un error al ejecutar la accion",
          type: "warning"
        });
        }
        $("#editarhabitacionmodal").modal("hide");
      });
  });
}


var eliminarhabitacion = function()
{
  $("#tablahabitacion").on("click", "button.del", function(){
    idhabitacion = $(this).attr('id_habitacion');
    $.ajax({
        method: "POST",
        url: "ajax/habitacion.ajax.php",
        data: {"acc": "del", "idhabitacion": idhabitacion}
      }).done(function(data) {
        console.log("data", data);
        if (data = "ok")
        {
          swal({
          title: "Exitos !",
          text: "Eliminado Exitoso",
          type: "success"
        },function()
        {
          window.location = "habitaciones";
        });
        }else{
          swal({
          title: "Advertencia !",
          text: "Hubo un error al ejecutar la accion",
          type: "warning"
        });
        }
      });
  });
}