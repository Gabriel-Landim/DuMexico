<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    // Aqui você pode adicionar código para enviar os dados por email ou salvar em um banco de dados
    echo "Nome: $nome<br>";
    echo "Email: $email<br>";
    echo "Mensagem: $mensagem<br>";
}
?>
