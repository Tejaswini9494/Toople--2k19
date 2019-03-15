<?php  
$page="productsAdd";
include("header.php"); ?>

<h3><a href="Javascript:history.back()" class="submitM pull-right">Back</a> Products &raquo; Add / Edit</h3>

<div class="gap10"></div>
<!--content Box -->
<div class="x_panel">
<div class="x_content">

<form id="proVendor_edit" method="POST">

<ul class="nav nav-tabs">
	<li class="active ntab"><a data-toggle="tab" href="#spro1">Primary Information</a></li>
	<li class="ntab"><a data-toggle="tab" href="#spro2">Additional Information</a></li>
	<li class="ntab"><a data-toggle="tab" href="#spro3">Product Deliverables</a></li>
	<li class="ntab"><a data-toggle="tab" href="#spro4">Product Solution</a></li>
	<li class="ntab"><a data-toggle="tab" href="#spro5">Product Cost</a></li>
</ul>

<div class="tab-content">
	<!---------- 1 --------->
	<div id="spro1" class="tab-pane fade in active">
		<div class="gap20"></div>
		<h4>Primary Information</h4>
		<div class="gap20"></div>
		<div class="form-group">
			<label class="col-md-5 text-right">Product Title <span class="red">*</span></label>
			<div class="col-md-5">
			  <input type="text" class="form-control" />
			</div>
		</div>
		<div class="gap15"></div>

		<div class="form-group">
			<label class="col-md-5 text-right">Product ID <span class="red">*</span></label>
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
					<option>Loaded From Masters</option>
				</select>
			</div>
		</div>
		<div class="gap15"></div>

		<div class="form-group">
			<label class="col-md-5 text-right">Product Created By <span class="red">*</span></label>
			<div class="col-md-5">
				<select id="pro_category" name="pro_category" class="form-control">
					<option value="">Select</option>
					<option>Loaded From Mentors/Content Provider Masters</option>
				</select>
			</div>
		</div>
		<div class="gap15"></div>

		<div class="form-group">
			<label class="col-md-5 text-right">Product Status <span class="red">*</span></label>
			<div class="col-md-5">
				<select id="pro_category" name="pro_category" class="form-control">
					<option value="">Select</option>
				</select>
			</div>
		</div>
		<div class="gap15"></div>

		<div class="form-group">
			<label class="col-md-5 text-right">Creation Date <span class="red">*</span></label>
			<div class="col-md-5">
				<input type="text" class="form-control date" />
			</div>
		</div>
		<div class="gap15"></div>

		<div class="form-group">
			<label class="col-md-5 text-right">Product Abstract</label>
			<div class="col-md-5">
				<textarea id="item_Desc" name="item_Desc" class="form-control" placeholder=""></textarea>
			</div>
		</div>
		<div class="gap15"></div>

		<div class="form-group">
			<label class="col-md-5 text-right">Product Notes</label>
			<div class="col-md-5">
				<textarea id="item_Desc" name="item_Desc" class="form-control" placeholder=""></textarea>
			</div>
		</div>
	</div>

	<!---------- 2 --------->
	<div id="spro2" class="tab-pane fade">
		<div class="gap20"></div>
		<h4>Additional Information</h4>
		<div class="gap20"></div>

		<!--<div class="form-group">
			<label class="col-md-5 text-right">Product ID <span class="red">*</span></label>
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
			<label class="col-md-5 text-right">Product Created By <span class="red">*</span></label>
			<div class="col-md-5">
				<input type="text" class="form-control" />
			</div>
		</div>
		<div class="gap15"></div>

		<div class="form-group">
			<label class="col-md-5 text-right">Product Status <span class="red">*</span></label>
			<div class="col-md-5">
				<select id="pro_category" name="pro_category" class="form-control">
					<option value="">Select</option>
				</select>
			</div>
		</div>
		<div class="gap15"></div>

		<div class="form-group">
			<label class="col-md-5 text-right">Creation Date <span class="red">*</span></label>
			<div class="col-md-5">
				<input type="text" class="form-control date" />
			</div>
		</div>
		<div class="gap15"></div>-->

		<div class="form-group">
			<label class="col-md-5 text-right">Product Abstract</label>
			<div class="col-md-5">
				<textarea id="item_Desc" name="item_Desc" class="form-control" placeholder=""></textarea>
			</div>
		</div>
		<div class="gap15"></div>

		<div class="form-group">
			<label class="col-md-5 text-right">Product Notes</label>
			<div class="col-md-5">
				<textarea id="item_Desc" name="item_Desc" class="form-control" placeholder=""></textarea>
			</div>
		<div class="gap15"></div>

		<div class="form-group">
			<label class="col-md-5 text-right"> Product Duration <span class="red">*</span></label>
			<div class="col-md-5">
				<input type="text" class="form-control date" />
			</div>
		</div>
		<div class="gap15"></div>

		<div class="form-group">
			<label class="col-md-5 text-right">Product Development Platform <span class="red">*</span></label>
			<div class="col-md-5">
				<input type="text" class="form-control" />
			</div>
		</div>
		</div>
	</div>

	<!---------- 3 --------->
	<div id="spro3" class="tab-pane fade">
		<div class="gap20"></div>
		<h4>Product Deliverables</h4>
		<div class="gap20"></div>

		<div class="form-group">
			<label class="col-md-5 text-right">Week Number <span class="red">*</span></label>
			<div class="col-md-5">
			  <input type="text" class="form-control" />
			</div>
		</div>
		<div class="gap15"></div>

		<div class="form-group">
			<label class="col-md-5 text-right">Deliverable <span class="red">*</span></label>
			<div class="col-md-5">
			  <input type="text" class="form-control" />
			</div>
		</div>
		<div class="gap15"></div>

		<div class="form-group">
			<label class="col-md-5 text-right">Deliverable Notes <span class="red">*</span></label>
			<div class="col-md-5">
			  <input type="text" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-5 text-right">Deliverable Document <span class="red">*</span></label>
			<div class="col-md-5">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
				<input type="file" placeholder="" class="form-control" id="" name="">
				</div>
				<div class="gap1"></div>
			</div>
		</div>
	</div>

	<!---------- 4 --------->
	<div id="spro4" class="tab-pane fade">
		<div class="gap20"></div>
		<h4>Product Solution</h4>
		<div class="gap20"></div>

		<div class="form-group">
			<label class="col-sm-3 text-right">Solution Notes <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
				<input type="text" placeholder="" class="form-control" id="" name="">
				</div>
				<div class="gap1"></div>
				<span class="errors" for=""></span>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap10"></div>

		<div class="form-group">
			<label class="col-sm-3 text-right">Solution Diagram <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
				<input type="file" placeholder="" class="form-control" id="" name="">
				</div>
				<div class="gap1"></div>
				<span class="errors" for=""></span>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap10"></div>

		<div class="form-group">
			<label class="col-sm-3 text-right">Solution Files <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
				<input type="file" placeholder="" class="form-control" id="" name="">
				</div>
				<div class="gap1"></div>
				<span class="errors" for=""></span>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap10"></div>

	</div>

	<!---------- 5 --------->
	<div id="spro5" class="tab-pane fade">
		<div class="gap20"></div>
		<h4>Product Cost</h4>
		<div class="gap20"></div>

		<div class="form-group">
			<label class="col-md-5 text-right">Country <span class="red">*</span></label>
			<div class="col-md-5">
			  <select class="form-control">
				<option value="">Select</option>
				<option selected>Singapore</option>
				<option>Loaded from Master</option>
			  </select>
			</div>
		</div>
		<div class="gap15"></div>

		<div class="form-group">
			<label class="col-md-5 text-right">Currency</label>
			<div class="col-md-5">
			  <input type="text" class="form-control" value="SGD" readonly/>
			</div>
		</div>
		<div class="gap15"></div>

		<div class="form-group">
			<label class="col-md-5 text-right">Cost</label>
			<div class="col-md-5">
			  <input type="text" class="form-control" />
			</div>
		</div>
		<div class="gap15"></div>

		<div class="form-group">
			<div class="col-md-5 col-md-push-5">
			  <input type="submit" class="submitM pull-right" value="Add Cost"/>
			  <div class="gap15"></div>

			  <div class="table-responsive">
				<table class="table table-bordered table-striped tabBorder dataTable no-footer">
					<tr class="tr1">
						<td>S.No.</td>
						<td>Country</td>
						<td>Currency</td>
						<td>Cost</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Singapore</td>
						<td>SGD</td>
						<td>800.00</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Singapore</td>
						<td>SGD</td>
						<td>800.00</td>
					</tr>
					<tr>
						<td>3</td>
						<td>Singapore</td>
						<td>SGD</td>
						<td>800.00</td>
					</tr>
				</table>
			  </div>
			</div>
		</div>
	</div>

