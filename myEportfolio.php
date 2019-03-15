<?php
$page="myEportfolio";
$title="My e-Portfolio";
$ses="no";
include_once("class/config.php");
include_once("includes/encrypt.php");
include_once("includes/functions.php");

extract($_REQUEST);

session_start();

//echo $uid."#";

/*
Vm10a01GVXlTbk5SYkVwUlZrUkJPUT09K1M=
*/

//if($uid!="") {
//	$userid=decrypt($uid, 'tooople#@D2016');
//} else {
//	$userid=$_SESSION["userid"];
//}

echo $userid;

$userid='683';


$query1_pd = "SELECT a.institution_project_assign_id FROM  institution_project_assign a, institution_project b  WHERE a.institution_project_assign_id!='' AND a.institution_project_id=b.institution_project_id AND a.student_id='$userid'";	
$statement1_pd=$mysqli->prepare($query1_pd);
$statement1_pd->execute();
$statement1_pd->store_result();
$statement1_pd->bind_result($institution_project_assign_id_pd);
$nrows1_pd=$statement1_pd->num_rows();



$query1 = "SELECT institution_project_assign_id, institution_project_id, institution_id, student_id,project_link FROM  institution_project_assign  WHERE institution_project_assign_id!='' AND student_id='$userid' ORDER BY institution_project_assign_id DESC";	
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($institution_project_assign_id, $institution_project_id, $institution_id, $student_id,$project_link);
$nrows1=$statement1->num_rows();

