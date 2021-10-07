<?php

//Função para verificar ações dos inputs da tabela de cadastro de usuários
function verifica_acao_modulo()
{

    //Verifica se foi feito o post no Submit
    if (isset($_POST['cadastrar'])) {

        require_once '../model/modulos_model.php';
        session_start();

        //exclui o usuário passando o ID
        $result = cadastrar_modulo($_POST['desc_mod']);

        //verificando se teve retorno de linha 
        if ($result == true) {
            $_SESSION['cadastrado'] = true;
            header("Location: ../modulos.php");
        } else {
            $_SESSION['nao_cadastrado'] = true;
            header("Location:../modulos.php");
        }
    }

    //Verifica se foi feito o post no Submit
    if (isset($_POST['excluir'])) {

        require_once '../model/modulos_model.php';
        session_start();

        //exclui o usuário passando o ID
        $result = excluir_modulo($_POST['id_modulo']);

        //verificando se teve retorno de linha 
        if ($result == true) {
            $_SESSION['excluido'] = true;
            header("Location: ../modulos.php");
        } else {
            $_SESSION['nao_excluido'] = true;
            header("Location:../modulos.php");
        }
    }
}
verifica_acao_modulo();
