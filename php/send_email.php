<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturando os dados do formulÃ¡rio
    $email = htmlspecialchars($_POST['email']);
    $nome = htmlspecialchars($_POST['nome']);
    $fone = htmlspecialchars($_POST['telefone']);
    $texto = htmlspecialchars($_POST['mensagem']);
    //email, nome, fone, texto

    // Definindo as informaÃ§Ãµes do e-mail
    $to = "danilo.filitto@gmail.com"; // EndereÃ§o de e-mail de destino
    $subject = "Novo Contato via FormulÃ¡rio";
    $body = "E-Mail: $email\nnome: $nome\ntelefone: $fone\nmensagem:\n$texto";

    $headers = "From: $email\r\n" .
               "Reply-To: $nome <$email>\r\n" .
               "X-Mailer: PHP/" . phpversion();

    header("Location: https://www.dumexico.com.br/vanessa");
    exit();
?>