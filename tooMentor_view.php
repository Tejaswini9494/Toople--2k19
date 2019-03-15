<?php
$page="tooprojects_view";
$title="Tooople Projects View";
$ses="no";
$p=$_GET['p'];
include("header.php"); ?>

<h3 class="text-center">Mentor Name</h3>
<div class="gap30"></div>

	<h5 class="text-grey1">Mentor ID</h5>
	CM11-IATA-ACD
	<br><br>

	<h5 class="text-grey1">Mentor Category</h5>
	Aerodynamics
	<br><br>

	<h5 class="text-grey1">Mentor Specialization</h5>
	PHP
	<br><br>

	<h5 class="text-grey1">Description </h5>
	The attainment of this Diploma is proof that the holder has gained a well-rounded understanding of today's complex cargo environment and is a true professional in his field of expertise 
	<br><br>

	<div class="gap20"></div>
	<a href="#review" data-toggle="collapse" class="font16">Reviews</a>
	<div class="gap20"></div>
	<!---------------------------------->
<div id="review" class="collapse">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Mr. John<span class="pull-right">19-Oct,2016</span></h3>
	  </div>
	  <div class="panel-body">
		Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.
	  </div>
	</div>
	<div class="gap20"></div>
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Mr. John<span class="pull-right">19-Oct,2016</span></h3>
	  </div>
	  <div class="panel-body">
		Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.
	  </div>
	</div>
	<div class="gap20"></div>
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Mr. John<span class="pull-right">19-Oct,2016</span></h3>
	  </div>
	  <div class="panel-body">
		Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.
	  </div>
	</div>
	<div class="gap20"></div>
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Mr. John<span class="pull-right">19-Oct,2016</span></h3>
	  </div>
	  <div class="panel-body">
		Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.
	  </div>
	</div>
	<div class="gap20"></div>
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Mr. John<span class="pull-right">19-Oct,2016</span></h3>
	  </div>
	  <div class="panel-body">
		Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.
	  </div>
	</div>
</div>
	<!---------------
	<div class="gap30"></div>
		<?php if($_SESSION["type"]=="institution") { ?>
		<a href="mentorPay.php" class="btn btn-primary">Payment</a>
	<?php } else { ?>
<?php if($p==1) { } else { ?>
	<?php if($_SESSION["sesLoggedInTOOPLE2016"]=="") { ?>
	<a href="index.php" class="btn submitM">Take Project</a>
	<?php } else { ?>
	<a href="paySummary.php" class="btn submitM">Choose Mentor</a>
	<?php } ?>
<?php } ?>

		<?php } ?>
------------------->
<div class="gap20"></div>
<?php include("footer.php"); ?>
