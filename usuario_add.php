<?php include 'conexao.php'; ?> 
<!-- Inclui o arquivo de conexão com o banco de dados (conexao.php), que cria a variável $con com a conexão mysqli -->

<h2>Adicionar Usuário</h2> 
<!-- Título da página -->

<form method="POST"> 
    <!-- Início do formulário. O método POST é usado para enviar os dados ao servidor de forma segura -->

    Nome: <input type="text" name="nome"><br>
    <!-- Campo de texto para o nome do usuário -->

    Email: <input type="email" name="email"><br>
    <!-- Campo de texto para o email do usuário (com validação de formato) -->

    Senha: <input type="password" name="senha"><br>
    <!-- Campo de senha (os caracteres digitados são ocultos) -->

    <input type="submit" name="salvar" value="Salvar">
    <!-- Botão para enviar o formulário. O campo "name=salvar" é usado para detectar o envio via PHP -->
</form>

<?php
// Verifica se o formulário foi enviado (se o botão "salvar" foi pressionado)
if (isset($_POST['salvar'])) {

    // Armazena os dados do formulário nas variáveis
    $nome  = $_POST['nome'];   // Pega o valor do campo 'nome'
    $email = $_POST['email'];  // Pega o valor do campo 'email'

    // Criptografa a senha usando o algoritmo padrão atual (seguro)
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    // Prepara a instrução SQL para inserir um novo usuário com valores parametrizados
    $stmt = $con->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");

    // Associa os parâmetros com as variáveis (tipos: s = string)
    $stmt->bind_param("sss", $nome, $email, $senha);

    // Executa a query no banco
    if ($stmt->execute()) {
        // Se der certo, exibe mensagem e redireciona para a lista de usuários em 1 segundo
        echo "Usuário cadastrado com sucesso!";
        header("refresh:1; url=usuarios.php");
    } else {
        // Caso ocorra erro na execução, exibe mensagem de erro
        echo "Erro: " . $stmt->error;
    }
}
?>
