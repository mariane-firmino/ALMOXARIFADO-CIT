<?php include "../App/Views/header.php"; ?>

<main class="container-fluid py-4">

    <!-- Título -->
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


    <div class="card shadow rounded-4">

        <!-- Cabeçalho -->
        <div class="card-header bg-white">

            <div class="row">

                <div class="col-md-8">
                    <h4 class="mb-0">
                        Detalhe da Solicitação
                    </h4>
                </div>

                <div class="col-md-4 text-end">

                    <span class="text-secondary">
                        Código:
                    </span>

                    <strong>
                        #<?= $dados['solicitacao']->codigo ?>
                    </strong>

                </div>

            </div>

        </div>


        <div class="card-body">

            <!-- Informações -->
            <div class="row mb-4">

                <div class="col-md-8">

                    <p>
                        <strong>Nome do Solicitante:</strong>
                        <?= $dados['solicitacao']->usua_nome ?>
                    </p>

                    <p>
                        <strong>Data e hora:</strong>
                        <?= date(
                            'd/m/Y H:i',
                            strtotime($dados['solicitacao']->soli_data_solicitacao)
                        ) ?>
                    </p>

                </div>

                <div class="col-md-4 text-end">

                    <span class="badge bg-warning fs-6">
                        <?= $dados['solicitacao']->soli_status ?>
                    </span>

                </div>

            </div>


            <!-- Produtos -->
            <div class="row mb-4">

                <div class="col-12">

                    <label class="form-label fw-bold">
                        Produtos solicitados
                    </label>

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover align-middle mb-0">

                            <thead class="table-light">

                                <tr>
                                    <th>Produto</th>
                                    <th class="text-center" style="width: 150px;">
                                        Quantidade
                                    </th>
                                </tr>

                            </thead>

                            <tbody>
                                <?php foreach ($dados['itens'] as $item): ?>
                                    <tr>
                                        <td><?= $item->prod_nome ?></td>

                                        <td><?= $item->item_quantidade ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

            <hr>

            <form action="<?= URL ?>/solicitacoes/processarSolicitacao" method="POST">

                <input type="hidden" name="soli_id" value="<?= $dados['solicitacao']->soli_id ?>">

                <!-- Datas -->
                <div class="row mb-4">

                    <div class="col-md-4">
                        <label class="form-label text-dark fw-bold">
                            Data para Retirada
                        </label>

                        <input
                            type="date"
                            name="data_retirada"
                            class="form-control"
                            required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label text-dark fw-bold">
                            Data para Devolução
                        </label>

                        <input
                            type="date"
                            name="data_devolucao"
                            class="form-control"
                            required>
                    </div>

                </div>

                <!-- Observação -->
                <div class="mb-4">
                    <label class="form-label text-dark fw-bold">
                        Observação
                    </label>

                    <textarea
                        name="observacao"
                        class="form-control"
                        rows="5"
                        placeholder="Digite uma observação..."></textarea>
                </div>

                <!-- Botões -->
                <div class="d-flex gap-3">
                    <button
                        type="submit"
                        name="acao"
                        value="Negada"
                        class="btn btn-danger"
                        onclick="return confirm('Deseja realmente negar esta solicitação?')">
                        Negar
                    </button>

                    <button
                        type="submit"
                        name="acao"
                        value="Aprovada"
                        class="btn btn-success"
                        onclick="return confirm('Deseja realmente aprovar esta solicitação?')">
                        Aprovar
                    </button>
                </div>
            </form>

        </div>

    </div>

</main>

<?php include "../App/Views/footer.php"; ?>