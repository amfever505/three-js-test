<?php
session_start();
if (!isset($_POST['subject'])) {
    header('Location: index.php');
    exit();
    }
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
// require 'phpmailer/phpmailer/src/Exception.php';
// require 'phpmailer/phpmailer/src/PHPMailer.php';
// require 'phpmailer/phpmailer/src/SMTP.php';
$mail = new PHPMailer(true);

try {
  //Office365 認証情報
  $host = 'smtp.office365.com';
  $username = 'farme785@outlook.com';
  $password = '987namako785';

  //差出人
  $from = 'farme785@outlook.com';
  $fromname = 'farme';

  //宛先
  $to = $_POST['subject'];
  $toname = 'user';

  //件名・本文
  $subject = 'メール再設定フォーム';
  $body = "下記URLにアクセスしてパスワード変更を完了させてください。
  \n\n━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
  \nhttp://ik1-112-62589.vs.sakura.ne.jp/password.php
  \n━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━";

  //メール設定
  //$mail->SMTPDebug = 2; //デバッグ用
  $mail->isSMTP();
  $mail->SMTPAuth = true;
  $mail->Host = $host;
  $mail->Username = $username;
  $mail->Password = $password;
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;
  $mail->CharSet = "utf-8";
  $mail->Encoding = "base64";
  $mail->setFrom($from, $fromname);
  $mail->addAddress($to, $toname);
  $mail->Subject = $subject;
  $mail->Body    = $body;

  //メール送信
  $mail->send();
  session_start();
  header('Location: sentemail_complete.php');

} catch (Exception $e) {
  echo '失敗: ', $mail->ErrorInfo;
}