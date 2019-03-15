<?php
$page="myProjectView8";
$title="My Project View";
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

session_start();
$userty=$_SESSION["type"];


if(isset($submit_attendance)) {

	if($std_attend_id!='') {
		$query_upA="UPDATE too_student_attendance SET std_attend_comment=?, std_attend_status=? WHERE std_attend_id='$std_attend_id'";
		$statement_upA=$mysqli->prepare($query_upA);
		$statement_upA->bind_param("ss", $std_attend_comment, $std_attend_status);
		$statement_upA->execute();
	} else {
		$query_insA = "INSERT INTO too_student_attendance(calender_id, institution_project_id, institution_project_assign_id, mentor_id, student_id, std_attend_comment, std_attend_status, created_on) VALUES(?,?,?,?,?,?,?,now())";
		$statement_insA= $mysqli->prepare($query_insA);  
		$statement_insA->bind_param('iiiiiss', $calender_id, $institution_project_id, $institution_project_assign_id, $mentor_id, $student_id, $std_attend_comment, $std_attend_status);
		$statement_insA->execute();
	}

	header("location:myProjectView8.php?ipaid=$ipaid");
	exit();
}


$query1 = "SELECT institution_project_id, student_id FROM  institution_project_assign  WHERE institution_project_assign_id=$ipaid";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($ipid, $stid);
$statement1->fetch();


$query1a = "SELECT mentor_id FROM  institution_project_assign  WHERE institution_project_id='$ipid' AND mentor_id>0";
$statement1a=$mysqli->prepare($query1a);
$statement1a->execute();
$statement1a->store_result();
$statement1a->bind_result($mentor_id);
$statement1a->fetch();


$nrows2=0;
$query2 = "SELECT calender_id, institution_project_id, DATE_FORMAT(calender_date, '%d/%m/%Y') as calender_date1, calender_date, from_time, to_time, total_hrs, status FROM  too_calender  WHERE user_id='$mentor_id' AND institution_project_id='$ipid' ORDER BY calender_date";
//echo $query2;
$statement2=$mysqli->prepare($query2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($calender_id, $institution_project_id, $calender_date, $calender_dateA, $from_time, $to_time, $total_hrs, $status);
$nrows2=$statement2->num_rows();

include("header.php"); ?>

<link href='cal/css/fullcalendar.min.css' rel='stylesheet' />

<h3 class="">My Project View
<span class="pull-right"><a class="btn submitBk" href="javascript:history.back();">&raquo; Back</a></span>
</h3>
<div class="gap30"></div>

<?php include("in_projView_menu.php"); ?>
<div class="tab-content">
	<!---------- 1 --------->
	<div id="spro1" class="tab-pane fade in active">
		<div class="gap30"></div>

		<?php
		$startTime="";
		$endTime="";
		$calScript="";
		while($statement2->fetch()) {

			$query3 = "SELECT std_attend_status FROM  too_student_attendance  WHERE calender_id='$calender_id' AND mentor_id='$mentor_id' AND student_id='$stid' AND institution_project_assign_id='$ipaid'";
			//echo $query3;
			$statement3=$mysqli->prepare($query3);
			$statement3->execute();
			$statement3->store_result();
			$statement3->bind_result($std_attend_status3);
			$statement3->fetch();
			$statement3->close();

			if($std_attend_status3=='PR') {
				$bgColor="#009933";
				$bdrColor="#009933";
				$txtColor="#fff";
			} elseif($std_attend_status3=='AB') {
				$bgColor="#fff";
				$bdrColor="#ff0000";
				$txtColor="#ff0000";
			} else {
				$bgColor="#840053";
				$bdrColor="#840053";
				$txtColor="#fff";
			}

			$startTime=$calender_dateA."T".time24($from_time);
			$endTime=$calender_dateA."T".time24($to_time);
			$calScript.="
				{
					title: 'Meeting',";

		if($userty=='MEN') {
			$calScript.="
					url: 'javascript:load_modal_attandence($calender_id);',
			";
		}
			$calScript.="
					start: '$startTime',
					end: '$endTime',
					backgroundColor: '$bgColor',
					borderColor: '$bdrColor',
					textColor: '$txtColor'
				},
				";

		} //echo $calScript; ?>

		<div id='calendar_mentor'></div>
		<div class="gap20"></div>

	</div>
</div>
<div class="gap30"></div>

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

<?php include("modal_attandence.php"); ?>
<?php include("footer.php"); ?>

<script src='cal/js/moment.min.js'></script>
<script src='cal/js/fullcalendar.min.js'></script>
<script>
$(document).ready(function() {

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


<script>
function load_modal_attandence(val1) {

	var val2="<?php echo $ipid; ?>";
	var val3="<?php echo $ipaid; ?>";
	var val4="<?php echo $mentor_id; ?>";
	var val5="<?php echo $stid; ?>";
	//alert(val1);

	$.ajax({
		url:'ajax_load_modal_attandence.php', 
		type:'POST',
		data:{cal_id:val1, ipid:val2, ipaid:val3, mentor_id:val4, stid:val5},
		success:function(result){
			//alert(result);
			$('#load_modal_attandence').html(result);
			$('#modal_attandence').modal('show');
		}
	});

}
</script>
