<?php include 'php/produtos.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/modal.css">
    <!-- link dos icones -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <title>Dashboard</title>
</head>

<body>
    <header>
        <div class="header-left">
            <span class="material-symbols-outlined package-icon">
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
                            <td><?= 'R$ ' . number_format($p['preco'], 2, ',', '.') ?></td>
                            <td class="table-actions">
                                <button class="table-edit-btn open-modal" data-modal="edit-modal"><span
                                        class="material-symbols-outlined edit-icon">
                                        edit
                                    </span>Editar</button>
                                <!-- ao clickar, o id do produto é salvo -->
                                <button class="table-remove-btn open-modal" data-modal="remove-modal"
                                    data-id="<?= $p['id'] ?>"><span class="material-symbols-outlined remove-icon">
                                        delete
                                    </span>Excluir</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <!-- mostra mensagem caso nao tiver produto -->
                    <tr>
                        <td colspan="4">Nenhum produto encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- dialogs para modais de editar e remover produtos -->
        <dialog id="edit-modal">
            <div class="modal-box">
                <form action="" method="post">
                    <div class="top-form">
                        <div class="top-form-header top-form-header-modal">
                            <div class="top-form-header-modal-left">
                                <span class="material-symbols-outlined">
                                    deployed_code
                                </span>
                                <h2>Editar Produto</h2>
                            </div>
                            <div class="top-form-header-modal-right">
                                <button type="button" class="close-modal" data-modal="edit-modal">
                                    X
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="edit-modal-main modal-main">
                        <div class="input-box input-box-modal full">
                            <label for="nome">Nome do Produto</label>
                            <input type="text" name="nome" placeholder="Ex.: Camiseta Básica" id="input-nome-produto"
                                required>
                        </div>
                        <div class="input-box input-box-modal">
                            <label for="sku">SKU</label>
                            <input type="text" name="sku" placeholder="Ex.: AAA-111" id="input-sku-produto">
                        </div>
                        <div class="input-box input-box-modal">
                            <label for="categoria">Categoria</label>
                            <input type="text" name="categoria" placeholder="Ex.: Eletrodoméstico"
                                id="input-categoria-produto">
                        </div>
                        <div class="input-box input-box-modal">
                            <label for="preco">Preço</label>
                            <input type="text" name="preco" placeholder="Ex.: R$ 19,90" id="input-preco-produto">
                        </div>
                        <div class="input-box input-box-modal">
                            <label for="quantidade">Quantidade em Estoque</label>
                            <input type="number" name="quantidade" placeholder="Ex.: 99" id="input-quantidade-produto"
                                min="0">
                        </div>
                        <div class="input-box full input-box-modal">
                            <label for="fornecedor">Fornecedor</label>
                            <input type="text" name="fornecedor" placeholder="..." id="input-fornecedor-produto">
                        </div>
                        <div class="input-box full input-box-modal">
                            <label for="descricao">Descrição</label>
                            <textarea name="descricao" id="input-descricao-produto" placeholder="..."></textarea>
                        </div>
                        <div class="input-box full input-box-modal">
                            <label for="input-imagem-produto">Imagem do produto</label>
                            <input type="file" id="input-imagem-produto" name="imagem" accept="image/*" hidden>
                            <label for="input-imagem-produto" class="custom-file-upload">
                                <span class="material-symbols-outlined img-icon">
                                    image
                                </span>
                                Selecionar imagem
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="edit-modal-footer-btns modal-footer-btns">
                            <button type="button" class="modal-footer-btn modal-footer-discard-btn"
                                data-modal="edit-modal">Cancelar</button>
                        </div>
                        <div class="edit-modal-footer-btns">
                            <button type="submit" class="modal-footer-btn modal-footer-update-btn">
                                <span class="material-symbols-outlined check-icon">
                                    check
                                </span>
                                Atualizar Produto</button>
                        </div>
                    </div>
                </form>
            </div>
        </dialog>
        </div>

        <dialog id="remove-modal">
            <div class="modal-box">
                <div class="top-form">
                    <div class="top-form-header top-form-header-modal">
                        <div class="top-form-header-modal-left">
                            <span class="material-symbols-outlined">delete</span>
                            <h2>Excluir Produto</h2>
                        </div>
                        <div class="top-form-header-modal-right">
                            <button class="close-modal" data-modal="remove-modal">X</button>
                        </div>
                    </div>
                </div>

                <div class="modal-main" id="remove-modal-main">
                    <!-- script.js vai preencher os dados pegando o id do produto -->
                </div>

                <div class="modal-footer">
                    <div class="modal-footer-btns">
                        <button type="button" class="modal-footer-btn modal-footer-discard-btn"
                            data-modal="remove-modal">Cancelar</button>
                    </div>
                    <div class="modal-footer-btns">
                        <button id="remove-confirm-btn" type="button" class="modal-footer-btn modal-footer-remove-btn">
                            <span class="material-symbols-outlined check-icon">delete</span>
                            Confirmar Exclusão
                        </button>
                    </div>
                </div>
            </div>
        </dialog>


    </main>
    <script src="js/script.js"></script>
</body>

</html>