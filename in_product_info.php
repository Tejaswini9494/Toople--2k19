
<?php
$sql_projectinfo = "SELECT proj_id, project_id, category, proj_created_by, proj_status, creation_date, proj_abstract  FROM too_projects  where proj_id='$pid'";
$sql_project_info=$mysqli->prepare($sql_projectinfo);
$sql_project_info->execute();
$sql_project_info->store_result();
$sql_project_info->bind_result($proj_id, $project_id, $category, $proj_created_by, $proj_status, $creation_date, $proj_abstract);
$sql_project_info->fetch();
//echo $proj_id;

$creation_date=sysDBDateConvert($creation_date);

$query1 = "SELECT category_name FROM master_category  WHERE category_id=$category";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($subcategory_name1);
$statement1->fetch();



$query3 = "SELECT category_name  FROM master_category  WHERE category_id=$proj_status";
$statement3=$mysqli->prepare($query3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($subcategory_name3);
$statement3->fetch();

?>

<div class="gap10"></div> 
<h4>Project Info</h4>
<div class="viewTab">
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Project Id</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $project_id;?></div>
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
<!--
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Program Id</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $s_identify_number;?></div>
	<div class="gap1"></div>
</div>
-->

<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Abstract</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $proj_abstract;?></div>
	<div class="gap1"></div>
</div>
</div>
<div class="gap10"></div> 

