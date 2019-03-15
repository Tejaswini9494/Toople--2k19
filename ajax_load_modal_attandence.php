<?php
require_once 'class/config.php';
require_once 'includes/functions.php';

extract($_REQUEST);

session_start();

$nrows1=0;
$query1 = "SELECT  std_attend_id, std_attend_comment, std_attend_status FROM  too_student_attendance  WHERE calender_id='$cal_id' AND mentor_id='$mentor_id' AND student_id='$stid' AND institution_project_assign_id='$ipaid'";
//echo $query1;
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($std_attend_id1, $std_attend_comment1, $std_attend_status1);
$nrows1=$statement1->num_rows();
$statement1->fetch();
$statement1->close();

?>

<?php if($nrows1==0) { ?>
	<input type="hidden" id="calender_id" name="calender_id" value="<?php echo $cal_id; ?>">
	<input type="hidden" id="institution_project_id" name="institution_project_id" value="<?php echo $ipid; ?>">
	<input type="hidden" id="institution_project_assign_id" name="institution_project_assign_id" value="<?php echo $ipaid; ?>">
	<input type="hidden" id="mentor_id" name="mentor_id" value="<?php echo $mentor_id; ?>">
	<input type="hidden" id="student_id" name="student_id" value="<?php echo $stid; ?>">
<?php } else { ?>
	<input type="hidden" id="std_attend_id" name="std_attend_id" value="<?php echo $std_attend_id1; ?>">
<?php } ?>

<div class="form-group">
	<label>Comments</label>
	<textarea class="form-control" id="std_attend_comment" name="std_attend_comment"><?php echo $std_attend_comment1; ?></textarea>
</div>
<div class="gap5"></div>

<div class="form-group">
	<label>Status</label>
	<select class="form-control" id="std_attend_status" name="std_attend_status">
		<option value="">Pending</option>
		<option value="PR" <?php if($std_attend_status1=='PR') { echo "selected"; } ?>>Present</option>
		<option value="AB" <?php if($std_attend_status1=='AB') { echo "selected"; } ?>>Abscent</option>
	</select>
</div>

