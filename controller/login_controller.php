<?php
function verifica_login()
{
    //Verifica se foi feito o post no Submit
    if (isset($_POST['entrar'])) {
        session_start();
        //verifica se o usuário digitou algo nos campos
        if (empty($_POST['usuario']) && empty($_POST['senha'])) {
            $_SESSION['input_vazio'] = true;
            header('Location: ../index.php');
        }
        //Se Digitou
        else {
            include_once "../model/autenticacoes_model.php";
            //tratando caracteres e previnindo SQL injection.
            $usuario = ($_POST["usuario"]);
            $senha = ($_POST["senha"]);

            //Função para verificar usuários no banco.
            $row = get_usuarios($usuario, $senha);

            //verificando se teve retorno de linha 
            if ($row == 1) {
                $_SESSION['usuario'] = $usuario;
                $_SESSION['bem_vindo'] = true;
                header("Location: ../main.php");
            } else {
                $_SESSION['nao_autenticado'] = true;
                header("Location:../index.php");
            }
        }
    }
}
verifica_login();
