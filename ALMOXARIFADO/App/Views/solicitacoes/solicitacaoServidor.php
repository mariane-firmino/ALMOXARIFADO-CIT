<?php include "../App/Views/header.php"; ?>
<main class="content">
    <header class="page-header">
        <div class="title-group">
            <div class="title-row">
                <span class="title-mark"></span>
                <h1>Minhas Solicitações</h1>
            </div>
            <p class="subtitle">Acompanhe suas solicitações.</p>
        </div>
        <img src="<?= URL ?>/img/logo-sacit.png" alt="SACIT Logo" class="brand-logo" />
    </header>

    <section class="actions-panel">

        <div class="summary-card">
            <div class="summary-top">
                <div class="summary-icon green">
                    <img src="../img/icon_verificado.png" alt="produtos aprovados" class="summary-img aprovado-icon">
                </div>
                <p class="summary-label">Aprovados</p>
            </div>

            <h2 class="h2solicitacao"><?= $dados['totais']['aprovada'] ?></h2>
            <span class="summary-text">Solicitações aprovadas</span>
        </div>

        <div class="summary-card">
            <div class="summary-top">
                <div class="summary-icon yellow">
                    <img src="../img/icone_alerta.png" alt="estoque baixo" class="summary-img pendente-icon">
                </div>
                <p class="summary-label">Pendentes</p>
            </div>

            <h2 class="h2solicitacao"><?= $dados['totais']['pendente'] ?></h2>
            <span class="summary-text">Aguardando análise</span>
        </div>

        <div class="summary-card">
            <div class="summary-top">
                <div class="summary-icon red">
                    <img src="../img/x.png" alt="solicitações negadas" class="summary-img negada-icon">
                </div>
                <p class="summary-label">Negadas</p>
            </div>

            <h2 class="h2solicitacao"><?= $dados['totais']['negada'] ?></h2>
            <span class="summary-text">Solicitações negadas</span>
        </div>

        <div class="summary-card">
            <div class="summary-top">
                <div class="summary-icon roxo">
                    <img src="../img/icon_devolucao.png" alt="Em Devolução" class="summary-img devolucao-icon">
                </div>
                <p class="summary-label">Devolvido</p>
            </div>

            <h2 class="h2solicitacao"><?= $dados['totais']['devolvido'] ?></h2>
            <span class="summary-text">Produtos devolvidos</span>
        </div>

    </section>

    <section class="management-panel">

        <h2 class="table-title">Pesquisar produto</h2>


        <form id="formFiltro" action="<?= URL ?>/solicitacoes/solicitacaoServidor" method="GET">
            <div class="panel-actions">
                <div class="search-box">
                    <span class="search-icon">
                        <img src="../img/lupa.png" alt="Buscar" class="search-img">
                    </span>

                    <input
                        type="search"
                        name="pesquisa"
                        value="<?= $_GET['pesquisa'] ?? '' ?>"
                        placeholder="Buscar por produto ou nº da solicitação...">
                </div>

                <select
                    class="filter-select"
                    name="status"
                    onchange="document.getElementById('formFiltro').submit();">

                    <option value="">
                        Todos os status
                    </option>


                    <option value="Aprovada"
                        <?= ($_GET['status'] ?? '') == 'Aprovada' ? 'selected' : '' ?>>
                        Aprovada
                    </option>


                    <option value="Pendente"
                        <?= ($_GET['status'] ?? '') == 'Pendente' ? 'selected' : '' ?>>
                        Pendente
                    </option>


                    <option value="Negada"
                        <?= ($_GET['status'] ?? '') == 'Negada' ? 'selected' : '' ?>>
                        Negada
                    </option>


                    <option value="Devolvido"
                        <?= ($_GET['status'] ?? '') == 'Devolvido' ? 'selected' : '' ?>>
                        Devolvido
                    </option>


                </select>

                <div class="date-box">
                    <input
                        type="date"
                        id="dataFiltro"
                        name="data"
                        value="<?= $_GET['data'] ?? '' ?>"
                        onchange="document.getElementById('formFiltro').submit();">
                </div>
            </div>
        </form>


        <div class="table-wrapper">

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Data</th>
                            <th>Status</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($dados['solicitacoes'] as $solicitacao): ?>

                            <tr>

                                <td>
                                    <?= $solicitacao->soli_id ?>
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

                                    <?php

                                    $status = strtolower($solicitacao->soli_status);

                                    $class = '';

                                    switch ($status) {

                                        case 'aprovada':
                                            $class = 'active';
                                            break;

                                        case 'negada':
                                            $class = 'removed';
                                            break;

                                        case 'pendente':
                                            $class = 'inactive';
                                            break;

                                        case 'devolvido':
                                            $class = 'devo';
                                            break;
                                    }

                                    ?>

                                    <span class="status <?= $class ?>">
                                        <?= $solicitacao->soli_status ?>
                                    </span>

                                </td>


                                <td>

                                    <a href="<?= URL ?>/solicitacoes/detalharSolicitacao/<?= $solicitacao->soli_id ?>"
                                        class="btn btn-success">

                                        Detalhes

                                    </a>


                                    <?php if ($status == 'pendente'): ?>

                                        <a onclick="return confirmarCancelamento()"
                                            href="<?= URL ?>/solicitacoes/cancelar/<?= $solicitacao->soli_id ?>"
                                            class="btn btn-danger">

                                            Cancelar solicitação

                                        </a>

                                    <?php endif; ?>


                                </td>

                            </tr>


                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
            <div class="table-footer">

                <p class="table-info">

                    Mostrando
                    <?= count($dados['solicitacoes']) ?>

                    de

                    <?= $dados['totalSolicitacoes'] ?>

                    solicitações

                </p>

                <div class="pagination">


                    <?php if ($dados['paginaAtual'] > 1): ?>

                        <a
                            class="page-btn"
                            href="?pagina=<?= $dados['paginaAtual'] - 1 ?>">
                            &#8249;
                        </a>

                    <?php endif; ?>



                    <?php

                    $totalPaginas = ceil(
                        $dados['totalSolicitacoes'] /
                            $dados['limite']
                    );


                    for ($i = 1; $i <= $totalPaginas; $i++):

                    ?>


                        <a
                            class="page-btn <?=
                                            $i == $dados['paginaAtual']
                                                ? 'active-page'
                                                : ''
                                            ?>"

                            href="?pagina=<?= $i ?>">

                            <?= $i ?>

                        </a>


                    <?php endfor; ?>



                    <?php if ($dados['paginaAtual'] < $totalPaginas): ?>

                        <a
                            class="page-btn"
                            href="?pagina=<?= $dados['paginaAtual'] + 1 ?>">
                            &#8250;
                        </a>

                    <?php endif; ?>


                </div>

            </div>
    </section>
</main>
<?php include "../App/Views/footer.php"; ?>