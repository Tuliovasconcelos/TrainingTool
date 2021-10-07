<?php

function get_historico($id_usuario)
{
    require_once "./util/funcoes.php";

    $conexao = conectar();

    $query = "SELECT * from teste_feitos where id_usuario ='$id_usuario' ";

    $result = mysqli_query($conexao, $query);

    return $result;
}
