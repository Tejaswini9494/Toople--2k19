<?php
$page="myProject";
$title="Top Student";
$ses='no';
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

$sql1="delete from topstudent";
$statement0=$mysqli->prepare($sql1);
$statement0->execute();

$query1="select user_id from too_users where user_type='SP' AND status='A'";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($user_id);

  while($statement1->fetch()) { 
		
		$query3 = "select institution_project_assign_id from institution_project_assign where student_id ='$user_id'";
		$statement3=$mysqli->prepare($query3);
		$statement3->execute();
		$statement3->store_result();
		$statement3->bind_result($ins_pro_assi_id);
		$studenAssign=$statement3->num_rows();

		$query5 = "select s_first_name,s_upload_photo from student_info where user_id='$user_id'";
		$statement5=$mysqli->prepare($query5);
		$statement5->execute();
		$statement5->store_result();
		$statement5->bind_result($name,$img);
		$statement5->fetch();

		$sum=0;
		while($statement3->fetch()){

		$query4 = "select sum(score) from too_project_eval where institution_project_assign_id='$ins_pro_assi_id'";
		$statement4=$mysqli->prepare($query4);
		$statement4->execute();
		$statement4->store_result();
		$statement4->bind_result($sum_of_score);
		$statement4->fetch();
		$sum+=($sum_of_score/2);
		
		}
		
		
		if($studenAssign==0){ $studenAssign=1;}  $rank=$sum/$studenAssign;

		$query8="INSERT INTO topstudent (name, img, rank) VALUES (?,?,?)";
		$statement9= $mysqli->prepare($query8);
		$statement9->bind_param('sss', $name,$img,$rank);
		$statement9->execute();

}





?>


