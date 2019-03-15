<?php
$page="forgotPassword_action";
include('class/config.php');
include_once("includes/functions.php");
require_once 'email_sms.php';
extract($_REQUEST);
$email_id=$_POST['user_email'];
$user_sta='A';

$stmt1 = $mysqli->prepare("SELECT user_id, user_email FROM too_users WHERE user_email= ? AND status= ?");
	/* bind Param */
	$stmt1->bind_param('ss',$email_id, $user_sta);
    	/* execute query */
    	$stmt1->execute();	
   	/* store result */
    	$stmt1->store_result();
    	/* Bind the result*/
        $stmt1 -> bind_result($user_id, $user_email);
        /*fetch the data*/
        $stmt1 ->fetch(); 



if($stmt1->num_rows > 0){
    
//Email Function

    email('03',$user_id,'');
    session_start();
    $_SESSION['fgt_pass']="Fpass";
    getMessageNotification('fgtS');
    header("location:login.php");
    exit;
    
    } else {
    session_start();
    //$_SESSION['fgt_invemail']="Finvpass";
    header("location:forgot_password.php?fgt=1"); 
    exit;
    
}
    ?>
<?php include("footer.php"); ?>
