<?php
//função para exibir botão+modal de cadastro modulos
function exibe_bm_modulo()
{
  echo '
    <!-- Main row -->
          <div class="col-2">
            <button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#cadModulo">Cadastrar</button><br>
            <!-- modal cadastrar modulo -->
            <div class="modal fade" id="cadModulo" tabindex="-1" aria-labelledby="cadModuloLabel" aria-hidden="true">
              <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body">
                    <form method="POST" action="./controller/modulos_controller.php">
                      <div class="row">
                        <div class="col-12">
                          <label class="col-form-label" for="inputSuccess"><i class="fas fa-book-open"></i> Nome do módulo:</label>
                          <input type="text" class="form-control" name="desc_mod" placeholder="Digite o nome ..." required>
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" style="width: 90px" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="cadastrar" style="width: 90px" class="btn btn-primary">Cadastrar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
    ';
}


//função para exibir botão+modal de cadastro formularios
function exibe_bm_formularios()
{
  require_once "./util/funcoes.php";

  $conexao = conectar();

  $queryGetModulo = "SELECT * FROM modulos";
  $queryGetPermissoes = "SELECT * FROM permissoes";

  $resultGetModulo = mysqli_query($conexao, $queryGetModulo);
  $resultGetPermissoes = mysqli_query($conexao, $queryGetPermissoes);



  echo '
    <!-- Main row -->
          <div class="col-2">
            <button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#cadTreinamento">Cadastrar</button><br>
            <!-- modal cadastrar videos -->
            <div class="modal fade" id="cadTreinamento" tabindex="-1" aria-labelledby="cadPermissaoLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body">
                    <form method="POST" action="./controller/formteste_controller.php">
                      <div class="row">
                        <div class="col-4">
                          <label class="col-form-label" for="inputSuccess"><i class="fas fa-font"></i> Descrição do formulário:</label>
                          <input type="text" class="form-control" name="desc_form" placeholder="Digite a descrição ..." required>
                        </div>
                        <div class="col-4">
                          <label class="col-form-label" for="inputSuccess"> Módulo :</label>
                          <select class="form-control" name ="id_modulo" required>
                          <option>Selecione...</option>
                          ';
  while ($dados_modulo = mysqli_fetch_array($resultGetModulo)) {
    echo '
                          <option value = "' . $dados_modulo['id_mod'] . '">' . $dados_modulo['id_mod'] . ' - ' . $dados_modulo['desc_mod'] . '</option>
                          ';
  }
  echo '
                           </select>
                        </div>
                        <div class="col-4">
                          <label class="col-form-label" for="inputSuccess"><i class="fas fa-lock"></i> Permissão :</label>
                          <select class="form-control" name ="id_permissao" required>
                          <option>Selecione...</option>
                          ';
  while ($dados_permissoes = mysqli_fetch_array($resultGetPermissoes)) {
    echo '
                          <option value = "' . $dados_permissoes['id'] . '">' . $dados_permissoes['id'] . ' - ' . $dados_permissoes['desc_perm'] . '</option>
                          ';
  }
  echo '
                           </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                        <div id="accordion">
                        </br>
                          <div class="card">
                              <div class="card-header" id="headingThree">
                                  <h5 class="mb-0">
                                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
                                          aria-expanded="false" aria-controls="collapseThree">
                                          Inserir perguntas ao formulário.
                                      </button>
                                  </h5>
                              </div>
                              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                  <div class="card-body">
                                    <div class="row">
                                      <div class="col-12">
                                        <label class="col-form-label" for="inputSuccess"> Pergunta 1 :</label>
                                        <input type="text" class="form-control" name="pergunta1" placeholder="Digite a pergunta ..." required>
                                        <label class="col-form-label" for="inputSuccess"> Pergunta 2 :</label>
                                        <input type="text" class="form-control" name="pergunta2" placeholder="Digite a pergunta ..." required>
                                        <label class="col-form-label" for="inputSuccess"> Pergunta 3 :</label>
                                        <input type="text" class="form-control" name="pergunta3" placeholder="Digite a pergunta ..." required>
                                        <label class="col-form-label" for="inputSuccess"> Pergunta 4 :</label>
                                        <input type="text" class="form-control" name="pergunta4" placeholder="Digite a pergunta ..." required>
                                        <label class="col-form-label" for="inputSuccess"> Pergunta 5 :</label>
                                        <input type="text" class="form-control" name="pergunta5" placeholder="Digite a pergunta ..." required>
                                        <label class="col-form-label" for="inputSuccess"> Pergunta 6 :</label>
                                        <input type="text" class="form-control" name="pergunta6" placeholder="Digite a pergunta ..." required>
                                        <label class="col-form-label" for="inputSuccess"> Pergunta 7 :</label>
                                        <input type="text" class="form-control" name="pergunta7" placeholder="Digite a pergunta ..." required>
                                        <label class="col-form-label" for="inputSuccess"> Pergunta 8 :</label>
                                        <input type="text" class="form-control" name="pergunta8" placeholder="Digite a pergunta ..." required>
                                        <label class="col-form-label" for="inputSuccess"> Pergunta 9 :</label>
                                        <input type="text" class="form-control" name="pergunta9" placeholder="Digite a pergunta ..." required>
                                        <label class="col-form-label" for="inputSuccess"> Pergunta 10 :</label>
                                        <input type="text" class="form-control" name="pergunta10" placeholder="Digite a pergunta ..." required>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                        </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" style="width: 90px" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="cadastrar" style="width: 90px" class="btn btn-primary">Cadastrar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
    ';
}

