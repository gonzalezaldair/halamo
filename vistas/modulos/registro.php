<div class="register-box">
  <div class="register-logo">
    <a href="login"><b>HOTEL</b>ALAMO</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Registra Nuevo Miembro</p>

    <form method="post" onsubmit="return validarcampos()">
      <div class="row">
        <div class="col-md-6">
          <select class="form-control" name="tipodoc" id="tipodoc">
                  <?php
                    $combotipodoc = TipoDocControlador::ctrmostrartipodoc(null, null);
                    foreach ($combotipodoc as $key => $value) {
                      echo '<option value="'.$value["Id_tp"].'">'.$value["Descripcion"].'</option>';
                    }
                   ?>
                </select>
        </div>
        <div class="col-md-6">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="# Documento" name="documento" id="documento">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Apellido" name="apellido" id="apellido">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
        </div>
      </div>

      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Correo" name="correo" id="correo">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Contraseña" name="contrasena" id="contrasena">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <!--<div class="checkbox icheck">
            <label>
              <input type="checkbox"><a href="#"> Terminos & Condiciones</a>
            </label>
          </div>-->
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
           <?php
              $registro = new RegistroControlador();
              $registro -> ctrformregistro();?>
          <input type="submit" class="btn btn-primary btn-block btn-flat" value="ENVIAR">
          <!--<button type="submit" class="btn btn-primary btn-block btn-flat">Registrarse</button>-->
        </div>
        <!-- /.col -->
      </div>
    </form>



    <!--<div class="social-auth-links text-center">
      <p>- O -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Ingresar usando Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Ingresar usando Google+</a>
    </div>-->

    <a href="login" class="text-center">Ya tengo un Usuario</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->