</div>


<!--<h2>Primary Information</h2>

<div class="form-group">
	<label class="col-md-5 text-right">Product ID <span class="red">*</span></label>
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
	<label class="col-md-5 text-right">Product Created By <span class="red">*</span></label>
	<div class="col-md-5">
		<input type="text" class="form-control" />
	</div>
</div>
<div class="gap15"></div>

<div class="form-group">
	<label class="col-md-5 text-right">Product Status <span class="red">*</span></label>
	<div class="col-md-5">
		<select id="pro_category" name="pro_category" class="form-control">
			<option value="">Select</option>
		</select>
	</div>
</div>
<div class="gap15"></div>

<div class="form-group">
	<label class="col-md-5 text-right">Creation Date <span class="red">*</span></label>
	<div class="col-md-5">
		<input type="text" class="form-control date" />
	</div>
</div>
<div class="gap15"></div>

<div class="form-group">
	<label class="col-md-5 text-right">Product Abstract</label>
	<div class="col-md-5">
		<textarea id="item_Desc" name="item_Desc" class="form-control" placeholder=""></textarea>
	</div>
</div>
<div class="gap15"></div>

<div class="form-group">
	<label class="col-md-5 text-right">Product Notes</label>
	<div class="col-md-5">
		<textarea id="item_Desc" name="item_Desc" class="form-control" placeholder=""></textarea>
	</div>
