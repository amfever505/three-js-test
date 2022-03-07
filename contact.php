<?php
session_start();
if (!isset($_POST['subject']) || !isset($_POST['body'])) {
    $alert = "<script type='text/javascript'>alert('失敗しました、もう一度お試しください。');</script>";
    $_SESSION['message'] = $alert ;
    header('Location: index.php');
    exit();
    }
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 1;
    $mail->isSMTP();
    $mail->Host       = 'smtp.office365.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = '987nakiko@gmail.com';
    $mail->Password   = 'lpkojihugyft1';
    $mail->CharSet = "utf-8";
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('987nakiko@gmail.com', 'fARme');
    $mail->addAddress('987nakiko@gmail.com' , 'user');

    $subject = $_POST['subject'];
    $body = $_POST['body'];
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $body;

    $mail->send();
    session_start();
    header('Location: contact_complete.php');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$email->ErrorInfo}";
}