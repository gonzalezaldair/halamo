<div class="content-wrapper">
	<section class="content-header">
    <h1>
      Rol
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Rol</li>
    </ol>
  </section>
  <section class="content">
  	<div class="row">
      <div class="col-xs-12 col-md-6">
        <div class="box">
          <div class="box-header">
            <button type="button" id="btn_nuevo" data-toggle="modal" data-target="#Nuevorolmodal" class="btn btn-primary btn-md"><i class="fa fa-plus">   </i>    Agregar</button>
          </div>
          <div class="box-body">
              <table id="tablarol" class="table table-bordered table-striped dt-responsive text-center" style="width: 100%">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
              </table>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-6">
        <div class="box">
          <div class="box-header">
          </div>
          <div class="box-body">
            <form method="post" id="formrolfuncionalidad">
              <h3 class="text-center"> Rol - Funcionalidad</h3>
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-group"></i></span>
                <select class="form-control" name="rol" id="rol">
                  <option>Seleccione: </option>
                  <?php
                    $comborol = RolControlador::ctrMostrarrol(null, null);
                    foreach ($comborol as $key => $value) {
                      echo '<option value="'.$value["Id"].'">'.$value["Nombre"].'</option>';
                    }
                   ?>
                </select>
              </div>
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-th-list"></i></span>
                <select class="form-control multipleselect" multiple="multiple" name="funcionalidad" id="funcionalidad" style="width: 100%;">
                  <?php
                    $comborol = FuncionalidadControlador::ctrmostrarfuncionalidad(null, null);
                    foreach ($comborol as $key => $value) {
                      echo '<option value="'.$value["Id"].'">'.$value["Nombre"].'</option>';
                    }
                   ?>
                </select>
              </div>
              <input name="acc" id="acc" type="hidden" id="acc" value="rolfun" />

              <button type="button" class="btn btn-primary btn-md" id="btn_agregarfun">Enviar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


<!--=====================================================
                      NUEVO ROL
  ===================================================-->

<div class="modal fade" id="Nuevorolmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="font-size: 20px; text-transform: uppercase;" class="modal-title text-center" id="myModalLabel">Nuevo Rol</h4>
      </div> <!-- FIN MODAL HEADER -->
      <form method="post" name="registrarrol" class="panel-body" id="nuevorolform">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 col-lg-12">
              <div class="input-group form-group" id="errorcrearper">
                <span class="input-group-addon"><i class="fa fa-text-height"></i></span>
                <input type="text" id="nombre" name="nombre" placeholder="Ingrese Nombre" class="form-control">
              </div>
              <span id="help-blockper"></span>
            </div>
            <div class="col-md-12 col-lg-12">
              <div class="form-group">
                <textarea class="form-control" name="detalles" id="detalles"></textarea>
              </div>
            </div>
          </div><!-- FIN ROW -->
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-size="xs" data-dismiss="modal">Cerrar</button>
            <input name="acc" type="hidden" id="acc" value="c" />
            <button type="button" class="btn btn-primary" data-color="blue" data-style="zoom-out"  id="crearrol" style="font-size:14px; padding: 6px 12px;">Crear</button>
          </div><!-- FIN MODAL FOOTER  -->
        </div><!-- FIN MODAL BODY -->
      </form>
    </div><!-- FIN MODAL CONTENT -->
  </div><!-- FIN MODAL DIALOG -->
</div><!-- FIN MODAL -->




<!--=====================================================
                      editar ROL
  ===================================================-->

<div class="modal fade" id="editarrolmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="font-size: 20px; text-transform: uppercase;" class="modal-title text-center" id="myModalLabel">Editar Rol</h4>
      </div> <!-- FIN MODAL HEADER -->
      <form method="post" name="editarrolform" class="panel-body" id="editarrolform">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 col-lg-12">
              <div class="input-group form-group" id="errorcrearper">
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                <input type="text" id="roleditar" name="roleditar" placeholder="Ingrese Rol" class="form-control" readonly>
              </div>
              <span id="help-blockper"></span>
            </div>
            <div class="col-md-12 col-lg-12">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-text-height"></i></span>
                <input type="text" id="nombreeditar" name="nombreeditar" placeholder="Ingrese Nombre" class="form-control">
              </div>
              <span id="help-blockper"></span>
            </div>
            <div class="col-md-12 col-lg-12">
              <div class="form-group">
                <textarea class="form-control" name="detalleseditar" id="detalleseditar"></textarea>
              </div>
            </div>
          </div><!-- FIN ROW -->
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-size="xs" data-dismiss="modal">Cerrar</button>
            <input name="acc" type="hidden" id="acc" value="upd" />
            <button type="button" class="btn btn-primary" data-color="blue" data-style="zoom-out"  id="editarrol" style="font-size:14px; padding: 6px 12px;">Crear</button>
          </div><!-- FIN MODAL FOOTER  -->
        </div><!-- FIN MODAL BODY -->
      </form>
    </div><!-- FIN MODAL CONTENT -->
  </div><!-- FIN MODAL DIALOG -->
</div><!-- FIN MODAL -->


<script>
  $(function () {
    $(".multipleselect").select2({
      theme: "classic"
    });
  })
</script>

