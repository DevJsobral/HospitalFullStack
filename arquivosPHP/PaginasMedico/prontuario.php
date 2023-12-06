<?php
include ("../src/conexao.php");

include("../src/protect.php");

$agendamentos = "";
$sqlConsultas = "SELECT * FROM prontuarios WHERE id_medico = $_SESSION[id]";
$result = $conn->query($sqlConsultas);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      
      $idMedico = $row['id_medico'];
      $idPaciente = $row['id_paciente'];
    
      $sqlConsultaNomeMedico = "SELECT nome FROM medicos WHERE id = $idMedico";
      $sqlConsultaNomePaciente = "SELECT nome FROM pacientes WHERE id_paciente = $idPaciente";

      $resultadoNomeMedico = $conn->query($sqlConsultaNomeMedico);
      $resultadoNomePaciente = $conn->query($sqlConsultaNomePaciente);


      if ($resultadoNomeMedico->num_rows > 0) {
          $nomeMedico = $resultadoNomeMedico->fetch_assoc()['nome'];
          $nomePaciente = $resultadoNomePaciente->fetch_assoc()['nome'];
          $agendamentos .= '<tr>
                              <td>Dr(a). ' . $nomePaciente . '</td>
                              <td>' . $nomeMedico . '</td>
                              <td>' . $row['hora'] . '<a href= "cadastroSintomas.php">
                                                      <span class="material-icons"> app_registration</span>
                                                      </a>
                              </td>
                           </tr>';
      }
  }
} else {
  $agendamentos = '<tr>
                    
                  </tr>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Consultas Agendadas - Hospital Antonio Miguel</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style>
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      margin: 0;
    }

    .container {
      flex: 1;
    }

    #tabelaConsultas {
      margin-top: 20px;
    }

    #tabelaConsultas th, #tabelaConsultas td {
      text-align: center;
      padding: 10px;
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
          <!-- <li class="ListLink">
            <a class="link" href="prontuario.php">Prontuarios</a>
          </li> -->
          <li class="ListLink">
            <a class="link" href="registrarProntuario.php">Editar Prontuário</a>
          </li>
          <li class="ListLink">
            <a class="link" href="consultasagendadas.php">Minha Consultas</a>
          </li>
          <li class="ListLink">
            <a class="link" href='logout.php'>Logout</a>
          </li>
        </ul>
  </nav>

  <!-- Consultas Agendadas Section -->
  <div class="container mt-5">
    <h2>Prontuário</h2>
    <table class="table" id="tabelaConsultas">
      <thead>
        <tr>
          <th scope="col">Paciente</th>
          <th scope="col">Médico</th>
          <th scope="col">Sintomas</th>
        </tr>
      </thead>
      <tbody>
        <?php echo $agendamentos; ?>
      </tbody>
    </table>
  </div>
  <footer>
    <p> Atendimento 24 horas.</p>
    <p> Avenida Napóles - 511 - Jardim Atântico - Olinda</p>
    <p>&copy; 2023 Hospital Antonio Miguel. Todos os direitos reservados.</p>
  </footer>  
</body>
</html>