$query2 = "SELECT s_technical_area FROM  student_technical_skills  WHERE user_id=$userid";
$statement2=$mysqli->prepare($query2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($s_technical_area);
$nrows2=$statement2->num_rows();
//echo $nrows2;

$query3 = "SELECT s_first_name, s_last_name, DATE_FORMAT(s_dob, '%d-%m-%Y') as s_dob, s_gender, s_identify_number, s_upload_photo, s_addressline1, s_addressline2, s_primary_contact FROM  student_info  WHERE user_id=$userid";
$statement3=$mysqli->prepare($query3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($s_first_name, $s_last_name, $s_dob, $s_gender, $s_identify_number, $s_upload_photo, $s_addressline1, $s_addressline2, $s_primary_contact);
$statement3->fetch();
if($s_gender=='m') { $s_gender='Male'; }
elseif($s_gender=='f') { $s_gender='Female'; }

$query4 = "SELECT s_program, s_branch, s_year_of_completion, s_institution_name FROM  student_qualifications  WHERE user_id=$userid ORDER BY s_year_of_completion DESC";
$statement4=$mysqli->prepare($query4);
$statement4->execute();
$statement4->store_result();
$statement4->bind_result($s_program, $s_branch, $s_year_of_completion, $s_institution_name);
$statement4->fetch();

$query5 = "SELECT category_name FROM  master_category  WHERE category_id='$s_program'";
$statement5=$mysqli->prepare($query5);
$statement5->execute();
$statement5->store_result();
$statement5->bind_result($category_name5);
$statement5->fetch();

$query6 = "SELECT subcategory_name FROM  master_subcategory  WHERE subcategory_id='$s_branch'";
$statement6=$mysqli->prepare($query6);
$statement6->execute();
$statement6->store_result();
$statement6->bind_result($subcategory_name6);
$statement6->fetch();

$query7 = "SELECT s_organisation_name, s_work_experience, DATE_FORMAT(s_start_date, '%d-%m-%Y') as s_start_date, DATE_FORMAT(s_end_date, '%d-%m-%Y') as s_end_date FROM  student_work_experience  WHERE user_id='$userid' ORDER BY s_end_date DESC";
$statement7=$mysqli->prepare($query7);
$statement7->execute();
$statement7->store_result();
$statement7->bind_result($s_organisation_name, $s_work_experience, $s_start_date, $s_end_date);
$statement7->fetch();

include("header.php"); ?>

<div class="row">
	<div class="col-md-8">
		<h1 class="protitle1">ePortfolio</h1>
		<div class="gap20"></div>

		<div class="proBox1 font20">
			
			<div class="col-sm-3 padclr">Project Done</div>
			<div class="col-sm-9 nopadL text-rose">: <?php echo $nrows1_pd; ?></div>
			<div class="gap10"></div>

			<div class="col-sm-3 padclr">Technical Skills</div>
			<div class="col-sm-9 nopadL text-rose">:&nbsp;
			<?php
				$i2=1;
				while($statement2->fetch()) {
					$sql1 = "SELECT category_name FROM master_category WHERE category_id='$s_technical_area'";
					$statement1s=$mysqli->prepare($sql1);	
					$statement1s->execute();
					$statement1s->store_result();
					$statement1s->bind_result($tech_area);		
					$statement1s->fetch();
					echo $tech_area;
					if($i2!=$nrows2) {
						echo ", ";
					}
					$i2++;
				}
			?>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap30"></div>
<!-- Loop Start -->
	<?php $i1=1; $nrows8=0; while($statement1->fetch()) {

		$query8 = "SELECT project_id, mentor_completion, coo_completion FROM  institution_project  WHERE institution_project_id='$institution_project_id'";
		$statement8=$mysqli->prepare($query8);
		$statement8->execute();
		$statement8->store_result();
		$statement8->bind_result($project_id8, $mentor_completion, $coo_completion);
		$statement8->fetch();
		$nrows8=$statement8->num_rows();

		if($nrows8>0) {

		$query9 = "SELECT name, category, proj_status, proj_abstract, duration, dev_platform FROM  too_projects  WHERE proj_id='$project_id8'";
		$statement9=$mysqli->prepare($query9);
		$statement9->execute();
		$statement9->store_result();
		$statement9->bind_result($name9, $category9, $proj_status9, $proj_abstract9, $duration9, $dev_platform9);
		$statement9->fetch();

		//$category9a=getcategoryname($category9);
		//$proj_status9a=get_subcategory($proj_status9);

		$query10 = "SELECT project_delivers_id, weekno, project_delivers, deadline, duration_weeks, percent_complete, added_date, status FROM  too_project_delivers  WHERE project_delivers_id!='' AND institution_project_assign_id='$institution_project_assign_id' ORDER BY project_delivers_id DESC";
		$statement10=$mysqli->prepare($query10);
		$statement10->execute();
		$statement10->store_result();
		$statement10->bind_result($project_delivers_id, $weekno, $project_delivers, $deadline, $duration_weeks, $percent_complete, $added_date, $status);

		$query11 = "SELECT notes, diagram, files, added_date FROM  too_project_solution  WHERE project_solution_id!='' AND institution_project_assign_id='$institution_project_assign_id' ORDER BY project_solution_id DESC";
		$statement11=$mysqli->prepare($query11);
		$statement11->execute();
		$statement11->store_result();
		$statement11->bind_result($notes1, $diagram1, $files1, $added_date1);

		$query12 = "SELECT category_for, category_id, category_name FROM  master_category  WHERE category_id!='' AND category_for='14' ORDER BY category_id ASC";
		$statement12=$mysqli->prepare($query12);
		$statement12->execute();
		$statement12->store_result();
		$statement12->bind_result($category_for1, $category_id1, $category_name1);




	?>
		<div class="accr_head">
			<div class="col-sm-8 padclr">
				<a href="#accr_content<?php echo $i1; ?>" data-toggle="collapse" aria-expanded="true"><?php echo $i1; ?>. <?php echo $name9; ?> </a>
			</div>
			<div class="col-sm-4 nopadR text-rose text-right" style="display:<?php if($mentor_completion=='Y' && $coo_completion=='Y') {?> block <?php }else{ ?>none<?php } ?>;">
				<a class="certiBtn" href="certificate.php?id=<?php echo $institution_project_assign_id; ?>" target="_blank">
					<i class="fa fa-print"></i> Certificate
				</a>
			</div>
			<div class="gap1"></div>
		</div>

		<div id="accr_content<?php echo $i1; ?>" class="accr_content collapse">
			<div class="gap20"></div>

			<label class="col-sm-2 padclr">Technology <span class="pull-right">:</span></label>
			<div class="col-sm-6 nopadR text-rose"><?php echo getcategoryname($dev_platform9); ?></div>
			<label class="col-sm-2 padclr">Category <span class="pull-right">:</span></label>
			<div class="col-sm-2 nopadR text-rose"><?php echo getcategoryname($category9); ?></div>
			<div class="gap20"></div>
			<label class="col-sm-2 padclr">Mentor Review <span class="pull-right">:</span></label>
			<div class="col-sm-6 nopadR text-rose">Good</div>
			<label class="col-sm-2 padclr">Duration <span class="pull-right">:</span></label>
			<div class="col-sm-2 nopadR text-rose"><?php echo $duration9.' Weeks'; ?></div>
			<div class="gap30"></div>	
			<label class="col-sm-2 padclr">Project Link <span class="pull-right">:</span></label>
			<div class="col-sm-6 nopadR text-rose"><a href="<?php echo $project_link; ?>" target="_blank"><?php echo $project_link; ?></a></div>

			<?php if($mentor_completion=='Y' && $coo_completion=='Y') {
				$pro_status="Completed";
			} else {
				$pro_status="In Process";
			} ?>
			<label class="col-sm-2 padclr">Project Status <span class="pull-right">:</span></label>
			<div class="col-sm-2 nopadR text-rose"><?php echo $pro_status; ?></div>
			<div class="gap30"></div>

			<strong class="font20">Abstract</strong>
			<div class="gap5"></div>
			<?php echo $proj_abstract9; ?>
			<div class="gap30"></div>

			<ul class="nav nav-tabs tab_type1">
				<li class="active ntab"><a data-toggle="tab" href="#ePortPro<?php $iii=1; echo $institution_project_id.$iii; $iii++; ?>">My Deliverables</a></li>
				<li class="ntab"><a data-toggle="tab" href="#ePortPro<?php echo $institution_project_id.$iii; $iii++; ?>">Project Solution</a></li>
				<li class="ntab"><a data-toggle="tab" href="#ePortPro<?php echo $institution_project_id.$iii; ?>">Project Evaluations</a></li>
			</ul>

			<div class="tab-content">
				<!---------- 1 --------->
				<div id="ePortPro<?php $iii=1; echo $institution_project_id.$iii; $iii++; ?>" class="tab-pane fade in active">
					<div class="gap20"></div>

					<div class="table-responsive">
					<table class="table" id="dataTable">
					  <thead>
					    <tr class="tr1">
					      <td align="center" width="20">#</td>
					      <td align="left">Date</td>
					      <td align="left">Week Number</td>
					      <td align="left" width="400">Deliverable</td>
					      <td align="left">Status</td>
					      <td align="left">Deadline</td>
					      <td align="left">Duration - Number Of Weeks</td>
					      <td align="left">% of Completion</td>
					      </tr>
					  </thead>
					<?php $i=1; while($statement10->fetch()) {
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
					      <td class="td_txt"><?php echo $project_delivers; ?></td>
					      <td class="td_txt"><?php echo $statusText; ?></td>
					      <td class="td_txt"><?php echo $deadline; ?></td>
					      <td class="td_txt"><?php echo $duration_weeks; ?></td>
					      <td class="td_txt"><?php echo $percent_complete; ?> %</td>
					    </tr>
					<?php $i++; } ?>
					</table>
					</div>

					<div class="gap1"></div>

				</div>

				<!---------- 2 --------->
				<div id="ePortPro<?php echo $institution_project_id.$iii; $iii++; ?>" class="tab-pane fade">
					<div class="gap20"></div>

					<div class="table-responsive">
					<table class="table">
					  <thead>
					    <tr class="tr1">
					      <td align="center" width="20">#</td>
					      <td align="left">Date</td>					   
					      <td align="center" width="400">Solution Notes</td>
					      <td align="center">Solution Diagram</td>
					      <td align="center">Solution Files</td>
					      </tr>
					  </thead>
					<?php $i=1; while($statement11->fetch()) {
						$added_date1=sysDBDateConvert($added_date1);
					?>
					    <tr class="tr">
					      <td align="center"><?php echo $i; ?></td>
					      <td class="td_txt"><?php echo $added_date1; ?></td>					   
					      <td class="td_txt"><?php echo $notes1; ?></td>
					      <td align="center"><a href="uploads/solution/<?php echo $diagram1; ?>" target="_blank"><img src="uploads/solution/<?php echo $diagram1; ?>" width="150px"></a></td>
					      <td align="center"><a href="uploads/solution/<?php echo $files1; ?>" target="_blank"><img src="images/doc.png" width="150px"></a></td>
					    </tr>
					<?php $i++; } ?>
					</table>
					</div>
					<div class="gap20"></div>
				</div>

				<!---------- 3 --------->
				<div id="ePortPro<?php echo $institution_project_id.$iii; ?>" class="tab-pane fade">
					<div class="gap20"></div>
					<div class="table-responsive">
						<table class="table" style="min-width: 100%">
							<tr class="tr1">
								<td width="30%">Evaluation Description</td>
								<td width="30%">Maximum Score</td>
								<td width="20%">Mentor Score</td>
								<td width="20%">Coordinator Score</td>
							</tr>
						<?php $max_score=10; $score_mentor=0; $score_coord=0; while($statement12->fetch()) {

							$query13 = "SELECT score FROM  too_project_eval  WHERE category_id='$category_id1' AND institution_project_assign_id='$institution_project_assign_id' AND user_type='$user_type'";
							$statement13=$mysqli->prepare($query13);
							$statement13->execute();
							$statement13->store_result();
							$statement13->bind_result($score_detail);
							$statement13->fetch();

							$query14 = "SELECT score FROM  too_project_eval  WHERE category_id='$category_id1' AND institution_project_assign_id=$institution_project_assign_id AND user_type='MEN'";
							$statement14=$mysqli->prepare($query14);
							$statement14->execute();
							$statement14->store_result();
							$statement14->bind_result($score_mentor);
							$statement14->fetch();

							$query15 = "SELECT score FROM  too_project_eval  WHERE category_id='$category_id1' AND institution_project_assign_id='$institution_project_assign_id' AND user_type='COO'";
							$statement15=$mysqli->prepare($query15);
							$statement15->execute();
							$statement15->store_result();
							$statement15->bind_result($score_coord);
							$statement15->fetch();

						?>
							<tr>
								<td><?php echo $category_name1; ?></td>
								<td align="center"><?php echo $max_score; ?></td>
								<td align="center"><?php echo $score_mentor; ?></td>
								<td align="center"><?php echo $score_coord; ?></td>
							</tr>
						<?php
							$score_tot=($score_mentor+$score_coord)/2;
							$stu_eval[$category_id1]=$stu_eval[$category_id1]+$score_tot;
							}
							$score_mentor=0; $score_coord=0; 
						?>

						</table>
					</div>
					<div class="gap20"></div>
				</div>


			</div>
			<div class="gap30"></div>
		</div>
	<?php $i1++; } } ?>
<!-- Loop End -->
	</div>

	<div class="col-md-4">
		<div class="proBox1">
			<div class="text-center">
				<img src="<?php echo $s_upload_photo; ?>" class="img-circle" width="100px" height="100px">
			</div>
			<div class="gap20"></div>

			<div class="form-group">
				<label class="col-xs-5 padclr">Name <span class="pull-right">:</span></label>
				<div class="col-xs-7 nopadR text-rose"><?php echo $s_first_name." ".$s_last_name; ?></div>
			</div>
			<div class="gap5"></div>

			<div class="form-group">
				<label class="col-xs-5 padclr">ID No. <span class="pull-right">:</span></label>
				<div class="col-xs-7 nopadR text-rose"><?php echo $s_identify_number; ?></div>
			</div>
			<div class="gap5"></div>

			<div class="form-group">
				<label class="col-xs-5 padclr">DOB <span class="pull-right">:</span></label>
				<div class="col-xs-7 nopadR text-rose"><?php echo $s_dob; ?></div>
			</div>
			<div class="gap5"></div>

			<div class="form-group">
				<label class="col-xs-5 padclr">Gender <span class="pull-right">:</span></label>
				<div class="col-xs-7 nopadR text-rose"><?php echo $s_gender; ?></div>
			</div>
			<div class="gap5"></div>

			<div class="form-group">
				<label class="col-xs-5 padclr">Address <span class="pull-right">:</span></label>
				<div class="col-xs-7 nopadR text-rose"><?php echo $s_addressline1; if($s_addressline2!='') { echo "<br>".$s_addressline2; } ?></div>
			</div>
			<div class="gap5"></div>

			<div class="form-group">
				<label class="col-xs-5 padclr">Contact <span class="pull-right">:</span></label>
				<div class="col-xs-7 nopadR text-rose"><?php echo $s_primary_contact; ?></div>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap40"></div>

		<div class="proBox1">
			<strong class="font20">Educational Qualification</strong>
			<div class="gap30"></div>

			<div class="form-group">
				<label class="col-xs-6 padclr">Program <span class="pull-right">:</span></label>
				<div class="col-xs-6 nopadR text-rose"><?php echo $category_name5; ?></div>
			</div>
			<div class="gap5"></div>

			<div class="form-group">
				<label class="col-xs-6 padclr">Department <span class="pull-right">:</span></label>
				<div class="col-xs-6 nopadR text-rose"><?php echo $subcategory_name6; ?></div>
			</div>
			<div class="gap5"></div>

			<div class="form-group">
				<label class="col-xs-6 padclr">Year of Completion <span class="pull-right">:</span></label>
				<div class="col-xs-6 nopadR text-rose"><?php echo $s_year_of_completion; ?></div>
			</div>
			<div class="gap5"></div>

			<div class="form-group">
				<label class="col-xs-6 padclr">Institution Name <span class="pull-right">:</span></label>
				<div class="col-xs-6 nopadR text-rose"><?php echo $s_institution_name; ?></div>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap40"></div>

		<div class="proBox1">
			<strong class="font20">Work Experience</strong>
			<div class="gap30"></div>

			<div class="form-group">
				<label class="col-xs-6 padclr">Organisation Name <span class="pull-right">:</span></label>
				<div class="col-xs-6 nopadR text-rose"><?php echo $s_organisation_name; ?></div>
			</div>
			<div class="gap5"></div>

			<div class="form-group">
				<label class="col-xs-6 padclr">Designation <span class="pull-right">:</span></label>
				<div class="col-xs-6 nopadR text-rose"><?php echo $s_work_experience; ?></div>
			</div>
			<div class="gap5"></div>

			<div class="form-group">
				<label class="col-xs-6 padclr">Start Date <span class="pull-right">:</span></label>
				<div class="col-xs-6 nopadR text-rose"><?php echo $s_start_date; ?></div>
			</div>
			<div class="gap5"></div>

			<div class="form-group">
				<label class="col-xs-6 padclr">End Date <span class="pull-right">:</span></label>
				<div class="col-xs-6 nopadR text-rose"><?php echo $s_end_date; ?></div>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap40"></div>

		<div class="proBox1">
			<strong class="font20">Employability Skills</strong>
			<div class="gap30"></div>

		<?php
			$query16 = "SELECT category_for, category_id, category_name FROM  master_category  WHERE category_id!='' AND category_for='14' ORDER BY category_id ASC";
			$statement16=$mysqli->prepare($query16);
			$statement16->execute();
			$statement16->store_result();
			$statement16->bind_result($category_for16, $category_id16, $category_name16);

			while($statement16->fetch()) {
		?>
			<div class="form-group">
				<label class="col-xs-8 padclr"><?php echo $category_name16; ?> <span class="pull-right">:</span></label>
				<div class="col-xs-4 nopadR text-rose">
					<?php 
						if($stu_eval[$category_id16]!=0) {
							echo numbtoDesi($stu_eval[$category_id16]/$nrows1_pd);
						} else {
							echo "0";
						}
					?>
				</div>
			</div>
			<div class="gap5"></div>
		<?php } ?>
		</div>

	</div>
</div>


<div class="gap20"></div>
<?php include("footer.php"); ?>
