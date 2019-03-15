<?php  
$page="productsView";
//$tit="Product Management";
$xpan="no";
include_once("../class/config.php");
include_once("../includes/functions.php");
include("header.php");
extract($_REQUEST);

$sql="select proj_id, project_id, name, category, proj_created_by, proj_status, creation_date, termination_date, proj_abstract, notes, duration, dev_platform, created_by, added_date, updated_on, status from too_projects where proj_id='$id'";
$sql=$mysqli->prepare($sql);
$sql->execute();
$sql->store_result();
$sql->bind_result($proj_id,$project_id,$name,$category,$proj_created_by,$proj_status,$creation_date,$termination_date,$proj_abstract,$notes,$duration,$dev_platform,$created_by,$added_date,$updated_on,$status);
$sql->fetch();

$query1 = "SELECT category_name FROM master_category  WHERE category_id='$category'";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($subcategory_name1);
$statement1->fetch();



$query3 = "SELECT category_name FROM master_category  WHERE category_id='$proj_status'";
$statement3=$mysqli->prepare($query3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($subcategory_name3);
$statement3->fetch();

 ?>

<h3>
Project Management <span class="back"><a href="Javascript:history.back()">Back</a></span></h3>

<div class="gap10"></div>
<h2>Primary Information</h2>
<div class="viewTab">

<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Project Id</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $project_id;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Project name</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $name;?></div>
	<div class="gap1"></div>
</div>

<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Project Category</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $subcategory_name1;?></div>
	<div class="gap1"></div>
</div>

<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Created By</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $proj_created_by;?></div>
	<div class="gap1"></div>
</div>

<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Project Status</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $subcategory_name3;?></div>
	<div class="gap1"></div>
</div>

<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Created Date</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo sysDBDateConvert($creation_date) ;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Termination Date</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo sysDBDateConvert($termination_date) ;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Abstract</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $proj_abstract ;?></div>
	<div class="gap1"></div>
</div>



<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Note</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $notes;?>
    </div>
	<div class="gap1"></div>
</div>

</div>


<div class="gap10"></div>
<h2>Additional Information</h2>

<div class="viewTab">


<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Project Duration</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $duration;?></div>
	<div class="gap1"></div>
</div>

<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Project Development Platform</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo getcategoryname($dev_platform); ?></div>
	<div class="gap1"></div>
</div>

</div>

<h2>Product Cost</h2>
<table width="100%" class="table table-striped border">
<tr >
   <td>Country</td>
   <td>Cost</td>
</tr>
<?php 
$sql="select country,cost from too_project_cost where proj_id='$proj_id'";
$sql=$mysqli->prepare($sql);
$sql->execute();
$sql->store_result();
$sql->bind_result($country,$cost);
while($sql->fetch())
{
?>
<tr>
	<td><?php echo getCountryName($country); ?></td>
	<td><?php echo $cost; ?></td>
</tr>
<?php
}
?>
</table>


<div class="gap30"></div>
<?php include("footer.php"); ?>