</div>
<div class="gap15"></div>


<h2>Additional Information</h2>

<div class="form-group">
	<label class="col-md-5 text-right">Product ID <span class="red">*</span></label>
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
	<label class="col-md-5 text-right">Product Created By <span class="red">*</span></label>
	<div class="col-md-5">
		<input type="text" class="form-control" />
	</div>
</div>
<div class="gap15"></div>

<div class="form-group">
	<label class="col-md-5 text-right">Product Status <span class="red">*</span></label>
	<div class="col-md-5">
		<select id="pro_category" name="pro_category" class="form-control">
			<option value="">Select</option>
		</select>
	</div>
</div>
<div class="gap15"></div>

<div class="form-group">
	<label class="col-md-5 text-right">Creation Date <span class="red">*</span></label>
	<div class="col-md-5">
		<input type="text" class="form-control date" />
	</div>
</div>
<div class="gap15"></div>

<div class="form-group">
	<label class="col-md-5 text-right">Product Abstract</label>
	<div class="col-md-5">
		<textarea id="item_Desc" name="item_Desc" class="form-control" placeholder=""></textarea>
	</div>
</div>
<div class="gap15"></div>

<div class="form-group">
	<label class="col-md-5 text-right">Product Notes</label>
	<div class="col-md-5">
		<textarea id="item_Desc" name="item_Desc" class="form-control" placeholder=""></textarea>
	</div>
</div>
<div class="gap15"></div>

<h2>Product Deliverables</h2>

<div class="form-group">
	<label class="col-md-5 text-right">Week Number <span class="red">*</span></label>
	<div class="col-md-5">
	  <input type="text" class="form-control" />
	</div>
</div>
<div class="gap15"></div>

<div class="form-group">
	<label class="col-md-5 text-right">Deliverable <span class="red">*</span></label>
	<div class="col-md-5">
	  <input type="text" class="form-control" />
	</div>
</div>
<div class="gap15"></div>

<div class="form-group">
	<label class="col-md-5 text-right">Duration - Number Of Weeks <span class="red">*</span></label>
	<div class="col-md-5">
	  <input type="text" class="form-control" />
	</div>
</div>
<div class="gap15"></div>

<h2>Product Cost</h2>

<div class="form-group">
	<label class="col-md-5 text-right">Country <span class="red">*</span></label>
	<div class="col-md-5">
	  <select class="form-control">
		<option value="">Select</option>
		<option selected>Singapore</option>
		<option>Loaded from Master</option>
	  </select>
	</div>
</div>
<div class="gap15"></div>

<div class="form-group">
	<label class="col-md-5 text-right">Currency</label>
	<div class="col-md-5">
	  <input type="text" class="form-control" value="SGD" readonly/>
	</div>
</div>
<div class="gap15"></div>

<div class="form-group">
	<label class="col-md-5 text-right">Cost</label>
	<div class="col-md-5">
	  <input type="text" class="form-control" />
	</div>
</div>
<div class="gap15"></div>

<div class="form-group">
	<div class="col-md-5 col-md-push-5">
	  <input type="submit" class="submitM pull-right" value="Add Cost"/>
	  <div class="gap15"></div>

	  <div class="table-responsive">
		<table class="table table-bordered table-striped tabBorder dataTable no-footer">
			<tr class="tr1">
				<td>S.No.</td>
				<td>Country</td>
				<td>Currency</td>
				<td>Cost</td>
			</tr>
			<tr>
				<td>1</td>
				<td>Singapore</td>
				<td>SGD</td>
				<td>800.00</td>
			</tr>
			<tr>
				<td>2</td>
				<td>Singapore</td>
				<td>SGD</td>
				<td>800.00</td>
			</tr>
			<tr>
				<td>3</td>
				<td>Singapore</td>
				<td>SGD</td>
				<td>800.00</td>
			</tr>
		</table>
	  </div>
	</div>
</div>
<div class="gap15"></div>

<hr>-->

<div class="gap5"></div> 
<div class="col-md-5 col-md-push-5">
	<input type="submit" class="" value="Save &amp; Update"> &nbsp;
	<input type="reset" id="" name="" class="submit cancelBtn" value="Cancel">
</div>
<div class="gap15"></div>

</form>

<?php include("footer.php"); ?>
