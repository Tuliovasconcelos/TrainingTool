<?php

function exibe_form_cad()
{

    require_once "./util/funcoes.php";

    $conexao = conectar();

    $queryPermissao = "SELECT * from permissoes";
    $querySetor = "SELECT * from setor";


    $resultPermissao = mysqli_query($conexao, $queryPermissao);
    $resultSetor = mysqli_query($conexao, $querySetor);

    echo '
    <div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Insira os dados a seguir</h3>
        </div>
        <form method="POST" action = "controller/usuarios_controller.php" enctype="multipart/form-data" role="form">
            <div class="card-body">
            <div class="row">
                  <div class="col-4">
                  <label class="col-form-label" for="inputSuccess"><i class="far fa-user"></i> Nome Completo</label>
                <input type="text" class="form-control" name="nome_cad" placeholder="Digite ..."required>
                  </div>
                  <div class="col-3">
                  <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Usuário</label>
                <input type="text" class="form-control" name="usuario_cad" placeholder="Digite ..." required>
                  </div>
                  <div class="col-5">
                  <label class="col-form-label" for="inputError"><i class="fas fa-key"></i> Senha</label>
                <input type="password" class="form-control" name="senha_cad" placeholder="Digite ..." required>
                  </div>
            </div>  
            <div class="row">
                <div class="col-4">
                <label class="col-form-label" for="inputSuccess"><i class="far fa-user-circle"></i> Avatar <i>(Dica: Renomeie o arquivo colocando o nome*)</i></label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id ="imagem" name="imagem" required>
                            <label class="custom-file-label" for="exampleInputFile">Selecionar foto</label>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-lock"></i> Permissão</label>
                    <select class="form-control" name ="permissao_cad" required>
                    <option>Selecione...</option>';

    while ($dados_permissao = mysqli_fetch_array($resultPermissao)) {
        echo ' <option value = "' . $dados_permissao['id'] . '">' . $dados_permissao['id'] . ' - ' . $dados_permissao['desc_perm'] . '</option>';
    }
    echo '
                    </select>
                </div>
                <div class="col-3">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-vector-square"></i> Setor</label>
                    <select class="form-control" name ="setor_cad" required>
                    <option>Selecione...</option>
                    ';

    while ($dados_setor = mysqli_fetch_array($resultSetor)) {
        echo ' <option value = "' . $dados_setor['id'] . '">' . $dados_setor['id'] . ' - ' . $dados_setor['desc_setor'] . '</option>';
    }
    echo '
                    </select>
                </div>
            </div>
                  <br>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1">Confirmar cadastro</label>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
</div>
    ';
}
//função para exibir o formulário de alteração
function exibe_form_alter($id_usuario_edit)
{
    require_once './model/usuarios_model.php';

    $conexao = conectar();

    //recebendo informações do select passando o parâmetro ID vindo do POST.
    $dados_usuarios = mysqli_fetch_array(get_usuarios_list($id_usuario_edit));

    $queryPermissao = "SELECT * from permissoes";
    $querySetor = "SELECT * from setor";


    $resultPermissao = mysqli_query($conexao, $queryPermissao);
    $resultSetor = mysqli_query($conexao, $querySetor);


    echo '
    <div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Insira os dados a serem alterados</h3>
        </div>
        <form method="POST" action = "controller/usuarios_controller.php" enctype="multipart/form-data" role="form">
            <div class="card-body">
            <div class="row">
            <input type="hidden"  name = "id_user" value = ' . $dados_usuarios['id'] . '/>
                  <div class="col-3">
                  <label class="col-form-label" for="inputSuccess"><i class="far fa-user"></i> Nome Completo</label>
                <input type="text" class="form-control" name="nomeAlter" placeholder="' . $dados_usuarios['nome'] . '">
                  </div>
                  <div class="col-2">
                  <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Usuário</label>
                <input type="text" class="form-control" name="usuarioAlter" placeholder="' . $dados_usuarios['usuario'] . '" >
                  </div>
                  <div class="col-4">
                    <label class="col-form-label" for="inputSuccess"><i class="far fa-user-circle"></i> Avatar <i>(Dica: Renomeie o arquivo colocando o nome*)</i></label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id ="imagemAlter" name="imagemAlter">
                                <label class="custom-file-label" for="exampleInputFile">Selecionar foto</label>
                            </div>
                        </div>
                  </div>
                  <div class="col-3">
                        <label class="col-form-label" for="inputSuccess"><i class="fas fa-lock"></i> Permissão</label>
                        <select class="form-control" name ="permissaoAlter">
                            <option value = "">' . $dados_usuarios['desc_perm'] . '</option>
                            ';

    while ($dados_permissao = mysqli_fetch_array($resultPermissao)) {
        $dados_usuarios['status'] == 0 ? $dados_usuarios['status'] = 'Ativo' : $dados_usuarios['status'] = 'Inativo';

        echo ' <option value = "' . $dados_permissao['id'] . '">' . $dados_permissao['id'] . ' - ' . $dados_permissao['desc_perm'] . '</option>';
    }
    echo '
                        </select>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-3">
                            <label class="col-form-label" for="inputSuccess"><i class="fas fa-lock"></i> Status</label>
                            <select class="form-control" name ="statusAlter">
                                <option value = "">' . $dados_usuarios['status'] . '</option>
                                <option value = "0">1 - Inativo</option>
                                <option value = "1">2 - Ativo</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label class="col-form-label" for="inputSuccess"><i class="fas fa-vector-square"></i> Setor</label>
                            <select class="form-control" name ="setorAlter">
                                <option value = "">' . $dados_usuarios['desc_setor'] . '</option>
                                ';

    while ($dados_setor = mysqli_fetch_array($resultSetor)) {
        echo ' <option value = "' . $dados_setor['id'] . '">' . $dados_setor['id'] . ' - ' . $dados_setor['desc_setor'] . '</option>';
    }
    echo '
                            </select>
                        </div>

                    </div>
                    </br>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                        <label class="form-check-label" for="exampleCheck1">Confirmar alteração</label>
                    </div>
            </div>  
            <div class="card-footer">
                <button type="submit" name="alterar" class="btn btn-primary">Alterar</button>
            </div>
        </form>
    </div>
</div>
    ';
}
