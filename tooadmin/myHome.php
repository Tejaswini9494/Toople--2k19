<?php  
$page="myHome";
$xpan="no";
include("header.php"); ?>


<?php if($_SESSION["usertype"]==1) { ?>
	<p style="min-height:300px; text-align:center; font-size:20px;">Under Construction</p>
<?php } else if($_SESSION["usertype"]==2) { ?>
	<p style="min-height:300px; text-align:center; font-size:20px;">Under Construction</p>
<?php } else if($_SESSION["usertype"]==3) { ?>
	<?php include("in_dash3.php"); ?>
<?php } ?>


<?php include("footer.php"); ?>
