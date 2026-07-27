<?php include "../App/Views/header.php"; ?>
<main class="content">
    <header class="page-header">
        <div class="header-title">
            <div class="title-flag"></div>
            <div>
                <h1>Detalhes do Produto</h1>
                <p>Visualize as informações detalhadas do produto.</p>
            </div>
        </div>
        <img src="<?= URL ?>/img/logo-sacit.png" alt="logo" class="brand-logo">
    </header>

    <section class="detail-panel">
        <div class="detail-card">
            <div class="left-col">
                <img
                    src="<?= URL ?>/img/produtos/<?= $dados['produto']->prod_foto ?>"
                    alt="<?= $dados['produto']->prod_nome ?>">

                <div class="qr-box">
                    <div class="qr-title">QR / Etiqueta</div>
                    <div class="qr-image"><img src="<?= URL ?>/img/qrcode-scan.svg" alt="qr"></div>
                    <a href="#" class="btn btn-secondary">Imprimir etiqueta</a>
                </div>
            </div>

            <div class="right-col">
                <div class="product-header">
                    <h2>Detalhes do Produto</h2>
                    <div class="card-header">
                        <a href="<?= URL ?>/produtos/estoque" class="close-btn">
                            <img src="<?= URL ?>/img/fechar.png" alt="Fechar">
                        </a>
                    </div>
                </div>

                <div class="tab-panel info-panel">

                    <div class="info-details">
                        <div class="info-row">
                            <strong>Nome:</strong>
                            <?= $dados['produto']->prod_nome ?>
                        </div>
                        <div class="info-row">
                            <strong>Código:</strong>
                            <?= $dados['produto']->prod_id ?>
                        </div>
                        <div class="info-row">
                            <strong>Categoria:</strong>
                            <?= $dados['produto']->cate_nome ?>
                        </div>
                        <div class="info-row">
                            <strong>Quantidade:</strong>
                            <?= $dados['produto']->prod_quantidade ?>
                        </div>
                        <div class="info-row">
                            <strong>Localização:</strong>
                            <?= $dados['produto']->loca_nome ?>
                        </div>
                    </div>

                    <div class="description-area">
                        <h3>Descrição</h3>

                        <p>
                            <?= $dados['produto']->prod_descricao ?>
                        </p>
                    </div>
                </div>

            </div>
        </div>
        </div>
        </div>
    </section>
</main>
<?php include "../App/Views/footer.php"; ?>