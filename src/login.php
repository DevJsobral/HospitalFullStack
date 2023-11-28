<?php
include("conexao.php");

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtém os dados do formulário
    $tipo = $_POST["tipo"];
    $nome_usuario = $_POST["nome_usuario"];
    $senha = $_POST["senha"];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Determine a tabela com base no tipo selecionado
    $tabela = ($tipo === "paciente") ? "pacientes" : (($tipo === "medico") ? "medicos" : "");

    if (empty($tabela)) {
        // Tipo inválido
        echo "Erro: Tipo de usuário inválido.";
        $conn->close();
        exit;
    }

    // Verifica se o nome de usuário existe na tabela correspondente
    $query = "SELECT * FROM $tabela WHERE nome_usuario = ?";
    $check_usuario = $conn->prepare($query);
    $check_usuario->bind_param("s", $nome_usuario_check);
    $nome_usuario_check = $nome_usuario;
    $check_usuario->execute();
    $result_usuario = $check_usuario->get_result();

    if ($result_usuario->num_rows > 0) {
        // Usuário encontrado na tabela correspondente, verificar senha
        $row = $result_usuario->fetch_assoc();
        if (password_verify($senha, $row["senha"])) {
            // Senha correta, login bem-sucedido
            echo "Login bem-sucedido como $tipo.";
        } else {
            echo "Erro: Senha incorreta para $tipo.";
        }
    } else {
        echo "Erro: Nome de usuário não encontrado.";
    }

    $check_usuario->close();
    $conn->close();
}
?>
