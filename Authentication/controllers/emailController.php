<?php 
// harus install composer di getcomposer.org
// ke website https://swiftmailer.symfony.com/docs/introduction.html
// masuk ke project ex: D:\xampp\htdocs\User_Regist> composer require "swiftmailer/swiftmailer:^6.0"


require_once '../Authentication/vendor/autoload.php';
require_once '../Authentication/config/constants.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
  ->setUsername("netringkas@gmail.com")
  ->setPassword("ringkasnet.123");

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);



function SendVerificationEmail($userEmail, $token)
{
    global $mailer;

    $body = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">      
        <title>Verify Email</title>
    </head>
    <body>
    
        <div class="wrapper">
            <p>
                Selamat! tinggal satu klik lagi akun anda akan terverifikasi, silahkan klik tautan dibawah untuk verifikasi
                dan masuk ke dalam website
            </p>
            <a href="http://localhost/Ringkas-Net/register/auth.php?token=' . $token . '">
                Verifikasi Email anda
            </a>
        </div>
    
    </body>
    </html>';

    // Create a message
    $message = (new Swift_Message('Verifikasi Email anda'))
    ->setFrom(['netringkas@gmail.com' => 'Ringkas-Net'])
    ->setSubject('<noreply@netringkas.com>')
    ->setTo($userEmail)
    ->setBody($body, 'text/html');

    // Send the message
    $result = $mailer->send($message);
}


function SendPasswordResetLink($userEmail, $token)
{
    global $mailer;

    $body = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">      
        <title>Verify Email</title>
    </head>
    <body>
    
        <div class="wrapper">
            <p>
                Hallo,

                Silahkan klik tautan dibawah untuk masuk kedalam halaman khusus untuk mereset 
                password anda
            </p>
            <a href="http://localhost/Ringkas-Net/register/auth.php?password-token=' . $token . '">
                Reset password
            </a>
        </div>
    
    </body>
    </html>';

    // Create a message
    $message = (new Swift_Message('Permintaan reset password'))
    ->setFrom(['netringkas@gmail.com' => 'Ringkas-Net'])
    ->setSubject('<noreply@netringkas.com>')
    ->setTo($userEmail)
    ->setBody($body, 'text/html');

    // Send the message
    $result = $mailer->send($message);
}