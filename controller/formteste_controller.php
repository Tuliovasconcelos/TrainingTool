<?php

//Função para verificar ações dos inputs da tabela de cadastro de usuários
function verifica_acao_formularios()
{

    //Verifica se foi feito o post no Submit
    if (isset($_POST['cadastrar'])) {

        require_once '../model/formteste_model.php';
        session_start();

        //exclui o usuário passando o ID
        $result = cadastrar_formteste($_POST['desc_form'], $_POST['id_modulo'], $_POST['id_permissao']);

        //verificando se teve retorno de linha 
        if ($result == true) {
            $_SESSION['cadastrado'] = true;
            header("Location: ../formteste.php");
        } else {
            $_SESSION['nao_cadastrado'] = true;
            header("Location:../formteste.php");
        }
    }

    //Verifica se foi feito o post no Submit
    if (isset($_POST['excluir'])) {

        require_once '../model/formteste_model.php';
        session_start();

        //exclui o usuário passando o ID
        $result = excluir_formteste($_POST['id_formteste']);

        //verificando se teve retorno de linha 
        if ($result == true) {
            $_SESSION['excluido'] = true;
            header("Location: ../formteste.php");
        } else {
            $_SESSION['nao_excluido'] = true;
            header("Location:../formteste.php");
        }
    }
}
verifica_acao_formularios();
