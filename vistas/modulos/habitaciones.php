<div class="content-wrapper">
	<section class="content-header">
    <h1>
      Habitacion
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Habitacion</li>
    </ol>
  </section>
  <section class="content">
  	<div class="row">
      <div class="col-md-7 col-xs-12">
        <div class="box">
          <div class="box-header">
            <button type="button" id="btn_nuevo" data-toggle="modal" data-target="#Nuevahabitacionmodal" class="btn btn-primary btn-md"><i class="fa fa-plus">   </i>    Agregar</button>
          </div>
          <div class="box-body">
              <table id="tablahabitacion" class="table table-bordered table-striped dt-responsive" style="width: 100%">
                <thead>
                  <tr>
                    <th>NUM HABITACION</th>
                    <th>ESTADO</th>
                    <th>T. HABITACION</th>
                    <th>IMG</th>
                    <th>ACCIONES</th>
                  </tr>
                </thead>
              </table>
          </div>
        </div>
      </div>

      <div class="col-md-5 col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="text-center">Tipo Habitacion</h3>
            <button type="button" id="btn_nuevo" data-toggle="modal" data-target="#Nuevotipohabitacionmodal" class="btn btn-primary btn-md"><i class="fa fa-plus">   </i>    Agregar</button>
          </div>
          <div class="box-body">
              <table id="tablatipohab" class="table table-bordered table-striped dt-responsive" style="width: 100%">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Detalles</th>
                    <th>Precio</th>
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
                      NUEVO HABITACION
  ===================================================-->

<div class="modal fade" id="Nuevahabitacionmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="font-size: 20px; text-transform: uppercase;" class="modal-title text-center" id="myModalLabel">Nueva Habitacion</h4>
      </div> <!-- FIN MODAL HEADER -->
      <form method="post" name="registrarhabitacion" class="panel-body" id="nuevahabitacionform">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 col-lg-12">
              <div class="input-group form-group" id="errorcrearper">
                <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>
                <input type="number" id="numerohabitacion" name="numerohabitacion" placeholder="Ingrese Num Habitacion" class="form-control">
              </div>
              <span id="help-blockper"></span>
            </div>
            <div class="col-md-12">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-bed"></i></span>
                <select class="form-control" name="tipohab" id="tipohab">
                  <option>Seleccione Tipo Habitacion: </option>
                  <?php
                    $combotipohab = TipoHabControlador::ctrmostrartipohab(null, null);
                    foreach ($combotipohab as $key => $value) {
                      echo '<option value="'.$value["Id_th"].'">'.$value["Descripcion"].'</option>';
                    }
                   ?>
                </select>
              </div>
            </div>
          </div><!-- FIN ROW -->
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-size="xs" data-dismiss="modal">Cerrar</button>
            <input name="acc" type="hidden" id="acc" value="c" />
            <button type="button" class="btn btn-primary" data-color="blue" data-style="zoom-out"  id="crearhabitacion" style="font-size:14px; padding: 6px 12px;">Crear</button>
          </div><!-- FIN MODAL FOOTER  -->
        </div><!-- FIN MODAL BODY -->
      </form>
    </div><!-- FIN MODAL CONTENT -->
  </div><!-- FIN MODAL DIALOG -->
</div><!-- FIN MODAL -->




<!--=====================================================
                      editar HABITACION
  ===================================================-->

<div class="modal fade" id="editarhabitacionmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="font-size: 20px; text-transform: uppercase;" class="modal-title text-center" id="myModalLabel">Editar Habitacion</h4>
      </div> <!-- FIN MODAL HEADER -->
      <form method="post" name="registrarhabitacion" class="panel-body" id="editarhabitacionform">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 col-lg-12">
              <div class="input-group form-group" id="errorcrearper">
                <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                <input type="text" id="codigoeditar" name="codigoeditar" class="form-control" readonly>
              </div>
              <span id="help-blockper"></span>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group" id="errorcrearper">
                <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>
                <input type="number" id="numerohabitacioneditar" name="numerohabitacioneditar" placeholder="Ingrese Num Habitacion" class="form-control">
              </div>
              <span id="help-blockper"></span>
            </div>
            <div class="col-md-12">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-bed"></i></span>
                <select class="form-control" name="tipohabeditar" id="tipohabeditar">
                  <option>Seleccione Tipo Habitacion: </option>
                  <?php
                    $combotipohab = TipoHabControlador::ctrmostrartipohab(null, null);
                    foreach ($combotipohab as $key => $value) {
                      echo '<option value="'.$value["Id_th"].'">'.$value["Descripcion"].'</option>';
                    }
                   ?>
                </select>
              </div>
            </div>
          </div><!-- FIN ROW -->
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-size="xs" data-dismiss="modal">Cerrar</button>
            <input name="acc" type="hidden" id="acc" value="upd" />
            <button type="button" class="btn btn-primary" data-color="blue" data-style="zoom-out"  id="editarhabitacion" style="font-size:14px; padding: 6px 12px;">Crear</button>
          </div><!-- FIN MODAL FOOTER  -->
        </div><!-- FIN MODAL BODY -->
      </form>
    </div><!-- FIN MODAL CONTENT -->
  </div><!-- FIN MODAL DIALOG -->
