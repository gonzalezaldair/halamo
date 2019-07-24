/*$.ajax({
	url: "ajax/usuario.ajax.php",
	success:function(respuesta){
		console.log("respuesta", respuesta);
	}
})*/
$(document).ready(function() {
  /*=============================
cargar la tabla de usuarios
=============================*/
tablausuario();


  /*=============================
CREAR USUARIO
=============================*/

crearusuario();

  /*=============================
EDITAR USUARIO
=============================*/


traerdatoseditarusuario();

editarusuario();

  /*=============================
ELIMINAR USUARIO
=============================*/


eliminarusuario();

});



var tablausuario =function(){
  $('#tablausuario').DataTable({
    "ajax": "ajax/usuario.ajax.php",
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

var crearusuario = function()
{
  $("#crearusuario").on("click", function(){
    var formenuevausuario = $("#nuevausuarioform").serialize();
    $.ajax({
        method: "POST",
        url: "ajax/usuario.ajax.php",
        data: formenuevausuario
      }).done(function(data) {
        console.log("data", data);
        if (data = "ok")
        {
          tablapersona();
          alert("exitos");
          $("#Nuevousuario").modal("hide");
        }else{
          alert("error");
        }
      });
  });
}



var traerdatoseditarusuario = function ()
{
  $("#tablausuario").on("click", "button.upd", function(){
    idusuario = $(this).attr("id_usuario");
    $.ajax({
        method: "POST",
        url: "ajax/usuario.ajax.php",
        data: {"acc": "traer", "idusuario": idusuario}
      }).done(function(data) {
        var json = jQuery.parseJSON(data);
        $('#correoeditar').val(json.usuario);
        $('#contrasenaeditar').val(json.contrasena);
        $('#roleditar').val(json.ROL);
        $('#personaeditar').val(json.PERSONA);
        $("#editarusuariomodal").modal("show");
      });
  });
}


var editarusuario = function()
{
  $("#editarusuario").on("click", function(){
    var formeditar = $("#editarusuarioform").serialize();
    $.ajax({
        method: "POST",
        url: "ajax/usuario.ajax.php",
        data: formeditar
      }).done(function(data) {
        if (data = "ok")
        {
          tablapersona();
          alert("exitos");
        }else{
          alert("error");
        }
        $("#editarusuariomodal").modal("hide");
      });
  });
}



var eliminarusuario = function ()
{
  $("#tablausuario").on("click", "button.del", function(){
    idusuario = $(this).attr("id_usuario");
    $.ajax({
        method: "POST",
        url: "ajax/usuario.ajax.php",
        data: {"acc": "del", "idusuario": idusuario}
      }).done(function(data) {
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