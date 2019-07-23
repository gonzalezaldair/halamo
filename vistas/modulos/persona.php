<div class="content-wrapper">
	<section class="content-header">
    <h1>
      Persona
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Persona</li>
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
              <table id="tablapersona" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Cedula</th>
                    <th>Nombres</th>
                    <th>Direccion</th>
                    <th>Correo</th>
                    <th>Tipo Documento</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
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
                      NUEVA PERSONA
  ===================================================-->
  <div class="modal fade" id="NuevaPersona" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="font-size: 20px; text-transform: uppercase;" class="modal-title text-center" id="myModalLabel">Nueva Persona</h4>
      </div>
      <div id="error"></div>
      <form method="post" enctype="multipart/form-data" name="newCom" class="panel-body formborrar" id="nuevaPersona">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                <select class="form-control" name="tipodoc" id="tipodoc">
                  <option>Seleccione Tipo Doc.: </option>
                  <option>CC</option>
                  <option>Pasaporte</option>
                </select>
              </div>
              <span id="help-blockper"></span>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group" id="errorcrearper">
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                <input type="text" id="cedula" name="cedula" placeholder="Ingrese Cedula" class="form-control">
              </div>
              <span id="help-blockper"></span>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                <input type="text" id="nombre" name="nombre" placeholder="Ingrese Nombre" class="form-control">
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                <input type="text" id="nombre" name="apellido" placeholder="Ingrese Apellido" class="form-control">
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                <input type="text" id="telefono" name="telefono" placeholder="Ingrese Movil" class="form-control">
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" id="correo" name="correo" placeholder="Ingrese Correo" class="form-control">
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                <input type="text" id="direccion" name="direccion" placeholder="Ingrese Direccion" class="form-control">
              </div>
            </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-success borrarcampos" data-size="xs" data-dismiss="modal">Cerrar</button>
      <input name="acc" type="hidden" id="acc" value="c" />
      <button type="button" class="btn btn-primary" data-color="blue" data-style="zoom-out"  id="crearPersona" style="font-size:14px; padding: 6px 12px;">Crear</button>
    </div>
  </form>
</div>
</div>
</div>



<!--=====================================================
                      EDITAR PERSONA
  ===================================================-->
  <div class="modal fade" id="editarPersona" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="font-size: 20px; text-transform: uppercase;" class="modal-title text-center" id="myModalLabel">Editar Persona</h4>
      </div>
      <div id="error"></div>
      <form method="post" enctype="multipart/form-data" name="newCom" class="panel-body formborrar" id="nuevaPersona">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                <select class="form-control" name="tipodoceditar" id="tipodoceditar" readonly>
                  <option>Seleccione Tipo Doc.: </option>
                  <option>CC</option>
                  <option>Pasaporte</option>
                </select>
              </div>
              <span id="help-blockper"></span>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                <input type="text" id="cedulaeditar" name="cedulaeditar" placeholder="Ingrese Cedula" class="form-control" readonly>
              </div>
              <span id="help-blockper"></span>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                <input type="text" id="nombreeditar" name="nombreeditar" placeholder="Ingrese Nombre" class="form-control">
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                <input type="text" id="apellidoeditar" name="apellidoeditar" placeholder="Ingrese Apellido" class="form-control">
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                <input type="text" id="telefonoeditar" name="telefonoeditar" placeholder="Ingrese Movil" class="form-control">
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" id="correoeditar" name="correoeditar" placeholder="Ingrese Correo" class="form-control">
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="input-group form-group">
                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                <input type="text" id="direccioneditar" name="direccioneditar" placeholder="Ingrese Direccion" class="form-control">
              </div>
            </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-success borrarcampos" data-size="xs" data-dismiss="modal">Cerrar</button>
      <input name="acc" type="hidden" id="acc" value="c" />
      <button type="button" class="btn btn-primary" data-color="blue" data-style="zoom-out"  id="crearPersona" style="font-size:14px; padding: 6px 12px;">Crear</button>
    </div>
  </form>
</div>
</div>
</div>