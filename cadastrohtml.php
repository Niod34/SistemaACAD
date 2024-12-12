<?php
// Inclui a conexão com o banco de dados. Isso permite acessar o banco para registrar os dados enviados pelo formulário.
require 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastrar.css"> <!-- Inclui o CSS para estilizar a página -->
    <title>Cadastro de Alunos</title>
</head>
<body>
<header>
    <!-- Menu com links para outras páginas -->
    <aside class="GOT"> 
        <a href="login.php"> 🏋️‍♂️ Niod's Fit</a> <!-- Link para a página de login -->
    </aside>

    <nav class="nav1">
        <a href="listagem.php">📜 Listagem</a> <!-- Link para a página de listagem de alunos -->
        <a href="editarhtml.php">✏️ Editar</a> <!-- Link para a página de edição de dados -->
        <a href="editarhtml.php">🗑️ Excluir</a> <!-- Link para a página de exclusão de dados -->
    </nav>
</header>

<main class="container">
    <!-- Formulário para cadastro de alunos -->
    <form action="cadastro.php" method="post" class="form-cadastro">
        <h1>Cadastro de Alunos</h1><br>

        <!-- Campo para nome completo do aluno -->
        <label for="nome">Nome Completo:</label><br>
        <input type="text" id="nome" name="nome" class="form" required minlength="3" placeholder="Digite o nome completo"><br>

        <!-- Campo para data de nascimento -->
        <label for="data">Data de Nascimento:</label><br>
        <input type="date" id="data" name="data" class="form" required max="2006-11-14"><br>

        <!-- Campo para email do aluno -->
        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email" class="form" required placeholder="exemplo@gmail.com"><br>

        <!-- Campo para telefone do aluno -->
        <label for="telefone">Telefone:</label><br>
        <input type="tel" id="telefone" name="telefone" class="form" pattern="\d{10,11}" required placeholder="Somente números (10-11 dígitos)"><br>

        <!-- Campo para endereço do aluno -->
        <label for="endereco">Endereço:</label><br>
        <input type="text" id="endereco" name="endereco" class="form" required placeholder="Digite o endereço"><br>

        <!-- Campo para seleção de sexo -->
        <label for="sexo">Sexo:</label><br>
        <select name="sexo" id="sexo" class="form" required>
            <option value="">Selecione</option>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
            <option value="Outro">Outro</option>
        </select><br>

        <!-- Botão para enviar o formulário -->
        <button class="uiverse">Cadastrar</button>
    </form>
</main>



<footer>
    <!-- Rodapé com informações sobre o autor -->
    <p>&copy; 2024 Saulo Gabriel | Developer</p>
    <a href="https://github.com/Niod34" target="_blank">
        <i class="fab fa-github"></i> GitHub: Niod34
    </a>
</footer>

</body> 
</html>
