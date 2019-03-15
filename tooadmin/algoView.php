<?php  
$page="algoView";
$xpan="no";
include_once("../class/config.php");
include_once("../includes/functions.php");
include("header.php");
extract($_REQUEST);

$sql="select * from too_algorithm where algo_id='$id'";
$sql=$mysqli->prepare($sql);
$sql->execute();
$sql->store_result();
$sql->bind_result($algo_id,$algorithm_id,$name,$category,$objectives,$complexity,$busi_scenerio,$pblm_stmt,$exp_outcome,$tools,$ref_url,$imgdoc,$created_by,$added_date,$updated_on,$status);
$sql->fetch();

$sql4 = "SELECT subcategory_id, subcategory_name FROM  master_subcategory  WHERE subcategory_id='$complexity'";
$statement4=$mysqli->prepare($sql4);
$statement4->execute();
$statement4->store_result();
$statement4->bind_result($subcategory_id1, $subcategory_name1);
$statement4->fetch();
 ?>

<h3>
Algorithm <span class="back"><a href="Javascript:history.back()">Back</a></span></h3>

<div class="gap10"></div>
<div class="viewTab">

<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Algorithm Id</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $algorithm_id;?></div>
	<div class="gap1"></div>
</div>


<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Algorithm Name</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $name;?></div>
	<div class="gap1"></div>
</div>

<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Category</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo getsubcategoryname($category);?></div>
	<div class="gap1"></div>
</div>

<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Objectives</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $objectives;?></div>
	<div class="gap1"></div>
</div>

<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Complexity Level</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $subcategory_name1;?></div>
	<div class="gap1"></div>
</div>

<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Business Scenerio</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $busi_scenerio;?></div>
	<div class="gap1"></div>
</div>

<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Problem Statement</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $pblm_stmt;?></div>
	<div class="gap1"></div>
</div>

<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Expectation Outcome</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $exp_outcome;?></div>
	<div class="gap1"></div>
</div>

<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Tools</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $tools;?></div>
	<div class="gap1"></div>
</div>

<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Reference URL</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $ref_url;?></div>
	<div class="gap1"></div>
</div>



</div>

<div class="gap30"></div>

<?php include("footer.php"); ?>
