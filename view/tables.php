<?php

function exibe_table_usuarios()
{

  require_once "./util/funcoes.php";

  $conexao = conectar();

  $query = "SELECT * from usuarios as u
            INNER JOIN permissoes as p on u.permissao = p.id
            INNER JOIN setor as s on u.setor = s.id";

  $result = mysqli_query($conexao, $query);

  echo '
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tabela de Usuários</h3>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Procurar">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>Avatar</th>
                  <th>Nome</th>
                  <th>Usuário</th>
                  <th>Permissão</th>
                  <th>Setor</th>
                  <th>Status</th>
                  <th>Data Cadastro</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>';
  while ($dados_usuarios = mysqli_fetch_array($result)) {

    //renderização condicional para cor do status
    $dados_usuarios['status'] == '1' ?  $cor_status = 'success' : $cor_status = 'danger';

    //renderização condicional para icone do status
    $dados_usuarios['status'] == '1' ?  $icone_status = 'check' : $icone_status = 'exclamation-triangle';

    $dados_usuarios['status'] == 1 ? $dados_usuarios['status'] = 'Ativo' : $dados_usuarios['status'] = 'Inativo';


    // botões de ação
    $botoes_acoes = '
    <div>
    <form style = "display: inline;" method ="POST" action="./alter_usuario.php">
      <input type="hidden" id="usuario_edit" name="usuario_edit" value ="' . $dados_usuarios['id'] . '">
      <button 
        data-toggle="tooltip" 
        data-placement="top" 
        title="Editar" 
        type="submit" 
        name = "editar"
        style = "width: 40px ; height: 40px" 
        class="btn btn-outline-warning btn-xs">
        <i style = "align-itens: center" class="far fa-edit"></i>
      </button>
      </form>
      <form method = "POST" style = "display: inline;"  action="./historico_usuario.php">
      <input type="hidden" id="usuario_historico" name="usuario_historico" value ="' . $dados_usuarios['id'] . '">
        <button 
        data-toggle="tooltip" 
        data-placement="top" 
        title="Historico" 
        type="submit" 
        name = "historico"
        style = "width: 40px ; height: 40px" 
        class="btn btn-outline-primary btn-xs">
        <i style = "align-itens: center" class="fas fa-stream"></i>
        </button>
      </form>

      <button 
        data-toggle="modal" 
        data-target="#exampleModal"
        title="Excluir" 
        type="button" 
        data-whatever = "' . $dados_usuarios['id'] . '"
        style = "width: 40px ; height: 40px" 
        class="btn btn-outline-danger btn-xs">
        <i style = "align-itens: center" 
        class="far fa-trash-alt"></i>
      </button>

      </div>

    

      <!-- modal excluir usuario -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
              <form>
              <center>
              <img src="./dist/img/alert.png" alt="Minha Figura" style = "width:100px;">
              </center>
                <p>Realmente deseja excluir este usuário?</p>
              </form>
            </div>
            <div class="modal-footer">
            <button type="button" style ="width: 80px" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <form method ="POST" action="./controller/acoes_usuarios_controller.php">
            <input type="hidden" id="id_usuario" name="id_usuario">
            <button type="submit" name = "excluir" style ="width: 80px" class="btn btn-primary">Excluir</button>
            </form>
            </div>
          </div>
        </div>
      </div>

      
      ';


    echo '<tr>
                  <th><div class="image">
                  <img style = "width: 50px " src="dist/img/' . $dados_usuarios['nomeAvatar'] . '" class="img-circle elevation-2" alt="User Image">
              </div></th>
                  <th>' . $dados_usuarios['nome'] . '</th>
                  <th>' . $dados_usuarios['usuario'] . '</th>
                  <th>' . $dados_usuarios['desc_perm'] . '</th>
                  <th>' . $dados_usuarios['desc_setor'] . '</th>
                  <th>   <span class="badge badge-' . $cor_status . '">' . $dados_usuarios['status'] . '  <i class="fas fa-' . $icone_status . '">' . '</span></i>
                  <th>' . date("d/m/Y", strtotime($dados_usuarios["data_cad"])) . '</th>
                  <th>' . $botoes_acoes . '</th>
                </tr>';
  }
  echo '
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    ';
}

