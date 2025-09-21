<?php include 'php/produtos.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <!-- link dos icones -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <title>Dashboard</title>
</head>

<body>
    <header>
        <div class="header-left">
            <span class="material-symbols-outlined">
                deployed_code
            </span>
            <h5>
                Avanti Inventory Management
            </h5>
        </div>
        <div class="header-right">
            <div class="header-right-conectado">
                <span class="material-symbols-outlined-dashboard">
                    dashboard
                </span>
                <h6>Conectado</h6>
            </div>
            <div class="header-right-logout">
                <span class="material-symbols-outlined-logout">
                    logout
                </span>
                <h6>Sair</h6>
            </div>
        </div>
    </header>
    <main class="main-content-dashboard">
        <div class="main-topo">
            <div class="main-topo-text">
                <h3>
                    Produtos
                </h3>
            </div>

            <div class="main-topo-search">
                <span class="material-symbols-outlined search-icon">
                    search
                </span>
                <input type="search" name="search" id="main-topo-search-input" placeholder="Buscar por nome...">
            </div>

            <div class="main-topo-add">
                <button class="main-topo-add-btn"><span class="material-symbols-outlined-add">
                        add
                    </span>
                    Adicionar Produto</button>
            </div>
        </div>

        <table class="main-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
<!-- for no array $produtos que foi declarado em php/produtos.php e cria as linhas da tabela dinamicamente -->
                <?php if (!empty($produtos)): ?>
                <?php foreach ($produtos as $p): ?>
                    <tr>
                        <td><?= htmlspecialchars($p['nome']) ?></td>
                        <td><?= $p['quantidade'] ?></td>
                        <td><?= number_format($p['preco'], 2, ',', '.') ?></td>
                        <td>
                            <button class="table-edit-icon" onclick="">Editar</button>
                            <button class="table-edit-icon" onclick="">Excluir</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <!-- mostra mensagem caso nao tiver produto -->
                    <tr><td colspan="4">Nenhum produto encontrado.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
</body>

</html>