</div><!-- FIN MODAL -->



<!--=====================================================
                      NUEVO TIPO HABITACION
  ===================================================-->

<div class="modal fade" id="Nuevotipohabitacionmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="font-size: 20px; text-transform: uppercase;" class="modal-title text-center" id="myModalLabel">Nueva Tipo Habitacion</h4>
      </div> <!-- FIN MODAL HEADER -->
      <form method="post" name="registrarhabitacion" class="panel-body" id="nuevotipohabitacionform">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 col-lg-12">
              <div class="input-group form-group" id="errorcrearper">
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                <input type="text" id="nombretipohab" name="nombretipohab" placeholder="Ingrese nombre" class="form-control">
              </div>
              <span id="help-blockper"></span>
            </div>
            <div class="col-md-12 col-lg-12">
              <div class="input-group form-group" id="errorcrearper">
                <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                <input type="number" id="preciotipohab" name="preciotipohab" placeholder="Ingrese Precio" class="form-control">
              </div>
              <span id="help-blockper"></span>
            </div>
          </div><!-- FIN ROW -->
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-size="xs" data-dismiss="modal">Cerrar</button>
            <input name="acc" type="hidden" id="acc" value="c" />
            <button type="button" class="btn btn-primary" data-color="blue" data-style="zoom-out"  id="creartipohabitacion" style="font-size:14px; padding: 6px 12px;">Crear</button>
          </div><!-- FIN MODAL FOOTER  -->
        </div><!-- FIN MODAL BODY -->
      </form>
    </div><!-- FIN MODAL CONTENT -->
  </div><!-- FIN MODAL DIALOG -->
</div><!-- FIN MODAL -->



<!--=====================================================
                      EDITAR TIPO HABITACION
  ===================================================-->


  <div class="modal fade" id="editartipohabitacionmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="font-size: 20px; text-transform: uppercase;" class="modal-title text-center" id="myModalLabel">Nueva Tipo Habitacion</h4>
      </div> <!-- FIN MODAL HEADER -->
      <form method="post" name="registrarhabitacion" class="panel-body" id="editartipohabitacionform">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 col-lg-12">
              <div class="input-group form-group" id="errorcrearper">
                <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                <input type="text" id="codigotipoheditar" name="codigotipoheditar" placeholder="Ingrese nombre" class="form-control" readonly>
              </div>
              <span id="help-blockper"></span>
            </div>
            <div class="col-md-12 col-lg-12">
              <div class="input-group form-group" id="errorcrearper">
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                <input type="text" id="nombretipohabeditar" name="nombretipohabeditar" placeholder="Ingrese nombre" class="form-control">
              </div>
              <span id="help-blockper"></span>
            </div>
            <div class="col-md-12 col-lg-12">
              <div class="input-group form-group" id="errorcrearper">
                <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                <input type="number" id="preciotipohabeditar" name="preciotipohabeditar" placeholder="Ingrese Precio" class="form-control">
              </div>
              <span id="help-blockper"></span>
            </div>
          </div><!-- FIN ROW -->
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-size="xs" data-dismiss="modal">Cerrar</button>
            <input name="acc" type="hidden" id="acc" value="c" />
            <button type="button" class="btn btn-primary" data-color="blue" data-style="zoom-out"  id="editartipohabitacion" style="font-size:14px; padding: 6px 12px;">Crear</button>
          </div><!-- FIN MODAL FOOTER  -->
        </div><!-- FIN MODAL BODY -->
      </form>
    </div><!-- FIN MODAL CONTENT -->
  </div><!-- FIN MODAL DIALOG -->
</div><!-- FIN MODAL -->