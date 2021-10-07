<?php

//Função para verificar ações dos inputs da tabela de cadastro de usuários
function verifica_acao_videos()
{

    //Verifica se foi feito o post no Submit
    if (isset($_POST['cadastrar'])) {

        require_once '../model/videos_model.php';
        session_start();

        //exclui o usuário passando o ID
        $result = cadastrar_video($_POST['descricao_video'], $_POST['link_video'], $_POST['modulo_id']);

        //verificando se teve retorno de linha 
        if ($result == true) {
            $_SESSION['cadastrado'] = true;
            header("Location: ../videos.php");
        } else {
            $_SESSION['nao_cadastrado'] = true;
            header("Location:../videos.php");
        }
    }

    //Verifica se foi feito o post no Submit
    if (isset($_POST['excluir'])) {

        require_once '../model/videos_model.php';
        session_start();

        //exclui o usuário passando o ID
        $result = excluir_video($_POST['id_video']);

        //verificando se teve retorno de linha 
        if ($result == true) {
            $_SESSION['excluido'] = true;
            header("Location: ../videos.php");
        } else {
            $_SESSION['nao_excluido'] = true;
            header("Location:../videos.php");
        }
    }
}
verifica_acao_videos();
