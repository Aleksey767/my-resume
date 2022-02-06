<?php
 
require '../phpmailer/Exception';
require '../phpmailer/SMTP.php';
require '../phpmailer/Exception.php';
require '../../vendor/autoload.php';

 
$name = $_POST['name'];
$email = $_POST['email'];
$text = $_POST['text']; 
 
$title = "Обратная связь с сайта-визитки";
$body = "
<h2>Новое письмо</h2>
<b>Имя:</b> $name<br>
<b>Почта:</b> $email<br><br>
<b>Сообщение:</b><br>$text
";

 
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
//     $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    
    $mail->Host       = 'ssl://smtp.gmail.com';  
    $mail->Username   = 'xarari39@gmail.com';  
    $mail->Password   = 'Heroxarari';  
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('xarari39@gmail.com', '-P O R T F O L I O-');  
    
    $mail->addAddress('erick.santes50@gmail.com');
 
 
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;

 
if ($mail->send()) {$result = "success";}
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}
 
echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);