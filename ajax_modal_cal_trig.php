<?php
require_once 'class/config.php';
require_once 'includes/functions.php';

extract($_REQUEST);

session_start();

$query2ab = "SELECT calender_id, institution_project_id, DATE_FORMAT(calender_date, '%d/%m/%Y') as calender_date, from_time, to_time, total_hrs, status FROM  too_calender  WHERE user_id='$m_id11' ORDER BY calender_date";
$statement2ab=$mysqli->prepare($query2ab);
$statement2ab->execute();
$statement2ab->store_result();
$statement2ab->bind_result($calender_id, $institution_project_id, $calender_date, $from_time, $to_time, $total_hrs, $status);
$nrows2ab=$statement2ab->num_rows();

?>
<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<tr class="tr1">
			<td>S.No.</td>
			<td width="30" align="center"><!--<input type="checkbox" name="selall3" onclick="return selall1(this);" />--></td>
			<td>Date</td>
			<td>From Time</td>
			<td>To Time</td>
			<td>Hours</td>
			<td>Status</td>
		</tr>
	<?php $i=1; while($statement2ab->fetch()) {
		if($status=='A') { $statusTxt="Available"; }
		elseif($status=='B') {
			if($institution_project_id==$ipid) {
				$statusTxt=$institution_project_id;
			} else {
				$statusTxt="Blocked";
			}
		}
	?>
		<tr>
			<td width="30"><?php echo $i; ?></td>
			<td align="left">
			<?php if($statusTxt!="Blocked") { ?>
				<input type="checkbox" name="checkbox1[]" id="cal_check_<?php echo $i; ?>" value="<?php echo $calender_id;?> "/>
				<input type="hidden" name="checkbox2[]" id="cal_check_hrs<?php echo $i; ?>" value="<?php echo $total_hrs;?> "/>
			<?php } ?>
			</td>
			<td><?php echo $calender_date; ?></td>
			<td><?php echo $from_time; ?></td>
			<td><?php echo $to_time; ?></td>
			<td><?php echo $total_hrs; ?></td>
			<td align="center"><?php echo $statusTxt; ?></td>
		</tr>
	<?php $i++; } ?>
	</table>
</div>
<hr>
<button type="button" class="btn btn-primary pull-right" data-dismiss="modal" name="submit_cal" value="<?php echo $nrows2ab; ?>" onclick="save_mentor(<?php echo $nrows2ab; ?>)">Submit</button>
