<?php include "../App/Views/header.php"; ?>
<pre>
<?php print_r($_SESSION); ?>
</pre>
<?php if ($_SESSION['usuario_funcao'] == 1) { ?>
    <main class="main-content">
        <header class="page-header">
            <div class="page-title">
                <div class="title-row">
                    <span class="title-flag"></span>
                    <h1>Início</h1>
                </div>
                <p class="subtitle">Bem-vindo(a), <?= $_SESSION['usuario_nome'] ?> !</p>
            </div>
            <img src="../img/logo-sacit.png" alt="SACIT Logo" class="brand-logo">
        </header>

        <section class="dashboard">
            <div class="dashboard-row top-row">
                <article class="card notification-card">
                    <div class="notification-header">
                        <div class="icon-box">
                            <img src="../img/notify.png" alt="Notificações" class="card-icon">
                        </div>
                        <h2>Novas notificações</h2>
                    </div>
                    <p class="metric-large">0</p>
                    <p class="card-description">Você não possui novas notificações.</p>
                </article>

                <article class="card summary-card">

                    <div class="notification-header">
                        <div class="icon-box">
                            <img src="../img/checklist.png" alt="Resumo" class="card-icon">
                        </div>

                        <h2>Resumo das Solicitações</h2>
                    </div>

                    <div class="summary-grid">

                        <div class="summary-item">
                            <div class="summary-text">
                                <p class="summary-label">Aprovadas</p>
                                <p class="summary-value">0</p>
                            </div>
                        </div>

                        <div class="summary-item">
                            <div class="summary-text">
                                <p class="summary-label">Em andamento</p>
                                <p class="summary-value">0</p>
                            </div>
                        </div>

                        <div class="summary-item">
                            <div class="summary-text">
                                <p class="summary-label">Negadas</p>
                                <p class="summary-value">0</p>
                            </div>
                        </div>

                    </div>

                </article>
            </div>

            <div class="dashboard-row bottom-row">
                <article class="card activity-card">
                    <div class="activity-heading">
                        <div class="icon-box small">
                            <img src="../img/icon_resumo.png" alt="Resumo das Atividades" class="card-icon">
                        </div>
                        <h2>Resumo das Atividades</h2>
                    </div>
                    <div class="activity-list">
                        <div class="activity-row"><span>Solicitação em andamento</span><strong>0</strong></div>
                        <div class="activity-row"><span>Pendência de devolução</span><strong>0</strong></div>
                        <div class="activity-row"><span>Solicitação concluída</span><strong>0</strong></div>
                        <div class="activity-row"><span>Atrasos</span><strong>0</strong></div>
                    </div>
                </article>

                <article class="card metric-card">
                    <div class="metric-heading">
                        <div class="icon-box small">
                            <img src="../img/user.png" alt="Total de Perfis" class="card-icon">
                        </div>
                        <p class="metric-title">Total de Perfis:</p>
                    </div>
                    <p class="metric-value">0</p>
                    <p class="metric-note">Perfis Removidos: </p>
                    <strong>0</strong>
                </article>

                <article class="card metric-card products-card">
                    <div class="metric-heading">
                        <div class="icon-box small">
                            <img src="../img/caixa.png" alt="Total de Produtos" class="card-icon">
                        </div>
                        <p class="metric-title">Total de Produtos</p>
                    </div>
                    <p class="metric-value">0</p>
                    <p class="metric-note">Produtos excluídos: </p>
                    <strong>0</strong>
                </article>

                <article class="card metric-card stock-card">
                    <div class="metric-heading">
                        <div class="icon-box small">
                            <img src="../img/armario.png" alt="Situação do Estoque" class="card-icon">
                        </div>
                        <p class="metric-title">Situação do Estoque</p>
                    </div>
                    <p class="stock-status">Estoque Completo</p>
                    <p class="metric-value">0</p>
                    <p class="metric-note">Produto em Falta: </p>
                    <span class="stock-zero">0</span>
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
                        <p class="subtitle">Bem-vindo(a), Servidor!</p>
                    </div>
                </div>
            </div>
            <img src="../img/logo-sacit.png" alt="SACIT Logo" class="brand-logo">
        </header>



        <section class="dashboard">
            <article class="card notification-card">
                <div class="notification-header">
                    <div class="icon-box">
                        <img src="../img/notify.png" alt="Notificações" class="card-icon">
                    </div>
                    <h2>Novas notificações</h2>
                </div>
                <p class="metric-large">0</p>
                <p class="card-description">Você não possui novas notificações.</p>
            </article>

            <article class="card summary-card">

                <div class="summary-header">
                    <div class="icon-box">
                        <img src="../img/icon_solicitacao.png" alt="Resumo das Solicitações"
                            class="card-icon-large">
                    </div>
                    <h2>Minhas Solicitações</h2>
                </div>

                <div class="summary-grid">
                    <div class="summary-item">
                        <div class="summary-text">
                            <p class="summary-label">Aprovadas</p>
                            <p class="summary-value">0</p>
                        </div>
                    </div>

                    <div class="summary-item">
                        <div class="summary-text">
                            <p class="summary-label">Em Andamento</p>
                            <p class="summary-value">0</p>
                        </div>
                    </div>

                    <div class="summary-item">
                        <div class="summary-text">
                            <p class="summary-label">Negadas</p>
                            <p class="summary-value">0</p>
                        </div>
                    </div>
                </div>

            </article>

            <div class="dashboard-row bottom-row">
                <article class="card activity-card">
                    <div class="activity-heading">
                        <div class="icon-box small">
                            <img src="../img/icon_solici_servidor.png" alt="Resumo das Atividades"
                                class="card-icon-ultima">
                        </div>
                        <h2>Última Solicitação</h2>
                    </div>
                    <div class="activity-list">
                        <div class="activity-row"><span>Produto</span><strong> Nome</strong></div>
                        <div class="activity-row"><span>Quantidade</span><strong> 0</strong></div>
                        <div class="activity-row"><span>Status</span><strong> Status</strong></div>
                        <div class="activity-row"><span>Data da Solicitação</span><strong> dd/mm/aaaa</strong></div>
                    </div>
                </article>
    </main>
<?php } else if ($_SESSION['usuario_funcao'] == 3) { ?>
<?php } else {
    echo 'erro';
} ?>
<?php include "../App/Views/footer.php"; ?>