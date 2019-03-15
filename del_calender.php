<?php
$page="calenderInfo DElete";
$title="My Calender Info";

include_once("class/config.php");
include_once("includes/functions.php");
extract($_POST);

session_start();
$user_id=$_SESSION["userid"];


	$query4 = "DELETE FROM too_calender WHERE calender_id='$cId'";
	$statement4= $mysqli->prepare($query4);
	//echo "DELETE FROM too_calender WHERE calender_id='$cId'";exit;
	$statement4->execute();

?>