//função para exibir tabela de histórico dos treinamentos de um determinado usuário
function exibe_table_historico($id_usuario)
{
  require_once "./util/funcoes.php";

  $conexao = conectar();

  //query de dados dos testes e usuário
  $query = "SELECT f.nome_teste, f.modulo_id, u.id, u.nome,  t.nota,t.data_teste, t.id , m.desc_mod, t.status
  from testes_feitos as t 
  INNER JOIN usuarios as u on u.id=t.id_usuario 
  INNER JOIN formteste as f on f.id=t.id_teste 
  INNER JOIN modulos as m on f.modulo_id = m.id_mod
  WHERE t.id_usuario ='$id_usuario'";

  $result = mysqli_query($conexao, $query);

  //verifica se há treinamentos feitos
  if (!isset($result)) {

    $_SESSION['sem_historico'] = true;
    echo '<script>
    window.location.replace("./usuarios.php");
    </script>';
  } else {

    echo '
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tabela de Usuários</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Procurar">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID Teste</th>
                <th>Nome</th>
                <th>Teste - Módulo</th>
                <th>Nota</th>
                <th>Data do teste</th>
                <th>Status</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>';

    while ($dados_historico = mysqli_fetch_array($result)) {


      $id_historico = $dados_historico['id'];

      //query das respostas de um determinado teste feito
      $queryResp = "SELECT * from respostas as r 
      INNER JOIN usuarios as u on r.id_usuario = u.id 
      INNER JOIN perguntas as p on r.id_pergunta = p.id 
      INNER JOIN testes_feitos as t on r.id_teste_feito = t.id
      ";

      $resultResp = mysqli_query($conexao, $queryResp);

      //Renderização condicional para botões
      $dados_historico['status'] == 'P' ?  $estado_botao_visualizar = 'disabled' : $estado_botao_visualizar = '';
      $dados_historico['status'] == 'A' ?  $estado_botao_avaliar = 'disabled' : $estado_botao_avaliar = '';

      //renderização condicional para cor do status
      $dados_historico['status'] == 'P' ?  $cor_status = 'danger' : $cor_status = 'success';

      //renderização condicional para icone do status
      $dados_historico['status'] == 'P' ?  $icone_status = 'exclamation-triangle' : $icone_status = 'check';

      $botoes_acoes = '
      <button 
      data-toggle="modal" 
      data-target="#modalRespostas"
      title="Ver Respostas" 
      type="button" 
      data-whateverResp = "' . $id_historico . '"
      style = "width: 40px ; height: 40px" 
      class="btn btn-outline-primary btn-xs"
      ' . $estado_botao_visualizar . '> 
      <i class="fas fa-search"></i>
      </button>

      <button 
      data-toggle="modal" 
      data-target="#modalRespostas"
      title="Avaliar" 
      type="button" 
      data-whateverResp = "' . $id_historico . '"
      style = "width: 40px ; height: 40px" 
      class="btn btn-outline-primary btn-xs"
      ' . $estado_botao_avaliar . '> 
      <i class="fas fa-clipboard-check"></i>
      </button>
      ';

      $dados_historico['status'] == 'P' ? $dados_historico['status'] = 'Pendente' : $dados_historico['status'] = 'Avaliado';


      echo '

    <!-- modal excluir usuario -->
      <div class="modal fade" id="modalRespostas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
          <div class="modal-header">
        <h5 class="modal-title">Respostas</h5>
      </div>
            <div class="modal-body">
            ';
      while ($dados_resp = mysqli_fetch_array($resultResp)) {

        echo '
        <div class="col-sm-12">
        <!-- textarea -->
          <div class="form-group">
              <label>' . $dados_resp['descricao'] . '</label>
              <textarea class="form-control" rows="3"
                  placeholder="' . $dados_resp['desc_resposta'] . '" disabled></textarea>
          </div>
        </div>';
      }
      echo '
            </div>
            <div class="modal-footer">
            <button type="button" style ="width: 80px" class="btn btn-default" data-dismiss="modal">Voltar</button>
            </div>
          </div>
        </div>
      </div>

    
    ';


      echo '<tr>
                <th>' . $dados_historico['id'] . '</th>
                <th>' . $dados_historico['nome'] . '</th>
                <th>' . $dados_historico['nome_teste'] . ' - ' . $dados_historico['desc_mod'] . '</th>
                <th>' . $dados_historico['nota'] . '</th>
                <th>' . date("d/m/Y H:i", strtotime($dados_historico["data_teste"])) . '</th>
                <th>   <span class="badge badge-' . $cor_status . '">' . $dados_historico['status'] . '  <i class="fas fa-' . $icone_status . '">' . '</span></i></th>
                <th>' . $botoes_acoes . '</th>
              </tr>';
    }

    echo '
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  ';
  }
}

