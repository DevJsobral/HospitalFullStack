<?php
  if(!isset($_SESSION)){
    session_start();
}
$mensagemBemVindo = "";
  if(isset($_SESSION['usuario'])){
    $mensagemBemVindo = 
    '<li class="ListLink">
      <p>Bem vindo: ' . $_SESSION['usuario'] . '</p>
    </li>';
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="./src/style.css" rel="stylesheet">
  <title>Hospital Antonio Miguel</title>
</head>
<body>
<header>
  <nav class="header">
        <ul class="listaLinks">
          <?php echo $mensagemBemVindo; ?>
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
    <div class="row">
      <div class="col-lg-6">
        <h1>Hospital Antonio Miguel</h1>
        <p>Prestação de serviços de saúde de qualidade.</p>
        <a href="agendaconsulta.php" class="btn btn-primary">Agende Sua Consulta</a>
      </div>
      <div class="col-lg-6">
        <img src="./src/medicoyoung.png" alt="Hospital Image" class="img-fluid">
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <h2>Nossos Serviços</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="card">
            <h5 class="card-title">Cardiologia</h5>
            <p class="card-text">Diagnóstico e tratamento das doenças que acometem o coração bem como os outros componentes do sistema circulatório.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
            <h5 class="card-title">Ortopedia</h5>
            <p class="card-text">Foco em diagnosticar, tratar e prevenir lesões e disfunções ligadas à locomoção.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
            <h5 class="card-title">Clínico Geral</h5>
            <p class="card-text"> Trata e previne diversas condições de saúde em pacientes de todas as idades.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
            <h5 class="card-title">Pneumologista</h5>
            <p class="card-text">A pneumologia trata de doenças respiratórias, como asma e pneumonia. Pneumologistas focam na saúde dos pulmões.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
            <h5 class="card-title">Ginecologista</h5>
            <p class="card-text">Trata da saúde feminina, abordando questões como menstruação, gravidez e saúde sexual. Ginecologistas focam no sistema reprodutivo.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
            <h5 class="card-title">Urologista</h5>
            <p class="card-text">Trata do sistema urinário e do sistema reprodutivo masculino. Urologistas diagnosticam, tratam e previnem condições como infecções do trato urinário, pedras nos rins, disfunção erétil e câncer de próstata.</p>
        </div>
      </div>
    </div>
  </div>

  <footer class="bg-light text-center py-3 custom-footer">
    <p> Atendimento 24 horas.</p>
    <p> Avenida Napóles - 511 - Jardim Atântico - Olinda</p>
    <p>&copy; 2023 Hospital Antonio Miguel. Todos os direitos reservados.</p>
  </footer>

  <!-- Bootstrap JS and Popper.js (required for Bootstrap JavaScript plugins) -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
</body>
</html>

