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

# trazendo os dados do form ***************************
$nomeServ = $_POST['nomeUsuario'];
$emailServ = $_POST['emailUsuario'];
$siapServ = $_POST['siapUsuario'];
$setorServ = $_POST['setorServidor'];
$telefoneServ = $_POST['telefoneUsuario'];
$senha1 = $_POST['senha1'];
$senha2 = $_POST['senha2'];
$funcao = 'Servidor';

if($senha1 == $senha2){
    echo '<br>Senhas Corretas!';
    $senha = $senha2;
} else {
    echo '<br>Senhas Diferentes';
}

# inserir dados na tabela usuário *************************

# dados do setor
$querySetor = "SELECT seto_id FROM setor WHERE seto_nome = '$setorServ'";
$resultado = mysqli_query($conexao, $querySetor);
$dados = mysqli_fetch_assoc($resultado);

$seto_id = $dados['seto_id'];


# dados do usuário
$query = "INSERT INTO usuario(usua_nome, usua_siap, usua_senha, seto_id) VALUES('$nomeServ', '$siapServ', '$senha', '$seto_id')";

$executar = mysqli_query($conexao, $query);
if($executar){
    echo '<br>Dado inserido com sucesso, usuario';
} else {
    echo mysqli_error($conexao);
}
$usua_id = mysqli_insert_id($conexao);

# dados email
$queryEmail = "INSERT INTO email(emai_nome, usua_id) VALUES('$emailServ', '$usua_id')";

$executar = mysqli_query($conexao, $queryEmail);
if($executar){
    echo '<br>Dado inserido com sucesso, email';
} else {
    echo mysqli_error($conexao);
}

# dados do telefone
$queryTelefone = "INSERT INTO telefone(tele_numero, usua_id) VALUES('$telefoneServ', '$usua_id')";

$executar = mysqli_query($conexao, $queryTelefone);
if($executar){
    echo '<br>Dado inserido com sucesso, telefone';
} else {
    echo mysqli_error($conexao);
}


?>