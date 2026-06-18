<div class="register-container">
    <div class="register-wrapper">
        <!-- Lado esquerdo - Formulário de cadastro -->
        <div class="register-left">
            <h1 class="register-title">Cadastro de Servidor</h1>

            <form class="register-form" action="<?=URL?>/usuarios/cadServidor" method="post">
                <div class="form-group">
                    <label class="form-label">Nome Completo</label>
                    <input type="text" name="nome" class="form-input" placeholder="Nome Completo" required>
                </div>

                <div class="form-group">
                    <label class="form-label">E-mail Institucional</label>
                    <input type="email" name="email" class="form-input" placeholder="seuemail@instituicao.edu.br" required>
                </div>

                <div class="form-row">
                    <div class="form-group half">
                        <label class="form-label">SIAPE</label>
                        <input type="text" name="siap" class="form-input" placeholder="0000000" required>
                    </div>
                    <div class="form-group half">
                        <label class="form-label">Setor</label>
                        <select class="form-input" name="setor">
                            <option value="">Selecione o setor</option>
                            <option value="2">CIT</option>
                            <option value="3">DAPE</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Telefone</label>
                    <input type="tel" name="celular" class="form-input" placeholder="(99) 99999-9999" required>
                </div>

                <div class="form-row">
                    <div class="form-group half">
                        <label class="form-label">Senha</label>
                        <input type="password" name="senha" class="form-input" placeholder="Digite sua senha" required>
                    </div>
                    <div class="form-group half">
                        <label class="form-label">Confirmar Senha</label>
                        <input type="password" name="confirma_senha" class="form-input" placeholder="Confirme sua senha" required>
                    </div>
                </div>

                <button type="submit" class="submit-btn">
                    <span class="submit-text">Cadastrar</span>
                </button>

                <div class="footer-links">
                    <div class="link-row">
                        <span class="link-text">Já tem conta?</span>
                        <a href="index.html" class="link-blue">Fazer Login</a>
                    </div>
                    <div class="link-row">
                        <span class="link-text">Voltar para</span>
                        <a href="cadastro.html" class="link-blue">Tipos de Cadastro</a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Lado direito - Logo -->
        <div class="register-right">
            <div class="logo-container">
                <img alt="SACIT Logo"
                    class="logo-image"
                    src="<?=URL?>/public/img/logo-sacit.png">
            </div>
        </div>
    </div>
</div>