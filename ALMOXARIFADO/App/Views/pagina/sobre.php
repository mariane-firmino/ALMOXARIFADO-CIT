<?php
include "../App/Views/header.php";
?>
<div class="page">
    <main class="content">
        <header class="page-header">
            <div class="header-title">
                <span class="title-flag"></span>
                <div>
                    <h1>Sobre Nós</h1>
                    <p>Conheça as desenvolvedoras e o motivo por trás do sistema.</p>
                </div>
            </div>
            <img src="<?= URL ?>/public/img/logo-sacit.png" alt="SACIT" class="brand-logo">
        </header>

        <section class="hero-text">
            <p>O SACIT nasceu da necessidade de organizar o almoxarifado do CIT com mais eficiência, controle e
                transparência. Criado por desenvolvedoras apaixonadas por tecnologia e usabilidade, o sistema foi
                pensado para simplificar processos e oferecer um fluxo intuitivo para todos os usuários.</p>
        </section>

        <section class="team-grid">
            <article class="team-card">
                <div class="team-image">
                    <img src="img/usuario.png" alt="Desenvolvedora 1">
                </div>
                <p class="team-name">Desenvolvedora 1</p>
                <p class="team-role">Front-end / UX</p>
                <p class="team-description">Descrição completa sobre a função da desenvolvedora e seu papel no
                    projeto.</p>
            </article>
            <article class="team-card">
                <div class="team-image">
                    <img src="img/usuario.png" alt="Desenvolvedora 2">
                </div>
                <p class="team-name">Desenvolvedora 2</p>
                <p class="team-role">Back-end / Dados</p>
                <p class="team-description">Descrição completa sobre a função da desenvolvedora e o que trouxe para
                    o sistema.</p>
            </article>
        </section>

        <section class="story-section">
            <h2>Por que criamos o SACIT?</h2>
            <p>O objetivo foi construir uma solução que permitisse ao IFRO controlar melhor os estoques, reduzir
                perdas e facilitar a consulta de produtos.</p>
            <p>O sistema também serve como uma base de estudos para futuras melhorias, trazendo flexibilidade para
                novas funcionalidades e relatórios mais completos.</p>
        </section>

        <section class="story-section">
            <h2>Como foi o desenvolvimento</h2>
            <p>A jornada envolveu pesquisa, prototipagem e validação com usuários reais. A cada iteração, focamos em
                melhorar a clareza visual e a facilidade de navegação.</p>
            <p>A experiência final entrega um painel agradável, com navegação simples e informações práticas para
                todas as equipes.</p>
        </section>


    </main>
</div>
<?php
include "../App/Views/footer.php";
?>