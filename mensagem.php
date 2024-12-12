<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="cadastrar.css">
</head>
<body>
  

<?php
// Verifica se existe uma mensagem na URL, caso contrário, define como uma string vazia
$mensagem = isset($_GET['mensagem']) ? $_GET['mensagem'] : '';

// Exibe a mensagem dentro de uma tag <h1>
echo "<h1>{$mensagem}</h1>";

// Adiciona um script para redirecionar o usuário após 3 segundos
echo "<script>
        setTimeout(function() {
            window.location.href = 'cadastrohtml.php';  // Redireciona para a página 'cadastrohtml.php'
        }, 3000); // Aguarda 3000 milissegundos (3 segundos) antes de redirecionar
      </script>";
?>

</body>
</html>
