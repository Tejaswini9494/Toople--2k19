<?php
require_once 'class/config.php';
require_once 'includes/functions.php';
require_once 'includes/encrypt.php';
include_once 'emails/send_email.php';


function email($val1,$val2,$val3, $val4=''){
global $mysqli;

global $murl;

//$murl ="http://evince.us/tooople/";
$fm_email_id = "testevince1@gmail.com";
            
            //forgot password
            if($val1=='03'){
                        
				$user_fgt = $mysqli->prepare("SELECT user_id, user_email FROM too_users WHERE user_id= ? ");
				$user_fgt->bind_param("i", $val2);
				$user_fgt->execute();
				$user_fgt->bind_result($user_id, $user_email);
				$user_fgt->store_result();
				$user_fgt->fetch();
                                $user_fgt->close();
				$enc_id=encrypt($user_id,'tooople#@D2016');
                                
                                $cc_mail=$fm_email_id;
				$to_email=$user_email;
				$from_email=$fm_email_id;

                                $emailSubject1="Reset Password";
                               
                                $message_name1=$first_name;    
                               
                                $message_name2="We received a request as Forgot Password associated with this e-mail address. If you haven't made this request, ignore this message.<br><br>
		Click the link below to reset your password using our secure server link below.<br>
                                <a href='".$murl."resetpassword.php?uid=".$enc_id."' target='_blank' style='text-decoration:none; color: #F58220;'>".$murl."resetpassword.php?uid=".$enc_id."</a>";
                                
                                             
             }	

            //Reg Email
            if($val1=='10'){
                        
				$user_fgt = $mysqli->prepare("SELECT user_id, user_email FROM too_users WHERE user_id= ? ");
				$user_fgt->bind_param("i", $val2);
				$user_fgt->execute();
				$user_fgt->bind_result($user_id, $user_email);
				$user_fgt->store_result();
				$user_fgt->fetch();
                                $user_fgt->close();
				$enc_id=encrypt($user_id,'tooople#@D2016');
                                
                                $cc_mail=$fm_email_id;
				$to_email=$user_email;
				$from_email=$fm_email_id;

                                $emailSubject1="Email Confirmation requested from Tooople";
                               
                                $message_name1=$user_email;    
                               
                                $message_name2="Greetings!<br><br>Thank you for your interest in registering with us.<br><br>Kindly click on the email confirmation link below in order to continue with your registration:<br>
                                <a href='".$murl."register1.php?id=".$enc_id."' target='_blank' style='text-decoration:none; color: #F58220;'>".$murl."register1.php?id=".$enc_id."</a>";
                                
                                             
             }if($val1=='11'){

				$user_fgt = $mysqli->prepare("SELECT user_id, user_email, user_pwd FROM too_users WHERE user_id= ? ");
				$user_fgt->bind_param("i", $val2);
				$user_fgt->execute();
				$user_fgt->bind_result($user_id, $user_email, $user_pwd);
				$user_fgt->store_result();
				$user_fgt->fetch();
                                $user_fgt->close();
				$enc_id=encrypt($user_id,'tooople#@D2016');

				$user_pwdD=decrypt($user_pwd,'tooople#@D2016');
                                
                                $cc_mail=$fm_email_id;
				$to_email=$user_email;
				$from_email=$fm_email_id;

                                $emailSubject1="Tooople user login details";
                               
                                $message_name1=$user_email;    
                               
                                $message_name2="Greetings!<br><br>Thank you for your interest in registering with us.<br><br>Kindly click on the email confirmation link below in order to continue with your registration:<br>
                                <a href='".$murl."login.php' target='_blank' style='text-decoration:none; color: #F58220;'>".$murl."login.php</a><br> User name:".$user_email."<br>password:".$user_pwdD;

	} if($val1=='12'){
                        
				$user_fgt = $mysqli->prepare("SELECT user_id, user_email,user_pwd FROM too_users WHERE user_id= ?");
				$user_fgt->bind_param("i", $val2);
				$user_fgt->execute();
				$user_fgt->bind_result($user_id,$user_email, $user_pwd);
				$user_fgt->store_result();
				$user_fgt->fetch();
                                $user_fgt->close();
				$user_pwdD=decrypt($user_pwd,'tooople#@D2016');
				$enc_id=encrypt($user_id,'tooople#@D2016');
                                
                                $cc_mail=$fm_email_id;
				$to_email=$user_email;
				$from_email=$fm_email_id;

                                $emailSubject1="Email Confirmation requested from Tooople";
                               
                                $message_name1=$user_email;    
                               
                                $message_name2="Greetings!<br><br>Thank you for your interest in registering with us.<br><br><br>
				User-Name:".$user_email. "<br>Password:.".$user_pwdD.".";
                                
                                             
             }
            
             
            $cc=$cc_mail;
            $to=$to_email;
            $from=$from_email;
            $emailSubject=$emailSubject1;
            $message .='<!DOCTYPE html>
<html lang="en">

<body>

<div style="width: 660px; margin: 0px auto; font-size: 14px; font-family: Arial; color: #555; border:1px solid #E6E6E6;">

	<div style="padding:15px; background:#11548B; color:#fff;">
		<h1>TOOOPLE</h1>
		<div style="height:1px; clear:both;"></div>
	</div>';

	$message .='<div style="padding:30px 15px; background:#fff;">
		<br>
		<div style="font-size:13px; line-height: 1.5;">
		'.$message_name2.'

		<br><br><br>
		Thank You,<br>
		Tooople Team<br>
		enquiry@tooople.com
		</div>
	</div>';

	$message .='<div style="padding:20px 30px; background:#E6E6E6; font-size: 13px; box-shadow: 0 1px 5px;">
		&copy; 2016 Tooople. All Rights Reserved
	</div>
</div>

</body>
</html>';




		//echo $user_email."<br>".$to."<br>".$emailSubject."<br>".$message;
		sendEmail($from,$cc,$to,$emailSubject,$message,$attach);
}
