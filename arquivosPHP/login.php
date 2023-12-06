<?php
  include ("conexao.php");

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $tipo = $_POST["tipo"];
     $email = $_POST["email"];
     $senha = $_POST["senha"];

     $email = mysqli_real_escape_string($conn,$email);
     $senha = mysqli_real_escape_string($conn,$senha);
     $mensagem = "Usuário não encontrado";

     if($tipo == 'paciente'){
        $sql_busca_usuario = "SELECT * FROM pacientes WHERE email = '$email' and senha = '$senha'";
        $sql_query = $conn->query($sql_busca_usuario);  
        
        $quantidade = $sql_query->num_rows;
  
        if($quantidade > 0)
          {
              $usuario = $sql_query->fetch_assoc();

              if(!isset($_SESSION)){
                session_start();
              }
              $_SESSION['id'] = $usuario['id'];
              $_SESSION['usuario'] = $usuario['nome_usuario'];

              header("Location: index.php");

          }else{
              echo '<script>';
              echo 'alert("'.$mensagem.'");';
              echo '</script>';
          }
    }
      elseif($tipo == 'medico') {
        $sql_busca_usuario = "SELECT * FROM medicos WHERE email = '$email' and senha = '$senha'";
        $sql_query = $conn->query($sql_busca_usuario);  
        
        $quantidade = $sql_query->num_rows;
  
        if($quantidade > 0)
          {
              $usuario = $sql_query->fetch_assoc();

              if(!isset($_SESSION)){
                session_start();
              }

              $_SESSION['id'] = $usuario['id'];
              $_SESSION['usuario'] = $usuario['nome_usuario'];

              header("Location: indexMedico.php");

          }else{
              echo '<script>';
              echo 'alert("'.$mensagem.'");';
              echo '</script>';
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
  <link href="./src/styleCadastro.css" rel="stylesheet">
</head>
<body>
  <header>
  <nav class="header">
        <ul class="listaLinks">
          <li class="ListLink">
            <a class="link" href="index.php">Home</a>
          </li>
          <li class="ListLink">
            <a class="link" href="login.php">Login</a>
          </li>
          <li class="ListLink">
            <a class="link" href="cadastro.php">Cadastro</a>
          </li>
          <li class="ListLink">
            <a class="link" href="medicos.php">Médicos</a>
          </li>
          <li class="ListLink">
          <a class="link" href="consultasagendadas.php">Minha Consultas</a>
          </li>
        </ul>
  </nav>
  </header>

  <section class="contentCadastro">
  <div class="container mt-5">
    <h2 class="text-center">Login</h2>
    <form id="cadastroLoginForm" method="post" action="">
      
      <label for="tipoUsuario">Escolha o Tipo de Usuário:</label>
      <select id="tipoUsuario" name="tipo" class="form-select" required>
        <option value="" disabled selected>Selecione o tipo de usuário</option>
        <option value="paciente">Paciente</option>
        <option value="medico">Médico</option>
      </select>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" class="form-control" required>

      <label for="senha">Senha:</label>
      <input type="password" id="senha" name="senha" class="form-control" required>
      
      <div class="btn-container">
        <button type="submit" class="btn btn-primary">Logar</button>
      </div>

      <label for="botao">Não possui uma conta?</label>
      <div class="btn-container">
      <a class="btn btn-primary" href="cadastro.php">Cadastre-se</a>
      </div>
    
    </form>
  </div>
  </section>
  <footer>
    <p> Atendimento 24 horas.</p>
    <p> Avenida Napóles - 511 - Jardim Atântico - Olinda</p>
    <p>&copy; 2023 Hospital Antonio Miguel. Todos os direitos reservados.</p>
  </footer>
</body>
</html>
