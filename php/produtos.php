<?php
include __DIR__ . '/config.php'; 

try {
    // buscando todos os produtos apenas para teste
    $stmt = $pdo->query("SELECT * FROM produtos"); 
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC); 

} catch (Exception $e) {
    echo "Erro ao buscar produtos: " . $e->getMessage();
    $produtos = []; 
}
?>
