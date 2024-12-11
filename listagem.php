<?php

// Conectando ao banco de dados
require 'conexao.php';

// Realiza a consulta para recuperar todos os alunos
$sql = $pdo->query('SELECT * FROM alunos');

// Armazena os resultados da consulta em um array associativo
$farmacia = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="le.css"> <!-- Link para o arquivo de estilo -->
</head>
<body>

<header>
    <!--  links de navegação -->
    <aside class="GOT"> <a href="login.php"> 🏋️‍♂️ Niod's Fit</a></aside>

    <nav class="nav1">
        <a href="listagem.php">📜 Listagem</a>
        <a href="editarhtml.php">✏️ Editar</a>
        <a href="editarhtml.php">🗑️ Excluir</a>
    </nav>
</header>

<div>
    <!-- Título da página e botão de voltar -->
    <h1>Listagem de Alunos</h1>
    <a href="cadastrohtml.php">
        <button class="a">< Voltar</button>
    </a>
</div>

<!-- Tabela para exibir os alunos -->
<table class="table">
    <thead>
        <tr>
            <!-- Cabeçalho da tabela -->
            <th scope="col">Nome</th>
            <th scope="col">Data Nascimento</th>
            <th scope="col">Email</th>
            <th scope="col">Telefone</th>
            <th scope="col">Endereço</th>
            <th scope="col">Sexo</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        // Loop para exibir cada aluno na tabela
        foreach($farmacia as $produto) : ?>
            <tr>
                <!-- Exibe os dados de cada aluno na tabela -->
                <td><?php echo htmlspecialchars($produto["nome"]); ?></td>
                <td><?php echo htmlspecialchars($produto["data_nascimento"]); ?></td>
                <td><?php echo htmlspecialchars($produto["email"]); ?></td>
                <td><?php echo htmlspecialchars($produto["telefone"]); ?></td>
                <td><?php echo htmlspecialchars($produto["endereco"]); ?></td>
                <td><?php echo htmlspecialchars($produto["sexo"]); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