//função para exibir botão+modal de cadastro setores
function exibe_bm_setor()
{
  echo '
    <!-- Main row -->
          <div class="col-2">
            <button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#cadSetor">Cadastrar</button><br>
            <!-- modal cadastrar modulo -->
            <div class="modal fade" id="cadSetor" tabindex="-1" aria-labelledby="cadSetor" aria-hidden="true">
              <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body">
                    <form method="POST" action="./controller/setores_controller.php">
                      <div class="row">
                        <div class="col-12">
                          <label class="col-form-label" for="inputSuccess"><i class="fas fa-store-alt"></i> Nome do setor:</label>
                          <input type="text" class="form-control" name="desc_setor" placeholder="Digite o nome ..." required>
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" style="width: 90px" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="cadastrar" style="width: 90px" class="btn btn-primary">Cadastrar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
    ';
}

//função para exibir botão+modal de cadastro videos
function exibe_bm_videos()
{

  require_once "./util/funcoes.php";

  $conexao = conectar();

  $queryGetMod = "SELECT * FROM modulos";

  $resultGetMod = mysqli_query($conexao, $queryGetMod);


  echo '
    <!-- Main row -->
          <div class="col-2">
            <button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#cadVideo">Cadastrar</button><br>
            <!-- modal cadastrar videos -->
            <div class="modal fade" id="cadVideo" tabindex="-1" aria-labelledby="cadVideoLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body">
                    <form method="POST" action="./controller/videos_controller.php">
                      <div class="row">
                        <div class="col-4">
                          <label class="col-form-label" for="inputSuccess"><i class="fas fa-font"></i> Descrição do vídeo:</label>
                          <input type="text" class="form-control" name="descricao_video" placeholder="Digite a descrição ..." required>
                        </div>
                        <div class="col-4">
                          <label class="col-form-label" for="inputSuccess"><i class="fas fa-link"></i> Link do vídeo</label>
                          <input type="text" class="form-control" name="link_video" placeholder="Insira o link ..." required>
                        </div>
                        <div class="col-4">
                          <label class="col-form-label" for="inputSuccess"><i class="fas fa-lock"></i> Módulo referente</label>
                          <select class="form-control" name ="modulo_id" required>
                          <option>Selecione...</option>
                          ';
  while ($dados_modulo = mysqli_fetch_array($resultGetMod)) {
    echo '
                          <option value = "' . $dados_modulo['id_mod'] . '">' . $dados_modulo['id_mod'] . ' - ' . $dados_modulo['desc_mod'] . '</option>
                          ';
  }
  echo '
                           </select>
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" style="width: 90px" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="cadastrar" style="width: 90px" class="btn btn-primary">Cadastrar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
    ';
}

