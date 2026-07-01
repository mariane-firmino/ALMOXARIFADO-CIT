
<div class="register-container">
    <div class="register-wrapper">
        <!-- Lado esquerdo - Formulário de cadastro -->
        <div class="register-left">
            <h1 class="register-title">Cadastro de Coordenador</h1>            
            <form class="register-form" action="<?= URL ?>/usuarios/cadCoordenador" method="POST">
                <div class="form-group">
                    <label class="form-label">Nome Completo</label>
                    <input type="text" class="form-input" name="nome" placeholder="Nome Completo" class='form-control <?= $dados['nome_erro'] ? 'is-invalid' : '' ?>'>
                     <div class='invalid-feedback'>
                        <?= $dados['nome_erro'] ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">E-mail</label>
                    <input type="email" class="form-input" name="email" placeholder="digiteseuemail@exemplo.com"  class='form-control <?= $dados['email_erro'] ? 'is-invalid' : '' ?>'>
                     <div class='invalid-feedback'>
                        <?= $dados['email_erro'] ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group half">
                        <label class="form-label">SIAP</label>
                        <input type="text" class="form-input" name="siap" placeholder="00000000">
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
                    <label class="form-label">Nr Celular</label>
                    <input type="tel" class="form-input" name="celular" placeholder="(99) 9999-9999">
                </div>

                <div class="form-row">
                    <div class="form-group half">
                        <label class="form-label">Senha</label>
                        <input type="password" class="form-input" name="senha" placeholder="Digite sua senha"class='form-control  <?= $dados['senha_erro'] ? 'is-invalid' : '' ?>'>
                         <div class='invalid-feedback'>
                            <?= $dados['senha_erro'] ?>
                        </div>
                    </div>
                    <div class="form-group half">
                        <label class="form-label">Confirmar Senha</label>
                        <input type="password" class="form-input" name="confirma_senha" placeholder="Confirme sua senha"class='form-control  <?= $dados['confirma_senha_erro'] ? 'is-invalid' : '' ?>'>
                         <div class='invalid-feedback'>
                            <?= $dados['confirma_senha_erro'] ?>
                        </div>
                    </div>
                </div>

                <button type="submit" class="submit-btn">
                    <span class="submit-text">Enviar</span>
                </button>

                <div class="footer-links">
                    <div class="link-row">
                        <span class="link-text">Já tem login?</span>
                        <a href="<?= URL ?>/usuarios/login" class="link-blue">Login</a>
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
                <img alt="SACIT Logo" class="logo-image" src="<?= URL ?>/public/img/logo-sacit.png">
            </div>
        </div>
    </div>
</div>