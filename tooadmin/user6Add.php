<?php 
$page="user6Add";
include("header.php");?> 
<h3>
<a href="Javascript:history.back()" class="submitM pull-right">Back</a>
Representative of Internship Organization   &raquo; Add / Edit</h3>

<div class="gap10"></div>


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
				<option value="6">Representative of Service Provider Organization</option>
				<option value="7">Representative of Recruiting Organization</option>
				<option value="8" selected>Representative of Internship Organization</option>
			</select>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap10"></div>
</div>
<div class="gap30"></div>

<?php include("in_ut8.php"); ?>

<div class="gap30"></div>
</div>
    <!--inner  /-->

<?php  include("footer.php"); ?>