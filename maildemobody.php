<?php
    $mail->addAddress('kallaradha.1997@gmail.com');     // Add a recipient
    $mail->addAddress('lokanadam@gmail.com', 'Joe User');     // Add a recipient
    //$mail->addAddress('lokanadam@outlook.com');               // Name is optional
    //$mail->addReplyTo('lokanadam@gmail.com', 'Information');
    //$mail->addCC('lokanadam@yahoo.com');
    //$mail->addBCC('lokanadam@gmail.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    //$mail->addAttachment('images/banner-02.jpg', 'new.jpg');    // working; Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'hav a nice day?';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

?>