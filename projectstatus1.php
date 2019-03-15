<?php
include_once("class/config.php");
extract($_REQUEST);
if(isset($_POST['con']))
{
$con=$_POST['con'];

$query1="SELECT a.user_id,b.student_info_id,b.s_first_name,b.s_last_name,b.s_email_id FROM too_users a,student_info b WHERE a.user_type='MEN' AND a.user_id=b.user_id AND b.m_status='$con' AND b.status='A'";
//echo $query1;
$statement=$mysqli->prepare($query1);
$statement->execute();
$statement->store_result();
$statement->bind_result($user_id,$student_info_id,$s_first_name,$s_last_name,$s_email_id);
echo "<option value=''>Select</option>";
while($statement->fetch())
{
echo "<option value='".$user_id."'>".$s_first_name." ".$s_last_name."</option>";
}
}
?>
