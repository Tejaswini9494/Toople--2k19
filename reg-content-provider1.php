<?php
$page="reg-content-provider1";
$title="Registration &raquo; Content Provider";
$ses="no";

extract($_REQUEST);

if(isset($save_submit)){
	header("location:reg-content-provider1.php");
}

if(isset($proceed_submit)){
	header("location:reg-content-provider2.php");
}


include("header.php"); ?>

<h2><?php echo $title; ?></h2>
<div class="gap30"></div>

<div class="formss formss2">

	<ul class="nav nav-tabs">
		<li class="active">
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div>Personal Info
		</li>
		<li>
			<div class="liLine"></div>
			<a href="reg-content-provider2.php"></a>
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
			<h3>Personal Info</h3>
			<div class="gap10"></div>
			<form>
			<div class="item1">
				<div class="gap20"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Organization Belong to <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<select class="form-control" id="" name="">
						<option value="">Select</option>		
						<option value="1">Loaded From Masters</option>
					</select>
						</div>
						<div class="gap1"></div>
						<span for="user_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Identity Number</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Number">
						</div>
						<div class="gap1"></div>
						<span for="user_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">First Name <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Name">
						</div>
						<div class="gap1"></div>
						<span for="user_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Last Name <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Name">
						</div>
						<div class="gap1"></div>
						<span for="user_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Date of Birth <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						<input type="text" class="form-control date" name="user_dob" id="user_dob" placeholder="Date Of Birth">
						</div>
						<div class="gap1"></div>
						<span for="user_dob" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
					<div class="gap15"></div>
		

				<div class="form-group">
					<label class="col-sm-3 text-right">Gender <span class="red">*</span></label>
					<div class="col-sm-3">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-female"></i></span>
						<span class="form-control">Female</span>
						<span class="input-group-addon"><input type="radio" id="" name="gender"></span>
						</div>
					</div>
					 
					<div class="col-sm-3">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-male"></i></span>
						<span class="form-control">Male</span>
						<span class="input-group-addon"><input type="radio" id="" name="gender"></span>
						</div>
					</div>
						<div class="gap1"></div>
						<span for="gender" class="errors col-sm-8 col-sm-push-5" ></span>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Upload Photo </label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
						<input type="file" name="user_name" id="user_name" class="form-control" placeholder="">
						</div>
						<div class="gap1"></div>
						<span for="user_name" class="errors"></span>
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
