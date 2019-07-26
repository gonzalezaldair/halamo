<div class="content-wrapper">
	<section class="content-header">
    <h1>
      Reserva
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Reserva</li>
    </ol>
  </section>
  <section class="content">
  	<div class="row">
      <div class="col-xs-12">
        <?php if ($_SESSION["rol"] == 3) {

          echo '<div class="jumbotron">
                  <h1 class="display-4">Bienvenido al Modulo de Reservas</h1>

                  <hr class="my-4">
                  <p class="lead">
                    <button type="button" id="btn_nuevo" data-toggle="modal" data-target="#nuevareservamodal" class="btn btn-primary btn-md"><i class="fa fa-plus">   </i>    Nueva Reservacion</button>
                  </p>
                </div>';


        }else{ ?>
        <div class="box">
          <div class="box-header">
            <button type="button" id="btn_nuevo" data-toggle="modal" data-target="#nuevareservamodal" class="btn btn-primary btn-md"><i class="fa fa-plus">   </i>    Agregar</button>
          </div>
          <div class="box-body">
              <table id="tablareserva" class="table table-bordered table-striped dt-responsive" style="width: 100%">
                <thead>
                  <tr>
                    <th>CODIGO</th>
                    <th>FECHA INGRESO</th>
                    <th>FECHA SALIDA</th>
                    <th>DESCUENTO</th>
                    <th>TOTAL</th>
                    <th>IDENTIFICACION</th>
                    <th>NOMBRE</th>
                    <th>HABITACION</th>
                    <th>ESTADO</th>
                    <th>ACCIONES</th>
                  </tr>
                </thead>
              </table>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
  </section>
</div>


<!--=====================================================
                      NUEVA RESERVA
  ===================================================-->

<div class="modal fade" id="nuevareservamodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="font-size: 20px; text-transform: uppercase;" class="modal-title text-center" id="myModalLabel">Nueva Reserva</h4>
      </div> <!-- FIN MODAL HEADER -->
      <form method="post" name="registrarpersona" class="panel-body" id="nuevareservaform">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="date" id="fechainicio" name="fechainicio" class="form-control fechainicio">
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="date" id="fechasalida" name="fechasalida" class="form-control fechasalida">
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-calendar-times-o"></i></span>
                <input type="number" id="dias" name="dias" class="form-control dias" readonly>
              </div>
            </div>
              <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input type="number" id="persona" name="persona" placeholder="Ingrese Documento" class="form-control personareserva">
              </div>
            </div>
              <div class="col-md-6">
                <div class="input-group form-group">
                  <input type="hidden" name="preciohab" id="preciohab" valorreal="">
                  <span class="input-group-addon"><i class="fa fa-bed"></i></span>
                  <select class="form-control cargarhabitaciones" name="tipohabitacion" id="tipohabitacion">
                    <option>Seleccione: </option>
                    <?php
                      $item = null;
                      $valor = null;
                      $tipohabitacion = TipoHabControlador::ctrmostrartipohab($item, $valor);
                      foreach ($tipohabitacion as $key => $value) {
                        echo '<option id="'.$value["Precio"].'" value="'.$value["Id_th"].'">'.$value["Descripcion"].'</option>';
                      }
                     ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-group form-group">
                  <span class="input-group-addon"><i class="fa fa-bed"></i></span>
                  <select class="form-control validarhabitacion" name="habitacion" id="habitacion">
                    <option>Seleccione: </option>
                    <?php
                      /*$combotipodoc = HabitacionControlador::ctrmostrarhabitacion(null, null);
                      foreach ($combotipodoc as $key => $value) {
                        echo '<option valorhabitacion="'.$value["Precio"].'" value="'.$value["Codigo"].'">'.$value["Num_Habitacion"].'</option>';
                      }*/
                     ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                <input type="number" id="descuento" name="descuento" placeholder="Ingrese descuento" class="form-control descuento">
              </div>
            </div>
              <div class="col-md-6 col-lg-6">
                <div class="input-group form-group">
                  <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                  <input type="text" id="total" name="total"  class="form-control total" readonly>
                  <input type="hidden" id="totalreal" name="totalreal"  class="form-control totalreal" readonly>
                </div>
              </div>


          </div><!-- FIN ROW -->
          <div class="modal-footer">
            <button type="button" class="btn btn-success borrarcampos" data-size="xs" data-dismiss="modal">Cerrar</button>
            <input name="acc" type="hidden" id="acc" value="c" />
            <button type="submit" class="btn btn-primary" data-color="blue" data-style="zoom-out"  id="crearReserva" style="font-size:14px; padding: 6px 12px;">Crear</button>
          </div><!-- FIN MODAL FOOTER  -->
        </div><!-- FIN MODAL BODY -->
      </form>

      <?php $crearreserva = new ReservaControlador();
      $crearreserva -> ctrcrearreserva(); ?>
    </div><!-- FIN MODAL CONTENT -->
  </div><!-- FIN MODAL DIALOG -->
</div><!-- FIN MODAL -->







<!--=====================================================
                      editar RESERVA
  ===================================================-->

<div class="modal fade" id="editarreservamodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="font-size: 20px; text-transform: uppercase;" class="modal-title text-center" id="myModalLabel">Nueva Reserva</h4>
      </div> <!-- FIN MODAL HEADER -->
      <form method="post" name="registrarpersona" class="panel-body" id="editarreservaform">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input type="number" id="codigoeditar" name="codigoeditar" class="form-control" readonly>
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="date" id="fechainicioeditar" name="fechainicioeditar" class="form-control">
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="date" id="fechasalidaeditar" name="fechasalidaeditar" class="form-control">
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-calendar-times-o"></i></span>
                <input type="number" id="diaseditar" name="diaseditar" class="form-control dias" readonly>
              </div>
            </div>
              <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input type="number" id="personaeditar" name="personaeditar" placeholder="Ingrese Documento" class="form-control personareserva">
              </div>
            </div>
              <div class="col-md-6">
                <div class="input-group form-group">
                  <input type="hidden" name="preciohab" id="preciohab" class="preciohab" valorreal="">
                  <span class="input-group-addon"><i class="fa fa-bed"></i></span>
                  <select class="form-control cargarhabitaciones" name="tipohabitacioneditar" id="tipohabitacioneditar">
                    <option>Seleccione: </option>
                    <?php
                      $item = null;
                      $valor = null;
                      $tipohabitacion = TipoHabControlador::ctrmostrartipohab($item, $valor);
                      foreach ($tipohabitacion as $key => $value) {
                        echo '<option id="'.$value["Precio"].'" value="'.$value["Id_th"].'">'.$value["Descripcion"].'</option>';
                      }
                     ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-group form-group">
                  <span class="input-group-addon"><i class="fa fa-bed"></i></span>
                  <select class="form-control validarhabitacion" name="habitacioneditar" id="habitacioneditar">
                    <option>Seleccione: </option>
                    <?php
                      /*$combotipodoc = HabitacionControlador::ctrmostrarhabitacion(null, null);
                      foreach ($combotipodoc as $key => $value) {
                        echo '<option valorhabitacion="'.$value["Precio"].'" value="'.$value["Codigo"].'">'.$value["Num_Habitacion"].'</option>';
                      }*/
                     ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-bars"></i></span>
                <select name="estadoeditar" id="estadoeditar" class="form-control">
                  <option value="0">Reservada</option>
                  <option value="1">Ocupada</option>
                  <option value="2">Cancelada</option>
                </select>
              </div>
            </div>
              <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                <input type="number" id="descuentoeditar" name="descuentoeditar" placeholder="Ingrese descuento" class="form-control descuento">
              </div>
            </div>
              <div class="col-md-6 col-lg-6">
                <div class="input-group form-group">
                  <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                  <input type="text" id="totaleditar" name="totaleditar"  class="form-control total" readonly>
                  <input type="hidden" id="totalrealeditar" name="totalrealeditar"  class="form-control totalreal" readonly>
                </div>
              </div>


          </div><!-- FIN ROW -->
          <div class="modal-footer">
            <button type="button" class="btn btn-success borrarcampos" data-size="xs" data-dismiss="modal">Cerrar</button>
            <input name="acc" type="hidden" id="acc" value="upd" />
            <button type="submit" class="btn btn-primary" data-color="blue" data-style="zoom-out"  id="editarReserva" style="font-size:14px; padding: 6px 12px;">Crear</button>
          </div><!-- FIN MODAL FOOTER  -->
        </div><!-- FIN MODAL BODY -->
      </form>

      <?php $updreserva = new ReservaControlador();
        $updreserva ->  ctrupdreserva(); ?>
    </div><!-- FIN MODAL CONTENT -->
  </div><!-- FIN MODAL DIALOG -->
</div><!-- FIN MODAL -->









<script>

  $("#habitacioneditar").on("change", function() {
    var fecha1 = $("#fechainicioeditar").val();
    var fecha2 = $("#fechasalidaeditar").val();
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

          $("#habitacioneditar").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> Habitacion ocupada</div>')

          validarEmailRepetido = true;

        }

      }
    });
  });
  $("#fechasalida").on("change", function() {
    $fecha2 = $(this).val();
    $fecha1 = $("#fechainicio").val();
    diff = moment($fecha2).diff(moment($fecha1), 'days');
    if (diff > 0) {
      $("#dias").val(diff);
      $(".alert").remove();
    } else {
      $("#dias").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> Fecha Invalida</div>')
    }
  });

  $("#fechasalidaeditar").on("change", function() {
    $fecha2 = $(this).val();
    $fecha1 = $("#fechainicioeditar").val();
    diff = moment($fecha2).diff(moment($fecha1), 'days');
    if (diff > 0) {
      $("#diaseditar").val(diff);
      $(".alert").remove();
    } else {
      $("#diaseditar").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> Fecha Invalida</div>')
    }
  });



  $(".cargarhabitaciones").on("change", function() {
    $(".validarhabitacion").html("");
    valorhabitacion = $(this).val();
    tipohabselect = new FormData();
    tipohabselect.append('idhabitacion', valorhabitacion);
    tipohabselect.append('acc', "traerhab");
    $.ajax({

      url: "ajax/tipohab.ajax.php",
      method: "POST",
      data: tipohabselect,
      cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta) {
        var json = jQuery.parseJSON(respuesta);
        for (var i = 0; i < json.length; i++) {
          $(".validarhabitacion").append('<option value="' + json[i].Codigo + '">' + json[i].Num_Habitacion + '</option>');
        }
      }
    });
  });


  $(".cargarhabitaciones").on("change", function() {
    preciohabitacion = $(this).val();
    preciotipo = new FormData();
    preciotipo.append('idtipohabitacion', valorhabitacion);
    preciotipo.append('acc', "traer");
    $.ajax({

      url: "ajax/tipohab.ajax.php",
      method: "POST",
      data: preciotipo,
      cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta) {
        var json = jQuery.parseJSON(respuesta);
        $(".preciohab").val(json.Precio);
        dias = $(".dias").val();
        precio = $(".preciohab").val();
        total = dias * precio;
        $(".total").val(total);
        $(".totalreal").val(total);
      }
    });
  });

  /*
    $("#preciohab").on("change", function(){
      dias = $("#dias").val();
      precio = $(this).val();
      total = dias*precio;
      console.log("total", total);
      $("#total").val(total);
      $(".total").attr('valorreal', total);

    });*/


  $(".descuento").on("change", function() {
    pordes = $(".descuento").val();
    if (pordes != "" || pordes > 0) {
      $(".total").val(total);
      $(".totalreal").val(total);
      totalsindescuento = $(".total").val();
      des = ($(".descuento").val() * totalsindescuento) / 100;
      totaltal = totalsindescuento - des;
      $(".total").val(totaltal);
      $(".totalreal").val(totaltal);
    }
  });


  $(".total").number(true, 2);
</script>