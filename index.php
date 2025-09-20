<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">

    <!-- link do ícone -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <title>Login</title>
</head>
<body>
    <div class="login-box">
        <form action="" method="post">
            <div class="top-form">
                <div class="top-form-header">
                    <span class="material-symbols-outlined">
                    deployed_code
                    </span>
                    <h2>Avanti Inventory Management</h2>
                </div>
                <p>Acesse sua conta para gerenciar o estoque</p>
            </div>
            <div class="input-box">
                <label for="usuario">Usuário</label>
                <input type="text" name="usuario" placeholder="Digite seu usuário" id="input-usuario" required>
            </div>
            <div class="input-box">
                <label for="senha">Senha</label>
                <input type="senha" name="senha" placeholder="Digite sua senha" id="input-senha" required>
            </div>
            <div class="login-btn">
                <button type="submit" class="btn-login"> <span class="material-symbols-outlined-login">
login
</span>Entrar</button>
            </div>
            <div class="error-box">
                <p class="error">
                    Credenciais inválidas. Verifique o usuário e senha.
                </p>
            </div>
            <p class="forgot-text">
                Esqueceu sua senha? Contate o administrador.
            </p>

        </form>
    </div>
</body>
</html>