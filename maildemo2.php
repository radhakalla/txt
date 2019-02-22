<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../php/vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                         // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'lokanadam@gmail.com';                 // SMTP username
    $mail->Password = '7842898356';                           // SMTP password
    $mail->SMTPSecure = 'ssl';// 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465; //587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('lokanadam@gmail.com', 'Mailer');
    $mail->addAddress('kallaradha.1997@gmail.com');     // Add a recipient
    //$mail->addAddress('lokanadam@gmail.com', 'Joe User');     // Add a recipient
    //$mail->addAddress('lokanadam@outlook.com');               // Name is optional
    //$mail->addReplyTo('lokanadam@gmail.com', 'Information');
    //$mail->addCC('lokanadam@yahoo.com');
    //$mail->addBCC('lokanadam@gmail.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->addAttachment('creditcardfrauddetection/images/banner-02.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'how are you?';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}