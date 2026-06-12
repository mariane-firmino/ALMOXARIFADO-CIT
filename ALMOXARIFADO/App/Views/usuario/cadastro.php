<div class="register-container">
    <div class="register-wrapper">
        <!-- Lado esquerdo - Opções de Cadastro -->
        <div class="register-left">
            <h1 class="register-title">Cadastro</h1>

            <form action="<?= URL ?>/usuario/cadastrar" method="POST" class="register-form">
            <div class="register-options">
                <a class="register-btn" href="<?= URL ?>/usuario/cadServidor">
                    <span class="register-btn-text">Servidor</span>
                </a>
                <a class="register-btn" href="<?= URL ?>/usuario/cadCoordenador">
                    <span class="register-btn-text">Coordenador</span>
                </a>
                <a class="register-btn" href="<?= URL ?>/usuario/cadEstagiario">
                    <span class="register-btn-text">Estagiário</span>
                </a>
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