<?php
session_start();
require_once 'util/funcoes.php';
require_once './includes/includes.php';

?>
<!DOCTYPE html>
<html lang="en">

<?php
include_head()
?>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="" class="h1">Treinamentos</a>
      </div>
      <div class="card-body">
        <center><img src="dist/img/AdminLTELogo.png" style="width: 80px;" alt=""></center><br>
        <p class="login-box-msg">Faça login para iniciar sua sessão</p>

        <form action="controller/login_controller.php" method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="usuario" placeholder="Usuário" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="senha" placeholder="Senha" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Lembrar-me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="entrar" class="btn btn-primary btn-block">Entrar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
  <?php
  usuario_invalido();
  digite_usuarios();
  ?>

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
</body>

</html>