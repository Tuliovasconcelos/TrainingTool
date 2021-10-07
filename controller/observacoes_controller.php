<?php

function verifica_observacao()
{
    if (isset($_POST['enviar_observacao'])) {

        require_once '../model/observacoes_model.php';

        //Post na observação
        $result = cad_obervacao($_POST['id_usuario'],$_POST['observacao']);

        //verificando se teve retorno de linha 
        if ($result == true) {
            $_SESSION['obs_enviada'] = true;
            header("Location: ../main.php");
        } else {
            $_SESSION['obs_nao_enviada'] = true;
            header("Location:../main.php");
        }
    }
}
verifica_observacao();
