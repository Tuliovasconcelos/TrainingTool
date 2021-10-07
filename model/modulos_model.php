<?php

//função para cadastrar modulo
function cadastrar_modulo($descricao_modulo)
{
    require_once "../util/funcoes.php";

    $conexao = conectar();

    //Montando a query com o delete do modulo já passando o ID.
    $queryCadMod = "INSERT INTO modulos (desc_mod) VALUE('$descricao_modulo')";

    $resultCadMod = mysqli_query($conexao, $queryCadMod);

    return $resultCadMod;
}


//função para excluir módulo
function excluir_modulo($id_modulo)
{
    require_once "../util/funcoes.php";

    $conexao = conectar();

    //Montando a query com o delete do modulo já passando o ID.
    $queryExclMod = "DELETE from modulos where id_mod = '$id_modulo'";

    $resultExcMod = mysqli_query($conexao, $queryExclMod);

    return $resultExcMod;
}
