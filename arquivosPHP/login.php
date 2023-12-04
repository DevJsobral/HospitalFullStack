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
        $sql_busca_usuario = "SELECT email,senha FROM pacientes WHERE email = '$email' and senha = '$senha'";
        $result = mysqli_query($conn, $sql_busca_usuario);    
        if($result){
            if(mysqli_num_rows($result) > 0)
            {
                echo '<script>alert("USUÁRIO ENCONTRADO");</script>';
            }else{
                echo '<script>';
                echo 'alert("'.$mensagem.'");';
                echo '</script>';
            }
        }  
    }
      elseif($tipo == 'medico') {
        $sql_busca_usuario = "SELECT email,senha FROM medicos WHERE email = '$email' and senha = '$senha'";
        $result = mysqli_query($conn, $sql_busca_usuario);
        if($result){
            if(mysqli_num_rows($result) > 0)
            {
                echo '<script>alert("USUÁRIO ENCONTRADO");</script>';
            } else{
                echo '<script>';
                echo 'alert("'.$mensagem.'");';
                echo '</script>';
            }
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
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #ffffff;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: space-between;
      min-height: 100vh;
      margin: 0;
    }

    .container {
      max-width: 400px;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-top: 20px;
    }

    form {
      margin-top: 20px;
    }

    label {
      display: block;
      margin-top: 10px;
    }

    input,
    select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      margin-bottom: 15px;
      box-sizing: border-box;
    }

    .btn-container {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    button {
      padding: 10px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 14px;
    }

    #camposMedico {
      display: none;
    }

    /* Estilos para o navbar personalizado */
    .custom-navbar {
      background-color: #3498db !important; /* Cor do navbar */
    }
    
    .custom-footer {
      background-color: #8cc6ec !important; 
      color: #000000; 
      text-align: center; 
      padding: 10px; 
      width: 100%; 
    }
  </style>
</head>
<body> 
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
    </form>
  </div>

  <footer class="bg-light text-center py-3 custom-footer">
    <p> Atendimento 24 horas.</p>
    <p> Avenida Napóles - 511 - Jardim Atântico - Olinda</p>
    <p>&copy; 2023 Hospital Antonio Miguel. Todos os direitos reservados.</p>
  </footer>
</body>
</html>
