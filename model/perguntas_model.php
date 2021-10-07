<?php

function get_perguntas($id_formteste)
{
    require_once "../util/funcoes.php";

    $conexao = conectar();

    $query = "SELECT * from perguntas where id_formteste = '$id_formteste' ";

    $result = mysqli_query($conexao, $query);

    return $result;
}
