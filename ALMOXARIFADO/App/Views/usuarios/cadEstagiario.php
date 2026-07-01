<div class="register-container">
    <div class="register-wrapper">
        <!-- Lado esquerdo - Formulário de cadastro -->
        <div class="register-left">
            <h1 class="register-title">Cadastro de Estagiário</h1>

            <form class="register-form" action="<?= URL ?>/usuarios/cadEstagiario" method="post">
                <div class="form-group">
                    <label class="form-label">Nome Completo</label>
                    <input type="text" class="form-input" name="nome" placeholder="Nome Completo">
                </div>

                <div class="form-group">
                    <label class="form-label">E-mail Institucional</label>
                    <input type="email" class="form-input" name="email" placeholder="seuemail@instituicao.edu.br">
                </div>

                <div class="form-row">
                    <div class="form-group half">
                        <label class="form-label">Matrícula</label>
                        <input type="text" class="form-input" name="matricula" placeholder="00000000">
                    </div>
                    <div class="form-group half">
                        <label class="form-label">Curso</label>
                        <select class="form-input" name="curso">
                            <option value="">Selecione o curso</option>
                            <option value="Técnico em Informática">Informática</option>
                            <option value="Técnico em Biotecnologia">Biotecnologia</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group half">
                        <label class="form-label">Ano</label>
                        <select class="form-input" name="ano">
                            <option value="">Selecione o ano</option>
                            <option value="1">1º Ano</option>
                            <option value="2">2º Ano</option>
                            <option value="3">3º Ano</option>
                        </select>
                    </div>
                    <div class="form-group half">
                        <label class="form-label">Telefone</label>
                        <input type="tel" class="form-input" name="celular" placeholder="(99) 99999-9999">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group half">
                        <label class="form-label">Senha</label>
                        <input type="password" class="form-input" name="senha" placeholder="Digite sua senha">
                    </div>
                    <div class="form-group half">
                        <label class="form-label">Confirmar Senha</label>
                        <input type="password" class="form-input" name="confirma_senha" placeholder="Confirme sua senha">
                    </div>
                </div>

                <button type="submit" class="submit-btn">
                    <span class="submit-text">Cadastrar</span>
                </button>

                <div class="footer-links">
                    <div class="link-row">
                        <span class="link-text">Já tem conta?</span>
                        <a href="<?= URL ?>/usuarios/login" class="link-blue">Fazer Login</a>
                    </div>
                    <div class="link-row">
                        <span class="link-text">Voltar para</span>
                        <a href="<?= URL ?>/usuarios/cadastrar" class="link-blue">Tipos de Cadastro</a>
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