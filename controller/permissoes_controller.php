<?php

//Função para verificar ações dos inputs da tabela de cadastro de usuários
function verifica_acao_permissoes()
{

    //Verifica se foi feito o post no Submit
    if (isset($_POST['cadastrar'])) {

        require_once '../model/permissoes_model.php';
        session_start();

        //exclui o usuário passando o ID
        $result = cadastrar_permissao($_POST['desc_perm'], $_POST['id_acesso']);

        //verificando se teve retorno de linha 
        if ($result == true) {
            $_SESSION['cadastrada'] = true;
            header("Location: ../permissaoAcesso.php");
        } else {
            $_SESSION['nao_cadastrada'] = true;
            header("Location:../permissaoAcesso.php");
        }
    }

    //Verifica se foi feito o post no Submit
    if (isset($_POST['excluir'])) {

        require_once '../model/permissoes_model.php';
        session_start();

        //exclui o usuário passando o ID
        $result = excluir_permissao($_POST['id_permissao']);

        //verificando se teve retorno de linha 
        if ($result == true) {
            $_SESSION['excluida'] = true;
            header("Location: ../permissaoAcesso.php");
        } else {
            $_SESSION['nao_excluida'] = true;
            header("Location:../permissaoAcesso.php");
        }
    }
}
verifica_acao_permissoes();
