<?php session_start();
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>HOTEL | ALAMO</title>
	<link rel="icon" href="vistas/dist/img/favicon13.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="vistas/bower_components/jvectormap/jquery-jvectormap.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="vistas/dist/css/AdminLTE.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="vistas/plugins/iCheck/square/blue.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="vistas/bower_components/select2/dist/css/select2.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  	folder instead of downloading all of them to reduce the load. -->
  	<link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">
  	<!-- Morris chart -->
  	<link rel="stylesheet" href="vistas/bower_components/morris.js/morris.css">
  	<!-- jvectormap -->
  	<link rel="stylesheet" href="vistas/bower_components/jvectormap/jquery-jvectormap.css">
  	<!-- Date Picker -->
  	<link rel="stylesheet" href="vistas/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  	<!-- Daterange picker -->
  	<link rel="stylesheet" href="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  	<!-- Bootstrap time Picker -->
  	<link rel="stylesheet" href="vistas/plugins/timepicker/bootstrap-timepicker.min.css">
  	<!-- bootstrap wysihtml5 - text editor -->
  	<link rel="stylesheet" href="vistas/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  	<link rel="stylesheet" href="vistas/css/sweetalert.css">
  	<link rel="stylesheet" href="vistas/css/masestilos.css">
  	<link rel="stylesheet" href="vistas/css/xeditable.css">

  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  	<!--=====================================
  			PLUGINS DE JAVASCRIPT
  	======================================-->

  	<!-- jQuery 3 -->
  	<script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
  	<!-- jQuery UI 1.11.4 -->
  	<script src="vistas/bower_components/jquery-ui/jquery-ui.min.js"></script>
  	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<!--<script>
		$.widget.bridge('uibutton', $.ui.button);
	</script>-->
	<!-- Bootstrap 3.3.7 -->
	<script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- Select2 -->
	<script src="vistas/bower_components/select2/dist/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
	<script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
	<!-- Morris.js charts -->
	<script src="vistas/bower_components/raphael/raphael.min.js"></script>
	<script src="vistas/bower_components/morris.js/morris.min.js"></script>
	<!-- Sparkline -->
	<script src="vistas/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
	<!-- jvectormap -->
	<script src="vistas/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="vistas/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<!-- jQuery Knob Chart -->
	<script src="vistas/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
	<!-- jQuery Number -->
   <script src="vistas/plugins/jqueryNumber/jquerynumber.min.js"></script>
	<!-- daterangepicker -->
	<script src="vistas/bower_components/moment/min/moment.min.js"></script>
	<script src="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- datepicker -->
	<script src="vistas/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<!-- bootstrap time picker -->
	<script src="vistas/plugins/timepicker/bootstrap-timepicker.min.js"></script>
	<!-- Bootstrap WYSIHTML5 -->
	<script src="vistas/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	<!-- Slimscroll -->
	<script src="vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="vistas/dist/js/adminlte.min.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<!-- ChartJS -->
	<script src="vistas/bower_components/chart.js/Chart.js"></script>
	<!-- <script src="vistas/dist/js/pages/dashboard.js"></script> -->
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<!-- <script src="vistas/dist/js/pages/dashboard2.js"></script> -->
	<!-- AdminLTE for demo purposes -->
	<!-- iCheck -->
	<script src="vistas/plugins/iCheck/icheck.min.js"></script>
	<script>
		$(function () {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%' /* optional */
			});

			/* jQueryKnob */
			$('.knob').knob();
		});
	</script>
	<script src="vistas/js/xeditable.js"></script>
	<script src="vistas/js/sweetalert.min.js"></script>

</head>
<body class="hold-transition skin-green-light sidebar-mini login-page sidebar-collapse">
	<?php
	if(isset($_SESSION["validar"]) && $_SESSION["validar"] === true)
	{
		echo '<div class="wrapper">';
		/*--==========================================
		menu superior
		===========================================-*/
		include 'vistas/modulos/navegador.php';
		/*--==========================================
		menu lateral
		===========================================-*/
		include 'vistas/modulos/lateral.php';
		if(isset($_GET["action"])){
			if($_GET["action"]== "inicio" ||
				$_GET["action"]== "salir" ||
				$_GET["action"]== "acceso" ||
				$_GET["action"]== "configuracion" ||
				$_GET["action"]== "habitaciones" ||
				$_GET["action"]== "persona" ||
				$_GET["action"]== "reporte" ||
				$_GET["action"]== "reserva" ||
				$_GET["action"]== "rol" ||
				$_GET["action"]== "usuario"){
				include "modulos/".$_GET["action"].".php";
				include 'modulos/footer.php';
			}else{
				include 'modulos/404.php';
				include 'modulos/footer.php';
			}

	}else
	{
		include 'modulos/salir.php';
	}
	echo '</div>';

}

else
{
	if (isset($_GET["action"])) {
		if ($_GET["action"]== "registro") {
			include "modulos/".$_GET["action"].".php";
		}
		else{
		include 'modulos/login.php';
		}
	}
	else{
		include 'modulos/login.php';
	}
}?>


	<script src="vistas/js/persona.js"></script>
	<script src="vistas/js/usuario.js"></script>
	<script src="vistas/js/rol.js"></script>
	<script src="vistas/js/habitacion.js"></script>
	<script src="vistas/js/tipohab.js"></script>
	<script src="vistas/js/reserva.js"></script>

</body>
</html>