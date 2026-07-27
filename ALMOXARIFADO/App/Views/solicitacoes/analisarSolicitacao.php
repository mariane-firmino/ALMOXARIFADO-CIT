<?php include "../App/Views/header.php"; ?>
<main class="content">
    <header class="page-header">
        <div class="title-group">
            <div class="title-row">
                <span class="title-mark"></span>
                <h1>Analizar Solicitações</h1>
            </div>
            <p class="subtitle">Gerencie e analise as solicitações dos usuários.</p>
        </div>
        <img src="<?= URL ?>/img/logo-sacit.png" alt="SACIT Logo" class="brand-logo" />
    </header>

    <?php
    if (isset($_SESSION['solicitacao'])):
    ?>

        <script>
            alert("<?= $_SESSION['solicitacao'] ?>");
        </script>

    <?php
        unset($_SESSION['solicitacao']);
    endif;
    ?>

    <section class="actions-panel">

        <div class="summary-card">
            <div class="summary-top">
                <div class="summary-icon green">
                    <img src="<?= URL ?>/img/icon_total.png" alt="Total de solicitações" class="summary-img total-icon">
                </div>
                <p class="summary-label">Total de Solicitações</p>
            </div>

            <h2>00</h2>
            <span class="summary-text">Todas as solicitações</span>
        </div>

        <div class="summary-card">
            <div class="summary-top">
                <div class="summary-icon rox">
                    <img src="<?= URL ?>/img/icon_devolucao.png" alt="Itens em devolução" class="summary-img dev-icon">
                </div>
                <p class="summary-label">Em Devolução</p>
            </div>

            <h2>00</h2>
            <span class="summary-text">Aguardando devolução</span>
        </div>

        <div class="summary-card">
            <div class="summary-top">
                <div class="summary-icon yellow">
                    <img src="<?= URL ?>/img/icone_alerta.png" alt="Estoque baixo" class="summary-img inactive-icon">
                </div>
                <p class="summary-label">Pendentes</p>
            </div>

            <h2>00</h2>
            <span class="summary-text">Aguardando análise</span>
        </div>

        <div class="summary-card">
            <div class="summary-top">
                <div class="summary-icon green2">
                    <img src="<?= URL ?>/img/icon_verificado.png" alt="Solicitações aprovadas" class="summary-img active-icon">
                </div>
                <p class="summary-label">Aprovadas</p>
            </div>

            <h2>00</h2>
            <span class="summary-text">Solicitações aprovadas</span>
        </div>

        <div class="summary-card">
            <div class="summary-top">
                <div class="summary-icon red">
                    <img src="<?= URL ?>/img/x.png" alt="Sem Estoque" class="summary-img removed-icon">
                </div>
                <p class="summary-label">Negadas</p>
            </div>

            <h2>00</h2>
            <span class="summary-text">Solicitações negadas</span>
        </div>

    </section>

    <section class="management-panel">



        <form action="<?= URL ?>/solicitacoes/analisarSolicitacao" method="GET">
            <div class="panel-actions">
                <div class="search-box">
                    <span class="search-icon">
                        <img src="<?= URL ?>/public/img/lupa.png" alt="Buscar" class="search-img">
                    </span>

                    <input
                        type="search"
                        name="pesquisa"
                        placeholder="Buscar por usuário, produto ou nº da solicitação..."
                        value="<?= isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '' ?>">
                </div>

                <div class="select-wrapper">
                    <select class="filter-select" name="status" onchange="this.form.submit()">

                        <option value="">Todos os status</option>

                        <option value="Pendente"
                            <?= (isset($_GET['status']) && $_GET['status'] == 'Pendente') ? 'selected' : '' ?>>
                            Pendente
                        </option>

                        <option value="Aprovada"
                            <?= (isset($_GET['status']) && $_GET['status'] == 'Aprovada') ? 'selected' : '' ?>>
                            Aprovada
                        </option>

                        <option value="Negada"
                            <?= (isset($_GET['status']) && $_GET['status'] == 'Negada') ? 'selected' : '' ?>>
                            Negada
                        </option>

                        <option value="Em devolução"
                            <?= (isset($_GET['status']) && $_GET['status'] == 'Em devolução') ? 'selected' : '' ?>>
                            Em devolução
                        </option>

                    </select>
                </div>

                <div class="date-box">
                    <input
                        type="date"
                        name="data"
                        id="dataFiltro"
                        onchange="this.form.submit()">
                </div>
            </div>
        </form>


        <div class="table-wrapper">

            <div class="tabs">

                <a href="<?= URL ?>/solicitacoes/analisarSolicitacao"
                    class="tab <?= empty($_GET['status']) ? 'active' : '' ?>">
                    Todas
                </a>


                <a href="<?= URL ?>/solicitacoes/analisarSolicitacao?status=Pendente"
                    class="tab <?= ($_GET['status'] ?? '') == 'Pendente' ? 'active' : '' ?>">
                    Pendentes
                </a>


                <a href="<?= URL ?>/solicitacoes/analisarSolicitacao?status=Aprovada"
                    class="tab <?= ($_GET['status'] ?? '') == 'Aprovada' ? 'active' : '' ?>">
                    Aprovadas
                </a>


                <a href="<?= URL ?>/solicitacoes/analisarSolicitacao?status=Negada"
                    class="tab <?= ($_GET['status'] ?? '') == 'Negada' ? 'active' : '' ?>">
                    Negadas
                </a>


                <a href="<?= URL ?>/solicitacoes/analisarSolicitacao?status=Em devolução"
                    class="tab <?= ($_GET['status'] ?? '') == 'Em devolução' ? 'active' : '' ?>">
                    Em devolução
                </a>

            </div>

            <table>
                <thead>

                    <tr>
                        <th>Código</th>
                        <th>Usuário</th>
                        <th>Produto(s)</th>
                        <th>Quantidade</th>
                        <th>Data da Solicitação</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dados['solicitacoes'] as $solicitacao): ?>

                        <tr>
                            <td><?= $solicitacao->soli_id ?></td>

                            <td>
                                <?= $solicitacao->usua_nome ?>
                                <br>
                                <span class="codigo-produto">
                                    <?= $solicitacao->usua_email ?>
                                </span>
                            </td>

                            <td>
                                <?= $solicitacao->produtos ?>
                            </td>

                            <td>
                                <?= $solicitacao->quantidade_total ?>
                            </td>

                            <td>
                                <?= date('d/m/Y', strtotime($solicitacao->soli_data_solicitacao)) ?>
                            </td>

                            <td>

                                <span class="status">
                                    <?= $solicitacao->soli_status ?>
                                </span>

                            </td>
                            <td class="acoes">
                                <div class="dropdown">
                                    <button class="menu-btn">...</button>
                                    <div class="dropdown-content">

                                        <a href="<?= URL ?>/solicitacoes/verSolicitacao/<?= $solicitacao->soli_id ?>">
                                            Ver solicitação
                                        </a>

                                        <a
                                            href="<?= URL ?>/solicitacoes/aprovar/<?= $solicitacao->soli_id ?>"
                                            onclick="return confirmarAcao('aprovar')">
                                            Aprovar solicitação
                                        </a>

                                        <a
                                            href="<?= URL ?>/solicitacoes/negar/<?= $solicitacao->soli_id ?>"
                                            onclick="return confirmarAcao('negar')">
                                            Negar solicitação
                                        </a>
                                    </div>
                                </div>
                            </td>

                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="table-footer">

            <p class="table-info">

                <?php
                $inicio = (($dados['paginaAtual'] - 1) * $dados['limite']) + 1;
                $fim = min(
                    $dados['paginaAtual'] * $dados['limite'],
                    $dados['totalSolicitacoes']
                );
                ?>
                Mostrando <?= $inicio ?> a <?= $fim ?> de <?= $dados['totalSolicitacoes'] ?> solicitações

            </p>

            <?php
            $filtros = '';

            if (!empty($_GET['pesquisa'])) {
                $filtros .= '&pesquisa=' . $_GET['pesquisa'];
            }
            if (!empty($_GET['status'])) {
                $filtros .= '&status=' . $_GET['status'];
            }
            if (!empty($_GET['data'])) {
                $filtros .= '&data=' . $_GET['data'];
            }

            ?>

            <div class="pagination">
                <?php
                $totalPaginas = ceil(
                    $dados['totalSolicitacoes'] / $dados['limite']
                );
                ?>
                <a href="?pagina=<?= max(1, $dados['paginaAtual'] - 1) ?><?= $filtros ?>">
                    <button class="page-btn">
                        &#8249;
                    </button>
                </a>


                <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                    <a href="?pagina=<?= $i ?><?= $filtros ?>">
                        <button class="page-btn <?= ($i == $dados['paginaAtual']) ? 'active-page' : '' ?>">
                            <?= $i ?>
                        </button>
                    </a>
                <?php endfor; ?>

                <a href="?pagina=<?= min($totalPaginas, $dados['paginaAtual'] + 1) ?><?= $filtros ?>">
                    <button class="page-btn">
                        &#8250;
                    </button>
                </a>
            </div>

        </div>
    </section>
</main>
<?php include "../App/Views/footer.php"; ?>