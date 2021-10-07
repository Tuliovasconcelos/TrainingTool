<?php
function include_head()
{
  echo '
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prontomed - Treinamentos</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="./plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="./plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="./plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="./plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="./plugins/summernote/summernote-bs4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="./plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>';
}

function include_scripts()
{
  echo '
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge("uibutton", $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>

    <script>
    $(document).ready(function() {

      $(' . "'" . '.toast' . "'" . ').toast(' . "'" . 'show' . "'" . ');

    });
  </script>
    <script type = "text/javascript">
    $(' . "'" . '#exampleModal' . "'" . ').on(' . "'" . 'show.bs.modal' . "'" . ', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data(' . "'" . 'whatever' . "'" . ') // Extract info from data-* attributes
        var modal = $(this)
        modal.find(' . "'#" . 'id_usuario' . "'" . ').val(recipient)
      })
    </script>

    <script type = "text/javascript">
    $(' . "'" . '#modalRespostas' . "'" . ').on(' . "'" . 'show.bs.modal' . "'" . ', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data(' . "'" . 'whateverResp' . "'" . ') // Extract info from data-* attributes
        var modal = $(this)
        modal.find(' . "'#" . 'id_usuario' . "'" . ').val(recipient)
      })
    </script>

    <script type = "text/javascript">
    $(' . "'" . '#deleteModulo' . "'" . ').on(' . "'" . 'show.bs.modal' . "'" . ', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data(' . "'" . 'whatever' . "'" . ') // Extract info from data-* attributes
        var modal = $(this)
        modal.find(' . "'#" . 'id_modulo' . "'" . ').val(recipient)
      })
    </script>

    <script type = "text/javascript">
    $(' . "'" . '#deleteSetor' . "'" . ').on(' . "'" . 'show.bs.modal' . "'" . ', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data(' . "'" . 'whatever' . "'" . ') // Extract info from data-* attributes
        var modal = $(this)
        modal.find(' . "'#" . 'id_setor' . "'" . ').val(recipient)
      })
    </script>

    <script type = "text/javascript">
    $(' . "'" . '#deleteVideo' . "'" . ').on(' . "'" . 'show.bs.modal' . "'" . ', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data(' . "'" . 'whatever' . "'" . ') // Extract info from data-* attributes
        var modal = $(this)
        modal.find(' . "'#" . 'id_video' . "'" . ').val(recipient)
      })
    </script>

    <script type = "text/javascript">
    $(' . "'" . '#deletePermissao' . "'" . ').on(' . "'" . 'show.bs.modal' . "'" . ', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data(' . "'" . 'whatever' . "'" . ') // Extract info from data-* attributes
        var modal = $(this)
        modal.find(' . "'#" . 'id_permissao' . "'" . ').val(recipient)
      })
    </script>

    <script type = "text/javascript">
    $(' . "'" . '#deleteFormulario' . "'" . ').on(' . "'" . 'show.bs.modal' . "'" . ', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data(' . "'" . 'whatever' . "'" . ') // Extract info from data-* attributes
        var modal = $(this)
        modal.find(' . "'#" . 'id_formteste' . "'" . ').val(recipient)
      })
    </script>


    <script>
    $(function () {
        $(' . "'" . '[data-toggle="tooltip"]' . "'" . ').tooltip()
    })
    </script>
    <script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo("#example1_wrapper .col-md-6:eq(0)");
        $("#example2").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
    });
    </script>';
}
