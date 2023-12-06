<?php
include("../src/conexao.php");
include("../src/protect.php");

if (isset($_POST['especialidade'])) {
    $especialidade = $_POST["especialidade"];
    $horario = $_POST["horario"];

    $sql = "SELECT nome_usuario, id FROM medicos WHERE disponivel = TRUE AND especialidade = '$especialidade'";
    $result = $conn->query($sql);
    $options = "";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sqlHorarios = "SELECT hora FROM agendamentos WHERE id_medico = '" . $row["id"] . "' AND hora = '$horario'";
            $resultHorarios = $conn->query($sqlHorarios);

            if ($resultHorarios->num_rows > 0) {
                // Se houver algum agendamento para este médico e horário, significa que não está disponível
                $options .= "<option value=''>Nenhum(a) $especialidade disponível neste horário</option>";
            } else {
                // Se não houver agendamentos, o médico está disponível
                $options .= "<option value='" . $row["nome_usuario"] . "'>" . $row["nome_usuario"] . "</option>";
            }
        }
    } else {
        $options = "<option value=''>Nenhum médico disponível</option>";
    }
}

    if (isset($_POST['medico'])) {
        $medico = $_POST["medico"];
        $data = $_POST["data"];
        $horario = $_POST["horario"];

        $sqlBuscaMedico = "SELECT id FROM medicos WHERE nome_usuario = '$medico'";
        $resultado = mysqli_query($conn, $sqlBuscaMedico);
        $linha = mysqli_fetch_assoc($resultado);
        $idMedico = $linha['id'];

        $sql = "UPDATE medicos SET disponivel = 0 WHERE nome_usuario = '$medico'";
        mysqli_query($conn, $sql);

        $sqlNovaConsulta = "INSERT INTO agendamentos (id_paciente, id_medico, data, hora) VALUES ('" . $_SESSION['id'] . "','$idMedico','$data', '$horario')";
        mysqli_query($conn, $sqlNovaConsulta);

        header("Location: consultasagendadas.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hospital Antonio Miguel - Agendar Consulta</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
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
        .buttonEncontrar {
            margin-left: 1rem;
            font-size: 1rem;
            padding: 0.375rem 0.75rem;
            border-radius: 0.25rem;
            text-align: center;
            border: none;
            color: white;
            background-color: #0d6efd;
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
        <h2>Agendar Consulta</h2>
        <form id="consultaForm" method="post" action="">
            <div class="mb-3">
                <label for="especialidade" class="form-label">Especialidade</label>
                <select id="especialidade" class="form-select" name="especialidade" required>
                    <option value="" disabled selected>Selecione sua especialidade</option>
                    <option value="Cardiologista">Cardiologista</option>
                    <option value="Ortopedista">Ortopedista</option>
                    <option value="Geral">Clínico Geral</option>
                    <option value="Pneumologista">Pneumologista</option>
                    <option value="Ginecologista">Ginecologista</option>
                    <option value="Urologista">Urologista</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="data" class="form-label">Data</label>
                <input type="date" name="data" id="data" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="horario" class="form-label">Horário</label>
                <select id="horario" name="horario" class="form-select" required>
                    <option value="09:00-10:00">9:00-10:00</option>
                    <option value="10:00-11:00">11:00-12:00</option>
                    <option value="11:00-12:00">13:00-14:00</option>
                    <option value="13:00-14:00">14:00-15:00</option>
                    <option value="14:00-15:00">15:00-16:00</option>
                    <option value="15:00-16:00">16:00-17:00</option>
                    <option value="16:00-17:00">17:00-18:00</option>
                </select>
            </div>
            <label for="submit" class="form-label">Pressione para encontrar os médicos disponíveis para a Especialidade desejada:</label>
            <button type="submit" class="buttonEncontrar">Encontrar</button>
        </form>    
        <form id="consultaForm" method="post" action="">
            <div class="mb-3">
                <label for="medico" class="form-label">Médico</label>
                <select id="medico" class="form-select" name="medico" required>
                    <option value="" disabled selected>Verifique se existem médicos disponíveis</option>
                    <?php echo $options; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Agendar</button>
        </form>

        <!-- Mensagem de sucesso após agendamento -->
        <div id="mensagemSucesso" class="mt-3" style="display: none;">
            <div class="alert alert-success" role="alert">
                Consulta Agendada com Sucesso!
            </div>
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

    <!-- Script para agendamento de consulta -->
<script>
    function agendarConsulta() {
        var medicoSelecionado = document.getElementById('medico').value;
        var dataSelecionada = document.getElementById('data').value;
        var horarioSelecionado = document.getElementById('horario').value;

        if (validarHorario(medicoSelecionado, dataSelecionada, horarioSelecionado)) {
            // Adicionar a consulta agendada ao armazenamento local
            adicionarConsultaAgendada(medicoSelecionado, dataSelecionada, horarioSelecionado);

            // Ocultar formulário
            document.getElementById('consultaForm').style.display = 'none';
            // Exibir mensagem de sucesso
            document.getElementById('mensagemSucesso').style.display = 'block';
        }else{
            alert('Horário indisponível ou data inválida. Por favor, escolha outra data ou horário.');
        }
    }
    function validarHorario(medico, data, horario) {
        var horariosDisponiveis = obterHorariosDisponiveisPorMedico(medico);
        return horariosDisponiveis.includes(horario);
    }

    function obterHorariosDisponiveisPorMedico(medico) {
            switch (medico) {
                case 'Dr. Willian Goulart':
                    return ['10:00', '11:00', '14:00', '15:00', '16:00', '17:00'];
                case 'Dr. João Silva':
                    return ['09:00', '10:00', '14:00', '15:00', '16:00', '17:00'];
                // Adicione casos para os outros médicos conforme necessário
                default:
                    return [];
            }
        }

        function adicionarConsultaAgendada(medico, data, horario) {
            var consultasAgendadas = JSON.parse(localStorage.getItem('consultasAgendadas')) || [];

            consultasAgendadas.push({
                medico: medico,
                data: data,
                horario: horario
            });

            localStorage.setItem('consultasAgendadas', JSON.stringify(consultasAgendadas));
        }
    </script>
</body>

</html>
