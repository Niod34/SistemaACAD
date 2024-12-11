<?php
// Inclui a conexão com o banco de dados
require 'conexao.php';

// Recuperando todos os alunos do banco de dados
$sql = $pdo->query('SELECT * FROM alunos');
$alunos = $sql->fetchAll(PDO::FETCH_ASSOC); // Armazena todos os alunos encontrados em um array
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edit.css">
    <title>Editar/Deletar</title>
</head>

<body>

    <header>
        <!-- Logo e links de navegação -->
        <aside class="GOT"> <a href="login.php"> 🏋️‍♂️ Niod's Fit</a></aside>
        <nav class="nav1">
            <a href="listagem.php">📜 Listagem</a>
            <a href="editarhtml.php">✏️ Editar</a>
            <a href="editarhtml.php">🗑️ Excluir</a>
        </nav>
    </header>

    <div>
        <!-- Título da página e botão de voltar -->
        <h1>Editar/Deletar Alunos</h1>
        <a href="cadastrohtml.php">
            <button class="a">
                < Voltar</button>
        </a>
    </div>

    <main class="container">
        <!-- Tabela com os alunos -->
        <div class="container-table">
            <table class="table">
                <thead class="shadowbx">
                    <tr>
                        <!-- Cabeçalho da tabela -->
                        <th scope="col">Nome</th>
                        <th scope="col">Data de Nascimento</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop para exibir cada aluno na tabela
                    foreach ($alunos as $aluno) : ?>
                        <tr>
                            <!-- Exibindo os dados de cada aluno -->
                            <td><?php echo htmlspecialchars($aluno["nome"]); ?></td>
                            <td><?php echo htmlspecialchars($aluno["data_nascimento"]); ?></td>
                            <td><?php echo htmlspecialchars($aluno["email"]); ?></td>
                            <td><?php echo htmlspecialchars($aluno["telefone"]); ?></td>
                            <td><?php echo htmlspecialchars($aluno["endereco"]); ?></td>
                            <td><?php echo htmlspecialchars($aluno["sexo"]); ?></td>
                            <td>
                                <!-- Formulário de edição (passando o ID do aluno via GET) -->
                                <form action="editar.php" method="get" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($aluno['id']); ?>">
                                    <button type="submit" class="btn-editar">Editar</button>
                                </form>

                                <!-- Formulário de exclusão (passando o ID do aluno via POST) -->
                                <form action="excluir.php" method="post" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($aluno['id']); ?>">
                                    <button type="submit" class="btn-excluir">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

</body>

</html>
