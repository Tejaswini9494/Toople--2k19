<?php 
$page="productView_stu";
include("header.php");?>
 
 <?php if($_SESSION["usertype"]==1) { ?>
<h3><a href="Javascript:history.back()" class="submitM pull-right">Back</a>My Products</h3>
<?php } else{?>
<h3><a href="Javascript:history.back()" class="submitM pull-right">Back</a>Students &raquo; Products View</h3>
<?php } ?>

 


<div class="gap10"></div>

<!--content Box 
<div class="x_panel">
<div class="x_content">
-->
<div class="gap15"></div>
 
<h2>Student Info </h2>
<div class="table-responsive">
  <table class="table table-bordered table-striped tabBorder">
    <thead>
      <tr class="tr1">
        <td >Plan</td>
        <td >Type</td>
        <td >Name</td>
        <td >Email ID</td>
        <td >Identity Number</td>
        <td >Country</td>
        <td >State</td>
        <td >City</td>
        <td >Primary Contact </td>
        <td >Reg Date</td>
        <td > Status</td>
      </tr>
    </thead>
    <tr class="tr">
      <td >Silver</td>
      <td >Project </td>
      <td ><a href="profileView.php">Jack</a></td>
      <td >Jack@email.com</td>
      <td >9898989898</td>
      <td >India</td>
      <td >Tamilnadu</td>
      <td >Chennai</td>
      <td >9898989898</td>
      <td >22/04/2016</td>
      <td >Approved</td>
    </tr>
  </table>
</div>


<br />


<!-- Tab -->

<ul class="nav nav-tabs">
	<li class="active"><a data-toggle="tab" href="#Product1">Product 1</a></li>
	<li><a data-toggle="tab" href="#Product2">Product 2</a></li>
	<li><a data-toggle="tab" href="#Product3">Product 3</a></li>
</ul>

<div class="tab-content">
	<div id="Product1" class="tab-pane fade in active">
		<?php  include("in_prd.php"); ?>
	</div>
	<div id="Product2" class="tab-pane fade">
		<?php  include("in_prd.php"); ?>
	</div>
	<div id="Product3" class="tab-pane fade">
		<?php  include("in_prd.php"); ?>
	</div>
</div>

<!-- Tab /-->



<?php  include("footer.php"); ?>
