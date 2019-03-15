<?php
$page="reg-content-provider4";
$title="Registration &raquo; Content Provider";
$ses="no";

extract($_REQUEST);

if(isset($save_submit)){
	header("location:reg-content-provider4.php");
}

if(isset($proceed_submit)){
	header("location:reg-content-provider5.php");
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
		<li class="active">
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
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
			<h3>Technical Skills</h3>
			<div class="gap10"></div>
			<form>
			<div class="item1">
				<div class="gap20"></div>

				<div class="table-responsive">
					<table width="100%" class="table table-striped border">
						<tr>
						  <td>Technical Area</td>
						  <td>Institution Name</td>
						  <td>Start Date</td>
						  <td>End Date</td>
						  <td>Duration</td>
						  <td>Proficiency Level</td>
						  <td align="right" width="100px">&nbsp;</td>
					    </tr>
						<tr>
						  <td>
						    <input type="text" name="" id="" class="form-control" />
						  </span></td>
						  <td><span class="form-group">
						    <input type="text" name="input8" id="input8" class="form-control" />
						  </td>
						  <td><span class="form-group">
						    <input type="text" name="" id="" class="form-control date" />
						  </span></td>
						  <td><span class="form-group">
						    <input type="text" name="input" id="input" class="form-control date" />
						    </span></td>
						  <td><span class="form-group">
						    <input type="text" name="input" id="input" class="form-control" />
						    </span></td>
						  <td>
						    <select class="form-control" name="academic_course" id="academic_course">
						      <option value="">Select</option>
						      <option  >Low</option>
				      <option  >Intermediate</option>
				      <option  >Expert</option>
						</select>
						  </td>
						  <td align="right">	<button class="btn btn-primary"><i class="fa fa-plus"></i></button></td>
					    </tr>
						<tr>
							<td height="21">PHP</td>
							<td>NIIT</td>
							<td>19-Sep-2000</td>
							<td>21-May-2003</td>
							<td>3 Years</td>
							<td>Expert</td>
							<td align="right"><i class="fa fa-pencil edit"></i><i class="fa fa-trash trash"></i></td>
						</tr>
					</table>
				</div>
				<div class="gap10"></div>

		      </div>  
			<div class="gap10"></div>
			<!------------>

				<input type="submit" class="btn submitM" id="save_submit" name="save_submit" value="Save"> &nbsp;
				<input type="submit" class="btn submitM" id="proceed_submit" name="proceed_submit" value="Save & Proceed"> &nbsp;
				<input type="reset" class="btn submitM" id="" value="Clear"> &nbsp;
				<a class="btn submitM" id="" href="index.php">Cancel</a>
			</form>
			<div class="gap20"></div>
		</div>
	</div>

</div>

	
<div class="gap20"></div>
<?php include("footer.php"); ?>
