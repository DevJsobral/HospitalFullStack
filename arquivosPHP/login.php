<?php

 include ("conexao.php");
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $tipo = $_POST["tipo"];
     $email = $_POST["email"];
     $senha = $_POST["senha"];

     $email = mysqli_real_escape_string($conn,$email);
     $senha = mysqli_real_escape_string($conn,$senha);


     if($tipo == 'paciente'){
        $sql_busca_usuario = "SELECT email,senha FROM pacientes WHERE email = '$email' and senha = '$senha'";
            $result = mysqli_query($conn, $sql_busca_usuario);
            
            
        if($result){
            if(mysqli_num_rows($result) > 0)
            {
                echo"USUÁRIO ENCONTRADO";
            }
        }  else{
            echo "USUÁRIO NÃO ENCONTRADO";
        }
    }
        else {

        }
    }
      elseif($tipo == 'medico') {
        $sql_busca_usuario = "SELECT email,senha FROM medicos WHERE email = '$email' and senha = '$senha'";
           $result = mysqli_query($conn, $sql_busca_usuario);
           if($result){
            if(mysqli_num_rows($result))
            {
                echo"USUÁRIO ENCONTRADO";
            } else {
                echo "USUÁRIO NÃO ENCONTRADO";
            }
           }

     }

    


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!DOCTYPE html>
<html lang="en">

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
        <h2>Login</h2>
        <form method="post" action="">
        <label for="tipoUsuario">Escolha o Tipo de Usuário:</label>
            <select id="tipoUsuario" name="tipo">
                <option value="paciente">Paciente</option>
                <option value="medico">Médico</option>
            </select>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha">

            <button type="submit">Login</button>
        </form>

    </section>

</body>

</html>