<?php

//Função para verificar ações dos inputs da tabela de cadastro de usuários
function verifica_acao_setor()
{

    //Verifica se foi feito o post no Submit
    if (isset($_POST['cadastrar'])) {

        require_once '../model/setores_model.php';
        session_start();

        //exclui o usuário passando o ID
        $result = cadastrar_setor($_POST['desc_setor']);

        //verificando se teve retorno de linha 
        if ($result == true) {
            $_SESSION['cadastrado'] = true;
            header("Location: ../setores.php");
        } else {
            $_SESSION['nao_cadastrado'] = true;
            header("Location:../setores.php");
        }
    }

    //Verifica se foi feito o post no Submit
    if (isset($_POST['excluir'])) {

        require_once '../model/setores_model.php';
        session_start();

        //exclui o usuário passando o ID
        $result = excluir_setor($_POST['id_setor']);

        //verificando se teve retorno de linha 
        if ($result == true) {
            $_SESSION['excluido'] = true;
            header("Location: ../setores.php");
        } else {
            $_SESSION['nao_excluido'] = true;
            header("Location:../setores.php");
        }
    }
}
verifica_acao_setor();
