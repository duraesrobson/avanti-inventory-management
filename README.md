# Avanti Inventory Management

![PHP](https://img.shields.io/badge/PHP-8.0-blue?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-blue?logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-orange?logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-blue?logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-yellow?logo=javascript&logoColor=black)

**Teste técnico para vaga de estagiário na Avanti.**  
Sistema de gerenciamento de estoque desenvolvido em **PHP**, **MySQL**, com frontend em **HTML, CSS e JavaScript**.

---

## Demonstração

[![Assista à demonstração](https://img.youtube.com/vi/HN97J3bg6b4/0.jpg)](https://youtu.be/HN97J3bg6b4)

---

## Funcionalidades

- Login de usuário com validação de senha.
- Dashboard com lista de produtos.
- Busca em tempo real por nome de produto.
- Adição, edição e exclusão de produtos via modais.
- Ordenação de colunas da tabela dinamicamente.

---

## Tecnologias 

- **Backend:** PHP 8+, MySQL  
- **Frontend:** HTML5, CSS3, JavaScript
- **Banco de Dados:** MySQL  
- **Ícones:** Material Symbols  
- **UI:** Modais nativos `<dialog>`

---

## Instalação

1. Clone o repositório:
```bash
git clone <URL_DO_REPOSITORIO>
```
2. Importe o banco de dados database.sql no MYSQL:
```bash
CREATE DATABASE estoque_avanti;
USE estoque_avanti;
-- Importar tabelas do arquivo database.sql
```
3. Configure o arquivo php/config.php com suas credenciais do MYSQL:
```bash
$host = 'localhost';
$db = 'estoque_avanti';
$user = 'SEU_USUARIO';
$pass = 'SUA_SENHA';
```
4. Execute o projeto no servidor local:
```bash
php -S localhost:8000
```
5. Acesse no navegador:
```bash
http://localhost:8000/index.php
```

---

## Aprendizado e Desafios

Durante o desenvolvimento deste projeto, meu maior aprendizado foi:

- Implementar tabelas em HTML preenchidas dinamicamente usando PHP e PDO.

- Trabalhar com PDO para interagir com o banco de dados, algo que ainda não havia feito antes (anteriormente usei apenas MySQLi).

- Gerenciar dados de produtos de forma segura, incluindo inserção, edição e remoção com validação e feedback ao usuário.

O projeto me proporcionou prática com modais dinâmicos, fetch/AJAX, e manipulação do DOM em JavaScript, consolidando conhecimentos em frontend e backend integrados.

---

Projeto desenvolvido por: **Robson Durães**.
