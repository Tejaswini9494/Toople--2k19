<?php
include_once("../class/config.php");
extract($_REQUEST);
if(isset($_POST['con']))
{
$con=$_POST['con'];
$query1="select state_id,state_name from master_state where country_id=? and status='A'";
$statement=$mysqli->prepare($query1);
$statement->bind_param('i',$con);
$statement->execute();
$statement->store_result();
$statement->bind_result($state_id,$state_name);
echo "<option value=''>Select</option>";
while($statement->fetch())
{
echo "<option value='".$state_id."'>".$state_name."</option>";
}
}

if(isset($_POST['com']))
{
$com=$_POST['com'];
$query="select city_id,city_name from master_city where state_id=? and status='A'";
$statement1=$mysqli->prepare($query);
$statement1->bind_param('i',$com);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($city_id,$city_name);
while($statement1->fetch())
{
echo "<option value='".$city_id."'>".$city_name."</option>";
}
}

if(isset($_POST['coi']))
{
$coi=$_POST['coi'];
$query="select country_id,country_name,isd_code from master_country where country_id=? and status='A'";
$statement1=$mysqli->prepare($query);
$statement1->bind_param('i',$coi);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($country_id,$country_name,$isd_code);
while($statement1->fetch())
{
echo "<option value='".$country_id."'>".$country_name. " " .$isd_code. "</option>";
}
}
?>
