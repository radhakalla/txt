<?php 
	require('maildemoheader.php');
    $mail->addAddress('lokanadam@gmail.com', 'vj');     // Add a recipient
    //$mail->addAttachment('images/banner-02.jpg', 'new.jpg');    // working; Optional name
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'good day';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
	require('maildemofooter.php');
?>