
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="vistas/dist/img/anonymous.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["usuario"] ; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!--
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU NAVEGACION</li>
        <li>
          <a href="inicio">
            <i class="fa fa-dashboard"></i> <span>Inicio</span>
          </a>
        </li>
        <?php
        $item = "ROL";
        $valor = 1;
        $rolfuncionalidad =RolControlador::ctrRolfuncionalidad($item,$valor);
        for ($i=0; $i < count($rolfuncionalidad); $i++) {
          $funcionalidad = FuncionalidadControlador::ctrmostrarfuncionalidad("Id",$rolfuncionalidad[$i]["FUNCIONALIDAD"]);
          echo '<li>
                  <a href="'.$funcionalidad["Ruta"].'">
                    <i class="'.$funcionalidad["Icon"].'"></i> <span>'.$funcionalidad["Nombre"].'</span>
                  </a>
                </li>';
        }
         ?>
        <!--<li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>-->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>