<?php
$page="tutorial_view";
$title="Tutorial View";
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

include("header.php"); 

$query1= "SELECT resource_category, resource_title, resource_contents, resource_link FROM  too_resources  WHERE resource_id='$id'";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($resource_category, $resource_title, $resource_contents, $resource_link);
$statement1->fetch();
$statement1->close();

?>

<h3 class="assTitle1"><?php echo $resource_title; ?></h3>
<div class="gap5"></div>
<div class="assTitle2"><?php echo getValue('master_category', 'category_name', 'category_id', $resource_category); ?></div>
<div class="gap20"></div>

<div class="assContent">
<?php echo $resource_contents; ?>
</div>

<div class="gap20"></div>
<?php include("footer.php"); ?>
