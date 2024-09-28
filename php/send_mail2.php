<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['Nome']);
    $phone = htmlspecialchars($_POST['Telefone']);
    $message = htmlspecialchars($_POST['Mensagem']);

    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'vanessa.tecma@gmail.com'; // Usuário SMTP
        $mail->Password = 'sua-senha'; // Senha SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipiente
        $mail->setFrom('seu-email@gmail.com', 'Seu Nome');
        $mail->addAddress('destinatario@example.com'); 

        // Conteúdo do e-mail
        $mail->isHTML(true); 
        $mail->Subject = 'Novo Contato';
        $mail->Body    = "Nome: $name<br>Telefone: $phone<br>Mensagem:<br>$message";
        $mail->AltBody = "Nome: $name\nTelefone: $phone\nMensagem:\n$message";

        $mail->send();
        echo 'E-mail enviado com sucesso!';
    } catch (Exception $e) {
        echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
    }
}
?>