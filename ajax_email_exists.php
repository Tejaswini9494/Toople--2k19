<?php 
require_once 'class/config.php';
require_once 'includes/functions.php';
$registrant_email=$_POST['regindex_email'];
session_start();
//$regType=$_SESSION['regType'];

$sql1 = "SELECT user_email FROM  too_users  WHERE user_email='$registrant_email'";
$statement1=$mysqli->prepare($sql1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($user_email);
$statement1->fetch();
$validEmail=$statement1->num_rows;

if($validEmail > 0) {
	echo "false";die;
}else{
	echo "true";die;
}
?>


