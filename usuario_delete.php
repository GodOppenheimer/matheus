<?php
// Inclui o arquivo de conexão com o banco de dados
include 'conexao.php';

// Obtém o ID do usuário a ser excluído pela URL (ex: usuario_delete.php?id=5)
$id = $_GET['id'];

// Prepara a query SQL para deletar o usuário com o ID fornecido
$stmt = $con->prepare("DELETE FROM usuarios WHERE id = ?");

// Associa o valor do ID ao parâmetro da query preparada (i = inteiro)
$stmt->bind_param("i", $id);

// Executa a query
if ($stmt->execute()) {
    // Se a exclusão for bem-sucedida, exibe mensagem e redireciona para a listagem em 1 segundo
    echo "Usuário excluído!";
    header("refresh:1; url=usuarios.php");
} else {
    // Se der erro, exibe mensagem com o erro retornado
    echo "Erro: " . $stmt->error;
}
?>
