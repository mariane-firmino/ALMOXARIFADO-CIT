<?php include "../App/Views/header.php"; ?>
<main class="content">
    <header class="page-header">
        <div class="page-title">
            <div class="title-row">
                <span class="title-flag"></span>
                <h1>Consultar Produto</h1>
            </div>
            <p class="subtitle">Consulte os produtos do sistema.</p>
        </div>
        <img src="<?= URL ?>/img/logo-sacit.png" alt="SACIT Logo"
            class="brand-logo">
    </header>


    <form  action="<?= URL ?>/produtos/consultarProduto" method="GET">
        <div class="panel-actions">
            <section class="actions-bar">
                <div class="search-box">
                    <span class="search-icon">
                        <img src="<?= URL ?>/img/lupa.png" alt="Buscar" class="search-img">
                    </span>
                    <input type="search" name="pesquisa" value="<?= $_GET['pesquisa'] ?? '' ?>" placeholder="Buscar produto...">
                </div>


                <div class="filter-group">
                    <select name="categoria" class="filter-select">
                        <option value="">Todas as categorias</option>
                        <?php foreach ($dados['categorias'] as $categoria): ?>
                            <option
                                value="<?= $categoria->cate_id ?>"
                                <?= (($_GET['categoria'] ?? '') == $categoria->cate_id) ? 'selected' : '' ?>>

                                <?= $categoria->cate_nome ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="filter-group">
                    <select name="status" class="filter-select">
                        <option value="">Todos os status</option>
                        <option value="Disponível"
                            <?= (($_GET['status'] ?? '') == 'Disponível') ? 'selected' : '' ?>>
                            Disponível
                        </option>

                        <option value="Estoque baixo"
                            <?= (($_GET['status'] ?? '') == 'Estoque baixo') ? 'selected' : '' ?>>
                            Estoque baixo
                        </option>

                        <option value="Esgotado"
                            <?= (($_GET['status'] ?? '') == 'Esgotado') ? 'selected' : '' ?>>
                            Em falta
                        </option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">
                    Pesquisar
                </button>
            </section>
        </div>
    </form>


    <section>
        <form action="<?= URL ?>/produtos/realizarSolicitacao" method="POST">
            <button
                type="submit"
                class="btn-primary"
                id="btnSolicitar"
                disabled>

                Solicitar (0)

            </button>

            <div class="cards-grid">
                <?php foreach ($dados['produtos'] as $produto): ?>

                    <article class="product-card">
                        <div class="card-image">
                            <img
                                src="<?= URL ?>/img/produtos/<?= $produto->prod_foto ?>"
                                class="product-img"
                                alt="<?= $produto->prod_nome ?>">

                            <label class="card-checkbox">
                                <input
                                    type="checkbox"
                                    class="product-check"
                                    name="produtos[]"
                                    value="<?= $produto->prod_id ?>">

                                <span></span>
                            </label>

                            <div class="card-header">
                                <?php if ($produto->prod_status == "Disponível"): ?>
                                    <span class="status-pill status-ok">
                                        <?= $produto->prod_status ?>
                                    </span>
                                <?php elseif ($produto->prod_status == "Estoque baixo"): ?>
                                    <span class="status-pill status-baixo">
                                        <?= $produto->prod_status ?>
                                    </span>
                                <?php else: ?>
                                    <span class="status-pill status-critical">
                                        <?= $produto->prod_status ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>


                        <div class="product-info">

                            <div class="product-header">
                                <h2 class="product-name">
                                    <?= $produto->prod_nome ?>
                                </h2>

                                <a href="<?= URL ?>/produtos/detalharProduto/<?= $produto->prod_id ?>"
                                    class="btn-details">
                                    Ver detalhes
                                </a>
                            </div>

                            <p class="card-detail">
                                <?= $produto->cate_nome ?>
                            </p>

                            <p class="card-detail">
                                <strong>Quantidade:</strong>
                                <?= $produto->prod_quantidade ?>
                                unidades
                            </p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </form>
        <div class="table-footer">
            <?php
            $total = $dados['totalProdutosTabela'];
            $paginaAtual = $dados['paginaAtual'];
            $limite = $dados['limite'];
            $totalPaginas = ceil($total / $limite);
            $inicio = (($paginaAtual - 1) * $limite) + 1;
            $fim = min(
                $paginaAtual * $limite,
                $total
            );

            ?>

            <p class="table-info">
                Mostrando
                <?= $inicio ?>
                até
                <?= $fim ?>
                de
                <?= $total ?> produtos
            </p>

            <div class="pagination">
                <?php if ($paginaAtual > 1): ?>
                    <a class="page-btn"
                        href="?pagina=<?= $paginaAtual - 1 ?>">
                        &#8249;
                    </a>

                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>

                    <a
                        class="page-btn <?= $i == $paginaAtual ? 'active-page' : '' ?>"
                        href="?pagina=<?= $i ?>">

                        <?= $i ?>
                    </a>
                <?php endfor; ?>

                <?php if ($paginaAtual < $totalPaginas): ?>
                    <a class="page-btn"
                        href="?pagina=<?= $paginaAtual + 1 ?>">
                        &#8250;
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>
<?php include "../App/Views/footer.php"; ?>