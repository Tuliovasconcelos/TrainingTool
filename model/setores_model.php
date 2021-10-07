<?php

//função para cadastrar setor
function cadastrar_setor($desc_setor)
{
    require_once "../util/funcoes.php";

    $conexao = conectar();

    //Montando a query com o delete do setor já passando o ID.
    $queryCadSetor = "INSERT INTO setor (desc_setor) VALUE('$desc_setor')";

    $resultCadSetor = mysqli_query($conexao, $queryCadSetor);

    return $resultCadSetor;
}


//função para excluir módulo
function excluir_setor($id_setor)
{
    require_once "../util/funcoes.php";

    $conexao = conectar();

    //Montando a query com o delete do setor já passando o ID.
    $queryExclSetor = "DELETE from setor where id = '$id_setor'";

    $resultCadSetor = mysqli_query($conexao, $queryExclSetor);

    return $resultCadSetor;
}
