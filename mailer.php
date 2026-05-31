<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . "/vendor/autoload.php";  

$mail = new PHPMailer(true); 



$mail->isSMTP();  
$mail->SMTPAuth = true;  
$mail->Host = 'smtp.gmail.com'; 
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  
$mail->Port = 587; 
$mail->Username = 'zaframotorworks01@gmail.com'; 
$mail->Password = 'yyyl gviv epkn xmyj'; 
$mail->isHtml(true);  

return $mail;
?>
