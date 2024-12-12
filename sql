-- Cria o banco de dados
CREATE DATABASE acad;

-- Usa o banco de dados 'acad'
USE acad;

-- Criação da tabela 'alunos'
CREATE TABLE alunos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    data_nascimento DATE NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,  -- Coluna de email já com restrição UNIQUE
    telefone VARCHAR(15) NOT NULL,      -- Coluna de telefone sem UNIQUE ainda
    endereco VARCHAR(255) NOT NULL,
    sexo ENUM('Masculino', 'Feminino', 'Outro') NOT NULL,
    vezes_por_semana ENUM('1 vez', '2 vezes', '3 vezes', '4 vezes', '5 vezes', '6 vezes', '7 vezes') NOT NULL
);

-- Adiciona a restrição UNIQUE para telefone
ALTER TABLE alunos
ADD CONSTRAINT unique_telefone UNIQUE(telefone);

-- Verifica os dados da tabela
SELECT * FROM alunos;
