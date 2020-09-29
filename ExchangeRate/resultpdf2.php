<?php
session_start();

$name = $_SESSION['name'];
$email = $_SESSION['email'];
$title = "Exchange Rate For Today";
$mailbody = $_POST['mailbody'];
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
date_default_timezone_set('Asia/Taipei');

    ignore_user_abort();
    set_time_limit(0);
    $sleep_time = 20;
    $switch = include 'switch.php';
    while($switch){
		
$mail = new PHPMailer(true);                     
try {
    
	$mail->CharSet ="UTF-8";					 
    $mail->SMTPDebug = 0;                       
    $mail->isSMTP();                            
    $mail->Host = 'smtp.gmail.com';               
    $mail->SMTPAuth = true;                      
    $mail->Username = 'yanglongtay15';             
    $mail->Password = '80088008';           
    $mail->SMTPSecure = 'ssl';                 
    $mail->Port = 465;         	
	
    $mail->setFrom('yanglongtay15@gmail.com', '小哆啦（郑扬龙）邮件发送系统');  
    $mail->addAddress($email, $name);  
    $mail->addReplyTo('yanglongtay15@gmail.com', 'info'); 

    $mail->isHTML(true);                                
    $mail->Subject = $title;
    $mail->Body    = '
	<html>
	   <style type = "text/css">
				ai {white-space: pre-line;}
				</style>
					<head>
					</head>
					<body>
					<h1>'.$_POST['name'].'同學</h1>
					<p>謝謝您使用小哆啦（郑扬龙）邮件发送系统</p>
					<p>以下是您輸入的內容</p>
					<ai>'.$_POST['mailbody'].'</ai>
					</body>
					 </html>' . date('Y-m-d H:i:s');
    $mail->AltBody = '如果郵件客戶端不支援HTML則顯示此內容';

    $mail->send();
    echo '郵件傳送成功';
}
catch (Exception $e) {
    echo '郵件傳送失敗: ', $mail->ErrorInfo;
}  
        $switch = include 'switch.php';
        $msg=date("Y-m-d H:i:s").$switch;
            file_put_contents("log.log",$msg,FILE_APPEND);
        sleep($sleep_time);
    }
    exit();
    
?>