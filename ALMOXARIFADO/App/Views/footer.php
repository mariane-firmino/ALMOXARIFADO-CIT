<?php if ($_SESSION['usuario_funcao'] == 1) { ?>
    <footer class="footer">
        <nav class="footer-links">
            <a href="<?=URL?>/pagina/home">Início</a>
            <a href="<?=URL?>/pagina/sobre">Sobre nós</a>
            <a href="<?=URL?>/usuarios/gerenciarPerfis">Gerenciar perfis</a>
            <a href="<?=URL?>/produtos/consultarProduto">Consultar Produto</a>
        </nav>

        <div class="footer-center">
            <img src="<?=URL?>/img/ifro-logo.webp" alt="IFRO Logo" class="footer-logo">
        </div>

        <div class="footer-contact">
            <p>Contatos:</p>
            <p>Telefone: (99) 99999-9999</p>
            <p>E-mail: algumacoisa@ifro.edu.br</p>
        </div>
    </footer>
<?php } else { ?>
    <footer class="footer">

        <nav class="footer-links">
            <a href="<?=URL?>/pagina/home">Início</a>
            <a href="<?=URL?>/pagina/sobre">Sobre nós</a>
            <a href="<?=URL?>/produtos/consultarProduto">Consultar Produto</a>
        </nav>

        <div class="footer-center">
            <img src="<?=URL?>/img/ifro-logo.webp" alt="IFRO Logo" class="footer-logo">
        </div>

        <div class="footer-contact">
            <p>Contatos:</p>
            <p>Telefone: (99) 99999-9999</p>
            <p>E-mail: algumacoisa@ifro.edu.br</p>
        </div>

    </footer>
<?php } ?>