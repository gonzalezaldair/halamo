/*$.ajax({
	url: "ajax/tipohab.ajax.php",
	success:function(respuesta){
		console.log("respuesta", respuesta);
	}
})*/
$(document).ready(function() {
  /*=============================
cargar la tabla de aritculos ma
=============================*/

objetoDataTables_personal();


  /*=============================
CREAR TIPO HABITACION
=============================*/


creartipohabitacion();

/*=============================
EDITAR TIPO HABITACION
=============================*/

traerdatostipohabitacion();

editartipohabitacion();

/*=============================
ELIMINAR TIPO HABITACION
=============================*/

eliminartipohabitacion();

});


var objetoDataTables_personal = function()
{
  $('#tablatipohab').DataTable({
    "ajax": "ajax/tipohab.ajax.php",
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



var creartipohabitacion = function()
{
  $("#creartipohabitacion").on("click", function(){
    tipohabform = $("#nuevotipohabitacionform").serialize();
    $.ajax({
        method: "POST",
        url: "ajax/tipohab.ajax.php",
        data: tipohabform
      }).done(function(data) {
        console.log("data", data);
        if (data = "ok")
        {
          alert("exitos");
        }else{
          alert("error");
        }
        $("#Nuevotipohabitacionmodal").modal("hide");
      });
  })
}

var traerdatostipohabitacion = function()
{
  $("#tablatipohab").on("click", "button.upd", function(){
    idtipohabitacion = $(this).attr('id_tipoh');
    $.ajax({
        method: "POST",
        url: "ajax/tipohab.ajax.php",
        data: {"acc": "traer", "idtipohabitacion": idtipohabitacion}
      }).done(function(data) {
        var json = jQuery.parseJSON(data);
        $('#codigotipoheditar').val(json.Id_th);
        $('#nombretipohabeditar').val(json.Descripcion);
        $('#preciotipohabeditar').val(json.Precio);
        $("#editartipohabitacionmodal").modal("show");
      });
  });
}


var editartipohabitacion = function()
{
  $("#editartipohabitacion").on("click", function(){
    formdatahabitacion = $("#editartipohabitacionform").serialize();
    $.ajax({
        method: "POST",
        url: "ajax/tipohab.ajax.php",
        data: formdatahabitacion
      }).done(function(data) {
        console.log("data", data);
        if (data = "ok")
        {
          alert("exitos");
        }else{
          alert("error");
        }
        $("#editartipohabitacionmodal").modal("hide");
      });
  });
}


var eliminartipohabitacion = function()
{
  $("#tablatipohab").on("click", "button.del", function(){
    idtipohabitacion = $(this).attr('id_tipoh');
    $.ajax({
        method: "POST",
        url: "ajax/tipohab.ajax.php",
        data: {"acc": "del", "idtipohabitacion": idtipohabitacion}
      }).done(function(data) {
        console.log("data", data);
        if (data = "ok")
        {
          alert("exitos");
        }else{
          alert("error");
        }
      });
  });
}