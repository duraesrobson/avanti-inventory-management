<?php
require_once __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';
    
    try {
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1");
        $stmt->execute([':usuario' => $usuario]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($senha, $user['senha'])) {
            session_start();
            $_SESSION['usuario'] = $user['usuario'];
            header("Location: ../produtos.php"); 
            exit;
        } else {
            header("Location: ../index.php"); 
            exit;
        }
    } catch (PDOException $e) {
        error_log($e->getMessage());
        exit;
    }
}
