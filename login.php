<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link para o CSS -->
    <link rel="stylesheet" href="logar.css">
    <title>Tela De Login Responsiva</title>
</head>

<body>
    <div class="container-login">
        <!-- Caixa de imagem com o logo -->
        <div class="img-box">
            <img src="https://svgsilh.com/svg/369784.svg" alt="Logo"> <!-- A imagem pode ser alterada por outra que preferir -->
        </div>

        <!-- Caixa de conteúdo para o formulário -->
        <div class="content-box">
            <div class="form-box">
                <h2>Login</h2>
                <!-- Formulário principal de login -->
                <form action="cadastrohtml.php" method="POST">
                    <!-- Campo de entrada para o nome de usuário (email) -->
                    <div class="input-box">
                        <span>Usuário</span>
                        <input type="email" name="usuario" placeholder="@mail.com" required minlength="16" required maxlength="40"> <!-- O 'required' garante que o campo seja preenchido -->
                    </div>

                    <!-- Campo de entrada para a senha -->
                    <div class="input-box">
                        <span>Senha</span>
                        <input type="password" name="senha" placeholder="Senha" required minlength="8" required maxlength="16"> <!-- Senha oculta com type="password" -->
                    </div>

                    <!-- Opção para lembrar do usuário -->
                    <div class="remember">
                        <label>
                            <input type="checkbox" name="lembrar"> Lembrar de mim
                        </label>
                        <a href="#">Esqueceu a Senha?</a>
                    </div>

                    <!-- Botão de envio do formulário -->
                    <div class="input-box">
                        <input type="submit" value="Entrar">
                    </div>

                    <!-- Link para inscrever-se caso não tenha conta -->
                    <div class="input-box">
                        <p>Não Tem Uma Conta? <a href="#">Inscrever-se</a></p>
                    </div>
                </form>
                <!-- Fim do formulário -->
            </div>
        </div>
    </div>
</body>

</html>