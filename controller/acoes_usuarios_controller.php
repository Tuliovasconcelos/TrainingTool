<?php

//Função para verificar ações dos inputs da tabela de cadastro de usuários
function verifica_inputs_acao()
{
    //Verifica se foi feito o post no Submit
    if (isset($_POST['excluir'])) {

        require_once '../model/usuarios_model.php';
        session_start();

        //exclui o usuário passando o ID
        $result = excluir_usuarios($_POST['id_usuario']);

        //verificando se teve retorno de linha 
        if ($result == true) {
            $_SESSION['excluido'] = true;
            header("Location: ../usuarios.php");
        } else {
            $_SESSION['nao_excluido'] = true;
            header("Location:../usuarios.php");
        }
    }
    if (isset($_POST['editar'])) {
        require_once './model/usuarios_model.php';
        $id_usuario_edit = $_POST['usuario_edit'];

        return $id_usuario_edit;
    }
    if (isset($_POST['historico'])) {
        $id_usuario_historico = $_POST['usuario_historico'];

        return $id_usuario_historico;
    }
}
verifica_inputs_acao();
