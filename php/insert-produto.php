<?php
include __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $sku = $_POST['sku'] ?? '';
    $categoria = $_POST['categoria'] ?? '';
    $preco = $_POST['preco'] ?? '';
    $quantidade = $_POST['quantidade'] ?? '';
    $fornecedor = $_POST['fornecedor'] ?? '';
    $descricao = $_POST['descricao'] ?? '';

    $stmt = $pdo->prepare("INSERT INTO produtos (nome, sku, categoria, preco, quantidade, fornecedor, descricao) VALUES (?, ?, ?, ?, ?, ?, ?)");

    if ($stmt->execute([$nome, $sku, $categoria, $preco, $quantidade, $fornecedor, $descricao])) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Erro ao inserir produto']);
    }
}
?>