<?php

function duration($ipaid,$week) {

global $mysqli;
$query1 = "SELECT institution_project_id FROM  institution_project_assign  WHERE institution_project_assign_id='$ipaid'";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($institution_project_id);
$statement1->fetch();

$query2 = "SELECT project_id FROM  institution_project  WHERE institution_project_id='$institution_project_id'";
$statement2=$mysqli->prepare($query2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($pid);
$statement2->fetch();

$sql_projectinfo = "SELECT proj_id,duration  FROM too_projects  where proj_id='$pid'";
$sql_project_info=$mysqli->prepare($sql_projectinfo);
$sql_project_info->execute();
$sql_project_info->store_result();
$sql_project_info->bind_result($proj_id,$duration);
$sql_project_info->fetch();

$query3 = "SELECT SUM(duration_weeks) FROM  too_project_delivers  WHERE institution_project_assign_id='$ipaid'";
$statement3=$mysqli->prepare($query3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($sum_of_duration);
$statement3->fetch();

$min=$duration-$sum_of_duration;
$min1=$min+$week;

for($i=1;$i<=$min1;$i++){

		$selVal="";
		if($i==$week) { $selVal="selected";}
		
		echo '<option value="'.$i.'" '.$selVal.'>'.$i.'</option>'; 
}

}

?>



