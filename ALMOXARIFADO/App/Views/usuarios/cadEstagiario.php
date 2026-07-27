<div class="register-container">
    <div class="register-wrapper">
        <div class="register-left">
            <h1 class="register-title">Cadastro de Estagiário</h1>

            <?= Sessao::mensagem('usuario') ?>

            <form class="register-form" action="<?= URL ?>/usuarios/cadEstagiario" method="post">
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
                        <label class="form-label">Matrícula</label>

                        <input
                            type="text"
                            name="matricula"
                            class="form-input <?= !empty($dados['matricula_erro']) ? 'is-invalid' : '' ?>"
                            placeholder="0000000000"
                            value="<?= isset($dados['matricula']) ? $dados['matricula'] : '' ?>"
                            required>

                        <?php if (!empty($dados['matricula_erro'])) : ?>
                            <div class="invalid-feedback">
                                <?= $dados['matricula_erro'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group half">
                        <label class="form-label">Curso</label>

                        <select
                            class="form-input <?= !empty($dados['curso_erro']) ? 'is-invalid' : '' ?>"
                            name="curso"
                            required>

                            <option value="">Selecionar curso</option>

                            <option value="Técnico em Informática"
                                <?= (isset($dados['curso']) && $dados['curso'] == "Técnico em Informática") ? 'selected' : '' ?>>
                                Informática
                            </option>

                            <option value="Técnico em Biotecnologia"
                                <?= (isset($dados['curso']) && $dados['curso'] == "Técnico em Biotecnologia") ? 'selected' : '' ?>>
                                Biotecnologia
                            </option>

                        </select>

                        <?php if (!empty($dados['curso_erro'])) : ?>
                            <div class="invalid-feedback">
                                <?= $dados['curso_erro'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-row">
                        <div class="form-group half">
                            <label class="form-label">Ano</label>

                            <select
                                name="ano"
                                class="form-input <?= !empty($dados['ano_erro']) ? 'is-invalid' : '' ?>"
                                required>
                                <option value="">Selecione o ano</option>
                                <option value="1"
                                    <?= (isset($dados['ano']) && $dados['ano'] == 1) ? 'selected' : '' ?>>
                                    1º Ano
                                </option>
                                <option value="2"
                                    <?= (isset($dados['ano']) && $dados['ano'] == 2) ? 'selected' : '' ?>>
                                    2º Ano
                                </option>
                                <option value="3"
                                    <?= (isset($dados['ano']) && $dados['ano'] == 3) ? 'selected' : '' ?>>
                                    3º Ano
                                </option>
                            </select>

                            <?php if (!empty($dados['ano_erro'])) : ?>
                                <div class="invalid-feedback">
                                    <?= $dados['ano_erro'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group half">
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
                    </div>
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

                <div class="cad-footer-links">
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