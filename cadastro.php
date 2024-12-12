    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastrar Paciente</title>
        <link rel="stylesheet" href="cadastrar.css"> <!-- Verifique o caminho correto -->
    </head>
    <body>
        <main>
            <?php
            // Inclui a conexão com o banco de dados
            require 'conexao.php';

            // Checa se o formulário foi enviado via POST
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Pega os dados do formulário
                $nome = $_POST["nome"];
                $data_nascimento = $_POST["data"];
                $email = $_POST["email"];
                $telefone = $_POST["telefone"];
                $endereco = $_POST["endereco"];
                $sexo = $_POST["sexo"];
                $vezes_por_semana = $_POST["vezes_por_semana"];

                // Mensagem de erro ou sucesso
                $mensagem = "";

                try {
                    // Verifica se o email já existe no banco de dados
                    $sql_verifica_email = "SELECT COUNT(*) FROM alunos WHERE email = :email";
                    $stmt = $pdo->prepare($sql_verifica_email);
                    $stmt->bindParam(':email', $email);
                    $stmt->execute();
                    $email_count = $stmt->fetchColumn();

                    // Verifica se o telefone já existe no banco de dados
                    $sql_verifica_telefone = "SELECT COUNT(*) FROM alunos WHERE telefone = :telefone";
                    $stmt = $pdo->prepare($sql_verifica_telefone);
                    $stmt->bindParam(':telefone', $telefone);
                    $stmt->execute();
                    $telefone_count = $stmt->fetchColumn();

                    // Se o telefone já estiver cadastrado
                    if ($telefone_count > 0) {
                        header("Location: mensagem.php?mensagem=Erro: O telefone informado já está cadastrado.");
                        exit;
                    }

                    // Se o email já estiver cadastrado
                    if ($email_count > 0) {
                        header("Location: mensagem.php?mensagem=Erro: O e-mail informado já está cadastrado.");
                        exit;
                    }

                    // Se não houver duplicidade, faz a inserção no banco de dados
                    $sql = "INSERT INTO alunos (nome, data_nascimento, email, telefone, endereco, sexo, vezes_por_semana) 
                            VALUES (:nome, :data_nascimento, :email, :telefone, :endereco, :sexo, :vezes_por_semana)";

                    // Prepara e executa a consulta
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':nome', $nome);
                    $stmt->bindParam(':data_nascimento', $data_nascimento);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':telefone', $telefone);
                    $stmt->bindParam(':endereco', $endereco);
                    $stmt->bindParam(':sexo', $sexo);
                    $stmt->bindParam(':vezes_por_semana', $vezes_por_semana);

                    // Executa a consulta
                    if ($stmt->execute()) {
                        // Se deu certo, redireciona para a página de sucesso
                        header("Location: mensagem.php?mensagem=Paciente cadastrado com sucesso!");
                        exit;
                    } else {
                        // Se der erro, redireciona para a página de erro
                        header("Location: mensagem.php?mensagem=Erro ao cadastrar paciente.");
                        exit;
                    }
                } catch (PDOException $e) {
                    // Se ocorrer algum erro na execução ou conexão
                    header("Location: mensagem.php?mensagem=Erro: " . $e->getMessage());
                    exit;
                }
            }
            ?>
        </main>
    </body>
    </html>
