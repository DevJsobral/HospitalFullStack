<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "teste01";

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha ao conectar: " . $conn->connect_error);
} else {
    echo "Conexão bem-sucedida";
}

// Resto do código...

// Fechando a conexão
// $conn->close();
?>
