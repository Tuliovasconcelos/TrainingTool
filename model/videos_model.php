<?php

function get_videos()
{
    require_once "../util/funcoes.php";

    $conexao = conectar();

    $query = "SELECT * from video";

    $result = mysqli_query($conexao, $query);

    return $result;
}

//função para cadastrar videos
function cadastrar_video($descricao_video, $link_video, $modulo_id)
{
    require_once "../util/funcoes.php";

    $conexao = conectar();

    //Montando a query com o delete do videos já passando o ID.
    $queryCadMod = "INSERT INTO video (descricao,link,modulo_id) VALUE('$descricao_video','$link_video','$modulo_id')";

    $resultCadVideo = mysqli_query($conexao, $queryCadMod);

    return $resultCadVideo;
}


//função para excluir módulo
function excluir_video($id_video)
{
    require_once "../util/funcoes.php";

    $conexao = conectar();

    //Montando a query com o delete do videos já passando o ID.
    $queryExclVideo = "DELETE from video where id = '$id_video'";

    $resultCadVideo = mysqli_query($conexao, $queryExclVideo);

    return $resultCadVideo;
}
