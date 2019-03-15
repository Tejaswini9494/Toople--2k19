<?php
$page="myProject";
$title="Top Projects";
$ses='no';
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

$sql1a="delete from topmentors";
$statement0=$mysqli->prepare($sql1a);
$statement0->execute();

	$sql4 = "SELECT user_id FROM too_users  WHERE user_type='MEN' AND status= 'A'";
	$statement4=$mysqli->prepare($sql4);
	$statement4->execute();
	$statement4->store_result();
	$statement4->bind_result($user_id);
	while($statement4->fetch()) {
		$query1 = "select institution_project_id FROM institution_project_assign where mentor_id='$user_id'";
		$statement1=$mysqli->prepare($query1);
		$statement1->execute();
		$statement1->store_result();
		$statement1->bind_result($institution_project_id);
		$projAssign=$statement1->num_rows();

		$query2 = "select s_first_name FROM student_info where user_id ='$user_id'";
		$statement2=$mysqli->prepare($query2);
		$statement2->execute();
		$statement2->store_result();
		$statement2->bind_result($name);
		$statement2->fetch();

		$query3 = "select s_technical_area FROM student_technical_skills where user_id='$user_id'";
		$statement3=$mysqli->prepare($query3);
		$statement3->execute();
		$statement3->store_result();
		$statement3->bind_result($tech_area);
		$statement3->fetch();
		$sum=0;
		while($statement1->fetch()){

		$query5 = "select sum(star) FROM too_project_review where institution_project_id='$institution_project_id' AND category_id IN (55,56,57,58)";
		$statement5=$mysqli->prepare($query5);
		$statement5->execute();
		$statement5->store_result();
		$statement5->bind_result($sum_of_star);
		$statement5->fetch();
		$sum+=($sum_of_star/4);
		}
	if($projAssign==0){ $projAssign=1;} $rank=$sum/$projAssign; 

		//echo $name."#".$tech_area."#".$rank."<br>";
		$query8="INSERT INTO topmentors (name,tech_area,rank) VALUES (?,?,?)";
		$statement9= $mysqli->prepare($query8);
		$statement9->bind_param('ssi', $name,$tech_area,$rank);
		$statement9->execute();

} 
?>
