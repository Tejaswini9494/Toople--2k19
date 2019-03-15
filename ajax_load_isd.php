<?php 
include_once("class/config.php");
extract($_REQUEST);
$country_id=$_POST['country_id'];
	$sqls1 = "SELECT country_id,country_name,isd_code FROM master_country where country_id='$country_id'";
	$statements1=$mysqli->prepare($sqls1);	
	$statements1->execute();
	$statements1->store_result();
	$statements1->bind_result($country_ids,$country_names,$isd_codes);
	
	while($statements1->fetch())
	{	
		echo "<option value='$country_ids'> ".$country_names." (" .$isd_codes. ") </option>"; 
	}
?>
