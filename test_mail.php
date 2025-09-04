<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'tecasslufon@gmail.com';
    $mail->Password   = 'nlru sywq sifg qzvp';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('tecasslufon@gmail.com', 'De Goes Optimize');
    $mail->addAddress('tecasslufon@gmail.com'); // teste enviando pra você mesmo

    $mail->isHTML(true);
    $mail->Subject = 'Teste SMTP';
    $mail->Body    = 'Funcionou!';

    $mail->send();
    echo "✅ E-mail enviado com sucesso";
} catch (Exception $e) {
    echo "❌ Erro: {$mail->ErrorInfo}";
}