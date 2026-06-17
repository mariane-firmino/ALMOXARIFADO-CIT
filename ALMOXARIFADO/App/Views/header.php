<?php if (isset($_SESSION['coordenador_id'])) { ?>
    <input type="checkbox" id="openSidebarMenu">

    <label for="openSidebarMenu" class="sidebarIconToggle">
        <div class="spinner"></div>
        <div class="spinner"></div>
        <div class="spinner"></div>
    </label>

    <label for="openSidebarMenu" class="overlay"></label>

    <div class="page">
        <aside class="sidebar" id="sidebarMenu">
            <div class="sidebar-header">
                <img src="<?= URL ?>/public/img/avatar-menu.png" alt="Avatar" class="sidebar-avatar">
                <div>
                    <p class="sidebar-title">Nome</p>
                </div>
            </div>

            <nav>
                <a href="inicio.html" class="menu-link">
                    <span class="icon">
                        <img src="<?= URL ?>/public/img/icone_inicio (1).png" alt="Icone Início" class="menu-icon">
                    </span>
                    Início
                </a>
                <a href="perfil.html" class="menu-link">
                    <span class="icon">
                        <img src="<?= URL ?>/public/img/icon_perfil.png" alt="Icone Perfil" class="menu-icon perfil-icon">
                    </span>
                    Perfil
                </a>
                <a href="notificacao-coordenador.html" class="menu-link">
                    <span class="icon">
                        <img src="<?= URL ?>/public/img/icone_notificacao.png" alt="Icone Notificações" class="menu-icon">
                    </span>
                    Notificações
                </a>
                <a href="gerenciar-perfil.html" class="menu-link">
                    <span class="icon">
                        <img src="<?= URL ?>/public/img/icone_gerenciar_perfis.png" alt="Icone Gerenciar Perfis" class="menu-icon">
                    </span>
                    Gerenciar Perfis
                </a>
                <a href="consultar-produto.html" class="menu-link">
                    <span class="icon">
                        <img src="<?= URL ?>/public/img/icon_consultar_produto (1).png" alt="Icone Consultar Produto"
                            class="menu-icon">
                    </span>
                    Consultar Produto
                </a>
                <a href="analisar-solicitacao.html" class="menu-link">
                    <span class="icon">
                        <img src="<?= URL ?>/public/img/icone_analisar_solicitacao.png" alt="Icone Analisar Solicitação"
                            class="menu-icon">
                    </span>
                    Analisar Solicitação
                </a>
                <a href="controlar-estoque.html" class="menu-link">
                    <span class="icon">
                        <img src="<?= URL ?>/public/img/icone_controlar_estoque.png" alt="Icone Controlar Estoque" class="menu-icon">
                    </span>
                    Controlar Estoque
                </a>
                <a href="controlar-produto.html" class="menu-link">
                    <span class="icon">
                        <img src="<?= URL ?>/public/img/icone_controlar_produto.png" alt="Icone Controlar Produto" class="menu-icon">
                    </span>
                    Controlar Produto
                </a>
                <a href="consultar-historico.html" class="menu-link">
                    <span class="icon">
                        <img src="<?= URL ?>/public/img/icon_historico.png" alt="Icone Consultar Histórico" class="menu-icon">
                    </span>
                    Consultar Histórico
                </a>
                <a href="sair.html" class="menu-link">
                    <span class="icon">
                        <img src="<?= URL ?>/public/img/icone_sair.png" alt="Icone Sair" class="menu-icon">
                    </span>
                    Sair
                </a>
            </nav>

        </aside>
    <?php } else if (isset($_SESSION['servidor_id'])) { ?>
        <input type="checkbox" id="openSidebarMenu">

        <label for="openSidebarMenu" class="sidebarIconToggle">
            <div class="spinner"></div>
            <div class="spinner"></div>
            <div class="spinner"></div>
        </label>

        <label for="openSidebarMenu" class="overlay"></label>

        <div class="page">
            <aside class="sidebar" id="sidebarMenu">
                <div class="sidebar-header">
                    <img src="../img/avatar-menu.png" alt="Avatar" class="sidebar-avatar">
                    <div>
                        <p class="sidebar-title">Nome</p>
                    </div>
                </div>

                <nav>
                    <a href="inicio-servidor.html" class="menu-link">
                        <span class="icon">
                            <img src="../img/icone_inicio (1).png" alt="Icone Início" class="menu-icon">
                        </span>
                        Início
                    </a>
                    <a href="perfil-servidor.html" class="menu-link">
                        <span class="icon">
                            <img src="../img/icon_perfil.png" alt="Icone Perfil" class="menu-icon perfil-icon">
                        </span>
                        Perfil
                    </a>
                    <a href="notificacao-servidor.html" class="menu-link">
                        <span class="icon">
                            <img src="../img/icone_notificacao.png" alt="Icone Notificações" class="menu-icon">
                        </span>
                        Notificações
                    </a>
                    <a href="solicitacao-servidor.html" class="menu-link">
                        <span class="icon">
                            <img src="../img/icone_analisar_solicitacao.png" alt="Icone Solicitação" class="menu-icon">
                        </span>
                        Minhas Solicitações
                    </a>
                    <a href="consultar-produto.html" class="menu-link">
                        <span class="icon">
                            <img src="../img/icon_consultar_produto (1).png" alt="Icone Consultar Produto"
                                class="menu-icon">
                        </span>
                        Consultar Produto
                    </a>
                    <a href="consultar-historico.html" class="menu-link">
                        <span class="icon">
                            <img src="../img/icon_historico.png" alt="Icone Consultar Histórico" class="menu-icon">
                        </span>
                        Consultar Histórico
                    </a>
                    <a href="acompanhar-status.html" class="menu-link">
                        <span class="icon">
                            <img src="../img/icon_status.png" alt="Icone Acompanhar Status" class="menu-icon">
                        </span>
                        Acompanhar Status
                    </a>
                    <a href="sair.html" class="menu-link">
                        <span class="icon">
                            <img src="../img/icone_sair.png" alt="Icone Sair" class="menu-icon">
                        </span>
                        Sair
                    </a>
                </nav>
            </aside>
        <?php } else { ?>
            <input type="checkbox" id="openSidebarMenu">

            <label for="openSidebarMenu" class="sidebarIconToggle">
                <div class="spinner"></div>
                <div class="spinner"></div>
                <div class="spinner"></div>
            </label>

            <label for="openSidebarMenu" class="overlay"></label>

            <div class="page">
                <aside class="sidebar" id="sidebarMenu">
                    <div class="sidebar-header">
                        <img src="../img/avatar-menu.png" alt="Avatar" class="sidebar-avatar">
                        <div>
                            <p class="sidebar-title">Nome</p>
                        </div>
                    </div>

                    <nav class="sidebar-nav">
                        <a href="inicio-estagiario.html" class="menu-link">
                            <img src="../img/icone_inicio (1).png" alt="Início" class="menu-icon">
                            Início
                        </a>
                        <a href="perfil-estagiario.html" class="menu-link">
                            <img src="../img/icon_perfil.png" alt="Perfil" class="menu-icon perfil-icon">
                            Perfil
                        </a>
                        <a href="notificacao-estagiario.html" class="menu-link">
                            <img src="../img/icone_notificacao.png" alt="Notificações" class="menu-icon">
                            Notificações
                        </a>
                        <a href="consultar-produto.html" class="menu-link">
                            <img src="../img/icon_consultar_produto (1).png" alt="Consultar Produto" class="menu-icon">
                            Consultar Produto
                        </a>
                        <a href="controlar-estoque.html" class="menu-link">
                            <img src="../img/icone_controlar_estoque.png" alt="Controlar Estoque" class="menu-icon">
                            Controlar Estoque
                        </a>
                        <a href="controlar-produto.html" class="menu-link">
                            <img src="../img/icone_controlar_produto.png" alt="Controlar Produto" class="menu-icon">
                            Controlar Produto
                        </a>
                        <a href="sair.html" class="menu-link logout-link">
                            <img src="../img/icone_sair.png" alt="Sair" class="menu-icon">
                            Sair
                        </a>
                    </nav>
                </aside>
            <?php } ?>