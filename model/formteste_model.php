<?php

//função para cadastrar permissões
function cadastrar_formteste($descricao_form, $id_modulo, $id_permissao)
{
    require_once "../util/funcoes.php";

    $conexao = conectar();

    //Montando a query com o delete do permissoess já passando o ID.
    $queryCadForm = "INSERT INTO formteste (nome_teste,permissao_id, modulo_id) VALUE('$descricao_form','$id_modulo','$id_permissao')";

    $resultCadForm = mysqli_query($conexao, $queryCadForm);

    return $resultCadForm;
}


//função para excluir permissões
function excluir_formteste($id_formteste)
{
    require_once "../util/funcoes.php";

    $conexao = conectar();

    //Montando a query com o delete do permissões já passando o ID.
    $queryExclFormteste = "DELETE from formteste where id = '$id_formteste'";

    $resultExclFormteste = mysqli_query($conexao, $queryExclFormteste);

    return $resultExclFormteste;
}
