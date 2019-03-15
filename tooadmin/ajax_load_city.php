<?php 
include_once("../class/config.php");
extract($_REQUEST);
$state_id=$_POST['state_id'];
	$sqls = "SELECT city_id,city_name FROM master_city where state_id='$state_id'";
	$statements=$mysqli->prepare($sqls);	
	$statements->execute();
	$statements->store_result();
	$statements->bind_result($city_id,$city_name);
	echo "<option value=''>Select</option>";
	while($statements->fetch())
	{	
		echo "<option value='$city_id'>$city_name</option>"; 
	}
?>