//função para exibir botão+modal de cadastro permissões
function exibe_bm_permissao()
{

  require_once "./util/funcoes.php";

  $conexao = conectar();

  //Montando a query com o delete do modulo já passando o ID.
  $queryGetAcesso = "SELECT * FROM acesso";

  $resultGetAcesso = mysqli_query($conexao, $queryGetAcesso);


  echo '
    <!-- Main row -->
          <div class="col-2">
            <button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#cadPermissao">Cadastrar</button><br>
            <!-- modal cadastrar videos -->
            <div class="modal fade" id="cadPermissao" tabindex="-1" aria-labelledby="cadPermissaoLabel" aria-hidden="true">
              <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body">
                    <form method="POST" action="./controller/permissoes_controller.php">
                      <div class="row">
                        <div class="col-6">
                          <label class="col-form-label" for="inputSuccess"><i class="fas fa-font"></i> Descrição da permissão:</label>
                          <input type="text" class="form-control" name="desc_perm" placeholder="Digite a descrição ..." required>
                        </div>
                        <div class="col-6">
                          <label class="col-form-label" for="inputSuccess"><i class="fas fa-lock"></i> Acesso a :</label>
                          <select class="form-control" name ="id_acesso" required>
                          <option>Selecione...</option>
                          ';
  while ($dados_acesso = mysqli_fetch_array($resultGetAcesso)) {
    echo '
                          <option value = "' . $dados_acesso['id'] . '">' . $dados_acesso['id'] . ' - ' . $dados_acesso['desc_acesso'] . '</option>
                          ';
  }
  echo '
                           </select>
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" style="width: 90px" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="cadastrar" style="width: 90px" class="btn btn-primary">Cadastrar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
    ';
}


//função para exibir botão+modal de cadastro permissões
function exibe_bm_treinamento()
{

  require_once "./util/funcoes.php";

  $conexao = conectar();

  $queryGetModulo = "SELECT * FROM modulos";
  $queryGetFormtest = "SELECT * FROM formteste";
  $queryGetVideo = "SELECT * FROM video";

  $resultGetModulo = mysqli_query($conexao, $queryGetModulo);
  $resultGetFormtest = mysqli_query($conexao, $queryGetFormtest);
  $resultGetVideo = mysqli_query($conexao, $queryGetVideo);



  echo '
    <!-- Main row -->
          <div class="col-2">
            <button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#cadTreinamento">Cadastrar</button><br>
            <!-- modal cadastrar videos -->
            <div class="modal fade" id="cadTreinamento" tabindex="-1" aria-labelledby="cadPermissaoLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body">
                    <form method="POST" action="./controller/permissoes_controller.php">
                      <div class="row">
                        <div class="col-4">
                          <label class="col-form-label" for="inputSuccess"><i class="fas fa-font"></i> Descrição do treinamento:</label>
                          <input type="text" class="form-control" name="desc_treinamento" placeholder="Digite a descrição ..." required>
                        </div>
                        <div class="col-4">
                          <label class="col-form-label" for="inputSuccess">Módulo :</label>
                          <select class="form-control" name ="id_modulo" required>
                          <option>Selecione...</option>
                          ';
  while ($dados_modulo = mysqli_fetch_array($resultGetModulo)) {
    echo '
                          <option value = "' . $dados_modulo['id_mod'] . '">' . $dados_modulo['id_mod'] . ' - ' . $dados_modulo['desc_mod'] . '</option>
                          ';
  }
  echo '
                           </select>
                        </div>
                        <div class="col-4">
                          <label class="col-form-label" for="inputSuccess"><i class="fas fa-lock"></i> Formulário :</label>
                          <select class="form-control" name ="id_formteste" required>
                          <option>Selecione...</option>
                          ';
  while ($dados_teste = mysqli_fetch_array($resultGetFormtest)) {
    echo '
                          <option value = "' . $dados_teste['id'] . '">' . $dados_teste['id'] . ' - ' . $dados_teste['nome_teste'] . '</option>
                          ';
  }
  echo '
                           </select>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-4">
                          <label class="col-form-label" for="inputSuccess"><i class="fas fa-lock"></i> Vídeo :</label>
                          <select class="form-control" name ="id_acesso" required>
                          <option>Selecione...</option>
                          ';
  while ($dados_video = mysqli_fetch_array($resultGetVideo)) {
    echo '
                          <option value = "' . $dados_video['id'] . '">' . $dados_video['id'] . ' - ' . $dados_video['descricao'] . '</option>
                          ';
  }
  echo '
                           </select>
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" style="width: 90px" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="cadastrar" style="width: 90px" class="btn btn-primary">Cadastrar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
    ';
}
