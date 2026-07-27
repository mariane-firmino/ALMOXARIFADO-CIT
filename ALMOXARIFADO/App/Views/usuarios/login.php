<form action="<?= URL ?>/usuarios/loginUser" method="post">
    <!-- Login Container -->
    <div class="login-container">
        <!-- Envolve as duas partes do login (branco e verde)-->
        <div class="login-wrapper">
            <!-- Lado esquerdo -->
            <div class="login-left">
                <h1 class="login-title">Login</h1>
                <?= Sessao::mensagem('usuario') ?>
                <div class="form-group">
                    <label class="form-label">Usuário</label>
                    <input
                        type="email"
                        name="email"
                        value="<?= isset($dados['email']) ? $dados['email'] : '' ?>"
                        class="form-input <?= !empty($dados['email_erro']) ? 'is-invalid' : '' ?>"
                        placeholder="Digite seu e-mail"
                        required>
                    <?php if (isset($dados['email_erro'])): ?>
                        <div class="invalid-feedback">
                            <?= !empty($dados['senha_erro']) ? 'is-invalid' : '' ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label class="form-label">Senha</label>
                    <input
                        type="password"
                        name="senha"
                        class="form-input <?= !empty($dados['senha_erro']) ? 'is-invalid' : '' ?>"
                        placeholder="Digite sua senha"
                        required>
                    <?php if (isset($dados['senha_erro'])): ?>
                        <div class="invalid-feedback">
                            <?= $dados['senha_erro'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <button type="submit" class="submit-btn">
                    Enviar
                </button>

                <div class="footer-links">
                    <div class="link-row">
                        <span class="link-text">Esqueceu a senha?</span>
                        <a href="<?= URL ?>/usuarios/esqueciSenha" class="link-blue">Esqueci minha senha</a>
                    </div>
                    <div class="link-row">
                        <span class="link-text">Ainda não é cadastrado?</span>
                        <a href="<?= URL ?>/usuarios/cadastrar" class="link-blue">Cadastre-se</a>
                    </div>
                </div>
            </div>

            <!-- Lado direito - Logo -->
            <div class="login-right">
                <div class="logo-container">
                    <img alt="SACIT Logo" class="logo-image" src="<?= URL ?>/public/img/logo-sacit.png">
                </div>
            </div>
        </div>
    </div>
</form>