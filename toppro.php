<?php
$page="myProject";
$title="Top Projects";
$ses='no';
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

$sql1="delete from topprojects";
$statement0=$mysqli->prepare($sql1);
$statement0->execute();

$sql4 = "SELECT proj_id FROM too_projects WHERE status= 'A'";
$statement4=$mysqli->prepare($sql4);
$statement4->execute();
$statement4->store_result();
$statement4->bind_result($proj_id);

 while($statement4->fetch()) {

$query0 = "select institution_project_id FROM institution_project where project_id ='$proj_id'";
$statement0=$mysqli->prepare($query0);
$statement0->execute();
$statement0->store_result();
$statement0->bind_result($institution_project_id);

$query2 = "select name,duration,dev_platform  FROM too_projects where proj_id ='$proj_id'";
$statement2=$mysqli->prepare($query2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($name,$duration,$dev_platform);
$statement2->fetch();

$projAssign=$statement0->num_rows();
$sum=0;
while($statement0->fetch()){

$query5 = "select sum(star) FROM too_project_review where institution_project_id='$institution_project_id' AND category_id IN (50,51,52,53,54)";
$statement5=$mysqli->prepare($query5);
$statement5->execute();
$statement5->store_result();
$statement5->bind_result($sum_of_star);
$statement5->fetch();
$sum+=($sum_of_star/5);
}

if($projAssign==0){ $projAssign=1;} $rank=$sum/$projAssign;

		$query8="INSERT INTO topprojects (name,duration,dev_platform,rank) VALUES (?,?,?,?)";
		$statement9= $mysqli->prepare($query8);
		$statement9->bind_param('ssss', $name,$duration,$dev_platform,$rank);
		$statement9->execute();
}

?>

