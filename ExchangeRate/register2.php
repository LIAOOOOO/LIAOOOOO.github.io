<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
date_default_timezone_set('Asia/Taipei');

$servername = "localhost";
$username = "Tai";
$password = "bcbbc145879";
$dbname = "exrate";

$name = $_POST['name'];
$id = $_POST['id'];
$pwd = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$_SESSION['exist'] = FALSE;

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

$sql2 = "SELECT ID FROM account";
$result = $conn->query($sql2);

if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
        if ($id == $row['ID'])
        {
            header("Location: register.php");
            $_SESSION['exist'] = TRUE;
            break;
        }
    }
}

if(@$_SESSION['exist'] == FALSE)
{
    $sql = "INSERT INTO account (Name, ID, Password, Email, Phone)
    VALUES ('$name', '$id', '$pwd', '$email', '$phone')";
    $insert = $conn->query($sql);

    if($insert === true)
        echo "Success";

    /**************************************SEND MAIL*********************************/
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

        $mail->setFrom('yanglongtay15@gmail.com', '成功加入E-mail會員通知');  
        $mail->addAddress($email, $name);  
        $mail->addReplyTo('yanglongtay15@gmail.com', 'info'); 

        

        $mail->isHTML(true);                                  
        $mail->Subject = '會員確認信，請勿回復！！！';
        $mail->Body    = '
        <html>
                        <head>
                        </head>
                        <body>
                        <h1>'.$name.'先生/女士</h1>
                        <p>感謝您的加入哦</p>
                        <p>請確認你的資料</p>
                        <p><h>姓名:</h>'.$name.'</p>
                        <p><h>UserID:</h>'.$id.'</p>
                        <p><h>E-mail:</h>'.$email.'</p>
                        <p><h>電話:</h>'.$phone.'</p>
                        </body>
                         </html>' . date("Y-m-d H:i:s");
        $mail->AltBody = '不支援HTML';

        $mail->send();
        header("Location: login.php");
    } catch (Exception $e) {
        echo '郵件傳送失敗: ', $mail->ErrorInfo;
    }
}


$conn->close();
?>