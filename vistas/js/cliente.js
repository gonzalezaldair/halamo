/*$.ajax({
	url: "ajax/tipocliente.ajax.php",
	success:function(respuesta){
		console.log("respuesta", respuesta);
	}
})*/
$(document).ready(function() {
  /*=============================
cargar la tabla de aritculos ma
=============================*/

tablacliente();


  /*=============================
CREAR ROL
=============================*/

crearcliente();

/*=============================
EDITAR ROL
=============================*/

traerdatoseditarcliente();


editarcliente();


/*=============================
ELIMINAR ROL
=============================*/


eliminarcliente();



});


var tablacliente = function ()
  {
    $('#tablaclientes').DataTable({
    "ajax": "ajax/tipocliente.ajax.php",
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



  var crearcliente = function()
{
  $("#crearcliente").on("click", function(){
    var formenuevorol = $("#nuevoclienteform").serialize();
    $.ajax({
        method: "POST",
        url: "ajax/tipocliente.ajax.php",
        data: formenuevorol
      }).done(function(data) {
        console.log("data", data);
        if (data = "ok")
        {
          alert("exitos");
          $("#Nuevoclientemodal").modal("hide");
        }else{
          alert("error");
        }
      });
  });
}



var traerdatoseditarcliente = function ()
{
  $("#tablaclientes").on("click", "button.upd", function(){
    idcliente = $(this).attr("id_cliente");
    $.ajax({
        method: "POST",
        url: "ajax/tipocliente.ajax.php",
        data: {"acc": "traer", "idcliente": idcliente}
      }).done(function(data) {
        var json = jQuery.parseJSON(data);
        $('#codigoeditar').val(json.Id_tc);
        $('#nombreeditar').val(json.Descripcion);
        $('#descuentoeditar').val(json.Descuento);
        $("#editarclientemodal").modal("show");
      });
  });
}


var editarcliente = function()
{
  $("#editarcliente").on("click", function(){
    var formeditar = $("#editarclienteform").serialize();
    $.ajax({
        method: "POST",
        url: "ajax/tipocliente.ajax.php",
        data: formeditar
      }).done(function(data) {
        console.log("data", data);
        if (data = "ok")
        {
          alert("exitos");
          $("#editarclientemodal").modal("hide");
        }else{
          alert("error");
        }
      });
  });
}



var eliminarcliente = function ()
{
  $("#tablaclientes").on("click", "button.del", function(){
    idcliente = $(this).attr("id_cliente");
    $.ajax({
        method: "POST",
        url: "ajax/tipocliente.ajax.php",
        data: {"acc": "del", "idcliente": idcliente}
      }).done(function(data) {
        console.log("data", data);
        if (data = "ok")
        {
          tablapersona();
          alert("exitos");
        }else{
          alert("error");
        }
      });
  });
}

