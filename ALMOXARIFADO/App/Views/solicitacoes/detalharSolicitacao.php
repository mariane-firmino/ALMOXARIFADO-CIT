<?php include "../App/Views/header.php"; ?>

<main class="container-fluid py-4">

    <!-- Título -->
    <header class="page-header">
        <div class="title-group">
            <div class="title-row">
                <span class="title-mark"></span>
                <h1>Detalhes da Solicitação</h1>
            </div>
            <p class="subtitle">Acompanhe o andamento da sua solicitação.</p>
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
                        <strong>Solicitante:</strong>
                        <?= $dados['solicitacao']->usua_nome ?>
                    </p>

                    <p>
                        <strong>Data da solicitação:</strong>
                        <?= date(
                            'd/m/Y H:i',
                            strtotime($dados['solicitacao']->soli_data_solicitacao)
                        ) ?>
                    </p>

                </div>

                <div class="col-md-4 text-end">

                    <?php

                    $status = $dados['solicitacao']->soli_status;

                    $classe = match ($status) {

                        'Aprovada' => 'bg-success',

                        'Negada' => 'bg-danger',

                        'Pendente' => 'bg-warning text-dark',

                        'Em devolução' => 'bg-primary',

                        default => 'bg-secondary'
                    };

                    ?>

                    <span class="badge <?= $classe ?> fs-6">

                        <?= $status ?>

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


            <!-- Datas -->
            <?php if ($dados['solicitacao']->soli_status == 'Aprovada'): ?>

                <div class="row mb-4">

                    <div class="col-md-6">

                        <label class="fw-bold">
                            Data para retirada
                        </label>

                        <div class="form-control bg-light">

                            <?= date(
                                'd/m/Y',
                                strtotime($dados['solicitacao']->soli_data_retirada)
                            ) ?>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <label class="fw-bold">
                            Data para devolução
                        </label>

                        <div class="form-control bg-light">

                            <?= date(
                                'd/m/Y',
                                strtotime($dados['solicitacao']->soli_data_devolucao)
                            ) ?>

                        </div>

                    </div>

                </div>

            <?php endif; ?>

            <!-- Observação -->
            <div class="mb-4">

                <label class="fw-bold">
                    Observação do Coordenador
                </label>

                <div class="border rounded p-3 bg-light">

                    <?= nl2br($dados['solicitacao']->soli_observacao) ?>

                </div>

            </div>
            <?php if ($dados['solicitacao']->soli_status == 'Pendente'): ?>

                <div class="alert alert-warning">

                    Sua solicitação ainda está aguardando análise do coordenador.

                </div>

            <?php endif; ?>
            <?php if ($dados['solicitacao']->soli_status == 'Negada'): ?>

                <div class="alert alert-danger">

                    <strong>Solicitação negada.</strong>

                    <hr>

                    <?= nl2br($dados['solicitacao']->soli_observacao) ?>

                </div>

            <?php endif; ?>

            <!-- Botões -->
            <div class="text-end">

                <a
                    href="<?= URL ?>/solicitacoes/solicitacaoServidor"
                    class="btn btn-outline-secondary">

                    Voltar

                </a>

            </div>

        </div>

    </div>

</main>

<?php include "../App/Views/footer.php"; ?>