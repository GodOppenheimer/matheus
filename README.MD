# Sistema de CRUD de Usuários (PHP + MySQL)

Este projeto é um sistema simples de gerenciamento de usuários (CRUD) usando PHP e MySQLi.

## 📁 Estrutura de Arquivos

```
/crud-usuarios/
├── conexao.php             # Arquivo de conexão com o banco de dados
├── usuarios.php            # Página principal - lista todos os usuários
├── usuario_add.php         # Página para cadastrar novo usuário
├── usuario_edit.php        # Página para editar usuário existente
├── usuario_delete.php      # Página para excluir usuário
└── README.md               # Este guia
```

---

## ⚙️ Requisitos

- PHP 7 ou superior
- MySQL ou MariaDB
- Servidor Apache (ex: XAMPP, LAMP, WAMP)
- Navegador web

---

## 🛠️ Como Configurar

1. **Clone ou copie os arquivos do projeto:**
   ```bash
   git clone https://seu-repo.com/crud-usuarios.git
   ```

2. **Crie o banco de dados:**
   ```sql
   CREATE DATABASE BUTTERFLY;
   ```

3. **Crie a tabela `usuarios`:**
   ```sql
   USE BUTTERFLY;

   CREATE TABLE usuarios (
       id INT AUTO_INCREMENT PRIMARY KEY,
       nome VARCHAR(100) NOT NULL,
       email VARCHAR(100) NOT NULL UNIQUE,
       senha VARCHAR(255) NOT NULL
   );
   ```

4. **Configure o acesso ao banco no `conexao.php`:**
   ```php
   $host = "localhost";
   $user = "root";
   $password = "";
   $database = "BUTTERFLY";
   ```

5. **Coloque os arquivos em uma pasta acessível pelo seu servidor (ex: `htdocs/crud-usuarios`).**

6. **Abra no navegador:**
   ```
   http://localhost/crud-usuarios/usuarios.php
   ```

---

## 📋 Funcionalidades

| Página             | Descrição                                       |
|--------------------|--------------------------------------------------|
| `usuarios.php`     | Lista todos os usuários com opções de editar/excluir |
| `usuario_add.php`  | Formulário para adicionar um novo usuário       |
| `usuario_edit.php` | Formulário para editar os dados de um usuário   |
| `usuario_delete.php` | Exclui um usuário após confirmação            |

---

## 🔐 Segurança

- As senhas são salvas com `password_hash()` para garantir segurança.
- A inserção e atualização de dados usa `prepare()` para evitar SQL Injection.

---

## ✨ Sugestões para o Futuro

- Validação de formulário no front-end
- Filtros e paginação na listagem
- Login e controle de sessão
- Estilização com Bootstrap

---

## 👥 Autor

Este projeto foi desenvolvido por Matheus e equipe.  
Sinta-se livre para adaptar, melhorar e usar em outros sistemas!
