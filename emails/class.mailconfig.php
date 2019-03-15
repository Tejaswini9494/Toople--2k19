<?php
$mail             = new PHPMailer();

//$body             = file_get_contents('contents.html');
//$body             = eregi_replace("[\]",'',$body);

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host = 'smtp.gmail.com'; // SMTP server
$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
$mail->SMTPSecure = 'tls';                                         // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host = 'smtp.gmail.com'; // sets the SMTP server
$mail->Port = 587;                  // set the SMTP port for the GMAIL server
$mail->Username = "info@evince.co.in";

//Password to use for SMTP authentication
$mail->Password = "saevince";      // SMTP account password



$mail->AddReplyTo("all@evince.co.in","First Last");
?>
