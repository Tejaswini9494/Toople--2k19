<?php
$page="myInternships_view";
$title="My Internship View";
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

if(isset($review_submit)) {

	//echo $apply_submit;
	$query1 = "UPDATE too_intern_applied SET review=? WHERE intern_applied_id=?";
	$statement1= $mysqli->prepare($query1);
	$statement1->bind_param('si', $review, $insaid);
	$statement1->execute();
}

$query2 = "SELECT user_id, internship_id, review FROM  too_intern_applied  WHERE intern_applied_id=$insaid";
//echo $query2;
$statement2=$mysqli->prepare($query2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($user_id, $internship_id, $review);
$statement2->fetch();

$query3 = "SELECT intern_delivers_id, intern_applied_id, weekno, intern_delivers, deadline, duration_weeks, percent_complete, added_date, status FROM  too_intern_delivers  WHERE intern_delivers_id!='' AND intern_applied_id=$insaid ORDER BY intern_delivers_id DESC";
//echo $query3;
$statement3=$mysqli->prepare($query3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($intern_delivers_id, $intern_applied_id, $weekno, $intern_delivers, $deadline, $duration_weeks, $percent_complete, $added_date, $status);


$query4 = "SELECT ins_title FROM  too_internship  WHERE internship_id=$internship_id";
//echo $query4;
$statement4=$mysqli->prepare($query4);
$statement4->execute();
$statement4->store_result();
$statement4->bind_result($ins_title);
$statement4->fetch();

include("header.php"); ?>
<h3 class=""><?php echo $ins_title; ?>
<span class="pull-right"><a class="btn submitBk" href="javascript:history.back();">» Back</a></span>
</h3>

<div class="gap30"></div>

<ul class="nav nav-tabs">
	<li class="active"><a data-toggle="tab" href="#ipro1">Student Info</a></li>
	<li><a data-toggle="tab" href="#ipro2">Deliverables</a></li>
	<li><a data-toggle="tab" href="#ipro3">Review</a></li>
</ul>

<div class="tab-content">
	<!---------- 1 --------->
	<div id="ipro1" class="tab-pane fade in active">
		<div class="gap20"></div>
		<?php include("in_personal_info.php"); ?>
		<div class="gap20"></div>
	</div>

	<!---------- 2 --------->
	<div id="ipro2" class="tab-pane fade">
		<div class="gap20"></div>
		<h4>Deliverables</h4>
		<div class="gap20"></div>

		<div class="table-responsive">
		<table width="100%" class="table table-bordered table-striped tabBorder" id="dataTable">
		  <thead>
		    <tr class="tr1">
		      <td width="20" align="center">#</td>
		      <td align="left">Date</td>
		      <td align="left">Week Number</td>
		      <td align="left" width="400">Deliverable</td>
		      <td align="left">Status</td>
		      <td align="left">Deadline</td>
		      <td align="left">Duration - Number Of Weeks</td>
		      <td align="left">% of Completion</td>
		      </tr>
		  </thead>
		<?php $i=1; while($statement3->fetch()) {
			$added_date=sysDBDateConvert($added_date);
			$deadline=sysDBDateConvert($deadline);
			if($status=="P") {
				$statusText="Pending";
			} elseif($status=="D") {
				$statusText="Delivered";
			}
		?>

		    <tr class="tr">
		      <td align="center"><?php echo $i; ?></td>
		      <td class="td_txt"><?php echo $added_date; ?></td>
		      <td class="td_txt"><?php echo $weekno; ?></td>
		      <td class="td_txt"><?php echo $intern_delivers; ?></td>
		      <td class="td_txt"><?php echo $statusText; ?></td>
		      <td class="td_txt"><?php echo $deadline; ?></td>
		      <td class="td_txt"><?php echo $duration_weeks; ?></td>
		      <td class="td_txt"><?php echo $percent_complete; ?> %</td>
		    </tr>
		<?php $i++; } ?>
		</table>
		</div>

		<div class="gap20"></div>
	</div>

	<!---------- 3 --------->
	<div id="ipro3" class="tab-pane fade">
		<div class="gap20"></div>
		<h4>Review</h4>
		<div class="gap20"></div>
		<form id="form_review" method="POST" enctype="multipart/form-data">
		<div class="viewTab">
			<div class="viewTab1">
				<label class="col-md-3 col-sm-6">Review</label>
				<div class="col-md-5 col-sm-6"><textarea id="review" name="review" class="form-control tal100"><?php echo $review; ?></textarea></div>
				<div class="gap1"></div>
			</div>
			<div class="viewTab1">
				<div class="col-md-5 col-sm-6 col-md-push-3 col-sm-push-6">
					<input type="submit" id="review_submit" name="review_submit" class="btn submitM" value="Submit">
				</div>
				<div class="gap1"></div>
			</div>
		</div>
		</form>
		<div class="gap20"></div>
	</div>
</div>


<div class="gap20"></div>

<?php include("footer.php"); ?>

