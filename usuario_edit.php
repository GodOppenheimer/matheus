<?php
// Inclui o arquivo de conexão com o banco de dados
include 'conexao.php';

// Pega o ID do usuário a ser editado da URL (ex: usuario_edit.php?id=3)
$id = $_GET['id'];

// Executa uma query para buscar os dados do usuário com o ID informado
$res = $con->query("SELECT * FROM usuarios WHERE id=$id");

// Transforma o resultado da consulta em um array associativo
$user = $res->fetch_assoc();
?>

<h2>Editar Usuário</h2>

<!-- Formulário para editar os dados do usuário -->
<form method="POST">
    <!-- Campo de nome já preenchido com o valor atual do usuário -->
    Nome: <input type="text" name="nome" value="<?php echo $user['nome']; ?>"><br>

    <!-- Campo de email já preenchido com o valor atual do usuário -->
    Email: <input type="email" name="email" value="<?php echo $user['email']; ?>"><br>

    <!-- Campo para nova senha. Se ficar em branco, a senha não será alterada -->
    Nova Senha (deixe em branco para não alterar): <input type="password" name="senha"><br>

    <!-- Botão para enviar o formulário -->
    <input type="submit" name="atualizar" value="Atualizar">
</form>

<?php
// Verifica se o formulário foi enviado (se o botão "atualizar" foi pressionado)
if (isset($_POST['atualizar'])) {

    // Pega os dados enviados do formulário
    $nome  = $_POST['nome'];
    $email = $_POST['email'];

    // Se o campo senha não estiver vazio, atualiza a senha também
    if (!empty($_POST['senha'])) {
        // Criptografa a nova senha
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

        // Prepara a query SQL para atualizar nome, email e senha
        $stmt = $con->prepare("UPDATE usuarios SET nome=?, email=?, senha=? WHERE id=?");

        // Liga os parâmetros à query (tipos: s = string, i = inteiro)
        $stmt->bind_param("sssi", $nome, $email, $senha, $id);

    } else {
        // Caso a senha não tenha sido alterada, atualiza apenas nome e email
        $stmt = $con->prepare("UPDATE usuarios SET nome=?, email=? WHERE id=?");

        // Liga os parâmetros à query
        $stmt->bind_param("ssi", $nome, $email, $id);
    }

    // Executa a query de atualização
    if ($stmt->execute()) {
        // Se tudo der certo, mostra mensagem e redireciona para a lista em 1 segundo
        echo "Usuário atualizado!";
        header("refresh:1; url=usuarios.php");
    } else {
        // Se der erro, exibe a mensagem de erro
        echo "Erro: " . $stmt->error;
    }
}
?>
