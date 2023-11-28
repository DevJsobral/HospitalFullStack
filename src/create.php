<?php
include("conexao.php");


$sql = "

    CREATE TABLE IF NOT EXISTS pacientes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome_usuario TEXT UNIQUE NOT NULL ,
        nome TEXT NOT NULL,
        email TEXT UNIQUE NOT NULL,
        senha TEXT NOT NULL,
        ativacao TINYINT(1) DEFAULT 1
    );
    
    CREATE TABLE IF NOT EXISTS medicos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome_usuario TEXT UNIQUE NOT NULL ,
        nome TEXT NOT NULL,
        email TEXT UNIQUE NOT NULL,
        senha TEXT NOT NULL
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

    -- Criar gatilho
    
    CREATE TRIGGER calcular_horario_termino
    BEFORE INSERT ON consultas
    FOR EACH ROW
    BEGIN
        SET NEW.horario_termino = ADDTIME(NEW.horario_inicio, '01:00:00'); -- Adiciona 1 hora ao horário de início
    END;
    

    CREATE TABLE IF NOT EXISTS agendamentos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        id_paciente INT NOT NULL,
        FOREIGN KEY (id_paciente) REFERENCES pacientes(id),
        id_medico INT NOT NULL,
        FOREIGN KEY (id_medico) REFERENCES medicos(id), 
        data_horario TIMESTAMP NOT NULL
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