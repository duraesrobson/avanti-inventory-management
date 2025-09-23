CREATE DATABASE IF NOT EXISTS estoque_avanti;
USE estoque_avanti;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    quantidade INT NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    sku VARCHAR(50),
    categoria VARCHAR(100),
    fornecedor VARCHAR(100),
    descricao TEXT,
    imagem VARCHAR(255)
);

-- insere um usuario de exemplo para o teste, a senha é "123" e tem codificacao hash no php
INSERT INTO usuarios (usuario, senha)
VALUES ('teste@empresa.com', "$2y$12$hRK0r4gNkxWmHRc.7jPRdOnd/NxY5V1cbdCxnuzBW1eFXclGlV7P6%");


CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    quantidade INT NOT NULL,
    preco DECIMAL(10,2) NOT NULL
);