<?php

//função para criar usuários
function cad_usuarios($nome, $usuario, $senha, $permissao, $setor, $nomeArquivo)
{
    require_once "../util/funcoes.php";

    $conexao = conectar();

    $query = "INSERT into usuarios (nome,usuario,senha,permissao,setor,status,nomeAvatar) VALUES ('$nome','$usuario','$senha','$permissao','$setor',1,'$nomeArquivo')";

    $result = mysqli_query($conexao, $query);

    return $result;
}

//função para alterar nome usuário
function alter_nome_usuario($nome_alterado, $id_usuario)
{
    require_once "../util/funcoes.php";

    $conexao = conectar();

    $query = "UPDATE usuarios set nome = '$nome_alterado' where id = '$id_usuario'";

    $result = mysqli_query($conexao, $query);

    return $result;
}

//função para alterar user usuário
function alter_user_usuario($usuario_alterado, $id_usuario)
{
    require_once "../util/funcoes.php";

    $conexao = conectar();

    $query = "UPDATE usuarios set usuario = '$usuario_alterado' where id = '$id_usuario'";

    $result = mysqli_query($conexao, $query);

    return $result;
}

//função para alterar permissão usuário
function alter_permissao_usuario($permissao_alterada, $id_usuario)
{
    require_once "../util/funcoes.php";

    $conexao = conectar();

    $query = "UPDATE usuarios set permissao='$permissao_alterada'where id = '$id_usuario'";

    $result = mysqli_query($conexao, $query);

    return $result;
}

//função para alterar setor usuário
function alter_setor_usuario($setor_alterado, $id_usuario)
{
    require_once "../util/funcoes.php";

    $conexao = conectar();

    $query = "UPDATE usuarios set setor =  '$setor_alterado'where id = '$id_usuario'";

    $result = mysqli_query($conexao, $query);

    return $result;
}

//função para alterar status usuário
function alter_status_usuario($status_alterado, $id_usuario)
{
    require_once "../util/funcoes.php";

    $conexao = conectar();

    $query = "UPDATE usuarios set status = '$status_alterado'where id = '$id_usuario'";

    $result = mysqli_query($conexao, $query);

    return $result;
}

//função para alterar imagem usuário
function alter_imagem_usuario($imagem_alterada, $id_usuario)
{
    require_once "../util/funcoes.php";

    $conexao = conectar();

    $query = "UPDATE usuarios set nomeAvatar = '$imagem_alterada' where id = '$id_usuario'";

    $result = mysqli_query($conexao, $query);

    return $result;
}



//função para buscar usuário através do ID
function get_usuarios_list($id_usuario_edit)
{
    require_once "./util/funcoes.php";

    $conexao = conectar();

    //Montando a query com o select do usuário para alteração dos dados
    $query = "SELECT * FROM usuarios as u
                INNER JOIN permissoes as p on u.permissao = p.id
                INNER JOIN setor as s on u.setor = s.id
                where u.id ='$id_usuario_edit'";

    $result = mysqli_query($conexao, $query);

    return $result;
}

//função para excluir usuários
function excluir_usuarios($id_usuario)
{
    require_once "../util/funcoes.php";

    $conexao = conectar();

    //Montando a query com o delete do usuário já passando o ID.
    $query = "DELETE from usuarios where id = '$id_usuario'";

    $result = mysqli_query($conexao, $query);

    return $result;
}

//funçao para pegar id do usuário logado recebendo como parâmetro a variável de sessão usuario
function get_id_usuario($usuario_login)
{
    require_once "./util/funcoes.php";

    $conexao = conectar();

    //Montando a query com o select do usuário para alteração dos dados
    $query = "SELECT id FROM usuarios where usuario ='$usuario_login'";

    $result = mysqli_query($conexao, $query);

    $id = mysqli_fetch_array($result);

    return $id['id'];
}

//função para pegar o avatar de acordo com ID passado como parâmetro
function get_avatar($id_usuario)
{
    require_once "./util/funcoes.php";

    $conexao = conectar();

    //Montando a query com o select do usuário para alteração dos dados
    $query = "SELECT nomeAvatar, nome FROM usuarios where id ='$id_usuario'";

    $result = mysqli_query($conexao, $query);

    $nomeAvatar = mysqli_fetch_array($result);

    return [$nomeAvatar['nomeAvatar'], $nomeAvatar['nome']];
}
