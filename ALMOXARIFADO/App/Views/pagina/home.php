<?php include "../App/Views/header.php"; ?>
<?php if ($_SESSION['usuario_funcao'] == 1) { ?>
    <main class="content">
        <header class="page-header">
            <div class="page-title">
                <div class="title-row">
                    <span class="title-flag"></span>
                    <h1>Início</h1>
                </div>
                <p class="subtitle">Bem-vindo(a), <?= $_SESSION['usuario_nome'] ?> !</p>
            </div>
            <img src="<?= URL ?>/img/logo-sacit.png" alt="SACIT Logo" class="brand-logo">
        </header>

        <section class="home-dashboard">
            <div class="home-dashboard-row home-top-row">
                <article class="home-card home-notification-card">
                    <div class="home-notification-header">
                        <div class="home-icon-box">
                            <img src="<?= URL ?>/img/notify.png" alt="Notificações" class="home-card-icon">
                        </div>
                        <h2>Novas notificações</h2>
                    </div>
                    <p class="home-metric-large"><?= $dados['notificacoesNaoLidas']; ?></p>
                    <p class="home-card-description">Você não possui novas notificações.</p>
                </article>

                <article class="home-card home-summary-card">

                    <div class="home-notification-header">
                        <div class="home-icon-box">
                            <img src="<?= URL ?>/img/checklist.png" alt="Resumo" class="home-card-icon">
                        </div>

                        <h2>Resumo das Solicitações</h2>
                    </div>

                    <div class="home-summary-grid">

                        <div class="home-summary-item">
                            <div class="home-summary-text">
                                <p class="home-summary-label">Aprovadas</p>
                                <p class="home-summary-value"><?= $dados['solicitacoesAprovadas']; ?></p>
                            </div>
                        </div>

                        <div class="home-summary-item">
                            <div class="home-summary-text">
                                <p class="home-summary-label">Pendente</p>
                                <p class="home-summary-value"><?= $dados['solicitacoesPendentes']; ?></p>
                            </div>
                        </div>

                        <div class="home-summary-item">
                            <div class="home-summary-text">
                                <p class="home-summary-label">Negadas</p>
                                <p class="home-summary-value"><?= $dados['negadas']; ?></p>
                            </div>
                        </div>

                    </div>

                </article>
            </div>

            <div class="home-dashboard-row home-bottom-row">
                <article class="home-card home-activity-card">
                    <div class="home-activity-heading">
                        <div class="home-icon-box small">
                            <img src="<?= URL ?>/img/icon_resumo.png" alt="Resumo das Atividades" class="home-card-icon">
                        </div>
                        <h2>Resumo das Atividades</h2>
                    </div>
                    <div class="home-activity-list">
                        <div class="home-activity-row"><span>Solicitação em andamento</span><strong>0</strong></div>
                        <div class="home-activity-row"><span>Pendência de devolução</span><strong>0</strong></div>
                        <div class="home-activity-row"><span>Solicitação concluída</span><strong>0</strong></div>
                        <div class="home-activity-row"><span>Atrasos</span><strong>0</strong></div>
                    </div>
                </article>

                <article class="home-card home-metric-card">
                    <div class="home-metric-heading">
                        <div class="home-icon-box small">
                            <img src="<?= URL ?>/img/user.png" alt="Total de Perfis" class="home-card-icon">
                        </div>
                        <p class="home-metric-title">Total de Perfis:</p>
                    </div>
                    <p class="home-metric-value"><?= $dados['totalPerfis']; ?></p>
                    <p class="home-metric-note">Perfis Removidos: </p>
                    <strong><?= $dados['perfisRemovidos']; ?></strong>
                </article>

                <article class="home-card home-metric-card home-products-card">
                    <div class="home-metric-heading">
                        <div class="home-icon-box small">
                            <img src="<?= URL ?>/img/caixa.png" alt="Total de Produtos" class="home-card-icon">
                        </div>
                        <p class="home-metric-title">Total de Produtos</p>
                    </div>
                    <p class="home-metric-value"><?= $dados['totalProdutos']; ?></p>
                    <p class="home-metric-note">Produtos excluídos: </p>
                    <strong>0</strong>
                </article>

                <article class="home-card home-metric-card home-stock-card">
                    <div class="home-metric-heading">
                        <div class="home-icon-box small">
                            <img src="<?= URL ?>/img/armario.png" alt="Situação do Estoque" class="home-card-icon">
                        </div>
                        <p class="home-metric-title">Situação do Estoque</p>
                    </div>
                    <p class="home-stock-status">Estoque Completo</p>
                    <p class="home-metric-value">0</p>
                    <p class="home-metric-note">Produto em Falta: </p>
                    <span class="home-stock-zero">0</span>
                </article>
            </div>
        </section>
    </main>
<?php } else if ($_SESSION['usuario_funcao'] == 2) { ?>
    <main class="content">
        <header class="page-header">
            <div class="page-title">
                <div class="title-row">
                    <span class="title-mark"></span>
                    <div>
                        <h1>Início</h1>
                        <p class="subtitle">Bem-vindo(a), <?= $_SESSION['usuario_nome'] ?>!</p>
                    </div>
                </div>
            </div>
            <img src="<?= URL ?>/img/logo-sacit.png" alt="SACIT Logo" class="brand-logo">
        </header>



        <section class="home-dashboard">
            <article class="home-card home-notification-card">
                <div class="home-notification-header">
                    <div class="home-icon-box">
                        <img src="<?= URL ?>/img/notify.png" alt="Notificações" class="home-card-icon">
                    </div>
                    <h2>Novas notificações</h2>
                </div>
                <p class="home-metric-large">0</p>
                <p class="home-card-description">Você não possui novas notificações.</p>
            </article>

            <article class="home-card home-summary-card">

                <div class="home-summary-header">
                    <div class="home-icon-box">
                        <img src="<?= URL ?>/img/icon_solicitacao.png" alt="Resumo das Solicitações"
                            class="home-card-icon-large">
                    </div>
                    <h2>Minhas Solicitações</h2>
                </div>

                <div class="home-summary-grid">
                    <div class="home-summary-item">
                        <div class="home-summary-text">
                            <p class="home-summary-label">Aprovadas</p>
                            <p class="home-summary-value"><?= $dados['aprovadas']; ?></p>
                        </div>
                    </div>

                    <div class="home-summary-item">
                        <div class="home-summary-text">
                            <p class="home-summary-label">Pendente</p>
                            <p class="home-summary-value"><?= $dados['pendentes']; ?></p>
                        </div>
                    </div>

                    <div class="home-summary-item">
                        <div class="home-summary-text">
                            <p class="home-summary-label">Negadas</p>
                            <p class="home-summary-value"><?= $dados['minhasNegadas']; ?></p>
                        </div>
                    </div>
                </div>

            </article>

            <div class="home-dashboard-row home-bottom-row">
                <article class="home-card home-activity-card">
                    <div class="home-activity-heading">
                        <div class="home-icon-box small">
                            <img src="<?= URL ?>/img/icon_solici_servidor.png" alt="Resumo das Atividades"
                                class="home-card-icon-ultima">
                        </div>
                        <h2>Última Solicitação</h2>
                    </div>
                    <div class="home-activity-list">
                        <div class="home-activity-row"><span>Produto</span><strong> Nome</strong></div>
                        <div class="home-activity-row"><span>Quantidade</span><strong> 0</strong></div>
                        <div class="home-activity-row"><span>Status</span><strong> Status</strong></div>
                        <div class="home-activity-row"><span>Data da Solicitação</span><strong> dd/mm/aaaa</strong></div>
                    </div>
                </article>
    </main>
<?php } else if ($_SESSION['usuario_funcao'] == 3) { ?>
    <main class="content">
        <header class="page-header">
            <div class="page-title">
                <div class="title-row">
                    <span class="title-flag"></span>
                    <h1>Início</h1>
                </div>
                <p class="subtitle">Bem-vindo(a), <?= $_SESSION['usuario_nome'] ?> !</p>
            </div>
            <img src="<?= URL ?>/img/logo-sacit.png" alt="SACIT Logo" class="brand-logo">
        </header>

        <section class="home-dashboard">
            <div class="home-dashboard-row home-top-row">

                <article class="home-card home-notification-card">
                    <div class="home-notification-header">
                        <div class="home-icon-box">
                            <img src="<?= URL ?>/img/notify.png" alt="Notificações" class="home-card-icon">
                        </div>
                        <h2>Novas notificações</h2>
                    </div>
                    <p class="home-metric-large">0</p>
                    <p class="home-card-description">Você não possui novas notificações.</p>
                </article>

                <article class="home-card home-summary-card">

                    <div class="home-notification-header">
                        <div class="home-icon-box">
                            <img src="<?= URL ?>/img/checklist.png" alt="Resumo" class="home-card-icon">
                        </div>

                        <h2>Resumo das Solicitações</h2>
                    </div>

                    <div class="home-summary-grid">
                        <div class="home-summary-item">
                            <div class="home-summary-text">
                                <p class="home-summary-label">Aprovadas</p>
                                <p class="home-summary-value"><?= $dados['solicitacoesAprovadas']; ?></p>
                            </div>
                        </div>

                        <div class="home-summary-item">
                            <div class="home-summary-text">
                                <p class="home-summary-label">Pendente</p>
                                <p class="home-summary-value"><?= $dados['solicitacoesPendentes']; ?></p>
                            </div>
                        </div>

                        <div class="home-summary-item">
                            <div class="home-summary-text">
                                <p class="home-summary-label">Negadas</p>
                                <p class="home-summary-value"><?= $dados['negadas']; ?></p>
                            </div>
                        </div>
                    </div>

                </article>

            </div>

            <div class="home-dashboard-row home-bottom-row">

                <article class="home-card home-metric-card home-stock-card">
                    <div class="home-metric-heading">
                        <div class="home-icon-box small">
                            <img src="<?= URL ?>/img/caixa.png" alt="Total de Produtos" class="home-card-icon">
                        </div>
                        <p class="home-metric-title">Total de Produtos</p>
                    </div>
                    <p class="home-metric-value">0</p>
                    <p class="home-metric-note">Produtos excluídos: </p>
                    <strong>0</strong>
                </article>

                <article class="home-card home-metric-card home-stock-card">
                    <div class="home-metric-heading">
                        <div class="home-icon-box small">
                            <img src="<?= URL ?>/img/armario.png" alt="Situação do Estoque" class="home-card-icon">
                        </div>
                        <p class="home-metric-title">Situação do Estoque</p>
                    </div>
                    <p class="home-stock-status">Estoque Completo</p>
                    <p class="home-metric-value">0</p>
                    <p class="home-metric-note">Produto em Falta: </p>
                    <span class="home-stock-zero">0</span>
                </article>
            </div>
        </section>
    </main>
<?php } else {
    echo 'erro';
} ?>
<?php include "../App/Views/footer.php"; ?>