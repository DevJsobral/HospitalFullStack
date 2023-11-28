<?php
include ("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tipoUsuario = $_POST["tipo"];
    $nomeUsuario = $_POST["nomeUsuario"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];



    if ($tipoUsuario == "paciente") {
        $sql_verificacao = "select email from pacientes where email = '$email'";

        if(isset($sql_verificacao)){
            echo"Email não existe cadastrado com sucesso";
        } else {
            echo "Email já existe";
            die;
        }

        $sql = "INSERT INTO pacientes (nome_Usuario, nome, email, senha) VALUES ('$nomeUsuario', '$nome', '$email', '$senha')";
    } elseif ($tipoUsuario == "medico") {
        $sql = "INSERT INTO medicos (nome_Usuario, nome, email, senha) VALUES ('$nomeUsuario', '$nome', '$email', '$senha')";
    }

    
    if (mysqli_query($conn, $sql)) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o usuário: " . mysqli_error($conexao);
    }
}



?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Consulta Médica - Hospital Antonio Miguel</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e1d6cb; /* Bege claro */
            color: #952f57; /* Marrom escuro */
        }

        header {
            background-color: #952f57; /* Marrom */
            color: #fff;
            text-align: center;
            padding: 1em;
        }

        section {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            margin-bottom: 8px;
        }

        input,
        select {
            padding: 8px;
            margin-bottom: 16px;
        }

        button {
            padding: 10px;
            background-color: #952f57; /* Marrom escuro */
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button.consulta-button {
            background-color: #8d6e63; /* Marrom médio */
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <header>
        <h1>Hospital Antonio Miguel - Consulta Médica</h1>
    </header>

    <section>
        <h2>Cadastro e Login</h2>
        <form method="post" action="">
            <label for="tipoUsuario">Escolha o Tipo de Usuário:</label>
            <select id="tipoUsuario" name="tipo">
                <option value="paciente">Paciente</option>
                <option value="medico">Médico</option>
            </select>

            <label for="nomeUsuario">Nome de Usuário:</label>
            <input type="text" id="nomeUsuario" name="nomeUsuario">

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email">

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha">

            <button type="submit">Cadastrar</button>
        </form>

    </section>
    </body>
</html>