<?php include "../App/Views/header.php"; ?>

<main class="content">
    <header class="page-header">
        <div class="header-title">
            <div class="title-flag"></div>
            <div>
                <h1>Cadastrar Produto</h1>
                <p class="subtitle">Cadastre novos produtos no estoque.</p>
            </div>
        </div>
        <img src="<?= URL ?>/img/logo-sacit.png" alt="SACIT" class="brand-logo">
    </header>

    <section class="card-panel">
        <div class="card-header">
            <h2>Cadastro de Produto</h2>
            <a href="<?= URL ?>/pagina/estoque" class="close-btn" aria-label="Fechar">
                <img src="<?= URL ?>/img/fechar.png" alt="Fechar">
            </a>
        </div>

        <form class="product-form" action="<?= URL ?>/produtos/salvarProduto" method="POST" enctype="multipart/form-data">
            <div class="upload-block">

                <label for="imagem" class="upload-placeholder">
                    <img src="<?= URL ?>/img/adicionar-img.png"
                        id="preview2"
                        class="upload-icon"
                        alt="Adicionar imagem">
                </label>

                <input
                    type="file"
                    id="imagem"
                    name="imagem"
                    accept="image/*"
                    hidden required>

            </div>
            <div class="form-row">

                <div class="form-group">
                    <label class="field-label" for="product-name">Nome</label>

                    <input id="product-name"
                        type="text" placeholder="Digite o nome do produto..." class="field-input" name="nome" required>
                </div>

                <div class="form-group">
                    <label class="field-label" for="category">Categoria</label>

                    <select name="categoria" class="field-input select-field" required>
                        <option value="">Selecionar categoria</option>

                        <?php foreach ($dados['categorias'] as $categoria): ?>
                            <option value="<?= $categoria->cate_id ?>">
                                <?= $categoria->cate_nome ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

            </div>

            <div class="form-row">

                <div class="form-group">
                    <label class="field-label" for="location">Localização</label>

                    <select name="localizacao" class="field-input select-field" required>
                        <option value="">Selecionar localização</option>

                        <?php foreach ($dados['localizacoes'] as $localizacao): ?>
                            <option value="<?= $localizacao->loca_id ?>">
                                <?= $localizacao->loca_nome ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="field-label" for="quantity">Quantidade</label>

                    <input id="quantity" type="number" placeholder="0" class="field-input" name="quantidade" required>
                </div>

            </div>

            <label class="field-label" for="description">Descrição</label>
            <textarea id="description" rows="5" placeholder="Descreva o produto..." class="field-input textarea-field" name="descricao" required></textarea>

            <button type="submit" class="btn-primary">Cadastrar Produto</button>
        </form>
    </section>
</main>
<?php include "../App/Views/footer.php"; ?>