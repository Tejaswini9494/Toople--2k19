<?php  
$page="content_add";
include("header.php"); ?>

<h3><a href="Javascript:history.back()" class="submitM pull-right">Back</a> Content &raquo; Add / Edit</h3>

<div class="gap10"></div>
<!--content Box -->
<div class="x_panel">
<div class="x_content">

<form id="proVendor_edit" method="POST">

<div class="form-group">
	<label class="col-md-5 text-right">Content Name <span class="red">*</span></label>
	<div class="col-md-5">
	  <input type="text" class="form-control" />
	</div>
</div>
<div class="gap15"></div>

<div class="form-group">
	<label class="col-md-5 text-right">Category <span class="red">*</span></label>
	<div class="col-md-5">
		<select id="category" name="category" class="form-control">
			<option value="">Category</option>
			<option>Category1</option>
			<option>Category2</option>
		</select>
	</div>
</div>
<div class="gap15"></div>

<div class="form-group">
	<label class="col-md-5 text-right">Objectives</label>
	<div class="col-md-5">
		<textarea id="item_Desc" name="item_Desc" class="form-control" placeholder=""></textarea>
	</div>
</div>
<div class="gap15"></div>

<div class="form-group">
	<label class="col-md-5 text-right">Complexity Level <span class="red">*</span></label>
	<div class="col-md-5">
		<select id="category" name="category" class="form-control">
			<option value="">Category</option>
			<option>High</option>
			<option>Medium</option>
			<option>Low</option>
		</select>
	</div>
</div>
<div class="gap15"></div>

<div class="form-group">
	<label class="col-md-5 text-right">Business Scenerio</label>
	<div class="col-md-5">
		<textarea id="item_Desc" name="item_Desc" class="form-control" placeholder=""></textarea>
	</div>
</div>
<div class="gap15"></div>

<div class="form-group">
	<label class="col-md-5 text-right">Problem Statement</label>
	<div class="col-md-5">
		<textarea id="item_Desc" name="item_Desc" class="form-control" placeholder=""></textarea>
	</div>
</div>
<div class="gap15"></div>

<div class="form-group">
	<label class="col-md-5 text-right">Expectation Outcome</label>
	<div class="col-md-5">
		<textarea id="item_Desc" name="item_Desc" class="form-control" placeholder=""></textarea>
	</div>
</div>
<div class="gap15"></div>

<div class="form-group">
	<label class="col-md-5 text-right">Tools</label>
	<div class="col-md-5">
		<textarea id="item_Desc" name="item_Desc" class="form-control" placeholder=""></textarea>
	</div>
</div>
<div class="gap15"></div>

<div class="form-group">
	<label class="col-md-5 text-right">Reference URL</label>
	<div class="col-md-5">
		<textarea id="item_Desc" name="item_Desc" class="form-control" placeholder=""></textarea>
	</div>
</div>
<div class="gap15"></div>

<div class="form-group">
	<label class="col-md-5 text-right">Content Image/Document </label>
	<div class="col-md-5">
	  <input type="file"  />
	</div>
</div>
<div class="gap15"></div>

<div class="col-md-5 col-md-push-5">
	<input type="submit" class="" value="Save &amp; Update"> &nbsp;
	<input type="reset" id="" name="" class="submit cancelBtn" value="Cancel">
</div>
<div class="gap15"></div>

</form>

<?php include("footer.php"); ?>
