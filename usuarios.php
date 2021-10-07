<?php
session_start();
require_once './util/funcoes.php';
require_once './includes/includes.php';
require_once './view/preloader.php';
require_once './view/navbar.php';
require_once './view/sidebar.php';
require_once './view/pageheader.php';
require_once './view/cards.php';
require_once './view/tables.php';
require_once './view/footer.php';
require_once './controller/header_controller.php';

//verifica se o usuário está logado ou n
verifica_usuario_autenticado();

?>

<!DOCTYPE html>
<html lang="en">
<?php
include_head();
?>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  <div class="wrapper">

    <?php
    exibe_preloader();
    exibe_navbar();
    exibe_sidebar();

    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?php
      exibe_pageheader(header_page_usuarios());
      ?>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Main row -->
          <div class="col-2">
            <a href="cad_usuarios.php"><button type="button" class="btn btn-block btn-primary btn-sm">Cadastrar</button></a><br>
          </div>
          <div class="row">
            <?php
            exibe_table_usuarios();
            ?>
          </div>
        </div>
      </section>
    </div>
    <?php
    cadastro_excluido();
    cadastro_feito();
    cadastro_alterado();
    sem_historico();
    exibe_footer();
    ?>
  </div>
  <?php
  include_scripts();
  ?>
</body>

</html>