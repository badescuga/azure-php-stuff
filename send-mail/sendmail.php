<?php 
require 'PHPMailer-master/PHPMailerAutoload.php';
require '../defaultToLoad.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 3;                     // Enable verbose debug output

$mail->isSMTP();                          // Set mailer to use SMTP
$mail->Host = 'smtp.sendgrid.net';        // Specify main/backup SMTP servers 
$mail->SMTPAuth = true;                   // Enable SMTP authentication 
$mail->Username = 'sendGridUser';         // SMTP username
$mail->Password = 'snedGridPassword';     // SMTP password
$mail->SMTPSecure = 'tls';                // Enable TLS/SSL encryption 
$mail->Port = 587;                        // TCP port to connect to

$mail->From = 'fromEmail@contoso.com';
$mail->FromName = 'From SendGrid website';
$mail->addAddress('sendToUser@yahoo.com', 'Support');     // Add a recipient

$mail->WordWrap = 50;                     // Set word wrap to 50 characters 
$mail->isHTML(true);                      // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = '<p>This is the HTML message body <b>in bold!</b></p>';

if(!$mail->send()) {
    echo '<pre>Message could not be sent.</pre>'; 
    echo '<pre style="color: red">';
    echo 'PHPMailer Error:<br>' . $mail->ErrorInfo;
    echo '</pre>';
} else {
    echo '<pre style="color: green">Message has been sent.</pre>';
}
?>