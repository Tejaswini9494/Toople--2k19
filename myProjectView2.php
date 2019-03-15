<?php
$page="myProjectView2";
$title="My Project View";
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

$query1 = "SELECT institution_project_id FROM  institution_project_assign  WHERE institution_project_assign_id=$ipaid";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($institution_project_id);
$statement1->fetch();

$query2 = "SELECT project_id FROM  institution_project  WHERE institution_project_id=$institution_project_id";
$statement2=$mysqli->prepare($query2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($pid);
$statement2->fetch();

include("header.php"); ?>

<h3 class="">My Project View
<span class="pull-right"><a class="btn submitBk" href="javascript:history.back();">&raquo; Back</a></span>
</h3>
<div class="gap30"></div>

<?php include("in_projView_menu.php"); ?>
<div class="tab-content">
	<!---------- 1 --------->
	<div id="spro1" class="tab-pane fade in active">
		<div class="gap20"></div>
		<?php include("in_product_info.php"); ?>
		<div class="gap20"></div>
	</div>
</div>
<div class="gap30"></div>
<?php include("footer.php"); ?>
