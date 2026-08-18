<?php
session_start();
include "./../App/configuracao.php";
include "./../App/autoload.php";

$db = new Database;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=APP_NOME?></title>
    <link rel="stylesheet" type="text/css" href="<?=URL?>/public/css/estilo.css"/>
    <link rel="stylesheet" type="text/css" href="<?=URL?>/public/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="<?=URL?>/public/css/index.css"/>
    <link rel="stylesheet" type="text/css" href="<?=URL?>/public/css/footer.css"/>
    
    <link rel="stylesheet" type="text/css" href="<?=URL?>/public/css/sobrenos.css"/>
    <link rel="stylesheet" type="text/css" href="<?=URL?>/public/css/esqueciSenha.css"/>
    <link rel="stylesheet" type="text/css" href="<?=URL?>/public/css/cadastro.css"/>
    <link rel="stylesheet" type="text/css" href="<?=URL?>/public/css/cadastrarProduto.css"/>
    <link rel="stylesheet" type="text/css" href="<?=URL?>/public/css/cadCoordenador.css"/>
    <link rel="stylesheet" type="text/css" href="<?=URL?>/public/css/inicio.css"/>
    <link rel="stylesheet" type="text/css" href="<?=URL?>/public/css/alterarSenha.css"/>
    <link rel="stylesheet" type="text/css" href="<?=URL?>/public/css/perfil.css"/>
    <link rel="stylesheet" type="text/css" href="<?=URL?>/public/css/editarPerfil.css"/>
    <link rel="stylesheet" type="text/css" href="<?=URL?>/public/css/historico.css"/>
    <link rel="stylesheet" type="text/css" href="<?=URL?>/public/css/notify.css"/>
    <link rel="stylesheet" type="text/css" href="<?=URL?>/public/css/estoque.css"/>
    <link rel="stylesheet" type="text/css" href="<?= URL ?>/public/css/consultarProd.css">
    <link rel="stylesheet" type="text/css" href="<?= URL ?>/public/css/realizarSolicitacao.css">
    <link rel="stylesheet" type="text/css" href="<?= URL ?>/public/css/gerenciarPerfis.css">
    <link rel="stylesheet" type="text/css" href="<?= URL ?>/public/css/analisarSoli.css">
    <link rel="stylesheet" type="text/css" href="<?= URL ?>/public/css/detalharProduto.css">
    <link rel="stylesheet" type="text/css" href="<?= URL ?>/public/css/prodControlar.css">
    <link rel="stylesheet" type="text/css" href="<?= URL ?>/public/css/home2.css">
    

    <link rel="stylesheet" type="text/css" href="<?=URL?>/public/css/header.css"/>
    
</head>
<body>
    <?php
    //include "../App/Views/header.php";
    $rotas = new Rota();
   // $rotas->url();
    //include "../App/Views/footer.php";
    ?>
    <script src="<?=URL?>/public/bootstrap/js/bootstrap.js"></script>
    <script src="<?=URL?>/public/js/query.js"></script>
</body>

<script src="<?=URL?>/public/js/adicionarImg.js"></script>
<script src="<?=URL?>/public/js/consultarProduto.js"></script>
<script src="<?=URL?>/public/js/datas.js"></script>
<script src="<?=URL?>/public/js/senha.js"></script>
<script src="<?=URL?>/public/js/senha.js"></script>
<script src="<?=URL?>/public/js/excluir.js"></script>
<script src="<?=URL?>/public/js/confirmacao.js"></script>
<script src="<?=URL?>/public/js/forms.js"></script>
<script src="<?=URL?>/public/js/imagem.js"></script>
<script src="<?=URL?>/public/js/imagem2.js"></script>
</html>