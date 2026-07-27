<?php include "../App/Views/header.php"; ?>
<main class="content">
    <header class="page-header">
        <div class="title-group">
            <div class="title-row">
                <span class="title-mark"></span>
                <h1>Controlar Estoque</h1>
            </div>
            <p class="subtitle">Gerencie os produtos em estoque.</p>
        </div>
        <img src="<?= URL ?>/img/logo-sacit.png" alt="SACIT Logo" class="brand-logo" />
    </header>

    <?php Sessao::mensagem('produto'); ?>

    <section class="actions-panel">

        <div class="summary-card">
            <div class="summary-top">
                <div class="summary-icon green">
                    <img src="<?= URL ?>/img/icone_caixaVerde.png" alt="Total de produtos" class="total-icon">
                </div>
                <p class="summary-label">Total de Produtos</p>
            </div>

            <h2><?= $dados['totalProdutos']; ?></h2>
            <span class="summary-text">Produtos cadastrados</span>
        </div>

        <div class="summary-card">
            <div class="summary-top">
                <div class="summary-icon blue">
                    <img src="<?= URL ?>/img/icone_caixaAzul.png" alt="Itens em Estoque" class="active-icon">
                </div>
                <p class="summary-label">Itens em Estoque</p>
            </div>

            <h2><?= $dados['estoqueDisponivel']; ?></h2>
            <span class="summary-text">Produtos disponíveis</span>
        </div>

        <div class="summary-card">
            <div class="summary-top">
                <div class="summary-icon yellow">
                    <img src="<?= URL ?>/img/icone_alerta.png" alt="Estoque Baixo" class="inactive-icon">
                </div>
                <p class="summary-label">Estoque Baixo</p>
            </div>

            <h2><?= $dados['estoqueBaixo']; ?></h2>
            <span class="summary-text">Produtos com estoque baixo</span>
        </div>

        <div class="summary-card">
            <div class="summary-top">
                <div class="summary-icon red">
                    <img src="<?= URL ?>/img/x.png" alt="Sem Estoque" class="removed-icon">
                </div>
                <p class="summary-label">Sem Estoque</p>
            </div>

            <h2><?= $dados['semEstoque']; ?></h2>
            <span class="summary-text">Produtos indisponíveis</span>
        </div>

    </section>

    <section class="management-panel">

        <h2 class="table-title">Pesquisar produto</h2>



        <form action="<?= URL ?>/produtos/estoque" method="GET">
            <div class="panel-actions">
                <div class="search-box">
                    <span class="search-icon">
                        <img src="<?= URL ?>/img/lupa.png" alt="Buscar" class="search-img">
                    </span>

                    <input
                        type="search"
                        name="pesquisa"
                        value="<?= $_GET['pesquisa'] ?? '' ?>"
                        placeholder="Digite o nome do produto....">
                </div>

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


                <button type="submit" class="btn btn-primary">
                    Pesquisar
                </button>
            </div>
        </form>


        <a href="<?= URL ?>/produtos/cadastrarProduto" class="btn btn-primary">
            + Novo Produto
        </a>



        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Produto</th>
                        <th>Categoria</th>
                        <th>Estoque Atual</th>
                        <th>Estoque Mínimo</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($dados['produtos'] as $produto): ?>

                        <tr>

                            <td>
                                <?= $produto->prod_id ?>
                            </td>


                            <td>
                                <?= $produto->prod_nome ?>
                            </td>


                            <td>
                                <?= $produto->cate_nome ?>
                            </td>


                            <td>
                                <?= $produto->prod_quantidade ?>
                            </td>


                            <td>
                                5
                            </td>


                            <td>

                                <?php if ($produto->prod_status == "Disponível"): ?>

                                    <span class="status active">
                                        <?= $produto->prod_status ?>
                                    </span>


                                <?php elseif ($produto->prod_status == "Estoque baixo"): ?>

                                    <span class="status inactive">
                                        <?= $produto->prod_status ?>
                                    </span>


                                <?php else: ?>

                                    <span class="status removed">
                                        <?= $produto->prod_status ?>
                                    </span>

                                <?php endif; ?>


                            </td>


                            <td>

                                <a href="<?= URL ?>/produtos/detalharProduto/<?= $produto->prod_id ?>"
                                    class="btn btn-tertiary">
                                    Ver detalhes
                                </a>

                            </td>


                        </tr>


                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
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