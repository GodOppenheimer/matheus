<?php include 'conexao.php'; ?> 
<!-- Inclui o arquivo de conexão com o banco de dados, que define a variável $con -->

<h2>Usuários</h2>
<!-- Título da página -->

<a href="usuario_add.php">Novo Usuário</a>
<!-- Link para a página de cadastro de novo usuário -->

<table border="1" cellpadding="10">
<!-- Cria uma tabela HTML com borda e espaçamento entre células -->

    <tr>
        <!-- Cabeçalho da tabela -->
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>

    <?php
    // Executa a consulta para buscar todos os usuários
    $res = $con->query("SELECT * FROM usuarios");

    // Percorre todos os resultados da consulta
    while ($row = $res->fetch_assoc()) {
        // Imprime uma linha da tabela para cada usuário
        echo "<tr>
                <td>{$row['id']}</td>       <!-- ID do usuário -->
                <td>{$row['nome']}</td>     <!-- Nome do usuário -->
                <td>{$row['email']}</td>    <!-- Email do usuário -->
                <td>
                    <!-- Links de ação para editar e excluir -->
                    <a href='usuario_edit.php?id={$row['id']}'>Editar</a> |
                    <a href='usuario_delete.php?id={$row['id']}' onclick=\"return confirm('Tem certeza?')\">Excluir</a>
                </td>
              </tr>";
    }
    ?>
</table>
<!-- Fim da tabela -->