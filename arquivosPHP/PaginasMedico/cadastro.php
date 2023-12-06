<?php
include ("../src/conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tipoUsuario = $_POST["tipo"];
    $nomeUsuario = $_POST["nomeUsuario"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $msg_erro = "";

    if ($tipoUsuario == "paciente") {
        $sql_verificacao = "select email from pacientes where email = '$email'";
        $result = mysqli_query($conn, $sql_verificacao);

        if(mysqli_num_rows($result) > 0){
            echo '<script>alert("Erro ao cadastrar o usuário: E-mail já existe");</script>';
        } else {  
            $sql = "INSERT INTO pacientes (nome_Usuario, nome, email, senha, disponivel) VALUES ('$nomeUsuario', '$nome', '$email', '$senha', TRUE)";
            mysqli_query($conn, $sql);
            echo '<script>alert("Cadastro realizado com sucesso");</script>';
            echo "<script>window.location.href='login.php';</script>";
        } 
    } 
    elseif ($tipoUsuario == "medico") {
        $especialidade = $_POST["especialidade"];
        $sql_verificacao = "select email from pacientes where email = '$email'";
        $result = mysqli_query($conn, $sql_verificacao);

        if(mysqli_num_rows($result) > 0){
            echo '<script>alert("Erro ao cadastrar o usuário: E-mail já existe");</script>';
        } else {
            $sql = "INSERT INTO medicos (nome_Usuario, nome, email, senha, especialidade, disponivel) VALUES ('$nomeUsuario', '$nome', '$email', '$senha', '$especialidade',TRUE)";
            mysqli_query($conn, $sql);
            echo '<script>alert("Cadastro realizado com sucesso");</script>';
            echo "<script>window.location.href='login.php';</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Cadastro e Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../src/styleCadastro.css" rel="stylesheet">
</head>

<body>
  <header>
  <nav class="header">
        <ul class="listaLinks">
          <li class="ListLink">
            <a class="link" href="indexMedico.php">Home</a>
          </li>
          <li class="ListLink">
            <a class="link" href="login.php">Login</a>
          </li>
          <li class="ListLink">
            <a class="link" href="cadastro.php">Cadastro</a>
          </li>
          <li class="ListLink">
            <a class="link" href="#">Prontuarios</a>
          </li>
          <li class="ListLink">
            <a class="link" href="consultasagendadas.php">Minha Consultas</a>
          </li>
          <li class="ListLink">
            <a class="link" href='logout.php'>Logout</a>
          </li>
        </ul>
  </nav>
  </header>

  <section class="contentCadastro">
  <div class="container mt-5">
    <h2 class="text-center">Cadastro</h2>
    <form id="cadastroLoginForm" method="post" action="">
      <label for="tipoUsuario">Escolha o Tipo de Usuário:</label>
      <select id="tipoUsuario" name="tipo" class="form-select" required>
        <option value="" disabled selected>Selecione o tipo de usuário</option>
        <option value="paciente">Paciente</option>
        <option id="medico" value="medico">Médico</option>
      </select>

      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" class="form-control" required>

      <label for="NomeUsuario">Nome de Usuário:</label>
      <input type="text" id="nomeUsuario" name="nomeUsuario" class="form-control" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" class="form-control" required>

      <label for="senha">Senha:</label>
      <input type="password" id="senha" name="senha" class="form-control" required>

      <div id="areaMedico" class="selectMedico">
        <label for="tipoUsuario">Selecione sua especialidade:</label>
        <select id="tipoEspecialidade" name="especialidade" class="form-select">
          <option value="" disabled selected>Selecione sua especialidade</option>
          <option value="Ortopedista">Ortopedista</option>
          <option value="Geral">Clínico Geral</option>
          <option value="Cardiologista">Cardiologista</option>
          <option value="Pneumologista">Pneumologista</option>
          <option value="Ginecologista">Ginecologista</option>
          <option value="Urologista">Urologista</option>
        </select>
      </div>
      <div class="btn-container">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
      </div>
    </form>
  </div>
  </section>
  <footer>
    <p> Atendimento 24 horas.</p>
    <p> Avenida Napóles - 511 - Jardim Atântico - Olinda</p>
    <p>&copy; 2023 Hospital Antonio Miguel. Todos os direitos reservados.</p>
  </footer>

  <script>
    const inputMedico = document.getElementById('areaMedico');
    document.getElementById('tipoUsuario').addEventListener('change', function() {
      // Obter o valor selecionado
      var opcaoEscolhida = this.value;

      if(opcaoEscolhida == 'medico') {
        inputMedico.classList.remove('selectMedico');
      }else{
        inputMedico.classList.add('selectMedico');
      }
      
    });
  </script>

</body>
</html>