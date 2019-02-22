<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

    //Server settings
    // $mail->SMTPDebug = 2;                         // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'webmaster062019@gmail.com';                 // SMTP username
    $mail->Password = 'batchno6';                           // SMTP password
    $mail->SMTPSecure = 'ssl';// 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465; //587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('kallaradha.1997@gmail.com', 'Mailer');
	
?>