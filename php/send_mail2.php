<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['nome']);
    $phone = htmlspecialchars($_POST['telefone']);
    $message = htmlspecialchars($_POST['mensagem']);

    $mail = new PHPMailer(true);

    try {
        // ConfiguraÃ§Ãµes do servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'seu-email@gmail.com'; // UsuÃ¡rio SMTP
        $mail->Password = 'sua-senha'; // Senha SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipiente
        $mail->setFrom('seu-email@gmail.com', 'Seu Nome');
        $mail->addAddress('destinatario@example.com'); 

        // ConteÃºdo do e-mail
        $mail->isHTML(true); 
        $mail->Subject = 'Novo Contato';
        $mail->Body    = "nome: $name<br>telefone: $phone<br>mensagem:<br>$message";
        $mail->AltBody = "nome: $name\ntelefone: $phone\nmensagem:\n$message";

        $mail->send();
        echo 'E-mail enviado com sucesso!';
    } catch (Exception $e) {
        echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
    }
}
?>