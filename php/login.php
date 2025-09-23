<?php
session_start();
require_once __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';
    
    try {
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1");
        $stmt->execute([':usuario' => $usuario]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($senha, $user['senha'])) {
            $_SESSION['usuario'] = $user['usuario'];
            header("Location: ../dashboard.php"); 
            exit;
        } else {

    // redireciona para tela de login e salva o usuario digitado no input
            header("Location: ../index.php?error=1&usuario=" . urlencode($usuario)); 
            exit;
        }
    } catch (PDOException $e) {
        error_log($e->getMessage());
        exit;
    }
}
