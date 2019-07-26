<?php
if ($_SESSION["rol"] != 1) {
   echo '<script> window.location = "inicio"; </script>';
 }

 $habitacion = HabitacionControlador::ctrmostrarhabitacion(null, null);

 $reservas = ReservaControlador::ctrmostrarreserva(null, null);
 ?>
<div class="content-wrapper">
	<section class="content-header">
    <h1>
      Reporte
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Reporte</li>
    </ol>
  </section>
  <section class="content">
  	<div class="row">
      <div class="col-xs-12 col-md-12">
         <!-- solid sales graph -->
          <div class="box box-solid bg-teal-gradient">
            <div class="box-header">
              <i class="fa fa-th"></i>

              <h3 class="box-title">Sales Graph</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            <div class="box-body border-radius-none">
              <div class="chart" id="line-chart" style="height: 250px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
        <div class="box">
          <div class="box-header">
          </div>
          <div class="box-body">

          <!-- /.box -->
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


<script>
  var line = new Morris.Line({
    element          : 'line-chart',
    resize           : true,
    data             : [
      { y: '2011 01', item1: 8432 },
      { y: '2012 01', item1: 6810 },
      { y: '2013 01', item1: 8432 }
    ],
    xkey             : 'y',
    ykeys            : ['item1'],
    labels           : ['Item 1'],
    lineColors       : ['#efefef'],
    lineWidth        : 2,
    hideHover        : 'auto',
    gridTextColor    : '#fff',
    gridStrokeWidth  : 0.4,
    pointSize        : 4,
    pointStrokeColors: ['#efefef'],
    gridLineColor    : '#efefef',
    gridTextFamily   : 'Open Sans',
    gridTextSize     : 10
  });
</script>



