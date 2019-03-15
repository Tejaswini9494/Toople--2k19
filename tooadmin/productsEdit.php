<?php  
$page="productsEdit";
include("header.php"); ?>

<h3>
Products &raquo; Edit <span class="back"><a href="products.php">View</a></span></h3>

<div class="gap10"></div>

<!--content Box -->
<div class="x_panel">
<div class="x_content">

<form id="proVendor_edit" method="POST">

<h2>Primary Information</h2>

<div class="form-group">
	<label class="col-md-5 text-right">Product Name <span class="red">*</span></label>
	<div class="col-md-5">
	  <input type="text" class="form-control" />
	</div>
</div>
<div class="gap15"></div>


<div class="form-group">
	<label class="col-md-5 text-right">Product Category <span class="red">*</span></label>
	<div class="col-md-5">
		<select id="pro_category" name="pro_category" class="form-control">
			<option value="">Category</option>
			<option>Category1</option>
			<option>Category2</option>
		</select>
	</div>
</div>
<div class="gap15"></div>
<div class="form-group">
	<label class="col-md-5 text-right">Product Sub-Category <span class="red">*</span></label>
	<div class="col-md-5">
		<select id="pro_subcategory" name="pro_subcategory" class="form-control">
			<option value="">Sub-Category</option>
			<option>Sub-Category1</option>
			<option>Sub-Category2</option>
		</select>
	</div>
</div>
<div class="gap15"></div>
<div class="form-group">
	<label class="col-md-5 text-right">Abstract</label>
	<div class="col-md-5">
		<textarea id="item_Desc" name="item_Desc" class="form-control" placeholder="Type Item Description"></textarea>
	</div>
</div>
<div class="gap15"></div>
<div class="form-group">
	<label class="col-md-5 text-right">Notes</label>
	<div class="col-md-5">
		<textarea id="item_Desc" name="item_Desc" class="form-control" placeholder="Type Item Description"></textarea>
	</div>
</div>
<div class="gap15"></div>


<h2>Additional Information</h2>

<div class="gap15"></div>
<div class="form-group">
	<label class="col-md-5 text-right">Mentor Guidelines</label>
	<div class="col-md-5">
		<textarea id="item_Desc" name="item_Desc" class="form-control" placeholder="Type Item Description"></textarea>
	</div>
</div>



<div class="gap15"></div>
<div class="form-group">
	<label class="col-md-5 text-right">Product Scenario</label>
	<div class="col-md-5">
		<textarea id="item_Desc" name="item_Desc" class="form-control" placeholder="Type Item Description"></textarea>
	</div>
</div>



<div class="gap15"></div>
<div class="form-group">
	<label class="col-md-5 text-right">Learning Objectives</label>
	<div class="col-md-5">
		<textarea id="item_Desc" name="item_Desc" class="form-control" placeholder="Type Item Description"></textarea>
	</div>
</div>



<div class="gap15"></div>
<div class="form-group">
	<label class="col-md-5 text-right">Expected Out Come</label>
	<div class="col-md-5">
		<textarea id="item_Desc" name="item_Desc" class="form-control" placeholder="Type Item Description"></textarea>
	</div>
</div>



<div class="gap15"></div>
<div class="form-group">
	<label class="col-md-5 text-right">Product Reference</label>
	<div class="col-md-5">
		<textarea id="item_Desc" name="item_Desc" class="form-control" placeholder="Type Item Description"></textarea>
	</div>
</div>


<div class="gap15"></div>
<div class="form-group">
	<label class="col-md-5 text-right">Software Requirement</label>
	<div class="col-md-5">
		<textarea id="item_Desc" name="item_Desc" class="form-control" placeholder="Type Item Description"></textarea>
	</div>
</div>



 <div class="gap15"></div> 
<div class="col-md-5 col-md-push-5">
	<input type="submit" id="" name="" class="" value="Submit"> &nbsp;
	<input type="reset" id="" name="" class="submit cancelBtn" value="Cancel">
</div>
<div class="gap15"></div>

</form>

<?php include("footer.php"); ?>