//função para exibir modulos
function exibe_table_modulos()
{


  require_once "./util/funcoes.php";

  $conexao = conectar();

  $queryModulos = "SELECT * from modulos";

  $resultModulos = mysqli_query($conexao, $queryModulos);

  echo '
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tabela de Módulos</h3>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Procurar">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Descrição</th>
                </tr>
              </thead>
              <tbody>';
  while ($dadosModulos = mysqli_fetch_array($resultModulos)) {


    // botões de ação
    $botoes_acoes = '

      <button 
        data-toggle="modal" 
        data-target="#deleteModulo"
        title="Excluir" 
        type="button" 
        data-whatever = "' . $dadosModulos['id_mod'] . '"
        style = "width: 40px ; height: 40px" 
        class="btn btn-outline-danger btn-xs">
        <i style = "align-itens: center" 
        class="far fa-trash-alt"></i>
      </button>

    

      <!-- modal excluir usuario -->
      <div class="modal fade" id="deleteModulo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
              <form>
              <center>
              <img src="./dist/img/alert.png" alt="Minha Figura" style = "width:100px;">
              </center>
                <p>Realmente deseja excluir este módulo?</p>
              </form>
            </div>
            <div class="modal-footer">
            <button type="button" style ="width: 80px" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <form method ="POST" action="./controller/modulos_controller.php">
            <input type="hidden" id="id_modulo" name="id_modulo">
            <button type="submit" name = "excluir" style ="width: 80px" class="btn btn-primary">Excluir</button>
            </form>
            </div>
          </div>
        </div>
      </div>

      
      ';


    echo '<tr>
                  <th>' . $dadosModulos['id_mod'] . '</th>
                  <th>' . $dadosModulos['desc_mod'] . '</th>
                  <th>' . $botoes_acoes . '</th>
                </tr>';
  }
  echo '
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    ';
}

//função para exibir formularios
function exibe_table_formularios()
{


  require_once "./util/funcoes.php";

  $conexao = conectar();

  $queryFormteste = "SELECT * from formteste as f
                     INNER JOIN permissoes as p on f.permissao_id = p.id
                     INNER JOIN modulos as m on f.modulo_id = m.id_mod";

  $resultFormteste = mysqli_query($conexao, $queryFormteste);

  echo '
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tabela de Formulários</h3>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Procurar">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Descrição</th>
                  <th>Permissão</th>
                  <th>Módulo</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>';
  while ($dadosFormteste = mysqli_fetch_array($resultFormteste)) {


    // botões de ação
    $botoes_acoes = '

    <button 
        data-toggle="modal" 
        data-target="#verPerguntas"
        title="ver" 
        type="button" 
        data-whatever = "' . $dadosFormteste['id'] . '"
        style = "width: 40px ; height: 40px" 
        class="btn btn-outline-primary btn-xs">
        <i style = "align-itens: center" class="fas fa-stream"></i>
      </button>

      <button 
        data-toggle="modal" 
        data-target="#deleteFormulario"
        title="Excluir" 
        type="button" 
        data-whatever = "' . $dadosFormteste['id'] . '"
        style = "width: 40px ; height: 40px" 
        class="btn btn-outline-danger btn-xs">
        <i style = "align-itens: center" 
        class="far fa-trash-alt"></i>
      </button>

      <!-- modal excluir formulario -->
      <div class="modal fade" id="deleteFormulario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
              <form>
              <center>
              <img src="./dist/img/alert.png" alt="Minha Figura" style = "width:100px;">
              </center>
                <p>Realmente deseja excluir?</p>
              </form>
            </div>
            <div class="modal-footer">
            <button type="button" style ="width: 80px" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <form method ="POST" action="./controller/formteste_controller.php">
              <input type="hidden" id="id_formteste" name="id_formteste">
              <button type="submit" name = "excluir" style ="width: 80px" class="btn btn-primary">Excluir</button>
            </form>
            </div>
          </div>
        </div>
      </div>
      
      ';


    echo '<tr>
                  <th>' . $dadosFormteste['id'] . '</th>
                  <th>' . $dadosFormteste['nome_teste'] . '</th>
                  <th>' . $dadosFormteste['desc_perm'] . '</th>
                  <th>' . $dadosFormteste['desc_mod'] . '</th>
                  <th>' . $botoes_acoes . '</th>
                </tr>';
  }
  echo '
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    ';
}


