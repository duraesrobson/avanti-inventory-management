<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Login</title>
</head>
<body>
    <div class="login-box">
        <form action="" method="post">
            <div class="top-form">
                <h2>Avanti Inventory Management</h2>
                <p>Acesse sua conta para gerenciar o estoque</p>
            </div>
            <div class="input-box">
                <input type="text" name="username" id="input-username" required>
                <label for="username">Usuário</label>
            </div>
            <div class="input-box">
                <input type="password" name="password" id="input-password" required>
                <label for="password">Senha</label>
            </div>
            <div class="login-btn">
                <button type="submit" class="btn_login">Entrar</button>
            </div>
            <div class="error-box">
                <p class="error">
                    Credenciais inválidas. Verifique o usuário e senha.
                </p>
            </div>
            <p>
                Esqueceu sua senha? Contate o administrador.
            </p>

        </form>
    </div>
</body>
</html>