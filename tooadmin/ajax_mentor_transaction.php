<?php 
include_once("../class/config.php");
include("../includes/functions.php");
extract($_REQUEST);

	$sql = "SELECT mentor_price_amt FROM master_mentor_price WHERE mentor_price_name='$mentor_type' AND mentor_currency='$mentor_currency'";
	$statement=$mysqli->prepare($sql);	
	$statement->execute();
	$statement->store_result();
	$statement->bind_result($mentor_price_amt);
	$statement->fetch();
	$total_amt=$mentor_price_amt*$mentor_hours;
	echo numbtoDesi($total_amt);
?>
