<?php 
include_once("class/config.php");
extract($_REQUEST);
$country_id=$_POST['country_id'];
	$sqls1 = "SELECT state_id,state_name FROM master_state where country_id='$country_id'";
	$statements1=$mysqli->prepare($sqls1);	
	$statements1->execute();
	$statements1->store_result();
	$statements1->bind_result($state_ids,$state_names);
	echo "<option value=''>Select</option>";
	while($statements1->fetch())
	{	
		echo "<option value='$state_ids'>$state_names</option>"; 
	}
?>
