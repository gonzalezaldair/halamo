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
        <div class="box">
          <div class="box-header">
            <button type="button" id="btn_nuevo" data-toggle="modal" data-target="#NuevaPersona" class="btn btn-primary btn-md"><i class="fa fa-plus">   </i>    Agregar</button>
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
                    <th>CLIENTE</th>
                    <th>HABITACION</th>
                    <th>ACCIONES</th>
                  </tr>
                </thead>
              </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


<!--=====================================================
                      NUEVA RESERVA
  ===================================================-->

<div class="modal fade" id="NuevaPersona" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="font-size: 20px; text-transform: uppercase;" class="modal-title text-center" id="myModalLabel">Nueva Reserva</h4>
      </div> <!-- FIN MODAL HEADER -->
      <form method="post" name="registrarpersona" class="panel-body" id="nuevaPersonaform">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="date" id="fechainicio" name="fechainicio" class="form-control">
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="date" id="fechasalida" name="fechasalida" class="form-control">
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                <input type="number" id="descuento" name="descuento" placeholder="Ingrese descuento" class="form-control">
              </div>
            </div>
              <div class="col-md-6">
                <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                <select class="form-control" name="cliente" id="cliente">
                  <option>Seleccione: </option>
                  <?php
                    $combotipodoc = TipoDocControlador::ctrmostrartipodoc(null, null);
                    foreach ($combotipodoc as $key => $value) {
                      echo '<option value="'.$value["Id_tp"].'">'.$value["Descripcion"].'</option>';
                    }
                   ?>
                </select>
              </div>
              </div>
              <div class="col-md-6">
                <div class="input-group form-group">
                  <span class="input-group-addon"><i class="fa fa-bed"></i></span>
                  <select class="form-control" name="habitacion" id="habitacion">
                    <option>Seleccione: </option>
                    <?php
                      $combotipodoc = HabitacionControlador::ctrmostrarhabitacion(null, null);
                      foreach ($combotipodoc as $key => $value) {
                        echo '<option valorhabitacion="'.$value["Precio"].'" value="'.$value["Codigo"].'">'.$value["Num_Habitacion"].'</option>';
                      }
                     ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="input-group form-group">
                  <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                  <input type="text" id="total" name="total"  class="form-control" readonly>
                </div>
              </div>


          </div><!-- FIN ROW -->
          <div class="modal-footer">
            <button type="button" class="btn btn-success borrarcampos" data-size="xs" data-dismiss="modal">Cerrar</button>
            <input name="acc" type="hidden" id="acc" value="c" />
            <button type="button" class="btn btn-primary" data-color="blue" data-style="zoom-out"  id="crearPersona" style="font-size:14px; padding: 6px 12px;">Crear</button>
          </div><!-- FIN MODAL FOOTER  -->
        </div><!-- FIN MODAL BODY -->
      </form>
    </div><!-- FIN MODAL CONTENT -->
  </div><!-- FIN MODAL DIALOG -->
</div><!-- FIN MODAL -->

<script>
  $("#fechasalida").on("change", function(){
    $fecha2 = $(this).val();
    $fecha1 = $("#fechainicio").val();
    diff = moment($fecha2).diff(moment($fecha1), 'days');
    console.log("diff", diff);
  })
</script>