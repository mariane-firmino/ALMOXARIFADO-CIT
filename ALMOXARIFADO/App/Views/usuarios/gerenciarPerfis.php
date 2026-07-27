<?php include "../App/Views/header.php"; ?>
<?php if ($_SESSION['usuario_funcao'] == 1) { ?>
    <main class="content">
        <header class="page-header">
            <div>
                <div class="title-row">
                    <span class="title-mark"></span>
                    <h1>Gerenciar Perfis</h1>
                </div>
                <p class="subtitle">Gerencie os usuários do sistema.</p>
            </div>
            <img src="<?= URL ?>/img/logo-sacit.png" alt="SACIT Logo" class="brand-logo" />
        </header>

        <section class="actions-panel">

            <div class="summary-card">
                <div class="summary-top">
                    <div class="summary-icon green">
                        <img src="<?= URL ?>/img/icon_perfil (2).png" alt="Total de perfis" class="summary-img total-icon-2">
                    </div>
                    <p class="summary-label">Total de Perfis</p>
                </div>

                <h2><?= $dados['total'] ?></h2>
                <span class="summary-text">Usuários cadastrados</span>
            </div>

            <div class="summary-card">
                <div class="summary-top">
                    <div class="summary-icon blue">
                        <img src="<?= URL ?>/img/icon_usuario_novo.png" alt="Perfis ativos" class="summary-img active-icon">
                    </div>
                    <p class="summary-label">Perfis Ativos</p>
                </div>

                <h2><?= $dados['ativos'] ?></h2>
                <span class="summary-text">Usuários ativos</span>
            </div>

            <div class="summary-card">
                <div class="summary-top">
                    <div class="summary-icon yellow">
                        <img src="<?= URL ?>/img/icon_perfil_inativo.png" alt="Perfis inativos" class="summary-img inactive-icon">
                    </div>
                    <p class="summary-label">Perfis Inativos</p>
                </div>

                <h2><?= $dados['inativos'] ?></h2>
                <span class="summary-text">Usuários inativos</span>
            </div>

            <div class="summary-card">
                <div class="summary-top">
                    <div class="summary-icon red">
                        <img src="<?= URL ?>/img/icon_lixeira.png" alt="Perfis Removidos" class="summary-img removed-icon">
                    </div>
                    <p class="summary-label">Perfis Removidos</p>
                </div>

                <h2><?= $dados['removidos'] ?></h2>
                <span class="summary-text">Usuários removidos</span>
            </div>

        </section>

        <section class="management-panel">

            <h2 class="table-title">Lista de Usuários</h2>
            

                <form
                    action="<?= URL ?>/usuarios/gerenciarPerfis"
                    method="GET">
<div class="panel-actions">
                    <div class="search-box">
                        <span class="search-icon">
                            <img src="<?= URL ?>/img/lupa.png" class="search-img">
                        </span>

                        <input
                            type="search"
                            name="pesquisa"
                            value="<?= $_GET['pesquisa'] ?? '' ?>"
                            placeholder="Buscar usuário">
                    </div>

                    <div class="select-wrapper">
                        <select
                            name="funcao"
                            class="filter-select">

                            <option value="">
                                Todas
                            </option>

                            <?php foreach ($dados['funcoes'] as $funcao): ?>

                                <option
                                    value="<?= $funcao->func_id ?>"

                                    <?= ($_GET['funcao'] ?? '') == $funcao->func_id ? 'selected' : '' ?>>

                                    <?= $funcao->func_nome ?>

                                </option>

                            <?php endforeach; ?>

                        </select>
                    </div>

                    <select
                        name="status"
                        class="filter-select">

                        <option value="">Todos</option>

                        <option
                            value="Ativo">Ativo
                        </option>

                        <option
                            value="Inativo">Inativo
                        </option>
                    </select>
                </form>




                <a href="<?= URL ?>/usuarios/cadastrar" class="btn btn-primary">
                    + Novo perfil
                </a>

            </div>

            <div class="table-wrapper">

                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Função</th>
                            <th>Status</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dados['usuarios'] as $usuario): ?>

                            <tr>

                                <td>

                                    <?= $usuario->usua_nome ?>

                                </td>

                                <td>

                                    <?= $usuario->usua_email ?>

                                </td>

                                <td>

                                    <?= $usuario->func_nome ?>

                                </td>

                                <td>
                                    <span class="status <?= strtolower($usuario->status) ?>">
                                        <?= $usuario->status ?>
                                    </span>
                                </td>

                                <td>
                                    <a
                                        href="<?= URL ?>/usuarios/excluir/<?= $usuario->usua_id ?>"
                                        class="btn btn-primary"
                                        onclick="return confirmarExclusao();">

                                        Excluir

                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="table-footer">

                <p class="table-info">

                    Mostrando
                    <?= count($dados['usuarios']) ?>
                    de
                    <?= $dados['totalUsuarios'] ?>
                    usuários

                </p>


                <div class="pagination">


                    <?php if ($dados['paginaAtual'] > 1): ?>

                        <a href="?pagina=<?= $dados['paginaAtual'] - 1 ?>">
                            <button class="page-btn">
                                &#8249;
                            </button>
                        </a>

                    <?php endif; ?>


                    <?php for ($i = 1; $i <= $dados['totalPaginas']; $i++): ?>

                        <a href="?pagina=<?= $i ?>">

                            <button class="page-btn 
                <?= ($dados['paginaAtual'] == $i) ? 'active-page' : '' ?>">

                                <?= $i ?>

                            </button>

                        </a>

                    <?php endfor; ?>


                    <?php if ($dados['paginaAtual'] < $dados['totalPaginas']): ?>

                        <a href="?pagina=<?= $dados['paginaAtual'] + 1 ?>">

                            <button class="page-btn">
                                &#8250;
                            </button>

                        </a>

                    <?php endif; ?>


                </div>

            </div>
        </section>
    </main>
<?php } else {
    echo 'erro';
} ?>
<?php include "../App/Views/footer.php"; ?>