<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
include './index.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Port = 2525;
    $mail->Username = '5e59096dfd3ce8';
    $mail->Password = '269c1e239ec7b1';

    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('amin.kasrioui@gmail.com', 'Mailer');
    $mail->addAddress('kasrioui8@gmail.com', 'Amin');     //Add a recipient
    $mail->addCC('kasrioui8@gmail.com');


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'Hallo';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Uw klacht is in behandeling';
} catch (Exception $e) {
    echo "Er is iets fout gegaan! Mail Error!: {$mail->ErrorInfo}";
}