//função para exibir setores
function exibe_table_setores()
{


  require_once "./util/funcoes.php";

  $conexao = conectar();

  $querySetor = "SELECT * from setor";

  $resultSetor = mysqli_query($conexao, $querySetor);

  echo '
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tabela de Setores</h3>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Procurar">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Descrição</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>';
  while ($dadosSetor = mysqli_fetch_array($resultSetor)) {


    // botões de ação
    $botoes_acoes = '

      <button 
        data-toggle="modal" 
        data-target="#deleteSetor"
        title="Excluir" 
        type="button" 
        data-whatever = "' . $dadosSetor['id'] . '"
        style = "width: 40px ; height: 40px" 
        class="btn btn-outline-danger btn-xs">
        <i style = "align-itens: center" 
        class="far fa-trash-alt"></i>
      </button>

    

      <!-- modal excluir usuario -->
      <div class="modal fade" id="deleteSetor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
              <form>
              <center>
              <img src="./dist/img/alert.png" alt="Minha Figura" style = "width:100px;">
              </center>
                <p>Realmente deseja excluir este módulo?</p>
              </form>
            </div>
            <div class="modal-footer">
            <button type="button" style ="width: 80px" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <form method ="POST" action="./controller/setores_controller.php">
            <input type="hidden" id="id_setor" name="id_setor">
            <button type="submit" name = "excluir" style ="width: 80px" class="btn btn-primary">Excluir</button>
            </form>
            </div>
          </div>
        </div>
      </div>

      
      ';


    echo '<tr>
                  <th>' . $dadosSetor['id'] . '</th>
                  <th>' . $dadosSetor['desc_setor'] . '</th>
                  <th>' . $botoes_acoes . '</th>
                </tr>';
  }
  echo '
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    ';
}

//função para exibir videos
function exibe_table_videos()
{


  require_once "./util/funcoes.php";

  $conexao = conectar();

  $queryVideo = "SELECT * from video as v
                INNER JOIN modulos as m on v.modulo_id = m.id_mod";

  $resultVideo = mysqli_query($conexao, $queryVideo);

  echo '
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tabela de Vídeos</h3>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Procurar">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Descrição</th>
                  <th>Link</th>
                  <th>Módulo</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>';
  while ($dadosVideo = mysqli_fetch_array($resultVideo)) {


    // botões de ação
    $botoes_acoes = '

      <button 
        data-toggle="modal" 
        data-target="#deleteVideo"
        title="Excluir" 
        type="button" 
        data-whatever = "' . $dadosVideo['id'] . '"
        style = "width: 40px ; height: 40px" 
        class="btn btn-outline-danger btn-xs">
        <i style = "align-itens: center" 
        class="far fa-trash-alt"></i>
      </button>

    

      <!-- modal excluir usuario -->
      <div class="modal fade" id="deleteVideo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
              <form>
              <center>
              <img src="./dist/img/alert.png" alt="Minha Figura" style = "width:100px;">
              </center>
                <p>Realmente deseja excluir este módulo?</p>
              </form>
            </div>
            <div class="modal-footer">
            <button type="button" style ="width: 80px" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <form method ="POST" action="./controller/videos_controller.php">
            <input type="hidden" id="id_video" name="id_video">
            <button type="submit" name = "excluir" style ="width: 80px" class="btn btn-primary">Excluir</button>
            </form>
            </div>
          </div>
        </div>
      </div>

      
      ';


    echo '<tr>
                  <th>' . $dadosVideo['id'] . '</th>
                  <th>' . $dadosVideo['descricao'] . '</th>
                  <th>' . $dadosVideo['link'] . '</th>
                  <th>' . $dadosVideo['desc_mod'] . '</th>
                  <th>' . $botoes_acoes . '</th>
                </tr>';
  }
  echo '
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    ';
}


