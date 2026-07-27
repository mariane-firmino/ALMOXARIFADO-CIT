<?php include "../App/Views/header.php"; ?>

<main class="content">
    <header class="page-header">
        <div class="title-group">
            <div class="title-row">
                <span class="title-mark"></span>
                <h1>Meu Perfil</h1>
            </div>
            <p class="subtitle">Bem-vindo(a), <?= $_SESSION['usuario_nome'] ?>!</p>
        </div>
        <img src="<?= URL ?>/img/logo-sacit.png" alt="SACIT Logo" class="brand-logo" />
    </header>

    <?php if (isset($_SESSION['erro'])): ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                alert("<?= addslashes($_SESSION['erro']) ?>");
            });
        </script>
        <?php unset($_SESSION['erro']); ?>
    <?php endif; ?>


    <?php if (isset($_SESSION['sucesso'])): ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                alert("<?= addslashes($_SESSION['sucesso']) ?>");
            });
        </script>
        <?php unset($_SESSION['sucesso']); ?>
    <?php endif; ?>

    <section class="password-card">
        <div class="card-heading">
            <h2>Meus Dados - Alterar Senha</h2>
            <div class="section-line"></div>
        </div>

        <form
            class="password-form"
            action="<?= URL ?>/usuarios/salvarSenha"
            method="POST">
            <div class="password-group">
                <label for="current-password">Digite a senha atual:</label>
                <div class="password-input-wrapper">
                    <input
                        id="current-password"
                        name="senha_atual"
                        class="password-input"
                        placeholder="Digite sua senha atual"
                        type="password"
                        required>
                    <button type="button" class="password-toggle" data-target="current-password"
                        title="Mostrar/Ocultar senha">
                        <img src="<?= URL ?>/img/olhoAberto.png" alt="Mostrar senha" class="eye-icon">
                    </button>
                </div>
            </div>

            <div class="password-group">
                <label for="new-password">Digite a nova senha:</label>
                <div class="password-input-wrapper">
                    <input
                        id="new-password"
                        name="nova_senha"
                        class="password-input"
                        placeholder="Digite sua nova senha"
                        type="password"
                        required>
                    <button type="button" class="password-toggle" data-target="new-password"
                        title="Mostrar/Ocultar senha">
                        <img src="<?= URL ?>/img/olhoAberto.png" alt="Mostrar senha" class="eye-icon">
                    </button>
                </div>
            </div>

            <div class="password-group">
                <label for="confirm-password">Confirme a nova senha:</label>
                <div class="password-input-wrapper">
                    <input
                        id="confirm-password"
                        name="confirmar_senha"
                        class="password-input"
                        placeholder="Confirme sua nova senha"
                        type="password"
                        required>
                    <button type="button" class="password-toggle" data-target="confirm-password"
                        title="Mostrar/Ocultar senha">
                        <img src="<?= URL ?>/img/olhoAberto.png" alt="Mostrar senha" class="eye-icon">
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