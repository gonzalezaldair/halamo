/*$.ajax({
  url: "ajax/reserva.ajax.php",
  success:function(respuesta){
    console.log("respuesta", respuesta);
  }
})*/
$(document).ready(function() {

  /*=============================================
  FORMATEAR LOS IPUNT
  =============================================*/

  $("input").focus(function() {

    $(".alert").remove();
  })

  /*=============================
      CARGAR TABLA RESERVA
=============================*/
  tablareserva();

  /*=============================
        buscar habitacion disponible
  =============================*/

  habitaciondisponible();

  /*=============================
          DESCUENTO CLIENTE
    =============================*/

  cargardescuento();

   /*=============================
          editar persona
    =============================*/



traerdatoreserva();

  /*=============================
          eliminar persona
    =============================*/

  eliminarreserva();
})

var tablareserva = function() {
  $('#tablareserva').DataTable({
    "ajax": "ajax/reserva.ajax.php",
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


var habitaciondisponible = function() {
  $("#habitacion").on("change", function() {
    var fecha1 = $("#fechainicio").val();
    var fecha2 = $("#fechasalida").val();
    var habitacion = $(this).val();
    datohabitacion = new FormData();
    datohabitacion.append('fechaentrada', fecha1);
    datohabitacion.append('fechasalida', fecha2);
    datohabitacion.append('habitacion', habitacion);
    datohabitacion.append('acc', "buscarh");

    $.ajax({

      url: "ajax/reserva.ajax.php",
      method: "POST",
      data: datohabitacion,
      cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta) {
        /*var json = jQuery.parseJSON(respuesta);
        console.log("respuesta", json[0]);*/

        if (respuesta == 0) {

          $(".alert").remove();
          validarEmailRepetido = false;

        } else {

          $("#habitacion").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> Habitacion ocupada</div>')

          validarEmailRepetido = true;

        }

      }
    });
  });
}

var cargardescuento = function() {
  $("#persona").on("change", function() {
    $("#descuento").val("");
    var valorpersona = $("#persona").val();
    if (valorpersona != "") {
      datosdescuento = new FormData();
      datosdescuento.append('persona', valorpersona);
      datosdescuento.append('acc', "traerdescuento");
      $.ajax({

        url: "ajax/persona.ajax.php",
        method: "POST",
        data: datosdescuento,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
          if (respuesta != "") {
            var json = jQuery.parseJSON(respuesta);
            $("#descuento").val(json.Descuento);
          } else {
            $("#descuento").val("");
          }
        }
      });
    }
  });
}
var traerdatoreserva = function ()
{
  $("#tablareserva").on("click", "button.upd", function(){
    var reservaid = $(this).attr("id_reserva");
    datosreservatraer = new FormData();
      datosreservatraer.append('idreserva', reservaid);
      datosreservatraer.append('acc', "traer");
      $.ajax({

        url: "ajax/reserva.ajax.php",
        method: "POST",
        data: datosreservatraer,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
          console.log("respuesta", respuesta);
          var json = jQuery.parseJSON(respuesta);
          $("#codigoeditar").val(json.Codigo);
          $("#fechainicioeditar").val(json.Fecha_Entrada);
          $("#fechasalidaeditar").val(json.Fecha_Salida);
          $("#personaeditar").val(json.PERSONA);
          $("#habitacioneditar").val(json.HABITACION);
          $("#descuentoeditar").val(json.Descuento);
          $("#totalrealeditar").val(json.Total);
          $("#totaleditar").val(json.Total);
          $("#estadoeditar").val(json.Estado);
          $("#editarreservamodal").modal("show");





        }
      });
  });
}
var eliminarreserva = function ()
{
  $("#tablareserva").on("click", "button.del", function(){
    var reservaid = $(this).attr("id_reserva");
    datosreservaeliminar = new FormData();
      datosreservaeliminar.append('idreserva', reservaid);
      datosreservaeliminar.append('acc', "del");
      $.ajax({

        url: "ajax/reserva.ajax.php",
        method: "POST",
        data: datosreservaeliminar,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
          console.log("respuesta", respuesta);
          if (respuesta == "ok") {
            swal({
          title: "Exitos !",
          text: "Eliminado Exitoso",
          type: "success"
        },function(){
          window.location= "reserva";
        });
          } else {
            swal({
          title: "Warning !",
          text: "Hubo un error al ejecutar la accion",
          type: "warning"
        });
          }
        }
      });
  });
}