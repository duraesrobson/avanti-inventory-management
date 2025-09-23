# Avanti Inventory Management

![PHP](https://img.shields.io/badge/PHP-8.0-blue?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-blue?logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-orange?logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-blue?logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-yellow?logo=javascript&logoColor=black)

**Teste técnico para vaga de estagiário na Avanti.**  
Sistema de gerenciamento de estoque desenvolvido em **PHP**, **MySQL**, com frontend em **HTML, CSS e JavaScript**.

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

## Estrutura do Projeto

├── css
│ ├── dashboard.css
│ ├── global.css
│ ├── index.css
│ ├── modal.css
│ └── responsive.css
├── dashboard.php
├── database.sql
├── index.php
├── js
│ └── script.js
├── php
│ ├── auth.php
│ ├── config.php
│ ├── get-produto.php
│ ├── insert-produto.php
│ ├── login.php
│ ├── logout.php
│ ├── produtos.php
│ ├── remove-produto.php
│ └── update-produto.php
└── README.md

---

## Instalação 🔧

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