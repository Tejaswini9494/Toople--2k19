<?php 
include_once("class/config.php");
extract($_REQUEST);
$id=$_POST['cat'];
$sql = "SELECT subcategory_id,subcategory_name FROM master_subcategory where category_id='$id'";
	$statement=$mysqli->prepare($sql);	
	$statement->execute();
	$statement->store_result();
	$statement->bind_result($subcategory_id, $subcategory_name);
	echo "<option value=''>Select</option>";
	while($statement->fetch())
	{			
		echo "<option value='$subcategory_id'>$subcategory_name</option>"; 
	}
?>
