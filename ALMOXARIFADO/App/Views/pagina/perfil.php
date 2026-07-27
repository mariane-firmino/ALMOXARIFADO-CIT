<?php include "../App/Views/header.php"; ?>
<?php if ($_SESSION['usuario_funcao'] == 1) { ?>
    <main class="content">
        <header class="page-header">
            <div class="title-group">
                <div class="title-row">
                    <span class="title-mark"></span>
                    <h1>Meu Perfil</h1>
                </div>
                <p class="subtitle">Visualize e gerencie as informações da sua conta.</p>
            </div>
            <img src="<?= URL ?>/img/logo-sacit.png" alt="SACIT Logo" class="brand-logo" />
        </header>

        <section class="profile-card">
            <h2>Meus Dados</h2>
            <div class="profile-grid">
                <div class="profile-aside">
                    <div class="avatar-frame">
                        <img
                            src="<?= URL ?>/img/usuarios/<?= $_SESSION['usuario_foto'] ?? 'avatar-padrao.png' ?>"
                            alt="Foto do usuário"
                            class="foto-usuario"
                            onerror="this.src='<?= URL ?>/img/usuarios/avatar-padrao.png'">
                    </div>
                    <div class="profile-actions">
                        <a href="<?= URL ?>/usuarios/editarPerfil" class="btn btn-primary">Editar perfil</a>
                        <a href="<?= URL ?>/usuarios/alterarSenha" class="btn btn-secondary">Alterar senha</a>
                    </div>
                </div>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-icon">
                            <img src="<?= URL ?>/img/icon_nome.png" alt="Ícone de Nome">
                        </span>
                        <div class="info-content">
                            <p class="info-label">Nome</p>
                            <p class="info-value"><?= $_SESSION['usuario_nome'] ?></p>
                        </div>
                    </div>
                    <div class="info-item">
                        <span class="info-icon">
                            <img src="<?= URL ?>/img/icone_telefone.png" alt="Ícone de Celular">
                        </span>
                        <div class="info-content">
                            <p class="info-label">Nr Celular</p>
                            <p class="info-value"><?= $_SESSION['usuario_telefone'] ?></p>
                        </div>
                    </div>
                    <div class="info-item">
                        <span class="info-icon">
                            <img src="<?= URL ?>/img/icone_matrisiap.png" alt="Ícone de SIAP">
                        </span>
                        <div class="info-content">
                            <p class="info-label">SIAPE</p>
                            <p class="info-value"><?= $_SESSION['usuario_siap'] ?></p>
                        </div>
                    </div>
                    <div class="info-item">
                        <span class="info-icon">
                            <img src="<?= URL ?>/img/icone_setor.png" alt="Ícone de Setor">
                        </span>
                        <div class="info-content">
                            <p class="info-label">Setor</p>
                            <p class="info-value"><?= $_SESSION['usuario_setor'] ?></p>
                        </div>
                    </div>
                    <div class="info-item">
                        <span class="info-icon">
                            <img src="<?= URL ?>/img/icon_email.png" alt="Ícone de Email">
                        </span>
                        <div class="info-content">
                            <p class="info-label">Email</p>
                            <p class="info-value"><?= $_SESSION['usuario_email'] ?></p>
                        </div>
                    </div>
                    <div class="info-item">
                        <span class="info-icon">
                            <img src="<?= URL ?>/img/icone_funcao.png" alt="Ícone de Função">
                        </span>
                        <div class="info-content">
                            <p class="info-label">Função</p>
                            <p class="info-value">Coordenador</p>
                        </div>
                    </div>
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
                    <h1>Meu Perfil</h1>
                </div>
                <p class="subtitle">Visualize e gerencie as informações da sua conta.</p>
            </div>
            <img src="<?= URL ?>/img/logo-sacit.png" alt="SACIT Logo" class="brand-logo" />
        </header>

        <section class="profile-card">
            <h2>Meus Dados</h2>
            <div class="profile-grid">
                <div class="profile-aside">
                    <div class="avatar-frame">
                        <img
                            src="<?= URL ?>/img/usuarios/<?= $_SESSION['usuario_foto'] ?? 'avatar-padrao.png' ?>"
                            alt="Foto do usuário"
                            class="foto-usuario"
                            onerror="this.src='<?= URL ?>/img/usuarios/avatar-padrao.png'">
                    </div>
                    <div class="profile-actions">
                        <a href="<?= URL ?>/usuarios/editarPerfil" class="btn btn-primary">Editar perfil</a>
                        <a href="<?= URL ?>/usuarios/alterarSenha" class="btn btn-secondary">Alterar senha</a>
                    </div>
                </div>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-icon">
                            <img src="<?= URL ?>/img/icon_nome.png" alt="Ícone de Nome">
                        </span>
                        <div class="info-content">
                            <p class="info-label">Nome</p>
                            <p class="info-value"><?= $_SESSION['usuario_nome'] ?></p>
                        </div>
                    </div>
                    <div class="info-item">
                        <span class="info-icon">
                            <img src="<?= URL ?>/img/icone_telefone.png" alt="Ícone de Celular">
                        </span>
                        <div class="info-content">
                            <p class="info-label">Nr Celular</p>
                            <p class="info-value"><?= $_SESSION['usuario_telefone'] ?></p>
                        </div>
                    </div>
                    <div class="info-item">
                        <span class="info-icon">
                            <img src="<?= URL ?>/img/icone_matrisiap.png" alt="Ícone de SIAP">
                        </span>
                        <div class="info-content">
                            <p class="info-label">SIAP</p>
                            <p class="info-value"><?= $_SESSION['usuario_siap'] ?></p>
                        </div>
                    </div>
                    <div class="info-item">
                        <span class="info-icon">
                            <img src="<?= URL ?>/img/icone_setor.png" alt="Ícone de Setor">
                        </span>
                        <div class="info-content">
                            <p class="info-label">Setor</p>
                            <p class="info-value"><?= $_SESSION['usuario_setor'] ?></p>
                        </div>
                    </div>
                    <div class="info-item">
                        <span class="info-icon">
                            <img src="<?= URL ?>/img/icon_email.png" alt="Ícone de Email">
                        </span>
                        <div class="info-content">
                            <p class="info-label">Email</p>
                            <p class="info-value"><?= $_SESSION['usuario_email'] ?></p>
                        </div>
                    </div>
                    <div class="info-item">
                        <span class="info-icon">
                            <img src="<?= URL ?>/img/icone_funcao.png" alt="Ícone de Função">
                        </span>
                        <div class="info-content">
                            <p class="info-label">Função</p>
                            <p class="info-value">Servidor</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php } else if ($_SESSION['usuario_funcao'] == 3) { ?>
    <main class="content">
        <header class="page-header">
            <div class="title-group">
                <div class="title-row">
                    <span class="title-mark"></span>
                    <h1>Meu Perfil</h1>
                </div>
                <p class="subtitle">Visualize e gerencie as informações da sua conta.</p>
            </div>
            <img src="<?= URL ?>/img/logo-sacit.png" alt="SACIT Logo" class="brand-logo" />
        </header>

        <section class="profile-card">
            <h2>Meus Dados</h2>
            <div class="profile-grid">
                <div class="profile-aside">
                    <div class="avatar-frame">
                        <img
                            src="<?= URL ?>/img/usuarios/<?= $_SESSION['usuario_foto'] ?? 'avatar-padrao.png' ?>"
                            alt="Foto do usuário"
                            class="foto-usuario"
                            onerror="this.src='<?= URL ?>/img/usuarios/avatar-padrao.png'">
                    </div>
                    <div class="profile-actions">
                        <a href="<?= URL ?>/usuarios/editarPerfil" class="btn btn-primary">Editar perfil</a>
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
                            <p class="info-value"><?= $_SESSION['usuario_nome'] ?></p>
                        </div>
                    </div>
                    <div class="info-item">
                        <span class="info-icon">
                            <img src="<?= URL ?>/img/icon_email.png" alt="Ícone de Email">
                        </span>
                        <div class="info-content">
                            <p class="info-label">E-mail</p>
                            <p class="info-value"><?= $_SESSION['usuario_email'] ?></p>
                        </div>
                    </div>
                    <div class="info-item">
                        <span class="info-icon">
                            <img src="<?= URL ?>/img/icone_matrisiap.png" alt="Ícone de Matrícula">
                        </span>
                        <div class="info-content">
                            <p class="info-label">Matrícula</p>
                            <p class="info-value"><?= $_SESSION['usuario_matricula'] ?></p>
                        </div>
                    </div>
                    <div class="info-item">
                        <span class="info-icon">
                            <img src="<?= URL ?>/img/curso.png" alt="Ícone de Curso">
                        </span>
                        <div class="info-content">
                            <p class="info-label">Curso</p>
                            <p class="info-value"><?= $_SESSION['usuario_curso'] ?></p>
                        </div>
                    </div>
                    <div class="info-item">
                        <span class="info-icon">
                            <img src="<?= URL ?>/img/ano.png" alt="Ícone de Ano">
                        </span>
                        <div class="info-content">
                            <p class="info-label">Ano</p>
                            <p class="info-value"><?= $_SESSION['usuario_ano'] ?> ano</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <span class="info-icon">
                            <img src="<?= URL ?>/img/icone_telefone.png" alt="Ícone de Celular">
                        </span>
                        <div class="info-content">
                            <p class="info-label">Telefone</p>
                            <p class="info-value"><?= $_SESSION['usuario_telefone'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php } else {
    echo 'erro';
} ?>
<?php include "../App/Views/footer.php"; ?>