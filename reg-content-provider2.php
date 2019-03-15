<?php
$page="reg-content-provider2";
$title="Registration &raquo; Content Provider";
$ses="no";

extract($_REQUEST);

if(isset($save_submit)){
	header("location:reg-content-provider2.php");
}

if(isset($proceed_submit)){
	header("location:reg-content-provider3.php");
}


include("header.php"); ?>

<h2><?php echo $title; ?></h2>
<div class="gap30"></div>

<div class="formss formss2">

	<ul class="nav nav-tabs">
		<li>
			<div class="liLine"></div>
			<a href="reg-content-provider1.php"></a>
			<div class="gap10"></div>Personal Info
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div>Contact Info
		</li>
		<li>
			<div class="liLine"></div>
			<a href="reg-content-provider3.php"></a>
			<div class="gap10"></div>Educational Qualification
		</li>
		<li>
			<div class="liLine"></div>
			<a href="reg-content-provider4.php"></a>
			<div class="gap10"></div>Technical Skills
		</li>
		<li>
			<div class="liLine"></div>
			<a href="reg-content-provider5.php"></a>
			<div class="gap10"></div>Certification Details
		</li>
		<li>
			<div class="liLine"></div>
			<a href="reg-content-provider6.php"></a>
			<div class="gap10"></div>Work Experience
		</li>
		<li>
			<div class="liLine"></div>
			<a href="reg-content-provider7.php"></a>
			<div class="gap10"></div>Service Providing
		</li>
		<li>
			<div class="liLine"></div>
			<a href="reg-content-provider8.php"></a>
			<div class="gap10"></div>Rewards and  Awards
		</li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane fade in active">
			<div class="gap30"></div>

			<!------------>
			<h3>Contact Info</h3>
			<div class="gap10"></div>
			<form>
			<div class="item1">
				<div class="gap20"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Address Line1 <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-newspaper-o"></i></span>
						<input type="text" class="form-control" />
						</div>
						<div class="gap1"></div>
						<span for="address" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>

				<div class="gap15"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Address Line2</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-newspaper-o"></i></span>
						<input type="text" class="form-control" />
						</div>
						<div class="gap1"></div>
						<span for="address" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>

				<div class="gap15"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Country <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
						<select name="user_state" id="user_state" class="form-control">
							<option value="">Select</option>
							<option>Loaded Form Master</option>
						</select><i></i>
						</div>
						<div class="gap1"></div>
						<span for="user_state" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>

				<div class="gap15"></div>


				<div class="form-group">
					<label class="col-sm-3 text-right">State <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-flag"></i></span>
						<select name="user_nationality" id="user_nationality" class="form-control">
							<option value="">- Select - </option>
							<option value="1">Load From Master</option>
						</select><i></i>
						</div>
						<div class="gap1"></div>
						<span for="user_nationality" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>


				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">City <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
						<select name="user_city" id="user_city" class="form-control">
							<option value="">Select</option>
							<option>Loaded Form Master</option>
						</select><i></i>
						</div>
						<div class="gap1"></div>
						<span for="user_city" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>

				<div class="gap15"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Primary Contact <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-mobile font20"></i></span>
						<select class="form-control" style="width: 35%;">
							<option>India (+91)</option>
						</select><i style="left: 34.6%;"></i>
						<input type="text" name="country_code" id="country_code" class="form-control" placeholder="10 Digit Number" style="width: 65%;" title="Enter Your Mobile Number" />
						</div>
						<div class="gap1"></div>
						<span for="country_code" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Email ID</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="text" class="form-control" />
						</div>
						<div class="gap1"></div>
						<span for="" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>


				<div class="form-group">
					<label class="col-sm-3 text-right">Alternate Email ID</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="text" class="form-control" />
						</div>
						<div class="gap1"></div>
						<span for="" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Secondary Contact </label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-mobile font20"></i></span>
						<select class="form-control" style="width: 35%;">
							<option>India (+91)</option>
						</select><i style="left: 34.6%;"></i>
						<input type="text" name="country_code" id="country_code" class="form-control" placeholder="10 Digit Number" style="width: 65%;" title="Enter Your Mobile Number" />
						</div>
						<div class="gap1"></div>
						<span for="country_code" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap10"></div>

		      </div>  
			<div class="gap10"></div>
			<!------------>

			<div class="col-sm-9 col-sm-push-3">
				<input type="submit" class="btn submitM" id="save_submit" name="save_submit" value="Save"> &nbsp;
				<input type="submit" class="btn submitM" id="proceed_submit" name="proceed_submit" value="Save & Proceed"> &nbsp;
				<input type="reset" class="btn submitM" id="" value="Clear"> &nbsp;
				<a class="btn submitM" id="" href="index.php">Cancel</a>
			</div>
			</form>
			<div class="gap20"></div>
		</div>
	</div>

</div>

	
<div class="gap20"></div>
<?php include("footer.php"); ?>
