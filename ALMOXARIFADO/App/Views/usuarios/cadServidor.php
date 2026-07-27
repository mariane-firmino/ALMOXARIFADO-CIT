<div class="register-container">
    <div class="register-wrapper">
        <!-- Lado esquerdo - Formulário de cadastro -->
        <div class="register-left">
            <h1 class="register-title">Cadastro de Servidor</h1>

            <?= Sessao::mensagem('usuario') ?>

            <form class="register-form" action="<?= URL ?>/usuarios/cadServidor" method="post">
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

                <div class="cad-footer-links">
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
                    src="<?= URL ?>/public/img/logo-sacit.png">
            </div>
        </div>
    </div>
</div>

<div class="register-container">
    <div class="register-wrapper">
        <div class="register-left">
            <h1 class="register-title">Cadastro de Servidor</h1>

            <form class="register-form" action="<?= URL ?>/usuarios/cadServidor" method="post">
                <div class="form-group">
                    <label class="form-label">Nome Completo</label>

                    <input
                        type="text"
                        name="nome"
                        class="form-input <?= !empty($dados['nome_erro']) ? 'is-invalid' : '' ?>"
                        placeholder="Digite seu nome completo"
                        value="<?= isset($dados['nome']) ? $dados['nome'] : '' ?>"
                        required>

                    <?php if (!empty($dados['nome_erro'])) : ?>
                        <div class="invalid-feedback">
                            <?= $dados['nome_erro'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label class="form-label">E-mail Institucional</label>

                    <input
                        type="email"
                        name="email"
                        class="form-input <?= !empty($dados['email_erro']) ? 'is-invalid' : '' ?>"
                        placeholder="Digite seu e-mail institucional"
                        value="<?= isset($dados['email']) ? $dados['email'] : '' ?>"
                        required>

                    <?php if (!empty($dados['email_erro'])) : ?>
                        <div class="invalid-feedback">
                            <?= $dados['email_erro'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-row">
                    <div class="form-group half">
                        <label class="form-label">SIAPE</label>

                        <input
                            type="text"
                            name="siap"
                            class="form-input <?= !empty($dados['siap_erro']) ? 'is-invalid' : '' ?>"
                            placeholder="0000000"
                            value="<?= isset($dados['siap']) ? $dados['siap'] : '' ?>"
                            required>

                        <?php if (!empty($dados['siap_erro'])) : ?>
                            <div class="invalid-feedback">
                                <?= $dados['siap_erro'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group half">
                        <label class="form-label">Setor</label>

                        <select
                            class="form-input <?= !empty($dados['setor_erro']) ? 'is-invalid' : '' ?>"
                            name="setor"
                            required>

                            <option value="">Selecionar setor</option>
                            <option value="2"
                                <?= (isset($dados['setor']) && $dados['setor'] == 2) ? 'selected' : '' ?>>
                                CIT
                            </option>
                            <option value="3"
                                <?= (isset($dados['setor']) && $dados['setor'] == 3) ? 'selected' : '' ?>>
                                DAPE
                            </option>

                        </select>

                        <?php if (!empty($dados['setor_erro'])) : ?>
                            <div class="invalid-feedback">
                                <?= $dados['setor_erro'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Telefone</label>

                    <input
                        type="tel"
                        name="celular"
                        class="form-input <?= !empty($dados['celular_erro']) ? 'is-invalid' : '' ?>"
                        placeholder="(99) 99999-9999"
                        value="<?= isset($dados['celular']) ? $dados['celular'] : '' ?>"
                        required>

                    <?php if (!empty($dados['celular_erro'])) : ?>
                        <div class="invalid-feedback">
                            <?= $dados['celular_erro'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-row">
                    <div class="form-group half">
                        <label class="form-label">Senha</label>

                        <input
                            type="password"
                            name="senha"
                            class="form-input <?= !empty($dados['senha_erro']) ? 'is-invalid' : '' ?>"
                            placeholder="Digite sua senha"
                            required>

                        <?php if (!empty($dados['senha_erro'])) : ?>
                            <div class="invalid-feedback">
                                <?= $dados['senha_erro'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group half">
                        <label class="form-label">Confirmar Senha</label>

                        <input
                            type="password"
                            name="confirma_senha"
                            class="form-input <?= !empty($dados['confirma_senha_erro']) ? 'is-invalid' : '' ?>"
                            placeholder="Confirme sua senha"
                            required>

                        <?php if (!empty($dados['confirma_senha_erro'])) : ?>
                            <div class="invalid-feedback">
                                <?= $dados['confirma_senha_erro'] ?>
                            </div>
                        <?php endif; ?>
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
                        <a href="<?= URL ?>/usuarios/cadastrar" class="link-blue">Tipos de Usuários</a>
                    </div>
                </div>
            </form>
        </div>

        <div class="register-right">
            <div class="logo-container">
                <img alt="SACIT Logo" class="logo-image" src="<?= URL ?>/public/img/logo-sacit.png">
            </div>
        </div>
    </div>
</div>