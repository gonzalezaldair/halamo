<?php
if ($_SESSION["rol"] != 1) {
   echo '<script> window.location = "inicio"; </script>';
 }
 ?>
<div class="content-wrapper">
	<section class="content-header">
    <h1>
      Clientes
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Clientes</li>
    </ol>
  </section>
  <section class="content">
  	<div class="row">
      <div class="col-xs-12 col-md-12">
        <div class="box">
          <div class="box-header">
            <button type="button" id="btn_nuevo" data-toggle="modal" data-target="#Nuevoclientemodal" class="btn btn-primary btn-md"><i class="fa fa-plus">   </i>    Agregar</button>
          </div>
          <div class="box-body">
              <table id="tablaclientes" class="table table-bordered table-striped dt-responsive text-center" style="width: 100%">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descuento</th>
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
                      NUEVO CLIENTE
  ===================================================-->

<div class="modal fade" id="Nuevoclientemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="font-size: 20px; text-transform: uppercase;" class="modal-title text-center" id="myModalLabel">Nuevo Cliente</h4>
      </div> <!-- FIN MODAL HEADER -->
      <form method="post" name="registrarrol" class="panel-body" id="nuevoclienteform">
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
              <div class="input-group form-group" id="errorcrearper">
                <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                <input type="text" id="descuento" name="descuento" placeholder="Ingrese descuento" class="form-control">
              </div>
              <span id="help-blockper"></span>
            </div>
          </div><!-- FIN ROW -->
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-size="xs" data-dismiss="modal">Cerrar</button>
            <input name="acc" type="hidden" id="acc" value="c" />
            <button type="button" class="btn btn-primary" data-color="blue" data-style="zoom-out"  id="crearcliente" style="font-size:14px; padding: 6px 12px;">Crear</button>
          </div><!-- FIN MODAL FOOTER  -->
        </div><!-- FIN MODAL BODY -->
      </form>
    </div><!-- FIN MODAL CONTENT -->
  </div><!-- FIN MODAL DIALOG -->
</div><!-- FIN MODAL -->




<!--=====================================================
                      editar CLIENTE
  ===================================================-->

<div class="modal fade" id="editarclientemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="font-size: 20px; text-transform: uppercase;" class="modal-title text-center" id="myModalLabel">Nuevo Cliente</h4>
      </div> <!-- FIN MODAL HEADER -->
      <form method="post" name="registrarrol" class="panel-body" id="editarclienteform">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 col-lg-12">
              <div class="input-group form-group" id="errorcrearper">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input type="text" id="codigoeditar" name="codigoeditar"  class="form-control" readonly>
              </div>
              <span id="help-blockper"></span>
            </div>
            <div class="col-md-12 col-lg-12">
              <div class="input-group form-group" id="errorcrearper">
                <span class="input-group-addon"><i class="fa fa-text-height"></i></span>
                <input type="text" id="nombreeditar" name="nombreeditar" placeholder="Ingrese Nombre" class="form-control">
              </div>
              <span id="help-blockper"></span>
            </div>
            <div class="col-md-12 col-lg-12">
              <div class="input-group form-group" id="errorcrearper">
                <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                <input type="text" id="descuentoeditar" name="descuentoeditar" placeholder="Ingrese descuento" class="form-control">
              </div>
              <span id="help-blockper"></span>
            </div>
          </div><!-- FIN ROW -->
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-size="xs" data-dismiss="modal">Cerrar</button>
            <input name="acc" type="hidden" id="acc" value="upd" />
            <button type="button" class="btn btn-primary" data-color="blue" data-style="zoom-out"  id="editarcliente" style="font-size:14px; padding: 6px 12px;">Crear</button>
          </div><!-- FIN MODAL FOOTER  -->
        </div><!-- FIN MODAL BODY -->
      </form>
    </div><!-- FIN MODAL CONTENT -->
  </div><!-- FIN MODAL DIALOG -->
</div><!-- FIN MODAL -->
