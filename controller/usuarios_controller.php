<?php
//função para verificar inputs dos cadastros
function verifica_inputs()
{
    session_start();
    include "../model/usuarios_model.php";
    //Verifica se foi feito o post no Submit
    if (isset($_POST['cadastrar'])) {

        $nome = ($_POST["nome_cad"]);
        $usuario = ($_POST["usuario_cad"]);
        $senha = md5(($_POST["senha_cad"]));
        $permissao = ($_POST["permissao_cad"]);
        $setor = ($_POST["setor_cad"]);

        $nomeArquivo = ($_FILES['imagem']['name']);
        preg_match("/\.(gif|bmp|png|jpg|jpeg|pdf){1}$/i", $nomeArquivo, $ext);
        $caminhoAtualArquivo = ($_FILES['imagem']['tmp_name']);
        $caminhoSalvar = '../dist/img/' . $nomeArquivo;

        move_uploaded_file($caminhoAtualArquivo, $caminhoSalvar);

        //insere o novo usuário no banco
        $result = cad_usuarios($nome, $usuario, $senha, $permissao, $setor, $nomeArquivo);

        //verificando se teve retorno de linha 
        if ($result == true) {
            $_SESSION['cadastrado'] = true;
            header("Location: ../usuarios.php");
        } else {
            $_SESSION['nao_cadastrado'] = true;
            header("Location:../usuarios.php");
        }
    }

    if (isset($_POST['alterar'])) {

        $id_usuario = $_POST['id_user'];

        if (isset($_POST["nomeAlter"]) && ($_POST["nomeAlter"]) != "") {

            //Altera o dado no banco passando valor +id 
            $result = alter_nome_usuario($_POST["nomeAlter"], $id_usuario);

            //verificando se teve retorno de linha 
            if ($result == true) {
                $_SESSION['alterado'] = true;
                header("Location: ../usuarios.php");
            }
        }
        if (isset($_POST["usuarioAlter"]) && ($_POST["usuarioAlter"]) != "") {

            //Altera o dado no banco
            $result = alter_user_usuario($_POST["usuarioAlter"], $id_usuario);

            //verificando se teve retorno de linha 
            if ($result == true) {
                $_SESSION['alterado'] = true;
            }
        }
        if (isset($_POST["permissaoAlter"]) && ($_POST["permissaoAlter"]) != "") {

            //Altera o dado no banco
            $result = alter_permissao_usuario($_POST["permissaoAlter"], $id_usuario);

            //verificando se teve retorno de linha 
            if ($result == true) {
                $_SESSION['alterado'] = true;
            }
        }
        if (isset($_POST["setorAlter"]) && ($_POST["setorAlter"]) != "") {

            //Altera o dado no banco
            $result = alter_setor_usuario($_POST["setorAlter"], $id_usuario);

            //verificando se teve retorno de linha 
            if ($result == true) {
                $_SESSION['alterado'] = true;
            }
        }
        if (isset($_POST["statusAlter"]) && ($_POST["statusAlter"]) != "") {

            //Altera o dado no banco
            $result = alter_status_usuario($_POST["statusAlter"], $id_usuario);

            //verificando se teve retorno de linha 
            if ($result == true) {
                $_SESSION['alterado'] = true;
            }
        }
        if (isset($_FILES['imagemAlter']) && ($_FILES['imagemAlter']) != "") {

            $nomeArquivoAlter = ($_FILES['imagemAlter']['name']);
            preg_match("/\.(gif|bmp|png|jpg|jpeg|pdf){1}$/i", $nomeArquivoAlter, $ext);
            $caminhoAtualArquivo = ($_FILES['imagemAlter']['tmp_name']);
            $caminhoSalvar = '../dist/img/' . $nomeArquivoAlter;

            move_uploaded_file($caminhoAtualArquivo, $caminhoSalvar);

            //Altera o dado no banco
            $result = alter_imagem_usuario($nomeArquivoAlter, $id_usuario);
            //verificando se teve retorno de linha 
            if ($result == true) {
                $_SESSION['alterado'] = true;
            }
        }

        var_dump($result);

        if (isset($_SESSION['alterado'])) {
            header("Location: ../usuarios.php");
        } else {
            $_SESSION['nao_alterado'] = true;
            header("Location: ../usuarios.php");
        }
    }
}
verifica_inputs();
