<div class="login-box">
  <div class="login-logo">
    <!--<a href="login"><b>HOTEL </b> ALAMO</a>-->
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Iniciar Sesion</p>

    <form method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Ingrese Correo" name="correologin" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Ingrese Contraseña" name="contrasenalogin" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4 pull-right">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!--<div class="social-auth-links text-center">
      <p>- O -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Ingresar usando Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Ingresar usando Google+</a>
    </div>-->
    <!-- /.social-auth-links -->

    <!--<a href="#">Olvido Su Contraseña</a><br>-->
    <a href="registro" class="text-center">Registrarse</a>



  </div>
  <!-- /.login-box-body -->

    <?php
        $login = new LoginControlador();
        $login -> ctrlogin();
    ?>
</div>
<!-- /.login-box -->