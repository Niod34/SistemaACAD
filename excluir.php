<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $idAluno = $_POST['id'];

    // Preparar a query para excluir o aluno pelo ID
    $sql = $pdo->prepare('DELETE FROM alunos WHERE id = :id');
    $sql->bindParam(':id', $idAluno, PDO::PARAM_INT);

    if ($sql->execute()) {
        // Excluído com sucesso, redireciona para a listagem
        header('Location: editarhtml.php'); // Redireciona para a página de edição
        exit;
    } else {
        echo "Erro ao excluir o aluno.";
    }
}
?>
