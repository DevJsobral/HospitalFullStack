<?php
include("conexao.php");

$sql = "

    CREATE TABLE IF NOT EXISTS pacientes (
        id INT(15) AUTO_INCREMENT PRIMARY KEY,
        nome_usuario TEXT UNIQUE NOT NULL ,
        nome TEXT NOT NULL,
        email TEXT UNIQUE NOT NULL,
        senha TEXT NOT NULL,
        ativacao TINYINT(1) DEFAULT 1,
        disponivel BOOL NOT NULLs
    );
    
    CREATE TABLE IF NOT EXISTS medicos (
        id INT(15) AUTO_INCREMENT PRIMARY KEY,
        nome_usuario TEXT UNIQUE NOT NULL ,
        nome TEXT NOT NULL,
        email TEXT UNIQUE NOT NULL,
        senha TEXT NOT NULL,
        especialidade TEXT NOT NULL,
        disponivel BOOL NOT NULL
    );
    CREATE TABLE IF NOT EXISTS consultas (
        id INT AUTO_INCREMENT PRIMARY KEY,
        id_paciente INT NOT NULL,
        FOREIGN KEY (id_paciente) REFERENCES pacientes(id),
        id_medico INT NOT NULL,
        FOREIGN KEY (id_medico) REFERENCES medicos(id),
        horario_inicio TIME NOT NULL,
        horario_termino TIME NOT NULL,
        data DATE NOT NULL
    );

    CREATE TABLE IF NOT EXISTS agendamentos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        id_paciente INT NOT NULL,
        FOREIGN KEY (id_paciente) REFERENCES pacientes(id),
        id_medico INT NOT NULL,
        FOREIGN KEY (id_medico) REFERENCES medicos(id), 
        data TEXT NOT NULL,
        horario TEXT NOT NULL
    );

    CREATE TABLE IF NOT EXISTS prontuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        id_paciente INT NOT NULL,
        FOREIGN KEY (id_paciente) REFERENCES pacientes(id),
        id_medico INT NOT NULL,
        FOREIGN KEY (id_medico) REFERENCES medicos(id)
    );
    
    ";

if (mysqli_multi_query($conn, $sql)) {
echo "Tabelas criadas com sucesso.";
} else {
echo "Erro ao criar tabelas: " . mysqli_error($conn);
}


mysqli_close($conn);
?>