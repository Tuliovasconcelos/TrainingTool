<?php

//função para enviar observações 
function cad_obervacao($id_usuario, $observacao)
{
    require_once "../util/funcoes.php";

    $conexao = conectar();

    $query = "INSERT into observacoes (usuario,observacao) VALUES ('$id_usuario','$observacao')";

    $result = mysqli_query($conexao, $query);

    return $result;
}
