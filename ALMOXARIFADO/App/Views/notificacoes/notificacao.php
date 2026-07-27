<?php include "../App/Views/header.php"; ?>
<main class="content">
    <header class="page-header">
        <div class="title-group">
            <div class="title-row">
                <span class="title-mark"></span>
                <h1>Notificações</h1>
            </div>
            <p class="subtitle">Acompanhe suas notificações.</p>
        </div>
        <img src="<?= URL ?>/img/logo-sacit.png" alt="SACIT Logo" class="brand-logo" />
    </header>

    <section class="notifications-container">




        <form
            id="formFiltro"
            action="<?= URL ?>/notificacoes"
            method="GET">

            <div class="notifications-toolbar">

                <button
                    type="button"
                    class="filter-btn active"
                    onclick="filtrarStatus('')">
                    Todas
                </button>


                <button
                    type="button"
                    class="filter-btn"
                    onclick="filtrarStatus('Não lida')">
                    Não lidas
                </button>


                <button
                    type="button"
                    class="filter-btn"
                    onclick="filtrarStatus('Lida')">
                    Lidas
                </button>

                <div class="search-box">
                    <span class="search-icon">
                        <img src="<?= URL ?>/img/lupa.png" alt="Buscar" class="search-img">
                    </span>

                    <input
                        type="search"
                        name="pesquisa"
                        value="<?= $_GET['pesquisa'] ?? '' ?>"
                        placeholder="Buscar notificações...">
                </div>
            </div>

            <div class="date-box">
                <input
                    type="date"
                    name="data"
                    value="<?= $_GET['data'] ?? '' ?>">
            </div>
            </div>
        </form>




        <div class="notifications-list">


            <?php if (!empty($dados['notificacoes'])): ?>


                <?php foreach ($dados['notificacoes'] as $notificacao): ?>


                    <div class="notification-item <?= $notificacao->noti_status == 'Não lida' ? 'unread' : '' ?>">


                        <div class="notification-icon icon-green">

                            <img
                                src="<?= URL ?>/img/icon_total.png"
                                class="icon-total">

                        </div>


                        <div class="notification-content">

                            <h3>
                                <?= $notificacao->noti_titulo ?>
                            </h3>


                            <p>
                                <?= $notificacao->noti_mensagem ?>
                            </p>


                            <span class="notification-time">

                                <?= date(
                                    'd/m/Y H:i',
                                    strtotime($notificacao->noti_data)
                                ) ?>

                            </span>

                        </div>


                        <div class="notification-action">

                            <button class="menu-dots">
                                ⋯
                            </button>


                            <div class="dropdown-menu">

                                <a href="<?= URL ?>/notificacoes/lida/<?= $notificacao->noti_id ?>">
                                    <button>
                                        Marcar como lida
                                    </button>
                                </a>


                                <a href="<?= URL ?>/notificacoes/excluir/<?= $notificacao->noti_id ?>">
                                    <button class="delete-btn">
                                        Excluir
                                    </button>
                                </a>
                            </div>
                        </div>

                    </div>


                <?php endforeach; ?>


            <?php else: ?>


                <div class="empty-notifications">

                    <img
                        src="<?= URL ?>/img/icon_alerta.png"
                        alt="Sem notificações"
                        class="empty-icon">


                    <h3>
                        Sem notificações
                    </h3>


                    <p>
                        Você não possui novas notificações no momento.
                    </p>


                </div>


            <?php endif; ?>


        </div>
        </div>
    </section>
</main>
<?php include "../App/Views/footer.php"; ?>