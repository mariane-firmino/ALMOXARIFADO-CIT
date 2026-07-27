<?php include "../App/Views/header.php"; ?>
<?php if ($_SESSION['usuario_funcao'] == 1) { ?>
    <main class="content">
        <header class="page-header">
            <div class="title-group">
                <div class="title-row">
                    <span class="title-mark"></span>

                    <h1>Consultar Histórico</h1>
                </div>

                <p class="subtitle">
                    Consulte todo o histórico de movimentações realizadas no sistema.
                </p>

            </div>

            <img src="<?=URL?>/img/logo-sacit.png"
                alt="Logo SACIT"
                class="brand-logo">

        </header>

        <section class="historico-actions-panel">

            <div class="historico-summary-card">

                <div class="historico-summary-top">

                    <div class="historico-summary-icon green">
                        <img src="<?=URL?>/img/icon_total_acoes.png" class="summary-img total-icon">
                    </div>

                    <p class="summary-label">
                        Total de Registros
                    </p>

                </div>

                <h2>00</h2>

                <span class="summary-text">
                    Registros encontrados
                </span>

            </div>

            <div class="historico-summary-card">

                <div class="historico-summary-top">

                    <div class="historico-summary-icon blue">
                        <img src="<?=URL?>/img/icon_usuarioss.png" class="summary-img active-icon">
                    </div>

                    <p class="summary-label">
                        Usuários Envolvidos
                    </p>

                </div>

                <h2>00</h2>

                <span class="summary-text">
                    Usuários diferentes
                </span>

            </div>

            <div class="historico-summary-card">

                <div class="historico-summary-top">

                    <div class="historico-summary-icon blue">
                        <img src="<?=URL?>/img/icone_caixaAzul.png" class="summary-img inactive-icon">
                    </div>

                    <p class="summary-label">
                        Produtos Movimentados
                    </p>

                </div>

                <h2>00</h2>

                <span class="summary-text">
                    Produtos diferentes
                </span>

            </div>

            <div class="historico-summary-card">

                <div class="historico-summary-top">

                    <div class="historico-summary-icon roxo">
                        <img src="<?=URL?>/img/icon_calendario.png" class="summary-img inactive-icon">
                    </div>

                    <p class="summary-label">
                        Período Consultado
                    </p>

                </div>

                <h3>dd/mm/aaaa</h3>

                <span class="summary-text">
                    até
                </span>

                <h3>dd/mm/aaaa</h3>

            </div>

        </section>

        <section class="management-panel">

            <h2 class="table-title">
                Histórico de Solicitações
            </h2>

            <div class="panel-actions">

                <form class="search-box" action="" method="GET">

                    <span class="search-icon">
                        <img src="<?=URL?>/img/lupa.png" alt="Buscar" class="search-img">
                    </span>

                    <input
                        type="search" name="pesquisa" placeholder="Buscar por usuário, produto ou ação...">

                </form>

                <div class="select-wrapper">

                    <select class="filter-select">

                        <option value="">
                            Tipo de usuário
                        </option>

                        <option value="todos">
                            Todos
                        </option>

                        <option value="coordenador">
                            Coordenador
                        </option>

                        <option value="servidor">
                            Servidor
                        </option>

                        <option value="estagiario">
                            Estagiário
                        </option>

                    </select>

                </div>

                <div class="date-group">

                    <input type="text" id="periodo" class="date-range-input" placeholder="dd/mm/aaaa até dd/mm/aaaa">

                </div>

                <div class="action-buttons">

                    <button type="button" class="btn btn-primary report-btn">
                        <img src="<?=URL?>/img/icon_baixar.png" alt="Download" class="download-icon">
                        Gerar relatório
                    </button>

                </div>

            </div>

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>Data/Hora</th>
                            <th>Usuário</th>
                            <th>Tipo de Usuário</th>
                            <th>Produto(s)</th>
                            <th>Quantidade</th>
                            <th>Ação</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>
                            <td>dd/mm/aaaa<br>hh:mm</td>
                            <td>
                                Nome<br>
                                <span class="codigo-produto">nome@ifro.edu.br</span>
                            </td>
                            <td>Setor</td>
                            <td>Produto</td>
                            <td>00</td>
                            <td>
                                <a href="excluir-historico.html" class="btn btn-tertiary">
                                    Excluir
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>21/06/2026<br>hh:mm</td>
                            <td>
                                Nome<br>
                                <span class="codigo-produto">nome@ifro.edu.br</span>
                            </td>
                            <td>Setor</td>
                            <td>Produto</td>
                            <td>00</td>
                            <td>
                                <a href="excluir-historico.html" class="btn btn-tertiary">
                                    Excluir
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>dd/mm/aaaa<br>hh:mm</td>
                            <td>
                                Nome<br>
                                <span class="codigo-produto">nome@ifro.edu.br</span>
                            </td>
                            <td>Setor</td>
                            <td>Produto</td>
                            <td>00</td>
                            <td>
                                <a href="excluir-historico.html" class="btn btn-tertiary">
                                    Excluir
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>dd/mm/aaaa<br>hh:mm</td>
                            <td>
                                Nome<br>
                                <span class="codigo-produto">nome@ifro.edu.br</span>
                            </td>
                            <td>Setor</td>
                            <td>Produto</td>
                            <td>00</td>
                            <td>
                                <a href="excluir-historico.html" class="btn btn-tertiary">
                                    Excluir
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>dd/mm/aaaa<br>hh:mm</td>
                            <td>
                                Nome<br>
                                <span class="codigo-produto">nome@ifro.edu.br</span>
                            </td>
                            <td>Setor</td>
                            <td>Produto</td>
                            <td>00</td>
                            <td>
                                <a href="excluir-historico.html" class="btn btn-tertiary">
                                    Excluir
                                </a>
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

            <div class="table-footer">

                <p class="table-info">
                    Mostrando 5 de 10 registros
                </p>

                <div class="pagination">

                    <button class="page-btn">
                        &#8249;
                    </button>

                    <button class="page-btn active-page">
                        1
                    </button>

                    <button class="page-btn">
                        2
                    </button>

                    <button class="page-btn">
                        3
                    </button>

                    <button class="page-btn">
                        4
                    </button>

                    <button class="page-btn">
                        &#8250;
                    </button>

                </div>

            </div>

        </section>

    </main>
<?php } else if ($_SESSION['usuario_funcao'] == 2) { ?>
    <main class="content">
        <header class="page-header">
            <div class="title-group">
                <div class="title-row">
                    <span class="title-mark"></span>
                    <h1>Consultar Histórico</h1>
                </div>
                <p class="subtitle">Visualize o seu histórico completo.</p>
            </div>
            <img src="<?=URL?>/img/logo-sacit.png" alt="SACIT Logo" class="brand-logo" />
        </header>

        <section class="historico-actions-panel">

            <div class="historico-summary-card">
                <div class="historico-summary-top">
                    <div class="historico-summary-icon green">
                        <img src="<?=URL?>/img/icon_total.png" alt="Total de solicitações" class="summary-img aprovado-icon">
                    </div>
                    <p class="summary-label">Total de solicitações</p>
                </div>

                <h2>00</h2>
                <span class="summary-text">Todas as solicitações</span>
            </div>

            <div class="historico-summary-card">
                <div class="historico-summary-top">
                    <div class="historico-summary-icon green">
                        <img src="<?=URL?>/img/icon_verificado.png" alt="Aprovados" class="summary-img aprovado-icon">
                    </div>
                    <p class="summary-label">Aprovadas</p>
                </div>

                <h2>00</h2>
                <span class="summary-text">Solicitações aprovadas</span>
            </div>

            <div class="historico-summary-card">
                <div class="historico-summary-top">
                    <div class="historico-summary-icon red">
                        <img src="<?=URL?>/img/x.png" alt="solicitações negadas" class="summary-img negada-icon">
                    </div>
                    <p class="summary-label">Negadas</p>
                </div>

                <h2>00</h2>
                <span class="summary-text">Solicitações negadas</span>
            </div>

            <div class="historico-summary-card">
                <div class="historico-summary-top">
                    <div class="historico-summary-icon roxo">
                        <img src="<?=URL?>/img/icon_devolucao.png" alt="Em Devolução" class="summary-img devolucao-icon">
                    </div>
                    <p class="summary-label">Devolvido</p>
                </div>

                <h2>00</h2>
                <span class="summary-text">Produtos devolvidos</span>
            </div>

        </section>

        <section class="management-panel">

            <div class="panel-actions">

                <form class="search-box" action="" method="GET">

                    <span class="search-icon">
                        <img src="<?=URL?>/img/lupa.png" alt="Buscar" class="search-img">
                    </span>

                    <input type="search" name="pesquisa" placeholder="Buscar por nome do produto...">

                </form>

                <select class="filter-select">
                    <option>Status</option>
                    <option>Todos os status</option>
                    <option>Aprovada</option>
                    <option>Negada</option>
                    <option>Devolvido</option>
                </select>

                <div class="date-group">

                    <input type="text" id="periodo" class="date-range-input" placeholder="dd/mm/aaaa até dd/mm/aaaa">

                </div>

            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Data</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>00000</td>
                            <td>Nome</td>
                            <td>00</td>
                            <td>dd/mm/aaaa<br>hh:mm</td>
                            <td><span class="status active">Aprovada</span></td>
                        </tr>
                        <tr>
                            <td>00000</td>
                            <td>Nome</td>
                            <td>00</td>
                            <td>dd/mm/aaaa<br>hh:mm</td>
                            <td><span class="status removed">Negada</span></td>
                        </tr>
                        <tr>
                            <td>00000</td>
                            <td>Nome</td>
                            <td>00</td>
                            <td>dd/mm/aaaa<br>hh:mm</td>
                            <td><span class="status active">Aprovada</span></td>
                        </tr>
                        <tr>
                            <td>00000</td>
                            <td>Nome</td>
                            <td>00</td>
                            <td>dd/mm/aaaa<br>hh:mm</td>
                            <td><span class="status active">Aprovada</span></td>
                        </tr>
                        <tr>
                            <td>00000</td>
                            <td>Nome</td>
                            <td>00</td>
                            <td>dd/mm/aaaa<br>hh:mm</td>
                            <td><span class="status devo">Devolvido</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-footer">

                <p class="table-info">
                    Mostrando 4 de 15 produtos
                </p>

                <div class="pagination">

                    <button class="page-btn">
                        &#8249;
                    </button>

                    <button class="page-btn active-page">
                        1
                    </button>

                    <button class="page-btn">
                        2
                    </button>

                    <button class="page-btn">
                        3
                    </button>

                    <button class="page-btn">
                        4
                    </button>

                    <button class="page-btn">
                        &#8250;
                    </button>

                </div>

            </div>
        </section>
    </main>

<?php } else {
    echo 'erro';
} ?>
<?php include "../App/Views/footer.php"; ?>