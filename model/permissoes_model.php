<?php

function get_permissao()
{
    require_once "../util/funcoes.php";

    $conexao = conectar();

    $query = "SELECT * from permissoes";

    $result = mysqli_query($conexao, $query);

    return $result;
}

//função para cadastrar permissões
function cadastrar_permissao($descricao_permissoes, $id_acesso)
{
    require_once "../util/funcoes.php";

    $conexao = conectar();

    //Montando a query com o delete do permissoess já passando o ID.
    $queryCadPerm = "INSERT INTO permissoes (desc_perm,id_acesso) VALUE('$descricao_permissoes','$id_acesso')";

    $resultCadPerm = mysqli_query($conexao, $queryCadPerm);

    return $resultCadPerm;
}


//função para excluir permissões
function excluir_permissao($id_permissoes)
{
    require_once "../util/funcoes.php";

    $conexao = conectar();

    //Montando a query com o delete do permissões já passando o ID.
    $queryExclPermissoes = "DELETE from permissoes where id = '$id_permissoes'";

    $resultCadPermissoes = mysqli_query($conexao, $queryExclPermissoes);

    return $resultCadPermissoes;
}
