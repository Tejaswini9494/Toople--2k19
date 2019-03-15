<?php
$page="tooprojects_view";
$title="Tooople Projects View";
$ses="no";
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

session_start();
$type=$_SESSION['type'];
$user_id=$_SESSION["userid"];


$sql1 = "SELECT proj_id, project_id, name, category, proj_status, creation_date, termination_date, proj_abstract, notes, duration, dev_platform, status FROM  too_projects  WHERE proj_id='$pid'";
$statement1=$mysqli->prepare($sql1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($proj_id, $project_id, $name, $category, $proj_status, $creation_date, $termination_date, $proj_abstract, $notes, $duration, $dev_platform, $status);
$statement1->fetch();

if($user_id!='' && $type=='CIN') {
	$sql2 = "SELECT co_country FROM  customer_organisation  WHERE user_id='$user_id'";
	$statement2=$mysqli->prepare($sql2);
	$statement2->execute();
	$statement2->store_result();
	$statement2->bind_result($country_id);
	$statement2->fetch();
}elseif($user_id!='' && $type=='SP') {
	$sqlS = "SELECT s_country FROM  student_info  WHERE user_id='$user_id'";
	$statementS=$mysqli->prepare($sqlS);
	$statementS->execute();
	$statementS->store_result();
	$statementS->bind_result($country_id);
	$statementS->fetch();
}
//echo $country_id."#"	;

if($type!='SP' && $type!='CIN') {
	$sql4 = "SELECT country_id FROM  master_country  WHERE country_name='India'";
	$statement4=$mysqli->prepare($sql4);
	$statement4->execute();
	$statement4->store_result();
	$statement4->bind_result($country_id);
	$statement4->fetch();
}

$sql3 = "SELECT cost FROM  too_project_cost  WHERE country='$country_id' AND proj_id='$proj_id'";
$statement3=$mysqli->prepare($sql3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($cost3);
$statement3->fetch();

$sql5 = "SELECT currency FROM  master_country  WHERE country_id='$country_id'";
$statement5=$mysqli->prepare($sql5);
$statement5->execute();
$statement5->store_result();
$statement5->bind_result($currency);
$statement5->fetch();

$sqlC = "SELECT category_id,category_name FROM  master_category WHERE category_for='13'";
$statementC=$mysqli->prepare($sqlC);
$statementC->execute();
$statementC->store_result();
$statementC->bind_result($category_id,$category_name);

include("header.php"); ?>

<ol class="breadcrumb ">
	<li><a href="index.php">Home</a></li>
	<li><a href="tooprojects.php">Projects</a></li>
	<li class="active"><?php echo $name; ?></li>				
</ol> <!--product header ends-->
<div class="gap10"></div>

<div class="text-center">
<h4><?php echo $name; ?></h4>
<span class="separateLine"></span>
</div>
<div class="gap20"></div>

	<div class="row">
		<div class="col-md-8"><!--------col-md-9-------->
			<div class="projDetail_lhs"><!--------projDetail_lhs-------->
				<div class="row">
					<div class="col-md-3">
						<div class="projdet">
							<div class="col-md-3">
								<span class="projContimg"><img src="images/my_acc4.png"></span>
							</div>
							<div class="col-md-9 padclr">
								<span class="projDet_Tit">Created By</span><br>
								<span class="projDet_Con">Hima</span>
							</div>	
						</div>
					</div>
					<div class="col-md-3">
						<div class="projdet">
							<div class="col-md-3">
								<span class=""><i class="fa fa-tag"></i></span>
							</div>
							<div class="col-md-9 padclr">
								<span class="projDet_Tit">Project Id</span><br>
								<span class="projDet_Con"><?php echo $project_id; ?></span>
							</div>	
						</div>
					</div>
					<div class="col-md-3">
						<div class="projdet">
							<div class="col-md-3">
								<span class=""><i class="fa fa-cubes"></i></span>
							</div>
							<div class="col-md-9 padclr">
								<span class="projDet_Tit">Category</span><br>
								<span class="projDet_Con"><?php echo getcategoryname($category); ?></span>
							</div>	
						</div>
					</div>
					<div class="col-md-3">
						<div class="projdet1">
							<div class="col-md-3">
								<span class=""><i class="fa fa-cogs"></i></span>
							</div>
							<div class="col-md-9 padclr">
								<span class="projDet_Tit">Technology</span><br>
								<span class="projDet_Con"><?php echo getcategoryname($dev_platform); ?></span>
							</div>	
						</div>
					</div>
					<div class="gap20"></div>
				</div><!-------row------->
				<div class="gap20"></div>

				<div class="projDetail_img">
					<img src="images/images3.jpeg">
				</div>
				<div class="gap30"></div>

				<div class="proBox">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#Product1">Project Abstract</a></li>
						<li><a data-toggle="tab" href="#Product2">Project Notes</a></li>
					</ul>
					<div class="tab-content"><!-------tab-content------->
						<div id="Product1" class="tab-pane fade in active">
							<span class="text-justify"><?php echo $proj_abstract; ?></span>
						</div>
						<div id="Product2" class="tab-pane fade">
							<span class="text-justify"><?php echo $notes; ?></span>
						</div>
					</div><!-------tab-content------->
				</div><!--------proBox--------->

			</div><!--------projDetail_lhs-------->
		</div><!--------col-md-9-------->

		<div class="col-md-4"><!-----col-md-3-------->
			<div class="projDetail_rhs"><!-----projDetail_rhs-------->
				<div class="rhs_cat">
					<span class="price1"><?php echo $currency." ".$cost3?></span>
					<a href="institutionSelectedProject.php?pid=<?php echo $proj_id; ?>&btp=Y" class="btn submitM pull-right" style="padding:5px;">Buy this Project</a>
				</div>
				<div class="dividerLine"></div>
				<div class="gap10"></div>

				<div class="rhs_cat">
					<h5 class="projRhsTit">PROJECT FEATURES</h5>
		                        <span class="separateLine"></span>
					<div class="gap10"></div>
					<ul class="projRhsList1">
						<li><i class="fa fa-database"></i>&nbsp;Project Status<span class="pull-right"><?php echo getcategoryname($proj_status); ?></span></li>
						<li><i class="fa fa-clock-o"></i>&nbsp;Duration<span class="pull-right"><?php echo $duration; ?> Weeks</span></li>
						<li><i class="fa fa-calendar"></i>&nbsp;Creation Date</a><span class="pull-right"><?php echo sysDBDateConvert($creation_date); ?></span></li>
						<li><i class="fa fa-calendar-check-o"></i>&nbsp;Termination Date</a><span class="pull-right"><?php echo sysDBDateConvert($termination_date); ?></span></li>
					</ul>
				</div>
				<div class="dividerLine"></div>
				<div class="gap10"></div>

				<div class="rhs_cat">
					<h5 class="projRhsTit">PROJECT CATEGORIES</h5>
		                        <span class="separateLine"></span>
					<div class="gap10"></div>
					<ul class="projRhsList">
					<?php
						$query7= "SELECT COUNT(a.proj_id), b.category_name, b.category_id FROM  too_projects a, master_category b  WHERE a.proj_id!='' AND a.status='A' AND b.category_for='13' AND a.category=b.category_id GROUP BY a.category";
						$statement7=$mysqli->prepare($query7);
						$statement7->store_result();
						$statement7->bind_result($projcat_count, $projcat_name, $projcat_id);
						$statement7->execute();
						while($statement7->fetch()) {
					?>
						<li class="<?php if($projcat_id==$pctid) { echo 'active'; } ?>">
							<a href="tooprojects.php?pctid=<?php echo $projcat_id; ?>"><?php echo $projcat_name; ?></a>
							<span class="pull-right"><?php echo $projcat_count; ?></span>
						</li>
					<?php } $statement7->close(); ?>
					</ul>
				</div>
				<div class="dividerLine"></div>
				<div class="gap10"></div>

				<div class="rhs_cat">
					<h5 class="projRhsTit">TECHNOLOGY</h5>
		                        <span class="separateLine"></span>
					<div class="gap10"></div>
					<ul class="projRhsList">
					<?php
						$query8= "SELECT COUNT(a.proj_id), b.category_name, b.category_id FROM  too_projects a, master_category b  WHERE a.proj_id!='' AND a.status='A' AND b.category_for='9' AND a.dev_platform=b.category_id GROUP BY a.dev_platform";
						//echo $query8;
						$statement8=$mysqli->prepare($query8);
						$statement8->store_result();
						$statement8->bind_result($projtech_count, $projtech_name, $projtech_id);
						$statement8->execute();
						while($statement8->fetch()) {
					?>
						<li class="<?php if($projtech_id==$pctid) { echo 'active'; } ?>">
							<a href="tooprojects.php?ptcid=<?php echo $projtech_id; ?>"><?php echo $projtech_name; ?></a>
							<span class="pull-right"><?php echo $projtech_count; ?></span>
						</li>
					<?php } $statement8->close(); ?>
					</ul>
				</div>
				<!--<div class="dividerLine"></div>-->
			</div><!-----projDetail_rhs-------->
		</div><!-----col-md-3-------->
	</div>

<div class="gap20"></div>
<?php include("footer.php"); ?>
