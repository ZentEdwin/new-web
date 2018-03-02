<?php

require_once 'vendor/autoload.php';

$name = $_POST['nombre'];
$mail = $_POST['correo'];
$category = $_POST['categoria'];
$message_body = $_POST['mensaje'];


$info_body = "Cliente: ".$name."\r\n Correo: ".$mail."\r\n Mensaje: ".$message_body;


// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.zoho.com', 465, 'SSL'))
  ->setUsername('ventas@elearning.com.gt')
  ->setPassword('58909624')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message($category))
  ->setFrom(['ventas@elearning.com.gt' => 'Admin'])
  ->setTo(['ventas@elearning.com.gt', 'ventas@eleraning.com.gt' => 'Ventas'])


  ->setBody($info_body);

// Send the message
$result = $mailer->send($message);


// Sendmail
$transport = new Swift_SendmailTransport('/usr/sbin/sendmail -bs');

header("Location:contact.html");

?>