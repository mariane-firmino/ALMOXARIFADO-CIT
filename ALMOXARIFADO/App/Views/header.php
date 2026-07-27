<?php if ($_SESSION['usuario_funcao'] == 1) { ?>
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
                    <p class="sidebar-title"><?= $_SESSION['usuario_nome'] ?></p>
                </div>
            </div>

            <nav>
                <a href="<?= URL ?>/pagina/home" class="menu-link">
                    <span class="icon">
                        <img src="<?= URL ?>/img/icone_inicio (1).png" alt="Icone Início" class="menu-icon">
                    </span>
                    Início
                </a>
                <a href="<?= URL ?>/pagina/perfil" class="menu-link">
                    <span class="icon">
                        <img src="<?= URL ?>/img/icon_perfil.png" alt="Icone Perfil" class="menu-icon perfil-icon">
                    </span>
                    Perfil
                </a>
                <a href="<?= URL ?>/notificacoes/notificacao" class="menu-link">
                    <span class="icon">
                        <img src="<?= URL ?>/img/icone_notificacao.png" alt="Icone Notificações" class="menu-icon">
                    </span>
                    Notificações
                </a>
                <a href="<?= URL ?>/usuarios/gerenciarPerfis" class="menu-link">
                    <span class="icon">
                        <img src="<?= URL ?>/img/icone_gerenciar_perfis.png" alt="Icone Gerenciar Perfis" class="menu-icon">
                    </span>
                    Gerenciar Perfis
                </a>
                <a href="<?= URL ?>/solicitacoes/analisarSolicitacao" class="menu-link">
                    <span class="icon">
                        <img src="<?= URL ?>/img/icone_analisar_solicitacao.png" alt="Icone Analisar Solicitação"
                            class="menu-icon">
                    </span>
                    Analisar Solicitação
                </a>
                <a href="<?= URL ?>/produtos/estoque" class="menu-link">
                    <span class="icon">
                        <img src="<?= URL ?>/img/icone_controlar_estoque.png" alt="Icone Controlar Estoque" class="menu-icon">
                    </span>
                    Controlar Estoque
                </a>
                <a href="<?= URL ?>/produtos/controlarProduto" class="menu-link">
                    <span class="icon">
                        <img src="<?= URL ?>/img/icone_controlar_produto.png" alt="Icone Controlar Produto" class="menu-icon">
                    </span>
                    Controlar Produto
                </a>
                <a href="<?= URL ?>/pagina/historico" class="menu-link">
                    <span class="icon">
                        <img src="<?= URL ?>/img/icon_historico.png" alt="Icone Consultar Histórico" class="menu-icon">
                    </span>
                    Consultar Histórico
                </a>
                <a href="<?= URL ?>/pagina/sair" class="menu-link active">
                    <span class="icon">
                        <img src="<?= URL ?>/img/icone_sair.png" alt="Icone Sair" class="menu-icon">
                    </span>
                    Sair
                </a>
            </nav>
        </aside>
    <?php } else if ($_SESSION['usuario_funcao'] == 2) { ?>
        <input type="checkbox" id="openSidebarMenu">

        <label for="openSidebarMenu" class="sidebarIconToggle">
            <div class="spinner"></div>
            <div class="spinner"></div>
            <div class="spinner"></div>
        </label>

        <div class="page">
            <aside class="sidebar" id="sidebarMenu">
                <div class="sidebar-header">
                    <img
                        src="<?= URL ?>/img/usuarios/<?= !empty($_SESSION['usuario_foto']) ? $_SESSION['usuario_foto'] : 'avatar-padrao.png' ?>"
                        alt="Avatar"
                        class="sidebar-avatar"
                        onerror="this.src='<?= URL ?>/img/usuarios/avatar-padrao.png'">
                    <div>
                        <p class="sidebar-title"><?= $_SESSION['usuario_nome'] ?></p>
                    </div>
                </div>

                <nav>
                    <a href="<?= URL ?>/pagina/home" class="menu-link">
                        <span class="icon">
                            <img src="<?= URL ?>/img/icone_inicio (1).png" alt="Icone Início" class="menu-icon">
                        </span>
                        Início
                    </a>
                    <a href="<?= URL ?>/pagina/perfil" class="menu-link">
                        <span class="icon">
                            <img src="<?= URL ?>/img/icon_perfil.png" alt="Icone Perfil" class="menu-icon perfil-icon">
                        </span>
                        Perfil
                    </a>
                    <a href="<?= URL ?>/notificacoes/notificacao" class="menu-link">
                        <span class="icon">
                            <img src="<?= URL ?>/img/icone_notificacao.png" alt="Icone Notificações" class="menu-icon">
                        </span>
                        Notificações
                    </a>
                    <a href="<?= URL ?>/solicitacoes/solicitacaoServidor" class="menu-link">
                        <span class="icon">
                            <img src="<?= URL ?>/img/icone_analisar_solicitacao.png" alt="Icone Solicitação" class="menu-icon">
                        </span>
                        Minhas Solicitações
                    </a>
                    <a href="<?= URL ?>/produtos/consultarProduto" class="menu-link">
                        <span class="icon">
                            <img src="<?= URL ?>/img/icon_consultar_produto (1).png" alt="Icone Consultar Produto"
                                class="menu-icon">
                        </span>
                        Consultar Produto
                    </a>
                    <a href="<?= URL ?>/pagina/historico" class="menu-link">
                        <span class="icon">
                            <img src="<?= URL ?>/img/icon_historico.png" alt="Icone Consultar Histórico" class="menu-icon">
                        </span>
                        Consultar Histórico
                    </a>
                    <a href="<?= URL ?>/pagina/sair" class="menu-link">
                        <span class="icon">
                            <img src="<?= URL ?>/img/icone_sair.png" alt="Icone Sair" class="menu-icon">
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
                        <img
                            src="<?= URL ?>/img/usuarios/<?= !empty($_SESSION['usuario_foto']) ? $_SESSION['usuario_foto'] : 'avatar-padrao.png' ?>"
                            alt="Avatar"
                            class="sidebar-avatar"
                            onerror="this.src='<?= URL ?>/img/usuarios/avatar-padrao.png'">
                        <div>
                            <p class="sidebar-title"><?= $_SESSION['usuario_nome'] ?></p>
                        </div>
                    </div>

                    <nav class="sidebar-nav">
                        <a href="<?= URL ?>/pagina/home" class="menu-link">
                            <img src="<?= URL ?>/img/icone_inicio (1).png" alt="Início" class="menu-icon">
                            Início
                        </a>
                        <a href="<?= URL ?>/pagina/perfil" class="menu-link">
                            <img src="<?= URL ?>/img/icon_perfil.png" alt="Perfil" class="menu-icon perfil-icon">
                            Perfil
                        </a>
                        <a href="<?= URL ?>/notificacoes/notificacao" class="menu-link">
                            <img src="<?= URL ?>/img/icone_notificacao.png" alt="Notificações" class="menu-icon">
                            Notificações
                        </a>
                        <a href="<?= URL ?>/produtos/estoque" class="menu-link">
                            <img src="<?= URL ?>/img/icone_controlar_estoque.png" alt="Controlar Estoque" class="menu-icon">
                            Controlar Estoque
                        </a>
                        <a href="<?= URL ?>/produtos/controlarProduto" class="menu-link">
                            <img src="<?= URL ?>/img/icone_controlar_produto.png" alt="Controlar Produto" class="menu-icon">
                            Controlar Produto
                        </a>
                        <a href="<?= URL ?>/pagina/sair" class="menu-link logout-link">
                            <img src="<?= URL ?>/img/icone_sair.png" alt="Sair" class="menu-icon">
                            Sair
                        </a>
                    </nav>
                </aside>
            <?php } ?>