//função para exibir permissoes
function exibe_table_permissoes()
{


  require_once "./util/funcoes.php";

  $conexao = conectar();

  $queryPermissao = "SELECT p.*, a.desc_acesso from permissoes as p
                INNER JOIN acesso as a on p.id_acesso = a.id ";

  $resultPermissao = mysqli_query($conexao, $queryPermissao);

  echo '
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tabela de Vídeos</h3>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Procurar">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Descrição</th>
                  <th>Acesso</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>';
  while ($dadosPermissao = mysqli_fetch_array($resultPermissao)) {


    // botões de ação
    $botoes_acoes = '

      <button 
        data-toggle="modal" 
        data-target="#deletePermissao"
        title="Excluir" 
        type="button" 
        data-whatever = "' . $dadosPermissao['id'] . '"
        style = "width: 40px ; height: 40px" 
        class="btn btn-outline-danger btn-xs">
        <i style = "align-itens: center" 
        class="far fa-trash-alt"></i>
      </button>

    

      <!-- modal excluir usuario -->
      <div class="modal fade" id="deletePermissao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
              <form>
              <center>
              <img src="./dist/img/alert.png" alt="Minha Figura" style = "width:100px;">
              </center>
                <p>Realmente deseja excluir este módulo?</p>
              </form>
            </div>
            <div class="modal-footer">
            <button type="button" style ="width: 80px" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <form method ="POST" action="./controller/permissoes_controller.php">
            <input type="hidden" id="id_permissao" name="id_permissao">
            <button type="submit" name = "excluir" style ="width: 80px" class="btn btn-primary">Excluir</button>
            </form>
            </div>
          </div>
        </div>
      </div>

      
      ';


    echo '<tr>
                  <th>' . $dadosPermissao['id'] . '</th>
                  <th>' . $dadosPermissao['desc_perm'] . '</th>
                  <th>' . $dadosPermissao['desc_acesso'] . '</th>
                  <th>' . $botoes_acoes . '</th>
                </tr>';
  }
  echo '
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    ';
}

function exibe_table_treinamentos()
{

  require_once "./util/funcoes.php";

  $conexao = conectar();

  $queryTreinamentos = "SELECT * from treinamentos";

  $resultTreinamentos = mysqli_query($conexao, $queryTreinamentos);

  echo '
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tabela de Treinamentos</h3>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Procurar">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Descrição</th>
                  <th>Módulo</th>
                  <th>Vídeo</th>
                  <th>Formulário</th>
                  <th>Status</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>';
  while ($dados_treinamentos = mysqli_fetch_array($resultTreinamentos)) {

    //renderização condicional para cor do status
    $dados_treinamentos['status_treinamento'] == '1' ?  $cor_status = 'success' : $cor_status = 'danger';

    //renderização condicional para icone do status
    $dados_treinamentos['status_treinamento'] == '1' ?  $icone_status = 'check' : $icone_status = 'exclamation-triangle';

    $dados_treinamentos['status_treinamento'] == 1 ? $dados_treinamentos['status_treinamento'] = 'Ativo' : $dados_treinamentos['status_treinamento'] = 'Inativo';


    // botões de ação
    $botoes_acoes = '
    <div>
    <form style = "display: inline;" method ="POST" action="./alter_usuario.php">
      <input type="hidden" id="treinamento_edit" name="treinamento_edit" value ="' . $dados_treinamentos['id'] . '">
      <button 
        data-toggle="tooltip" 
        data-placement="top" 
        title="Editar" 
        type="submit" 
        name = "editar"
        style = "width: 40px ; height: 40px" 
        class="btn btn-outline-warning btn-xs">
        <i style = "align-itens: center" class="far fa-edit"></i>
      </button>

      <button 
        data-toggle="modal" 
        data-target="#deleteTreinamento"
        title="Excluir" 
        type="button" 
        data-whatever = "' . $dados_treinamentos['id'] . '"
        style = "width: 40px ; height: 40px" 
        class="btn btn-outline-danger btn-xs">
        <i style = "align-itens: center" 
        class="far fa-trash-alt"></i>
      </button>

      </div>

    

      <!-- modal excluir usuario -->
      <div class="modal fade" id="deleteTreinamento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
              <form>
              <center>
              <img src="./dist/img/alert.png" alt="Minha Figura" style = "width:100px;">
              </center>
                <p>Realmente deseja excluir este Treinamento?</p>
              </form>
            </div>
            <div class="modal-footer">
            <button type="button" style ="width: 80px" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <form method ="POST" action="./controller/treinamentos_controller.php">
            <input type="hidden" id="id_treinamento" name="id_treinamento">
            <button type="submit" name = "excluir" style ="width: 80px" class="btn btn-primary">Excluir</button>
            </form>
            </div>
          </div>
        </div>
      </div>

      
      ';


    echo '<tr>
                  <th>' . $dados_treinamentos['id'] . '</th>
                  <th>' . $dados_treinamentos['descricao'] . '</th>
                  <th>' . $dados_treinamentos['desc_mod'] . '</th>
                  <th>' . $dados_treinamentos['desc_video'] . '</th>
                  <th>' . $dados_treinamentos['nome_teste'] . '</th>
                  <th>   <span class="badge badge-' . $cor_status . '">' . $dados_treinamentos['status_treinamento'] . '  <i class="fas fa-' . $icone_status . '">' . '</span></i>
                  <th>' . $botoes_acoes . '</th>
                </tr>';
  }
  echo '
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    ';
}
