<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once($_SERVER['DOCUMENT_ROOT'] . "/departamentalcopan/app/config/Env.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/departamentalcopan/vendor/autoload.php");

$env = new Env();
$mail = new PHPMailer();

$APP_URL = $env->APP_URL;

if (isset($_POST["sendMail"])) {
    $json = 200;
    $to = $_POST["to"];
    $email = $_POST["email"];
    $name = $_POST["name"];
    $message = $_POST["message"];
    $subject = $_POST["subject"];
    $headers = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= "MIME-Version: 1.0 \r\n";
    $headers .= "From: Formulario de Contacto<departamentalcopan>";


    $htmlMessage = <<<HTML
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nuevo Mensaje</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
            }
            .email-container {
                max-width: 600px;
                margin: 20px auto;
                background-color: #ffffff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
            .header {
                text-align: center;
                padding: 10px 0;
                border-bottom: 1px solid #ddd;
            }
            .header img {
                width: 100px;
                height: auto;
            }
            .content {
                padding: 20px;
                line-height: 1.6;
                color: #333;
            }
            .footer {
                text-align: center;
                padding: 10px 0;
                font-size: 12px;
                color: #777;
            }
        </style>
    </head>
    <body>
        <div class="email-container">
            <div class="header">
                <img src="{$APP_URL}/public/images/logo-depa-copan.png" alt="logo-depa-copan">
            </div>
            <div class="content">
                <h1>De:{$name} <br>{$email}</h1>
                <h4><b>Mensaje: </b></h4>
                <p>$message</p>
            </div>
            <div class="footer">
                <p>&copy; 2024 Dirección Departamental de Copán.</p>
            </div>
        </div>
    </body>
    </html>
    HTML;

    $mail->From = $email;
    $mail->FromName = $name;
    // $mail->isSMTP();
    // $mail->Host = "smtp.gmail.com";
    // $mail->SMTPAuth = true;
    $mail->addAddress("opcode777@gmail.com");
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $htmlMessage;
    if ($mail->send()) {
        $json = 200;
    } else {
        $json = 500;
    }


    // $sent = mail($to, $subject, $htmlMessage, $headers);
    // if ($sent) {
    //     $json = 200;
    // } else {
    //     $json = 500;
    // }

    echo json_encode($json);
}
