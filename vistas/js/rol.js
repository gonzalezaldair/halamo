/*$.ajax({
	url: "ajax/rol.ajax.php",
	success:function(respuesta){
		console.log("respuesta", respuesta);
	}
})*/
$(document).ready(function() {
  /*=============================
cargar la tabla de aritculos ma
=============================*/

tablarol();


  /*=============================
CREAR ROL
=============================*/

crearrol();

/*=============================
EDITAR ROL
=============================*/

traerdatoseditarrol();


editarrol();


/*=============================
ELIMINAR ROL
=============================*/


eliminarrol();


/*=============================
 ROL funcionalidad
=============================*/

rolfuncionalidad();

});


var tablarol = function ()
  {
    $('#tablarol').DataTable({
    "ajax": "ajax/rol.ajax.php",
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



  var crearrol = function()
{
  $("#crearrol").on("click", function(){
    var formenuevorol = $("#nuevorolform").serialize();
    $.ajax({
        method: "POST",
        url: "ajax/rol.ajax.php",
        data: formenuevorol
      }).done(function(data) {
        console.log("data", data);
        if (data = "ok")
        {
          swal({
          title: "Exitos !",
          text: "Registro Exitos",
          type: "success"
        },function(){
          window.location = "rol";
        });
          $("#Nuevorolmodal").modal("hide");
        }else{
          swal({
          title: "Warning !",
          text: "Hubo un error al ejecutar la accion",
          type: "warning"
        });
        }
      });
  });
}



var traerdatoseditarrol = function ()
{
  $("#tablarol").on("click", "button.upd", function(){
    idrol = $(this).attr("id_rol");
    $.ajax({
        method: "POST",
        url: "ajax/rol.ajax.php",
        data: {"acc": "traer", "idrol": idrol}
      }).done(function(data) {
        var json = jQuery.parseJSON(data);
        $('#roleditar').val(json.Id);
        $('#nombreeditar').val(json.Nombre);
        $('#detalleseditar').val(json.Descripcion);
        $("#editarrolmodal").modal("show");
      });
  });
}


var editarrol = function()
{
  $("#editarrol").on("click", function(){
    var formeditar = $("#editarrolform").serialize();
    $.ajax({
        method: "POST",
        url: "ajax/rol.ajax.php",
        data: formeditar
      }).done(function(data) {
        console.log("data", data);
        if (data = "ok")
        {
          swal({
          title: "success !",
          text: "Registro Exitoso",
          type: "success"
        });
        }else{
          swal({
          title: "Warning !",
          text: "Hubo un error al ejecutar la accion",
          type: "warning"
        });
        }
        $("#editarrolmodal").modal("hide");
      });
  });
}



var eliminarrol = function ()
{
  $("#tablarol").on("click", "button.del", function(){
    idrol = $(this).attr("id_rol");
    $.ajax({
        method: "POST",
        url: "ajax/rol.ajax.php",
        data: {"acc": "del", "idrol": idrol}
      }).done(function(data) {
        if (data = "ok")
        {
          swal({
          title: "Exitos !",
          text: "Eliminado Exitoso",
          type: "success"
        },function()
        {
          window.location = "rol";
        });
        }else{
          swal({
          title: "Warning !",
          text: "Hubo un error al ejecutar la accion",
          type: "warning"
        });
        }
      });
  });
}


var rolfuncionalidad = function()
{
  $("#btn_agregarfun").on("click", function() {
    //rolfunform = $("#formrolfuncionalidad").serialize();
    rol = $("#rol").val();
    funcionalidad = $("#funcionalidad").val();
    acc = $("#acc").val();
    rolfunform = new FormData();
    rolfunform.append('rol', rol);
    rolfunform.append('funcionalidad', funcionalidad);
    rolfunform.append('acc', acc);

    console.log("rolfunform", rolfunform);
    $.ajax({
      method: "POST",
      url: "ajax/rol.ajax.php",
      data: rolfunform,
      cache: false,
      contentType: false,
      processData: false
    }).done(function(data) {
      console.log("data", data);
      if (data = "ok") {
        swal({
          title: "Exitos !",
          text: "Registro exitoso",
          type: "success"
        },function(){
          window.location = "rol";
        });
      } else {
        swal({
          title: "Warning !",
          text: "Hubo un error al ejecutar la accion",
          type: "warning"
        });
      }
    });
  });
}