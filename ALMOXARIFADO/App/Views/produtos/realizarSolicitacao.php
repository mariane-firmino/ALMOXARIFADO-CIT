<?php include "../App/Views/header.php"; ?>
<main class="content">
    <header class="page-header">
        <div class="header-title">
            <div class="title-flag"></div>
            <div>
                <h1>Realizar Solicitação</h1>
                <p class="subtitle">Escolha os produtos que deseja solicitar.</p>
            </div>
        </div>
        <img src="<?= URL ?>/img/logo-sacit.png" alt="SACIT" class="brand-logo">
    </header>

    <section class="solicitacao-card-panel">
        <div class="solicitacao-card-header">
            <h2>Solicitação de Produto(s)</h2>
            <a href="<?= URL ?>/produtos/consultar" class="close-btn" aria-label="Fechar">
                <img src="<?= URL ?>/img/fechar.png" alt="Fechar">
            </a>
        </div>

        <form
            class="product-form"
            action="<?= URL ?>/solicitacoes/realizar"
            method="POST">

            <div class="solicitacao-product-list">
                <?php foreach ($dados['produtos'] as $produto): ?>
                    <div class="solicitacao-product-card">
                        <img
                            src="<?= URL ?>/img/produtos/<?= $produto->prod_foto ?>"
                            class="solicitacao-product-image"
                            alt="<?= $produto->prod_nome ?>">
                        <div class="solicitacao-product-info">

                            <h3>
                                <?= $produto->prod_nome ?>
                            </h3>

                            <p>
                                <?= $produto->cate_nome ?>
                            </p>

                        </div>

                        <div class="quantity-area">

                            <label>
                                Quantidade
                            </label>

                            <input
                                type="number"
                                name="quantidade[<?= $produto->prod_id ?>]"
                                min="1"
                                max="<?= $produto->prod_quantidade ?>"
                                value="1">
                        </div>

                        <input
                            type="hidden"
                            name="produtos[]"
                            value="<?= $produto->prod_id ?>">
                    </div>
                <?php endforeach; ?>
            </div>

            <button type="submit" class="btn-primary">
                Enviar
            </button>

        </form>
    </section>
</main>
<?php include "../App/Views/footer.php"; ?>