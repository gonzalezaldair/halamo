<div class="content-wrapper">
	<section class="content-header">
    <h1>
      Usuario
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Usuario</li>
    </ol>
  </section>
  <section class="content">
  	<div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <button type="button" id="btn_nuevo" data-toggle="modal" data-target="#Nuevousuario" class="btn btn-primary btn-md"><i class="fa fa-plus">   </i>    Agregar</button>
          </div>
          <div class="box-body">
              <table id="tablausuario" class="table table-bordered table-striped dt-responsive" style="width: 100%">
                <thead>
                  <tr>
                    <th>USUARIO</th>
                    <th>ROL</th>
                    <th>AGREGADO</th>
                    <th>LOG</th>
                    <th>ACTIVO</th>
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
                      NUEVO USUARIO
  ===================================================-->

<div class="modal fade" id="Nuevousuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="font-size: 20px; text-transform: uppercase;" class="modal-title text-center" id="myModalLabel">Nuevo Usuario</h4>
      </div> <!-- FIN MODAL HEADER -->
      <form method="post" name="registrarusuario" class="panel-body" id="nuevausuarioform">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group" id="errorcrearper">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="text" id="correo" name="correo" placeholder="Ingrese correo" class="form-control">
              </div>
              <span id="help-blockper"></span>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-text-width"></i></span>
                <input type="password" id="contrasena" name="contrasena" placeholder="Ingrese Contraseña" class="form-control">
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
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
              <span id="help-blockper"></span>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                <select class="form-control" name="persona" id="persona">
                  <option>Seleccione: </option>
                  <?php
                    $combopersona = PersonaControlador::ctrmostrarpersona(null, null);
                    foreach ($combopersona as $key => $value) {
                      echo '<option value="'.$value["Num_Documento"].'">'.$value["Nombre"].' '.$value["Apellido"].'</option>';
                    }
                   ?>
                </select>
              </div>
              <span id="help-blockper"></span>
            </div>
          </div><!-- FIN ROW -->
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-size="xs" data-dismiss="modal">Cerrar</button>
            <input name="acc" type="hidden" id="acc" value="c" />
            <button type="button" class="btn btn-primary" data-color="blue" data-style="zoom-out"  id="crearusuario" style="font-size:14px; padding: 6px 12px;">Crear</button>
          </div><!-- FIN MODAL FOOTER  -->
        </div><!-- FIN MODAL BODY -->
      </form>
    </div><!-- FIN MODAL CONTENT -->
  </div><!-- FIN MODAL DIALOG -->
</div><!-- FIN MODAL -->




<!--=====================================================
                      EDITAR USUARIO
  ===================================================-->

<div class="modal fade" id="editarusuariomodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="font-size: 20px; text-transform: uppercase;" class="modal-title text-center" id="myModalLabel">Nueva Persona</h4>
      </div> <!-- FIN MODAL HEADER -->
      <form method="post" name="registrarusuario" class="panel-body" id="editarusuarioform">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group" id="errorcrearper">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="text" id="correoeditar" name="correoeditar" placeholder="Ingrese correo" class="form-control" readonly>
              </div>
              <span id="help-blockper"></span>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-text-width"></i></span>
                <input type="password" id="contrasenaeditar" name="contrasenaeditar" placeholder="Ingrese Nombre" class="form-control">
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-group"></i></span>
                <select class="form-control" name="roleditar" id="roleditar">
                  <option>Seleccione: </option>
                  <?php
                    $comborol = RolControlador::ctrMostrarrol(null, null);
                    foreach ($comborol as $key => $value) {
                      echo '<option value="'.$value["Id"].'">'.$value["Nombre"].'</option>';
                    }
                   ?>
                </select>
              </div>
              <span id="help-blockper"></span>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                <select class="form-control" name="personaeditar" id="personaeditar" readonly>
                  <option>Seleccione: </option>
                  <?php
                    $combopersona = PersonaControlador::ctrmostrarpersona(null, null);
                    foreach ($combopersona as $key => $value) {
                      echo '<option value="'.$value["Num_Documento"].'">'.$value["Nombre"].' '.$value["Apellido"].'</option>';
                    }
                   ?>
                </select>
              </div>
              <span id="help-blockper"></span>
            </div>
          </div><!-- FIN ROW -->
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-size="xs" data-dismiss="modal">Cerrar</button>
            <input name="acc" type="hidden" id="acc" value="upd" />
            <button type="button" class="btn btn-primary" data-color="blue" data-style="zoom-out"  id="editarusuario" style="font-size:14px; padding: 6px 12px;">Crear</button>
          </div><!-- FIN MODAL FOOTER  -->
        </div><!-- FIN MODAL BODY -->
      </form>
    </div><!-- FIN MODAL CONTENT -->
  </div><!-- FIN MODAL DIALOG -->
</div><!-- FIN MODAL -->