<?php

require_once('tcpdf/tcpdf_import.php');

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$sex = $_POST['sex'];
$birth = $_POST['birth'];
$address = $_POST['address'];
$to      = $_POST['email'];
$subject = '元智四資迎新報名成立';


$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('cid0jp', '', 16);
$pdf->AddPage();

// define barcode style
$style = array(
    'position' => 'R',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => false,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 8,
    'stretchtext' => 4
);
//barcode

$pdf->write1DBarcode("CICAMP".$phone, 'C128A', '', '', '', 18, 0.4, $style, 'N');

$html = "<table border=\"1px\"><tr><td>Name</td><td><font color=#FFFFFF>".$name."</font></td><td>Phone number</td><td>".$phone."</td></tr><tr><td>Gender</td><td>".$sex."</td><td>Birthday</td><td>".$birth."</td></tr><tr><td>Email</td><td colspan=\"3\">".$email."</td></tr><tr><td>Address</td><td colspan=\"3\">".$address."</td></tr>";


$html .= "</table>";

$pdf->writeHTML($html);
$pdf->lastPage();

//$path = drupal_realpath('/home/s1063513/public_html/HW2/test2.png');

// Supply a filename including the .pdf extension
$filename = 'order.pdf';

// Create the full path
//$full_path = $path . '/' . $filename;

// Output PDF
$pdf->Output('/home/s1063513/public_html/HW2/order.pdf', 'FI');
//----------------------------------

$from = "[email protected]";
//$to = "[email protected], [email protected]";
//$subject = "郵件主題";
$subject = "=?UTF-8?B?".base64_encode($subject)."?=";
//$attach_filename = date("Y-m-d") . ".png";

$emailBody =  '感謝您的報名！您的報名資訊如下：   
    姓名：' .$name. "\r\n".
'    性別：' .$sex. "\r\n".
'    生日：' .$birth."\r\n".
'    手機號碼：' .$phone. "\r\n".
'    Email：' .$email. "\r\n".
'    地址：' .$address. "\r\n" .

# 然後我們要作為附件的HTML檔案 
//-------------------------------
include('phpqrcode/phpqrcode.php');      
// 二维码数据      
  
    $data = 'http://140.138.152.215/~s1063513/HW2/order.pdf';      
// 生成的文件名      
   $outfile = '/home/s1063513/public_html/HW2/test2.png';     
// 纠错级别：L、M、Q、H      
    $errorCorrectionLevel = 'L';      
// 点的大小：1到10      
    $matrixPointSize = 4;      

    $margin = 4;

    $saveandprint = true;
    QRcode::png($data, $outfile, $errorCorrectionLevel, $matrixPointSize, $margin, $saveandprint);
$attach_filename = "test2.html";
$attachment =  
"<html>
<head>
<title>The attached file</title>
</head>
<body>
  <img src= 'http://140.138.152.215/~s1063513/HW2/test2.png'>
</body>
</html>";

$boundary = uniqid("");

$headers =  "From: $from
To: $to
Content-type: multipart/mixed; boundary=\"$boundary\"";

$emailBody =  "--$boundary
Content-type: text/plain; charset=utf-8
Content-transfer-encoding: 8bit

$emailBody

--$boundary
Content-type: image/png; name=$attach_filename
Content-disposition: inline; filename=$attach_filename
Content-transfer-encoding: 8bit

$attachment

--$boundary--";

mail("[email protected]", $subject, $emailBody, $headers);
//----------------------------------
/*$message = '感謝您的報名！您的報名資訊如下：   
    姓名：' .$name. "\r\n".
'    性別：' .$sex. "\r\n".
'    生日：' .$birth."\r\n".
'    手機號碼：' .$phone. "\r\n".
'    Email：' .$email. "\r\n".
'    地址：' .$address. "\r\n" .



//---------------------------------------------------------
include('phpqrcode/phpqrcode.php');      
// 二维码数据      
    $data = 'http://www.leocode.net';      
// 生成的文件名      
   $outfile = '/home/s1063513/public_html/HW2/test2.png';     
// 纠错级别：L、M、Q、H      
    $errorCorrectionLevel = 'L';      
// 点的大小：1到10      
    $matrixPointSize = 4;      

    $margin = 4;

    $saveandprint = true;
    QRcode::png($data, $outfile, $errorCorrectionLevel, $matrixPointSize, $margin, $saveandprint);

//---------------------------------------------------------
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);*/

/*---------------- Sent Mail End -------------------*/



?>