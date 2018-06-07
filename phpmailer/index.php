<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 4;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    //smtp-pulse.com
    //pMkSFM3gHJg
    $mail->Host = 'smtp-pulse.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = false;
    $mail->SMTPSecure = false;                               // Enable SMTP authentication
    $mail->Username = 'lacapalbert22@gmail.com';                 // SMTP username
    $mail->Password = 'pMkSFM3gHJg';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 2525;                                    // TCP port to connect to
    $mail->setFrom('lacapalbert22@sendpulse.com','lacapalbert22');
    $mail->addAddress('venessantonio@gmail.com');     // Add a recipient

    $body = '<p><strong>hello</strong> this is my first email at PHPmailer.</p>';

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'this is a test email';
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}