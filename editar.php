<?php
// Incluindo o arquivo de conexão com o banco de dados
require 'conexao.php';

// Verificando se o parâmetro 'id' foi passado na URL, caso contrário, exibe um erro
if (!isset($_GET['id'])) {
    die("Aluno não especificado.");
}

// Recuperando o ID do aluno passado na URL
$idAluno = $_GET['id'];

// Consultando os dados do aluno no banco com base no ID
$query = "SELECT * FROM alunos WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindValue(':id', $idAluno); // Vinculando o ID do aluno
$stmt->execute();
$aluno = $stmt->fetch(PDO::FETCH_ASSOC); // Recuperando o aluno

// Se o aluno não for encontrado, exibe um erro
if (!$aluno) {
    die("Aluno não encontrado!");
}

// Verificando se a requisição foi feita via POST (atualização do cadastro)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturando os dados do formulário
    $nome = $_POST['nome'];
    $dataNascimento = $_POST['data_nascimento'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $sexo = $_POST['sexo'];

    // Query para atualizar os dados do aluno no banco
    $updateQuery = "
        UPDATE alunos 
        SET nome = :nome, data_nascimento = :data_nascimento, email = :email, telefone = :telefone, endereco = :endereco, sexo = :sexo 
        WHERE id = :id
    ";

    // Preparando a query de atualização
    $updateStmt = $pdo->prepare($updateQuery);
    $updateStmt->bindValue(':nome', $nome);
    $updateStmt->bindValue(':data_nascimento', $dataNascimento);
    $updateStmt->bindValue(':email', $email);
    $updateStmt->bindValue(':telefone', $telefone);
    $updateStmt->bindValue(':endereco', $endereco);
    $updateStmt->bindValue(':sexo', $sexo);
    $updateStmt->bindValue(':id', $idAluno); // Vinculando o ID do aluno

    // Executando a query de atualização
    if ($updateStmt->execute()) {
        // Redirecionando para a página de listagem após a atualização
        header('Location: editarhtml.php'); // Página de listagem dos alunos
        exit;
    } else {
        // Caso ocorra um erro na atualização
        echo "Erro ao atualizar o aluno.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastrar.css">
    <title>Editar Aluno</title>
</head>

<body>

<div>
    <!-- Link para voltar à página de cadastro -->
    <a href="cadastrohtml.php">
            <button class="voltar">
                < Voltar</button>
        </a>
    </div>

    <!-- Formulário de edição de aluno -->
    <main class="container">
        <form action="" method="post" class="form-cadastro">

            <!-- Título do formulário -->
            <h1>Editar Aluno</h1><br>

            <!-- Campo para nome do aluno -->
            <label>Nome do Aluno:</label><br>
            <input type="text" name="nome" value="<?php echo htmlspecialchars($aluno['nome']); ?>" required class="form"><br><br>

            <!-- Campo para data de nascimento -->
            <label>Data de Nascimento:</label><br>
            <input type="date" name="data_nascimento" value="<?php echo htmlspecialchars($aluno['data_nascimento']); ?>" required class="form"><br><br>

            <!-- Campo para email -->
            <label>Email:</label><br>
            <input type="email" name="email" value="<?php echo htmlspecialchars($aluno['email']); ?>" required class="form"><br><br>

            <!-- Campo para telefone -->
            <label>Telefone:</label><br>
            <input type="text" name="telefone" value="<?php echo htmlspecialchars($aluno['telefone']); ?>" required class="form"><br><br>

            <!-- Campo para endereço -->
            <label>Endereço:</label><br>
            <input type="text" name="endereco" value="<?php echo htmlspecialchars($aluno['endereco']); ?>" required class="form"><br><br>

            <!-- Campo para sexo -->
            <label>Sexo:</label><br>
            <select name="sexo" required class="form">
                <option value="Masculino" <?php echo ($aluno['sexo'] == 'Masculino') ? 'selected' : ''; ?>>Masculino</option>
                <option value="Feminino" <?php echo ($aluno['sexo'] == 'Feminino') ? 'selected' : ''; ?>>Feminino</option>
                <option value="Outro" <?php echo ($aluno['sexo'] == 'Outro') ? 'selected' : ''; ?>>Outro</option>
            </select><br><br>

            <!-- Botão para submeter o formulário -->
            <button type="submit" class="uiverse">Atualizar</button>
        </form>
    </main>
</body>

</html>
