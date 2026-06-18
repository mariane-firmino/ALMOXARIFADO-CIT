<form action="<?= URL ?>/usuarios/loginUser" method="post">
 <!-- Login Container -->
    <div class="login-container">
        <!-- Envolve as duas partes do login (branco e verde)-->
        <div class="login-wrapper">
            <!-- Lado esquerdo -->
            <div class="login-left">
                <h1 class="login-title">Login</h1>

                <div class="form-group">
                    <label class="form-label">Usuário</label>
                    <input type="text" name="email" class="form-input" placeholder="">
                </div>

                <div class="form-group">
                    <label class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-input" placeholder="">
                </div>

                <button class="submit-btn">
                    <input type="submit" class="submit-text" value="Enviar">
                </button>

                <div class="footer-links">
                    <div class="link-row">
                        <span class="link-text">Esqueceu a senha?</span>
                        <a href="esqueciSenha.html" class="link-blue">Esqueci minha senha</a>
                    </div>
                    <div class="link-row">
                        <span class="link-text">Ainda não é cadastrado?</span>
                        <a href="<?=URL?>/usuarios/cadastrar" class="link-blue">Cadastre-se</a>
                    </div>
                </div>
            </div>

            <!-- Lado direito - Logo -->
            <div class="login-right">
                <div class="logo-container">
                    <img alt="SACIT Logo" class="logo-image" src="<?=URL?>/public/img/logo-sacit.png">
                </div>
            </div>
        </div>
    </div>
</form>
