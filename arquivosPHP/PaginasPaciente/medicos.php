<?php
include("../src/conexao.php");

$medicos = "";
$exibirMedicos = "SELECT * FROM medicos";
$result = $conn->query($exibirMedicos);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $medicos .= 
      '<div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">' . $row['nome'] . '</h5>
                <p class="card-text">' . $row['especialidade'] . '</p>
                <p class="card-text">Contato: ' . $row['email'] . '@antonioMiguel.com</p>
                <p class="card-text">Horário de Atendimento: Seg a Sex, 09h-18h</p>
                <a href="agendaconsulta.php" class="btn btn-primary">Agendar Consulta</a>
            </div>
        </div>
    </div>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Hospital Antonio Miguel - Médicos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body{
      height: 100%;
    }
    .container {
      min-height: 80vh;
    }
    .header {
            padding: 25px;
            background-color: #8cc6ec;
        }
        .listaLinks {
            padding-left: 4rem;
            display: flex;
            flex-direction: row;
            list-style-type: none;
            margin-bottom: 0;
        }
        .ListLink{
            margin-right: 15px;
        }
        .link {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
        h2 {
          padding-bottom: 40px;
        }
        .card {
          margin-bottom: 35px;
        }
        footer {
            bottom: 0;
            background-color: #8cc6ec; 
            color: #000000; 
            text-align: center; 
            padding: 10px; 
            width: 100%; 
        }
  </style>
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
          <li class="ListLink">
            <a class="link" href='logout.php'>Logout</a>
          </li>
        </ul>
  </nav>
</header>
  <div class="container mt-5">
    <h2>Nossos Médicos</h2>
    <div class="row">
        <?php echo $medicos ?>
    </div>
  </div>
    <footer>
      <p> Atendimento 24 horas.</p>
      <p> Avenida Napóles - 511 - Jardim Atântico - Olinda</p>
      <p>&copy; 2023 Hospital Antonio Miguel. Todos os direitos reservados.</p>
    </footer>
  
    <!-- Bootstrap JS and Popper.js (required for Bootstrap JavaScript plugins) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
  </body>
  </html>