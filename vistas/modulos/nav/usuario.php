<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<img src="vistas/dist/img/anonymous.png" class="user-image" alt="User Image">
		<span class="hidden-xs"><?php echo $_SESSION["usuario"]; ?></span>
	</a>
	<ul class="dropdown-menu">
		<!-- Menu Footer-->
		<li class="user-footer">
			<div class="pull-right">
				<a href="salir" class="btn btn-default btn-flat">Salir</a>
			</div>
		</li>
	</ul>
</li>

