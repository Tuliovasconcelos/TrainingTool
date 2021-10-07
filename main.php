<?php
session_start();
require_once './util/funcoes.php';
require_once './includes/includes.php';
require_once './view/preloader.php';
require_once './view/navbar.php';
require_once './view/sidebar.php';
require_once './view/pageheader.php';
require_once './view/cards.php';
require_once './view/charts.php';
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
      exibe_pageheader(header_page_main());
      ?>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <?php
          //exibe_cards(); se admin
          ?>
          <!-- Main row -->
          <div class="row">
            <?php
            exibe_charts_user();
            ?>
          </div>
          <?php if (isset($_SESSION['bem_vindo'])) { ?>

            <div class="toast primary" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
              <div class="toast-header">
                <img style="width:30px;" src="./dist//img/happy.png" class="rounded mr-2">
                <strong class="mr-auto">Seja bem vindo!</strong>
                <small>Hoje : <?php date_default_timezone_set('America/Sao_Paulo');
                              $date = date('H:i');
                              echo $date; ?></small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="toast-body">
                <?php echo $_SESSION['usuario'];  ?>,Todas as suas informações foram atualizadas!
              </div>
            </div>
          <?php
            unset($_SESSION['bem_vindo']);
          } ?>
        </div>
      </section>
    </div>
    <?php
    exibe_footer();
    ?>
  </div>

  <?php
  include_scripts();
  ?>
</body>

</html>