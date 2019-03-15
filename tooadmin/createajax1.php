<?php
include_once("../class/config.php");
extract($_REQUEST);
if(isset($_POST['con']))
{
$con=$_POST['con'];
$query1="select state_id, state_name from master_state where country_id=? and status='A' ORDER BY state_name ASC";
$statement=$mysqli->prepare($query1);
$statement->bind_param('i',$con);
$statement->execute();
$statement->store_result();
$statement->bind_result($state_id, $state_name);
while($statement->fetch())
{
echo "<option value='".$state_id."'>".$state_name."</option>";
}
}

