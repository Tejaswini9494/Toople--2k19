<?php
$page="reg-intern-stud3";
$title="Registration &raquo; Intern Student";
$ses="no";

extract($_REQUEST);

if(isset($save_submit)){
	header("location:reg-intern-stud3.php");
}

if(isset($proceed_submit)){
	header("location:reg-intern-stud4.php");
}


include("header.php"); ?>

<h2><?php echo $title; ?></h2>
<div class="gap30"></div>

<div class="formss">

	<ul class="nav nav-tabs">
		<li>
			<div class="liLine"></div>
			<a href="reg-intern-stud1.php"></a>
			<div class="gap10"></div>Personal Info
		</li>
		<li>
			<div class="liLine"></div>
			<a href="reg-intern-stud2.php"></a>
			<div class="gap10"></div>Contact Info
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div>Educational Qualification
		</li>
		<li>
			<div class="liLine"></div>
			<a href="reg-intern-stud4.php"></a>
			<div class="gap10"></div>Technical Skills
		</li>
		<li>
			<div class="liLine"></div>
			<a href="reg-intern-stud5.php"></a>
			<div class="gap10"></div>Certification Details
		</li>
		<li>
			<div class="liLine"></div>
			<a href="reg-intern-stud6.php"></a>
			<div class="gap10"></div>Work Experience
		</li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane fade in active">
			<div class="gap30"></div>

			<!------------>
			<h3>Educational Qualification</h3>
			<div class="gap10"></div>
			<form>
			<div class="item1">
				<div class="gap20"></div>

				<div class="table-responsive">
					<table width="100%" class="table table-striped border">
						<tr class="tr1">
						  <td>Program</td>
						  <td>Branch</td>
						  <td>Year of Start</td>
						  <td>Year of Completion</td>
						  <td>% Achieved</td>
						  <td>University Name</td>
						</tr>
						<tr>
						  <td>
						    <select class="form-control" name="academic_course2" id="academic_course2">
						      <option value="">Select</option>
						      
						      <option  >Loaded from DB</option>
						</select>
						  </td>
						  <td>
						    <select class="form-control" name="academic_course3" id="academic_course3">
						      <option value="">Select</option>
						      <option  >Loaded from DB</option>
						</select>
						  </td>
						  <td><span class="form-group">
						    <input type="text" name="" id="" class="form-control date" />
						  </span></td>
						  <td><span class="form-group">
						    <input type="text" name="input" id="input" class="form-control date" />
						  </span></td>
						  <td><span class="form-group">
						    <input type="text" name="input2" id="input2" class="form-control" />
						  </span></td>
						  <td><span class="form-group">
						    <input type="text" name="input3" id="input3" class="form-control" />
						  </span></td>
						</tr>
						<tr class="tr1">
						  <td>Institution Name</td>
						  <td>Institution Country</td>
						  <td>Institution State</td>
						  <td>Institution City</td>
						  <td>Institution Zip</td>
						  <td align="right">&nbsp;</td>
						</tr>
						<tr>
						  <td><span class="form-group">
						    <input type="text" name="input3" id="input3" class="form-control" />
						  </span></td>
						  <td><span class="form-group">
						    <input type="text" name="input4" id="input4" class="form-control" />
						  </span></td>
						  <td><span class="form-group">
						    <input type="text" name="input5" id="input5" class="form-control" />
						  </span></td>
						  <td><span class="form-group">
						    <input type="text" name="input6" id="input6" class="form-control" />
						  </span></td>
						  <td><span class="form-group">
						    <input type="text" name="input7" id="input7" class="form-control" />
						  </span></td>
						  <td align="left">	<button class="btn btn-primary"><i class="fa fa-plus"></i></button></td>
					    </tr>
					</table>
				</div>

				<div class="table-responsive">
					<table width="100%" class="table table-striped border">
						<tr class="tr1">
						  <td>Program</td>
						  <td>Branch</td>
						  <td>Year of Start</td>
						  <td>Year of Completion</td>
						  <td>% Achieved</td>
						  <td>University Name</td>
						  <td>Institution Name</td>
						  <td>Institution Country</td>
						  <td>Institution State</td>
						  <td>Institution City</td>
						  <td>Institution Zip</td>
						  <td align="right">&nbsp;</td>
						</tr>
						<tr>
							<td>B.Tech</td>
							<td>Civil</td>
							<td>2000</td>
							<td>2003</td>
							<td>85</td>
							<td>SRM University</td>
							<td>SRM</td>
							<td>India</td>
							<td>Tamilnadu</td>
							<td>Chennai</td>
							<td>600040</td>
							<td align="right"><i class="fa fa-pencil edit"></i><i class="fa fa-trash trash"></i></td>
						</tr>
					</table>
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
