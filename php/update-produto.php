<?php
include __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    // pegando os valores enviados via POST
    $nome = $_POST['nome'] ?? '';
    $sku = $_POST['sku'] ?? '';
    $categoria = $_POST['categoria'] ?? '';
    $preco = $_POST['preco'] ?? '';
    $quantidade = $_POST['quantidade'] ?? '';
    $fornecedor = $_POST['fornecedor'] ?? '';
    $descricao = $_POST['descricao'] ?? '';

    $stmt = $pdo->prepare("
        UPDATE produtos 
        SET nome = ?, sku = ?, categoria = ?, preco = ?, quantidade = ?, fornecedor = ?, descricao = ?
        WHERE id = ?
    ");

    if ($stmt->execute([$nome, $sku, $categoria, $preco, $quantidade, $fornecedor, $descricao, $id])) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Erro ao atualizar produto']);
    }
}
?>
