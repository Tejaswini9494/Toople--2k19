<?php 
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

$query2 = "SELECT calender_id, DATE_FORMAT(calender_date, '%d/%m/%Y') as calender_date1, calender_date, from_time, to_time, total_hrs FROM  too_calender  WHERE institution_project_id='$ipid' ORDER BY calender_date";
//echo $query2;
$statement2=$mysqli->prepare($query2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($calender_id, $calender_date, $calender_dateA, $from_time, $to_time, $total_hrs);

?>

	<table class="table table-striped table-bordered">
		<tr class="tr1">
			<td>S.No.</td>
			<td>Date</td>
			<td>Hours</td>
			<td>Duration</td>
			<td>Comments</td>
			<td>Status</td>
		</tr>
<?php 
$i=1; 
while($statement2->fetch()) {
	$query1 = "SELECT std_attend_comment, std_attend_status FROM  too_student_attendance  WHERE calender_id='$calender_id'";
	//echo $query1;
	$statement1=$mysqli->prepare($query1);
	$statement1->execute();
	$statement1->store_result();
	$statement1->bind_result($std_attend_comment, $std_attend_status);
	$statement1->fetch();
	$statement1->close();

	if($std_attend_status=='PR') {
		$std_attend_status_text="Present";
	} elseif($std_attend_status=='AB') {
		$std_attend_status_text="Absent";
	} else {
		$std_attend_status_text="-";
	}
?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $calender_date; ?></td>
			<td><?php echo $from_time." to ".$to_time; ?></td>
			<td><?php echo $total_hrs; ?></td>
			<td><?php echo $std_attend_comment; ?></td>
			<td><?php echo $std_attend_status_text; ?></td>
		</tr>
<?php $i++; } ?>
	</table>
