<?php
session_start();

// verifica se tem usuario logado na sessao atual, se nao tiver redireciona para index.php
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit;
}