<?php 
$page="user2Add";
include("header.php");?> 

<?php if($_SESSION["usertype"]==2) { ?>
 
<h3><a href="Javascript:history.back()" class="submitM pull-right">Back</a>My Profile &raquo; Edit</h3>
<?php } else{?>
<h3><a href="user2View.php" class="submitM pull-right">View</a> Representative of Service Provider Organization  &raquo; Add / Edit</h3>
<?php } ?>



<div class="gap10"></div>
  
<div class="animated fadeInUp">

<div class="item1">
	<div class="gap20"></div>
	<div class="form-group">
		<label class="col-sm-3 text-right">Are You? <span class="red">*</span></label>
		<div class="col-sm-9">
			<select required="required" class="form-control" id="usertype" name="usertype" disabled>
				<option value="">Select</option>		
				<option value="1">Project Student</option>
				<option value="2">Intern Student</option>
				<option value="3">Mentor</option>
				<option value="4">Content Provider</option>
				<option value="5">Representative of Customer Organization</option>
				<option value="6" selected>Representative of Service Provider Organization</option>
				<option value="7">Representative of Recruiting Organization</option>
				<option value="8">Representative of Internship Organization</option>
			</select>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap10"></div>
</div>
<div class="gap30"></div>


<!----------- Type 6 ------------>
<div id="">
	<?php include("in_ut6.php"); ?>
</div>
<!-----------/ Type 6 ------------>

<div class="gap30"></div>
</div>
    <!--inner  /-->



<?php  include("footer.php"); ?>
