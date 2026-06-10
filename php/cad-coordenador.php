<?php
# mysqli

$servidor = "localhost";
$usuario = "root";
$senha = "";
$database = "bd_almoxarifado";
$porta = "3307";

# conexão com banco de dados MySQL ***************************************
$conexao = mysqli_connect($servidor, $usuario, $senha, $database, $porta);

# testando conexão
if($conexao){
    echo '<br>Conectado com sucesso';
} else{
    echo 'Erro ao conectar';
}


?>