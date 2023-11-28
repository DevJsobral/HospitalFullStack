<?php
include("conexao.php");

// Verifica se o formulário foi enviado

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["tipo"])) {
        // Obtém o valor selecionado do elemento 'tipo'
        $tipo = $_POST["tipo"];
        echo $tipo;
        // Verifica o valor selecionado
        // if ($tipo == "medico") {
        //     echo "Você selecionou a opção Médico.";
        // } else {
        //     echo "Você selecionou a opção Paciente.";
        // }
    }

    // Obtém os dados do formulário
//     $tipo = $_POST["tipo"];
//     $nomeUsuario = $_POST["nomeUsuario"];
//     $nome = $_POST["nome"];
//     $email = $_POST["email"];
//     $senha = $_POST["senha"];
//     $ativacao = isset($_POST["ativacao"]) ? 1 : 0; // Converte a checkbox em 1 (verdadeiro) ou 0 (falso)

//     // Create connection
//     $conn = new mysqli($servername, $username, $password, $database);

//     // Check connection
//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//     }

//     if ($tipo == "medico") {
//         echo "estou aqui";

//         $query_medicos = "SELECT nome_usuario FROM medicos WHERE nome_usuario = ?";
//         $check_medicos = $conn->prepare($query_medicos);
//         $check_medicos->bind_param("s", $nome_usuario_check_medicos);
//         $nome_usuario_check_medicos = $nomeUsuario;
//         $check_medicos->execute();
//         $check_medicos->store_result();
    
//         if ($check_medicos->num_rows > 0) {
//             echo "Erro: O nome de usuário já existe para médicos. Escolha outro nome de usuário.";
//             $check_medicos->close();
//             $conn->close();
//             exit;
//         }
    
//         $check_medicos->close();

//         $query_email_medicos = "SELECT * FROM medicos WHERE email = ?";
//         $check_email_medicos = $conn->prepare($query_email_medicos);
//         $check_email_medicos->bind_param("s", $email_medicos);
//         $email_medicos = $email;
//         $check_email_medicos->execute();
//         $check_email_medicos->store_result();

//     if ($check_email_medicos->num_rows > 0) {
//         echo "Erro: O email já existe para médicos. Escolha outro email válido.";
//         $check_email_medicos->close();
//         $conn->close();
//         exit;
//     }

//     $check_email_medicos->close();

//     $stmt = $conn->prepare("INSERT INTO medicos (nome_usuario, nome, email, senha, ativacao) VALUES (?, ?, ?, ?, ?)");
//     $stmt->bind_param("ssssi", $nomeUsuario, $nome, $email, $senha, $ativacao);
//     }
//     else {
//         echo "estou aqui 2";
//         // Verifica se o nome de usuário já existe para pacientes
//     $query_pacientes = "SELECT nome_usuario FROM pacientes WHERE nome_usuario = ?";
//     $check_pacientes = $conn->prepare($query_pacientes);
//     $check_pacientes->bind_param("s", $nome_usuario_check_pacientes);
//     $nome_usuario_check_pacientes = $nomeUsuario;
//     $check_pacientes->execute();
//     $check_pacientes->store_result();

//     if ($check_pacientes->num_rows > 0) {
//         echo "Erro: O nome de usuário já existe para pacientes. Escolha outro nome de usuário.";
//         $check_pacientes->close();
//         $conn->close();
//         exit;
//     }

//     $check_pacientes->close();

//     $query_email_pacientes = "SELECT * FROM pacientes WHERE email = ?";
//     $check_email_pacientes = $conn->prepare($query_email_pacientes);
//     $check_email_pacientes->bind_param("s", $email_pacientes);
//     $email_pacientes = $email;
//     $check_email_pacientes->execute();
//     $check_email_pacientes->store_result();

//     if ($check_email_pacientes->num_rows > 0) {
//         echo "Erro: O email de usuário já existe para pacientes. Escolha outro nome de usuário.";
//         $check_email_pacientes->close();
//         $conn->close();
//         exit;
//     }

//     $check_email_pacientes->close();
//     $stmt = $conn->prepare("INSERT INTO pacientes (nome_usuario, nome, email, senha, ativacao) VALUES (?, ?, ?, ?, ?)");
//     $stmt->bind_param("ssssi", $nomeUsuario, $nome, $email, $senha, $ativacao);
// }

// // Set the parameters and execute the statement
// if ($stmt->execute()) {
//     echo "Novo registro criado com sucesso";
// } else {
//     echo "Erro ao cadastrar: " . $stmt->error;
// }

// // Close statement and connection
// $stmt->close();
$conn->close();
}
?>