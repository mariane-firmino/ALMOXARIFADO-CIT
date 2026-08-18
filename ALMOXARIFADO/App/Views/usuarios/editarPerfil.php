<?php include "../App/Views/header.php"; ?>
<?php if ($_SESSION['usuario_funcao'] == 1) { ?>
    <main class="content">
        <header class="page-header">
            <div class="title-group">
                <div class="title-row">
                    <span class="title-mark"></span>
                    <h1>Editar Perfil</h1>
                </div>
                <p class="subtitle">Edite suas informações de perfil.</p>
            </div>
            <img src="<?= URL ?>/img/logo-sacit.png" alt="SACIT Logo" class="brand-logo" />
        </header>
        <section class="edit-profile-card">
            <div class="card-heading">
                <h2>Meus Dados - Editar Perfil</h2>
                <div class="section-line"></div>
            </div>
            <form action="<?= URL ?>/usuarios/salvarAlteracoes" method="POST" enctype="multipart/form-data">
                <div class="profile-layout">
                    <div class="profile-aside">
                        <div class="avatar-wrapper">

                            <img
                                src="<?= URL ?>/img/usuarios/<?= !empty($dados['usuario']->usua_foto) ? $dados['usuario']->usua_foto : 'avatar-padrao.png' ?>"
                                id="preview"
                                alt="Avatar"
                                class="avatar-image">

                            <label for="foto" class="avatar-edit">
                                ✎
                            </label>

                            <input
                                type="file"
                                id="foto"
                                name="foto"
                                accept="image/*"
                                hidden>

                        </div>

                        <div class="profile-actions">
                            <button
                                type="submit"
                                class="btn btn-primary">
                                Salvar Alterações
                            </button>
                            <a href="<?= URL ?>/usuarios/alterarSenha" class="btn btn-secondary">Alterar senha</a>
                        </div>
                    </div>
                    <div class="field-grid">
                        <div class="field-item">
                            <span class="field-icon"><img src="<?= URL ?>/img/icon_nome.png" alt="Ícone de Nome"></span>
                            <div class="field-content">
                                <label for="name">Nome</label>
                                <input
                                    id="name"
                                    required
                                    name="nome"
                                    type="text"
                                    value="<?= $dados['usuario']->usua_nome ?>">
                            </div>
                        </div>
                        <div class="field-item">
                            <span class="field-icon"><img src="<?= URL ?>/img/icone_telefone.png" alt="Ícone de Celular"></span>
                            <div class="field-content">
                                <label for="phone">Nr Celular</label>
                                <input
                                    id="phone"
                                    required
                                    name="telefone"
                                    type="text"
                                    value="<?= $dados['usuario']->usua_telefone ?>">
                            </div>
                        </div>
                        <div class="field-item">
                            <span class="field-icon"><img src="<?= URL ?>/img/icone_matrisiap.png" alt="Ícone de SIAP"></span>
                            <div class="field-content">
                                <label for="siap">SIAPE</label>
                                <input
                                    id="siap"
                                    name="siap"
                                    type="text"
                                    value="<?= $dados['usuario']->usua_siap ?>"
                                    readonly>
                            </div>
                        </div>
                        <div class="field-item">
                            <span class="field-icon"><img src="<?= URL ?>/img/icone_setor.png" alt="Ícone de Setor"></span>
                            <div class="field-content">
                                <label for="sector">Setor</label>
                                <input
                                    id="sector"
                                    name="setor"
                                    type="text"
                                    value="<?= $dados['usuario']->seto_nome ?>"
                                    readonly>
                            </div>
                        </div>
                        <div class="field-item">
                            <span class="field-icon"><img src="<?= URL ?>/img/icon_email.png" alt="Ícone de Email"></span>
                            <div class="field-content">
                                <label for="email">Email</label>
                                <input
                                    id="email"
                                    required
                                    name="email"
                                    type="email"
                                    value="<?= $dados['usuario']->usua_email ?>">
                            </div>
                        </div>
                        <div class="field-item">
                            <span class="field-icon"><img src="<?= URL ?>/img/icone_funcao.png" alt="Ícone de Função"></span>
                            <div class="field-content">
                                <label for="role">Função</label>
                                <input
                                    id="role"
                                    type="text"
                                    value="<?= $dados['usuario']->func_nome ?>"
                                    readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </main>
<?php } else if ($_SESSION['usuario_funcao'] == 2) { ?>
    <main class="content">
        <header class="page-header">
            <div class="title-group">
                <div class="title-row">
                    <span class="title-mark"></span>
                    <h1>Editar Perfil</h1>
                </div>
                <p class="subtitle">Edite suas informações de perfil.</p>
            </div>
            <img src="<?= URL ?>/img/logo-sacit.png" alt="SACIT Logo" class="brand-logo" />
        </header>
        <section class="edit-profile-card">
            <div class="card-heading">
                <h2>Meus Dados - Editar Perfil</h2>
                <div class="section-line"></div>
            </div>
            <form action="<?= URL ?>/usuarios/salvarAlteracoes" method="POST" enctype="multipart/form-data">
                <div class="profile-layout">
                    <div class="profile-aside">

                        <div class="avatar-wrapper">

                            <img
                                src="<?= URL ?>/img/usuarios/<?= !empty($dados['usuario']->usua_foto) ? $dados['usuario']->usua_foto : 'avatar-padrao.png' ?>"
                                alt="Avatar"
                                class="avatar-image">

                            <label for="foto" class="avatar-edit">
                                ✎
                            </label>

                            <input
                                type="file"
                                id="foto"
                                name="foto"
                                accept="image/*"
                                hidden>

                        </div>

                        <div class="profile-actions">
                            <button
                                type="submit"
                                class="btn btn-primary">
                                Salvar Alterações
                            </button>
                            <a href="<?= URL ?>/usuarios/alterarSenha" class="btn btn-secondary">Alterar senha</a>
                        </div>
                    </div>

                    <div class="field-grid">
                        <div class="field-item">
                            <span class="field-icon"><img src="<?= URL ?>/img/icon_nome.png" alt="Ícone de Nome"></span>
                            <div class="field-content">
                                <label for="name">Nome</label>
                                <input
                                    id="name"
                                    required
                                    name="nome"
                                    type="text"
                                    value="<?= $dados['usuario']->usua_nome ?>">
                            </div>
                        </div>
                        <div class="field-item">
                            <span class="field-icon"><img src="<?= URL ?>/img/icone_telefone.png" alt="Ícone de Celular"></span>
                            <div class="field-content">
                                <label for="phone">Nr Celular</label>
                                <input
                                    id="phone"
                                    required
                                    name="telefone"
                                    type="text"
                                    value="<?= $dados['usuario']->tele_numero ?? '' ?>">
                            </div>
                        </div>
                        <div class="field-item">
                            <span class="field-icon"><img src="<?= URL ?>/img/icone_matrisiap.png" alt="Ícone de SIAP"></span>
                            <div class="field-content">
                                <label for="siap">SIAP</label>
                                <input
                                    id="siap"
                                    name="siap"
                                    type="text"
                                    value="<?= $dados['usuario']->usua_siap ?>"
                                    readonly>
                            </div>
                        </div>
                        <div class="field-item">
                            <span class="field-icon"><img src="<?= URL ?>/img/icone_setor.png" alt="Ícone de Setor"></span>
                            <div class="field-content">
                                <label for="sector">Setor</label>
                                <input
                                    id="sector"
                                    name="setor"
                                    type="text"
                                    value="<?= $dados['usuario']->seto_nome ?>"
                                    readonly>
                            </div>
                        </div>
                        <div class="field-item">
                            <span class="field-icon"><img src="<?= URL ?>/img/icon_email.png" alt="Ícone de Email"></span>
                            <div class="field-content">
                                <label for="email">Email</label>
                                <input
                                    id="email"
                                    required
                                    name="email"
                                    type="email"
                                    value="<?= $dados['usuario']->usua_email ?>">
                            </div>
                        </div>
                        <div class="field-item">
                            <span class="field-icon"><img src="<?= URL ?>/img/icone_funcao.png" alt="Ícone de Função"></span>
                            <div class="field-content">
                                <label for="role">Função</label>
                                <input
                                    id="role"
                                    type="text"
                                    value="<?= $dados['usuario']->func_nome ?>"
                                    readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </main>
<?php } else if ($_SESSION['usuario_funcao'] == 3) { ?>
    <main class="content">
        <header class="page-header">
            <div class="title-group">
                <div class="title-row">
                    <span class="title-mark"></span>
                    <h1>Editar Perfil</h1>
                </div>
                <p class="subtitle">Edite suas informações de perfil.</p>
            </div>
            <img src="<?= URL ?>/img/logo-sacit.png" alt="SACIT Logo" class="brand-logo" />
        </header>

        <section class="profile-card">
            <h2>Meus Dados - Editar Perfil</h2>
            <div class="profile-grid">
                <div class="profile-aside">
                    <div class="avatar-wrapper">

                        <img
                            src="<?= URL ?>/img/usuarios/<?= !empty($dados['usuario']->usua_foto) ? $dados['usuario']->usua_foto : 'avatar-padrao.png' ?>"
                            alt="Avatar"
                            class="avatar-image">

                        <label for="foto" class="avatar-edit">
                            ✎
                        </label>

                        <input
                            type="file"
                            id="foto"
                            name="foto"
                            accept="image/*"
                            hidden>

                    </div>
                    <form action="<?= URL ?>/usuarios/salvarAlteracoes" method="POST" enctype="multipart/form-data">
                        <div class="profile-actions">
                            <button
                                type="submit"
                                class="btn btn-primary">
                                Salvar Alterações
                            </button>
                            <a href="<?= URL ?>/usuarios/alterarSenha" class="btn btn-secondary">Alterar senha</a>
                        </div>
                </div>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-icon">
                            <img src="<?= URL ?>/img/icon_nome.png" alt="Ícone de Nome">
                        </span>
                        <div class="info-content">
                            <p class="info-label">Nome Completo</p>
                            <input
                                id="name"
                                required
                                name="nome"
                                type="text"
                                value="<?= $dados['usuario']->usua_nome ?>">
                        </div>
                    </div>
                    <div class="info-item">
                        <span class="info-icon">
                            <img src="<?= URL ?>/img/icon_email.png" alt="Ícone de Email">
                        </span>
                        <div class="info-content">
                            <p class="info-label">E-mail</p>
                            <input
                                id="email"
                                required
                                name="email"
                                type="email"
                                value="<?= $dados['usuario']->usua_email ?>">
                        </div>
                    </div>
                    <div class="info-item">
                        <span class="info-icon">
                            <img src="<?= URL ?>/img/icone_matrisiap.png" alt="Ícone de Matrícula">
                        </span>
                        <div class="info-content">
                            <p class="info-label">Matrícula</p>
                            <input
                                id="matricula"
                                name="matricula"
                                type="text"
                                value="<?= $dados['usuario']->usua_matricula ?>"
                                readonly>
                        </div>
                    </div>
                    <div class="info-item">
                        <span class="info-icon">
                            <img src="<?= URL ?>/img/curso.png" alt="Ícone de Curso">
                        </span>

                        <div class="info-content">
                            <p class="info-label">Curso</p>
                            <input
                                id="curso"
                                name="curso"
                                type="text"
                                value="<?= $dados['usuario']->turma_curso ?>"
                                readonly>
                        </div>
                    </div>
                    <div class="info-item">
                        <span class="info-icon">
                            <img src="<?= URL ?>/img/ano.png" alt="Ícone de Ano">
                        </span>
                        <div class="info-content">
                            <p class="info-label">Ano</p>
                            <input
                                id="ano"
                                name="ano"
                                type="text"
                                value="<?= $dados['usuario']->turma_ano ?>"
                                readonly> ano
                        </div>
                    </div>
                    <div class="info-item">
                        <span class="info-icon">
                            <img src="<?= URL ?>/img/icone_telefone.png" alt="Ícone de Celular">
                        </span>
                        <div class="info-content">
                            <p class="info-label">Telefone</p>
                            <input
                                id="phone"
                                required
                                name="telefone"
                                type="text"
                                value="<?= $dados['usuario']->tele_numero ?? '' ?>">
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </section>
    </main>
<?php } else {
    echo 'erro';
} ?>
<?php include "../App/Views/footer.php"; ?>