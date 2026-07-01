<?php include "../App/Views/header.php"; ?>

<main class="content">
    <header class="page-header">
        <div class="title-group">
            <div class="title-row">
                <span class="title-mark"></span>
                <h1>Meu Perfil</h1>
            </div>
            <p class="subtitle">Bem-vindo(a), Nome !</p>
        </div>
        <img src="../img/logo-sacit.png" alt="SACIT Logo" class="brand-logo" />
    </header>

    <section class="password-card">
        <div class="card-heading">
            <h2>Meus Dados - Alterar Senha</h2>
            <div class="section-line"></div>
        </div>

        <form class="password-form">
            <div class="password-group">
                <label for="current-password">Digite a senha atual:</label>
                <div class="password-input-wrapper">
                    <input id="current-password" class="password-input" type="password" placeholder="">
                    <button type="button" class="password-toggle" data-target="current-password"
                        title="Mostrar/Ocultar senha">
                        <img src="../img/olhoAberto.png" alt="Mostrar senha" class="eye-icon">
                    </button>
                </div>
            </div>

            <div class="password-group">
                <label for="new-password">Digite a nova senha:</label>
                <div class="password-input-wrapper">
                    <input id="new-password" class="password-input" type="password" placeholder="">
                    <button type="button" class="password-toggle" data-target="new-password"
                        title="Mostrar/Ocultar senha">
                        <img src="<?= URL ?>/public/img/olhoAberto.png" alt="Mostrar senha" class="eye-icon">
                    </button>
                </div>
            </div>

            <div class="password-group">
                <label for="confirm-password">Confirme a nova senha:</label>
                <div class="password-input-wrapper">
                    <input id="confirm-password" class="password-input" type="password" placeholder="">
                    <button type="button" class="password-toggle" data-target="confirm-password"
                        title="Mostrar/Ocultar senha">
                        <img src="<?= URL ?>/public/img/olhoAberto.png" alt="Mostrar senha" class="eye-icon">
                    </button>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            </div>
        </form>
    </section>
</main>
</div>
<?php include "../App/Views/footer.php"; ?>

<script>
    document.querySelectorAll('.password-toggle').forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const targetId = button.getAttribute('data-target');
            const input = document.getElementById(targetId);
            const icon = button.querySelector('img');
            const isPassword = input.type === 'password';
            input.type = isPassword ? 'text' : 'password';
            icon.src = isPassword ? `${URL}/public/img/olhoFechado.png` : `${URL}/public/img/olhoAberto.png`;
            icon.alt = isPassword ? 'Ocultar senha' : 'Mostrar senha';
        });
    });
</script>