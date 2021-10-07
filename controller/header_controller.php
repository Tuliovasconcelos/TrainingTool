<?php

//Funções onde são definidas as informações a serem exibidas no header das paáginas relacionadas a usuários
function header_page_usuarios()
{
    $titulo_header = 'Usuários';
    $sub_titulo_header = 'Usuários';


    return $list_dados_page = [$titulo_header, $sub_titulo_header];
}

function header_page_main()
{
    $titulo_header = 'Visão Geral';
    $sub_titulo_header = 'Dashboard';


    return $list_dados_page = [$titulo_header, $sub_titulo_header];
}

function header_cad_usuarios()
{
    $titulo_header = 'Cadastro de Usuários';
    $sub_titulo_header = 'Cadastro';

    return $list_dados_page = [$titulo_header, $sub_titulo_header];
}

function header_alter_usuarios()
{
    $titulo_header = 'Alteração de Usuários';
    $sub_titulo_header = 'Alteração';

    return $list_dados_page = [$titulo_header, $sub_titulo_header];
}
function header_moduloMv()
{
    $titulo_header = 'Módulo: MV';
    $sub_titulo_header = 'Treinamento';

    return $list_dados_page = [$titulo_header, $sub_titulo_header];
}

function header_historicos()
{
    $titulo_header = 'Histórico';
    $sub_titulo_header = 'Histórico de usuários';

    return $list_dados_page = [$titulo_header, $sub_titulo_header];
}

function header_modulos()
{
    $titulo_header = 'Módulos';
    $sub_titulo_header = 'Cadastro de módulos';

    return $list_dados_page = [$titulo_header, $sub_titulo_header];
}

function header_setores()
{
    $titulo_header = 'Setores';
    $sub_titulo_header = 'Cadastro de Setores';

    return $list_dados_page = [$titulo_header, $sub_titulo_header];
}

function header_videos()
{
    $titulo_header = 'Vídeos';
    $sub_titulo_header = 'Cadastro de Vídeos';

    return $list_dados_page = [$titulo_header, $sub_titulo_header];
}

function header_permissoes()
{
    $titulo_header = 'Permissões/Acesso';
    $sub_titulo_header = 'Cadastro de Permissões';

    return $list_dados_page = [$titulo_header, $sub_titulo_header];
}
function header_treinamentos()
{
    $titulo_header = 'Treinamentos';
    $sub_titulo_header = 'Cadastro de Treinamentos';

    return $list_dados_page = [$titulo_header, $sub_titulo_header];
}

function header_formularios()
{
    $titulo_header = 'Formulários';
    $sub_titulo_header = 'Cadastro de Formulários';

    return $list_dados_page = [$titulo_header, $sub_titulo_header];
}
