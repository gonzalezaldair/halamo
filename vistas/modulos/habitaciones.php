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
      <div class="col-md-8 col-xs-12">
        <div class="box">
          <div class="box-header">
            <button type="button" id="btn_nuevo" data-toggle="modal" data-target="#NuevoC" class="btn btn-primary btn-md"><i class="fa fa-plus">   </i>    Agregar</button>
          </div>
          <div class="box-body">
              <table id="tablahabitacion" class="table table-bordered table-striped dt-responsive" style="width: 100%">
                <thead>
                  <tr>
                    <th>ESTADO</th>
                    <th>NUM HABITACION</th>
                    <th>AGREGADO</th>
                    <th>PRECIO</th>
                    <th>T. HABITACION</th>
                    <th>IMG</th>
                  </tr>
                </thead>
              </table>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="text-center">Tipo Habitacion</h3>
            <button type="button" id="btn_nuevo" data-toggle="modal" data-target="#NuevoC" class="btn btn-primary btn-md"><i class="fa fa-plus">   </i>    Agregar</button>
          </div>
          <div class="box-body">
              <table id="tablatipohab" class="table table-bordered table-striped dt-responsive" style="width: 100%">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Detalles</th>
                  </tr>
                </thead>
              </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>