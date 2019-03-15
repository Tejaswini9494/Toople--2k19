<?php
function sendEmail($from,$cc,$to,$subject,$content,$attach)
{
/*$bccoption="";
$fromAdmin="";
$pathVal="";
if($type!='')
{
	$typeSub=explode('-',$type);
	$bccoption=$typeSub[0];
	$fromAdmin=$typeSub[1];

	if($fromAdmin!='' && $fromAdmin=='A')
	{
		$pathVal="../";
	}
}*/
	


  /*$ipn_log_file='email.log';
$fp1=fopen($ipn_log_file,'a+');
fwrite($fp1,  $from.'##'.$to.'##'.$subject.'##'.$content.'##'.$type. "\n-------------------------------------\n\n"); 
fclose($fp1);  // close file*/

//$parsUrl="http://unicopp.com/dev/";
$message='';
$message=$content;
//echo $from.'<br>';
//echo $from.'##'.$to.'##'.$subject.'##'.$content.'<br>';
//exit;
require_once('class.phpmailer.php');
require_once("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
include("class.mailconfig.php");



$from_em=$from;
$cc_mail=$cc;
$mail->SetFrom($from_em, 'Tooople');

$mail->Subject    = $subject;

$mail->MsgHTML($message);

$address = $to;
$mail->AddAddress($address);

$mail->AddAttachment($attach); // attachment

$mail->AddCC($cc_mail);
$mail->Send();

	//mail($to, $subject, $message,$headers);
}
?>
