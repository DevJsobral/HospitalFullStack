<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teste01";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Obtém os dados do formulário
    $tipo = $_POST["tipo"];
    $nomeUsuario = $_POST["nomeUsuario"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];


   
    // Verifica se o email ou o nome de usuário já existem na tabela correspondente
    $tabela = ($tipo == "medico") ? "medico" : "paciente";
    $verificaQuery = "SELECT * FROM $tabela WHERE email='$email' OR nome_usuario='$nomeUsuario'";
    $result = $conn->query($verificaQuery);

    if ($result->num_rows > 0) {
        // Já existe um registro com o mesmo email ou nome de usuário
        echo "<script>alert('Email ou nome de usuário já cadastrado. Por favor, escolha outro.');</script>";
    } else {
        // Insere os dados na tabela correspondente
        $inserirQuery = "INSERT INTO $tabela (nome_usuario, nome, email, senha) VALUES ('$nomeUsuario', '$nome', '$email', '$senha')";

        if ($conn->query($inserirQuery) === TRUE) {
            echo "<script>alert('Cadastro realizado com sucesso.');</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar.');</script>";
        }
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>