<?php
function get_usuarios($usuario, $senha)
{
    require_once "../util/funcoes.php";

    $conexao = conectar();
    //Montando a query com o select ja verificando se o usuário e senha digitados conferem com os do banco.
    $query = "SELECT * from usuarios where usuario ='$usuario' and senha = '" . md5($senha) . "'";

    $result = mysqli_query($conexao, $query);

    //quantidade de linhas do result
    $row = mysqli_num_rows($result);

    return $row;
}
