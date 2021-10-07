<?php

function exibe_sidebar()
{

    require_once './model/usuarios_model.php';
    require_once './util/funcoes.php';

    //pegando o ID do usuário logado
    $id_usuario = get_id_usuario($_SESSION['usuario']);

    //pegando o nome do avatar passando como parâmetro ID do usuário
    $nomeAvatar = get_avatar($id_usuario);

    echo '
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="main.php" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Treinamentos</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/' . $nomeAvatar[0] . '" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">' . $nomeAvatar[1] . '</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Procurar" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-compact" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item ';
    if (
        get_page() == 'moduloMv.php' ||
        get_page() == 'moduloSisr.php'
    ) {
        echo 'menu-open';
    }
    echo '"> <!-- para abrir menu, classe menu-open -->
                    <a href="#" class="nav-link ';
    if (
        get_page() == 'moduloMv.php' ||
        get_page() == 'moduloSisr.php'
    ) {
        echo 'active';
    }
    echo '"><!-- para deixar selecionado class active  -->
                    <i class="fas fa-headset"></i>
                        <p>
                            Atendimento
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="moduloSisr.php" class="nav-link ';
    if (get_page() == 'moduloSisr.php') {
        echo 'active';
    }
    echo ' ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Módulo SIS-R</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="moduloMv.php" class="nav-link ';
    if (get_page() == 'moduloMv.php') {
        echo 'active';
    }
    echo '">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Módulo M.V</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gerais</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                    <i class="fas fa-chart-line"></i>
                        <p>
                            Faturamento
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./index.html" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Módulo SIS-R</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index2.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Módulo M.V</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gerais</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                    <i class="fas fa-search-dollar"></i>
                        <p>
                            Comercial
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./index.html" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Módulo SIS-R</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index2.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Módulo M.V</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gerais</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ';
    if (
        get_page() == 'usuarios.php' ||
        get_page() == 'treinamentos.php' ||
        get_page() == 'modulos.php' ||
        get_page() == 'setores.php' ||
        get_page() == 'treinamentos.php' ||
        get_page() == 'videos.php' ||
        get_page() == 'permissaoAcesso.php' ||
        get_page() == 'formteste.php'
    ) {
        echo 'menu-open';
    }
    echo '">
                <a href="#" class="nav-link ';
    if (
        get_page() == 'usuarios.php' ||
        get_page() == 'treinamentos.php' ||
        get_page() == 'modulos.php' ||
        get_page() == 'setores.php' ||
        get_page() == 'treinamentos.php' ||
        get_page() == 'videos.php' ||
        get_page() == 'permissaoAcesso.php' ||
        get_page() == 'formteste.php'

    ) {
        echo 'active';
    }
    echo '">
                <i class="fas fa-cogs"></i>
                    <p>
                        Cadastros
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="modulos.php" class="nav-link
                        ';
    if (get_page() == 'modulos.php') {
        echo 'active';
    }
    echo ' 
                        ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Módulos</p>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="setores.php" class="nav-link   ';
    if (get_page() == 'setores.php') {
        echo 'active';
    }
    echo ' ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Setores</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="videos.php" class="nav-link   ';
    if (get_page() == 'videos.php') {
        echo 'active';
    }
    echo ' ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Vídeos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                    <a href="permissaoAcesso.php" class="nav-link   ';
    if (get_page() == 'permissaoAcesso.php') {
        echo 'active';
    }
    echo ' ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Permissões/Acessos</p>
                    </a>
                </li>
                <li class="nav-item">
                        <a href="formteste.php" class="nav-link   ';
    if (get_page() == 'formteste.php') {
        echo 'active';
    }
    echo ' ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Formulários</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="treinamentos.php" class="nav-link   ';
    if (get_page() == 'treinamentos.php') {
        echo 'active';
    }
    echo ' ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Treinamentos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="usuarios.php" class="nav-link  ';
    if (get_page() == 'usuarios.php') {
        echo 'active';
    }
    echo '  ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Usuarios</p>
                        </a>
                    </li>
                    
                </ul>
            </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
    ';
}
