<?php
// Inclui a conexão com o banco de dados, configurada em 'conexao.php'.
require 'conexao.php';

// Checa se o formulário foi enviado via POST. Assim, o processamento só acontece se os dados forem realmente enviados.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados preenchidos no formulário
    $nome = $_POST["nome"];
    $data_nascimento = $_POST["data"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];
    $sexo = $_POST["sexo"];

    // Mensagem que será exibida no final
    $mensagem = "";

    try {
        // Prepara a consulta SQL para inserir os dados no banco
        // Uso de parâmetros para evitar injeção de SQL (mais seguro)
        $sql = "INSERT INTO alunos (nome, data_nascimento, email, telefone, endereco, sexo) 
                VALUES (:nome, :data_nascimento, :email, :telefone, :endereco, :sexo)";
        
        // Prepara a execução da consulta no banco usando PDO
        $stmt = $pdo->prepare($sql);
        
        // Associa as variáveis aos parâmetros na consulta
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':data_nascimento', $data_nascimento);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':sexo', $sexo);
        
        // Executa a consulta
        if ($stmt->execute()) {
            // Se deu certo, redireciona para a página de sucesso
            header("Location: mensagem.php?mensagem=Paciente cadastrado com sucesso!");
            exit; // Impede que o código continue executando
        } else {
            // Se der erro, redireciona para a página de erro
            header("Location: mensagem.php?mensagem=Erro ao cadastrar paciente.");
            exit;
        }
    } catch (PDOException $e) {
        // Se der erro na execução ou conexão, captura e exibe a mensagem de erro
        header("Location: mensagem.php?mensagem=Erro: " . $e->getMessage());
        exit; // Para o código após o erro
    }
}
?>
