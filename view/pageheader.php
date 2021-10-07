<?php

function exibe_pageheader($dados_header)
{
  echo '
     <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">';
  echo $dados_header[0];
  echo '</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="main.php">Início</a></li>
                <li class="breadcrumb-item active">';
  echo $dados_header[1];
  echo '</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
     ';
}
