<?php
$page="myProjectView5";
$title="My Project View";
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

session_start();
$user_id=$_SESSION["userid"];
$user_type=$_SESSION["type"];

if(isset($eval_submit)) {

	$status="A";
	$count=$totCnt;
	if($updateChk==0) {
		for($jk=0; $jk<$count; $jk++) {
			$score=$_POST['score_'.$jk];
			$catId=$_POST['catId_'.$jk];
			//echo $score."#".$catId."<br>";

			$query2 = "INSERT INTO  too_project_eval (institution_project_assign_id, user_id, user_type, category_id, score, added_date, status) VALUES(?,?,?,?,?, now(), ?)";
			$statement2= $mysqli->prepare($query2);
			$statement2->bind_param('iisiss', $ipaid, $user_id, $user_type, $catId, $score, $status);
			$statement2->execute();
		}
	} else {
		for($jk=0; $jk<$count; $jk++) {
			$score=$_POST['score_'.$jk];
			$catId=$_POST['catId_'.$jk];
			//echo $score."#".$catId."<br>";

			$query4 = "UPDATE too_project_eval SET score=? WHERE institution_project_assign_id=? AND user_id=? AND user_type=? AND category_id=?";
			//echo $query4;
			//exit;
			$statement4= $mysqli->prepare($query4);
			$statement4->bind_param('siisi', $score, $ipaid, $user_id, $user_type, $catId);
			$statement4->execute();
		}
	}
}

$query1 = "SELECT category_for, category_id, category_name FROM  master_category  WHERE category_id!='' AND category_for='14' ORDER BY category_id ASC";
//echo $query1;
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($category_for1, $category_id1, $category_name1);


include("header.php");

$query1a = "SELECT COUNT(institution_project_assign_id) FROM institution_project_assign WHERE institution_project_assign_id='$ipaid' AND institution_id=student_id";
$statement1a=$mysqli->prepare($query1a);
$statement1a->execute();
$statement1a->store_result();
$statement1a->bind_result($ipaid_count);
$statement1a->fetch();
$statement1a->close();

?>

<h3 class="">My Project View
<span class="pull-right"><a class="btn submitBk" href="javascript:history.back();">&raquo; Back</a></span>
</h3>
<div class="gap30"></div>

<?php include("in_projView_menu.php"); ?>
<div class="tab-content">
	<!---------- 1 --------->
	<div id="spro1" class="tab-pane fade in active">
		<div class="gap20"></div>
		<h4>Student Evaluation</h4>
		<div class="gap20"></div>

		<div class="viewTab1">
		<form id="form_evalution" method="POST" enctype="multipart/form-data">
		<div class="table-responsive">
			<table class="table table-bordered table-striped">
				<tr class="tr1">
					<td>Evaluation Description</td>
					<td>Maximum Score</td>
				<?php if($user_type=="MEN") { ?>
					<td>Mentor Score</td>
				<?php } elseif($user_type=="COO") { ?>
					<td>Coordinator Score</td>
				<?php } else { ?>
					<td>Mentor Score</td>
					<?php if($ipaid_count==0) { ?>
					<td>Coordinator Score</td>
					<?php } ?>
				<?php } ?>
				</tr>
			<?php $max_score=10; $ii=0; $updateChk=0; while($statement1->fetch()) {
				$query3 = "SELECT score FROM  too_project_eval  WHERE category_id=$category_id1 AND institution_project_assign_id=$ipaid AND user_type='$user_type'";
				//echo $query3;
				$statement3=$mysqli->prepare($query3);
				$statement3->execute();
				$statement3->store_result();
				$statement3->bind_result($score_detail);
				$statement3->fetch();
				if($score_detail!='') {
					$updateChk++;
				}
			?>
				<tr>
					<td><?php echo $category_name1; ?>
					<input type="hidden" name="catId_<?php echo $ii; ?>" value="<?php echo $category_id1; ?>">
					</td>
					<td align="center"><?php echo $max_score; ?></td>
				<?php if($user_type=="MEN" || $user_type=="COO") { ?>
					<td>
						<div class="form-group1">
							<select class="form-control" id="score_<?php echo $ii; ?>"  name="score_<?php echo $ii;?>">
							<?php $i=0; while($i<=$max_score) { ?>
								<option value="<?php echo $i; ?>" <?php if($i==$score_detail) { echo "selected"; } ?>><?php echo $i; ?></option>
							<?php $i++; } ?>
							</select>
						</div>
					</td>
				<?php } else {
					$query5 = "SELECT score FROM  too_project_eval  WHERE category_id=$category_id1 AND institution_project_assign_id=$ipaid AND user_type='MEN'";
					//echo $query5;
					$statement5=$mysqli->prepare($query5);
					$statement5->execute();
					$statement5->store_result();
					$statement5->bind_result($score_mentor);
					$statement5->fetch();

					$query6 = "SELECT score FROM  too_project_eval  WHERE category_id=$category_id1 AND institution_project_assign_id=$ipaid AND user_type='COO'";
					//echo $query6;
					$statement6=$mysqli->prepare($query6);
					$statement6->execute();
					$statement6->store_result();
					$statement6->bind_result($score_coord);
					$statement6->fetch();

				?>
					<td align="center"><?php echo $score_mentor; ?></td>
					<?php if($ipaid_count==0) { ?>
					<td align="center"><?php echo $score_coord; ?></td>
					<?php } ?>
				<?php } ?>

				</tr>
			<?php $ii++; } ?>
			</table>
			<input type="hidden" name="totCnt" value="<?php echo $ii; ?>">
			<input type="hidden" name="updateChk" value="<?php echo $updateChk; ?>">
		</div>

	<?php if($user_type=="MEN" || $user_type=="COO") { ?>
		<div class="gap5"></div>
		<input type="submit" class="btn submitM pull-right" id="eval_submit" name="eval_submit" value="Submit">
	<?php } ?>
		</form>
		</div>

		<div class="gap20"></div>
	</div>
</div>
<div class="gap30"></div>
<?php include("footer.php"); ?>
