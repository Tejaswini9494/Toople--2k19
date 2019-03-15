<?php
$page="tooAlgorithms_view";
$title="Tooople  Algorithms View";
$ses="no";
include_once("class/config.php");
include_once("includes/functions.php");
session_start();
$usrtype=$_SESSION["type"];

extract($_REQUEST);


$query1 = "SELECT algo_id, algorithm_id, name, category, objectives, complexity, busi_scenerio, pblm_stmt, exp_outcome, tools, ref_url, imgdoc, created_by, status FROM  too_algorithm  WHERE algo_id='$aid'";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($algo_id, $algorithm_id, $name, $category, $objectives, $complexity, $busi_scenerio, $pblm_stmt, $exp_outcome, $tools, $ref_url, $imgdoc, $created_by, $status);
$statement1->fetch();

$query2 = "SELECT algosolve_id, name, solution, deliverables, updated_on FROM  too_algosolve  WHERE algosolve_id!='' AND algo_id='$aid'";
$statement2=$mysqli->prepare($query2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($algosolve_id, $nameso, $solution, $deliverables, $updated_onso);

$query3 = "SELECT subcategory_id, subcategory_name FROM  master_subcategory  WHERE subcategory_id='$category'";
$statement3=$mysqli->prepare($query3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($subcategory_id, $subcategory_name);
$statement3->fetch();

$query4 = "SELECT subcategory_id, subcategory_name FROM  master_subcategory  WHERE subcategory_id='$complexity'";
$statement4=$mysqli->prepare($query4);
$statement4->execute();
$statement4->store_result();
$statement4->bind_result($subcategory_id1, $subcategory_name1);
$statement4->fetch();


include("header.php"); ?>


<h3 class="text-center"><?php echo $name; ?>
<span class="pull-right"><a href="javascript:history.back();" class="btn submitBk">&raquo; Back</a></span>
</h3>
<div class="gap30"></div>

	<h5 class="text-grey1"> Algorithm Code</h5>
	<?php echo $algorithm_id; ?>
	<br><br>

	<h5 class="text-grey1"> Algorithm Category</h5>
	<?php echo $subcategory_name; ?>
	<br><br>


	<h5 class="text-grey1">Objectives</h5>
	<?php echo $objectives; ?>
	<br><br>

	<h5 class="text-grey1">Complexity Level</h5>
	<?php echo $subcategory_name1; ?>
	<br><br>

	<h5 class="text-grey1"> Business Scenario</h5>
	<?php echo $busi_scenerio; ?>
	<br><br>

	<h5 class="text-grey1">Problem Statement</h5>
	<?php echo $pblm_stmt; ?>
	<br><br>

	<h5 class="text-grey1">Expected Outcome</h5>
	<?php echo $exp_outcome; ?>
	<br><br>

	<h5 class="text-grey1"> Tools</h5>
	<?php echo $tools; ?>
	<br><br>

	<h5 class="text-grey1"> Reference URL</h5>
	<?php echo $ref_url; ?>
	<br><br>

	<h5 class="text-grey1"> Algorithm Image/Document</h5>
		<a href="uploads/algorithm/<?php echo $imgdoc; ?>" target="_blank">
<img src="images/doc.png" width="150px">
</a>
		
	<br><br>


	<a href="#review" data-toggle="collapse" class="font16">Click Here to View Previous Solutions</a>
	<div class="gap20"></div>
	<!---------------------------------->
<div id="review" class="collapse">
<?php while($statement2->fetch()) {
	$updated_onso=sysDBDateConvert($updated_onso);
?>
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title"><?php echo $nameso; ?><span class="pull-right"><?php echo $updated_onso; ?></span></h3>
	  </div>
	  <div class="panel-body">
		<?php echo $solution; ?>
		<?php if($deliverables!='') { ?>
			<div class="gap20"></div>
			<a href="uploads/algorithm/<?php echo $deliverables; ?>" target="_blank">Deliverables</a>
		<?php } ?>
	  </div>
	</div>
	<div class="gap20"></div>
<?php } ?>
</div>
	<!---------------------------------->
	<?php if($usrtype!='SP' && $usrtype!='SI'){ ?>
	<div class="gap30"></div>
	<a href="algorithmSolution.php?aid=<?php echo $algo_id; ?>" class="btn submitM">Solve  Algorithm</a>
	<?php } ?>

<div class="gap20"></div>
<?php include("footer.php"); ?>
