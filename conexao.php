<?php
$host     = "localhost"; //Endereço de Ip da Conexão
$user     = "root"; //Usuário administrador da database
$password = ""; //Senha da database (Xampp por padrão vem em branco).
$database = "BUTTERFLY"; //Banco ao qual vamos conectar.

$con = new mysqli($host, $user, $password, $database); //Método de Conexão

if ($con->connect_error) { //Testa o que aconteceu na conexão, primeiro, se deu erro
    die("Erro na conexão: " . $con->connect_error);
} else { //Se não deu erro
    echo "Conexão estabelecida com sucesso!";
    //Conexão concluida, printa no terminal a mensagem acima.
}

//Note que todos as definições acima são variáveis, podemos aplicar o conteúdo diretamente
//na função mysqli, embora não seja um método prático a longo prazo por questões de
//versatilidade.
?>