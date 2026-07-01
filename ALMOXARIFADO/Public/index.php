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
    <link rel="stylesheet" type="text/css" href="<?=URL?>/public/css/index.css"/>
    <link rel="stylesheet" type="text/css" href="<?=URL?>/public/css/footer.css"/>
    <link rel="stylesheet" type="text/css" href="<?=URL?>/public/css/header.css"/>
    <link rel="stylesheet" type="text/css" href="<?=URL?>/public/css/sobrenos.css"/>
    <link rel="stylesheet" type="text/css" href="<?=URL?>/public/css/esqueciSenha.css"/>
    <link rel="stylesheet" type="text/css" href="<?=URL?>/public/css/cadastro.css"/>
    <link rel="stylesheet" type="text/css" href="<?=URL?>/public/css/cad-coordenador.css"/>
    <link rel="stylesheet" type="text/css" href="<?=URL?>/public/css/inicio.css"/>
    <link rel="stylesheet" type="text/css" href="<?=URL?>/public/css/inicio-servidor.css"/>
    <link rel="stylesheet" type="text/css" href="<?=URL?>/public/css/alterarSenha.css"/>
    
</head>
<body>
    <?php
    include "../App/Views/header.php";
    $rotas = new Rota();
   // $rotas->url();
    include "../App/Views/footer.php";
    ?>
    <script src="<?=URL?>/public/bootstrap/js/bootstrap.js"></script>
    <script src="<?=URL?>/public/js/query.js"></script>
</body>
</html>