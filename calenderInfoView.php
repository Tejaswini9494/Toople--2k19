<?php
$page="calenderInfoView";
$title="My Calender Info";

include_once("class/config.php");
include_once("includes/functions.php");
extract($_REQUEST);

session_start();
$user_id=$_SESSION["userid"];

include("header.php"); 
?>

<link href='cal/css/fullcalendar.min.css' rel='stylesheet' />

<h3 class="">
	My Calender
	<a class="btn submitM pull-right" href="calenderInfo.php">Add</a>
</h3>
<div class="gap30"></div>

<?php

$query2 = "SELECT calender_id, institution_project_id, DATE_FORMAT(calender_date, '%d/%m/%Y') as calender_date1, calender_date, from_time, to_time, total_hrs, status FROM  too_calender WHERE user_id='$user_id' ORDER BY calender_date";
//echo $query2;
$statement2=$mysqli->prepare($query2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($calender_id, $institution_project_id, $calender_date, $calender_dateA, $from_time, $to_time, $total_hrs, $status);

$startTime="";
$endTime="";
$calScript="";
while($statement2->fetch()) {
	$startTime=$calender_dateA."T".time24($from_time);
	$endTime=$calender_dateA."T".time24($to_time);
	$calScript.="
		{
			title: 'Meeting',
			url: 'edit_calender.php?cID=$calender_id',
			start: '$startTime',
			end: '$endTime',
			backgroundColor: '#840053',
			borderColor: '#840053'
		},
		";

} //echo $calScript; ?>

<div id='calendar_mentor'></div>

<?php
function time24($timeVal) {
	$tval=explode(' ', $timeVal);
	$tvH=explode(':', $tval[0]);

	if($tvH[0]<10) {
		$tvH1="0".$tvH[0];
	} else {
		$tvH1=$tvH[0];
	}

	if($tval[1]=='PM') {
		$tvH1=round($tvH1)+12;
	}

	$time24Hrs=$tvH1.":".$tvH[1].":00";
	return $time24Hrs;
}
?>

<div class="gap20"></div>
<?php include("footer.php"); ?>

<script src='cal/js/moment.min.js'></script>
<script src='cal/js/fullcalendar.min.js'></script>
<script>
$(document).ready(function() {

	$('#modal_attandence').modal('show');
	$('#calendar_mentor').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,basicWeek,basicDay'
		},
		//defaultDate: '2017-09-12',
		navLinks: true, // can click day/week names to navigate views
		editable: true,
		eventLimit: true, // allow "more" link when too many events
		events: [<?php echo $calScript; ?>]
	});
	
});
</script>

