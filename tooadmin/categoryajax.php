<?php
include_once("../class/config.php");
extract($_REQUEST);
if(isset($_POST['con']))
{
$con=$_POST['con'];
$query1="select category_id, category_name from master_category where category_for=? and status='A' ORDER BY category_name ASC";
$statement=$mysqli->prepare($query1);
$statement->bind_param('i',$con);
$statement->execute();
$statement->store_result();
$statement->bind_result($category_id, $category_name);
while($statement->fetch())
{
echo "<option value='".$category_id."'>".$category_name."</option>";
}
}

if(isset($_POST['com']))
{
$com=$_POST['com'];
$query1="select subcategory_id, subcategory_name from master_subcategory where category_id=? and status='A' ORDER BY subcategory_name ASC";
$statement=$mysqli->prepare($query1);
$statement->bind_param('i',$com);
$statement->execute();
$statement->store_result();
$statement->bind_result($subcategory_id, $subcategory_name);
while($statement->fetch())
{
echo "<option value='".$subcategory_id."'>".$subcategory_name."</option>";
}
}
?>
