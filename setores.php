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
require_once './view/bmCad.php';
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
      exibe_pageheader(header_setores());
      ?>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <?php
          exibe_bm_setor();
          ?>
          <div class="row">
            <?php
            exibe_table_setores();
            ?>
          </div>
        </div>
      </section>
    </div>
    <?php
    setor_cadastrado();
    setor_excluido();
    exibe_footer();
    ?>
  </div>
  <?php
  include_scripts();
  ?>
</body>

</html>