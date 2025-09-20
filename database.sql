CREATE DATABASE IF NOT EXISTS estoque_avanti;
USE estoque_avanti;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(30) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

-- insere um usuario de exemplo para o teste, a senha teria codificacao hash no php
INSERT INTO usuarios (usuario, senha)
VALUES ('admin', "123");


CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    quantidade INT NOT NULL,
    preco DECIMAL(10,2) NOT NULL
);