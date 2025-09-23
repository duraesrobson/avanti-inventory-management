<?php
include __DIR__ . '/config.php';
include_once __DIR__ . '/auth.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $pdo->prepare("SELECT nome, sku, categoria, descricao, fornecedor, quantidade, preco FROM produtos WHERE id = ?");
    $stmt->execute([$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo json_encode($result);
    } else {
        echo json_encode(['error' => 'Produto não encontrado!']);
    }
}
?>