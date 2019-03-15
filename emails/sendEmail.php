<?php
function sendEmail($from,$to,$subject,$message){
$headers = "Return-Path: costdies@gmail.com\n";
$headers .= "X-Sender: costdies@gmail.com\n";
$headers .= "From: $from\r\n" ;
$headers .= "X-Mailer:PHP 5.1\n";
$headers .= "MIME-Version: 1.0\n";
$headers .="Content-Type: text/html; charset=ISO-8859-1\r\n";
$messagetop="";
$messagetop.='';
$messagetop.=$message;
$messagetop.='';
mail($to, $subject, $messagetop, $headers); 
//echo "Done";
}
  
//sendEmail('evince.dev@gmail.com','evince.info@gmail.com','test','aaaa');
?>