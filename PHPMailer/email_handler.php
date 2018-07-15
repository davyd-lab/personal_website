<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';


if (array_key_exists('email', $_POST)) {

$email = $_REQUEST['email'] ;
$message = $_REQUEST['message'];
$nameFrom = $_REQUEST['name'];
$setsubject = $_REQUEST['subject'];

$mail = new PHPMailer();

// set mailer to use SMTP
$mail->IsSMTP();

$mail->Host = "chi-node24.websitehostserver.net";  // specify main and backup server

$mail->SMTPAuth = true;     // turn on SMTP authentication

// When sending email using PHPMailer, you need to send from a valid email address
$mail->Username = "d@davidethier.com";  // SMTP username
$mail->Password = "L0ngp@ssw0rd"; // SMTP password

// $email is the user's email address the specified
// on our contact us page. We set this variable at
// the top of this page with:
// $email = $_REQUEST['email'] ;
$mail->From = $email;
$mail->FromName = $nameFrom;

// below we want to set the email address we will be sending our email to.
$mail->AddAddress("d@davidethier.com", "David Ethier");

// set word wrap to 50 characters
$mail->WordWrap = 50;
// set email format to HTML
$mail->IsHTML(true);

$mail->Subject = $setsubject;

// $message is the user's message they typed in
// on our contact us page. We set this variable at
// the top of this page with:
// $message = $_REQUEST['message'] ;
$mail->Body    = $message;
$mail->AltBody = $message;

if(!$mail->Send())
{
   echo "Message could not be sent.";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}
header('Location: ../thankyou.html');
}
?>