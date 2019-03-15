<?php
$page="reg-intern-stud5";
$title="Registration &raquo; Intern Student";
$ses="no";

extract($_REQUEST);

if(isset($save_submit)){
	header("location:reg-intern-stud5.php");
}

if(isset($proceed_submit)){
	header("location:reg-intern-stud6.php");
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
		<li>
			<div class="liLine"></div>
			<a href="reg-intern-stud3.php"></a>
			<div class="gap10"></div>Educational Qualification
		</li>
		<li>
			<div class="liLine"></div>
			<a href="reg-intern-stud4.php"></a>
			<div class="gap10"></div>Technical Skills
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
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
			<h3>Certification Details</h3>
			<div class="gap10"></div>
			<form>
			<div class="item1">
				<div class="gap20"></div>

				<div class="table-responsive">
					<table width="100%" class="table table-striped border">
						<tr>
						  <td>Exam Name</td>
						  <td>Exam Code</td>
						  <td>Date of Cleared</td>
						  <td align="right">&nbsp;</td>
					    </tr>
						<tr>
						  <td><span class="form-group">
						     <input type="text" name="input8" id="input8" class="form-control" />
						  </span></td>
						  <td><span class="form-group">
						     <input type="text" name="input8" id="input8" class="form-control" />
						  </span></td>
						  <td><span class="form-group">
						    <input type="text" name="input8" id="input8" class="form-control date" readonly>
						  </span></td>
						  <td align="right">	<button class="btn btn-primary"><i class="fa fa-plus"></i></button></td>

					    </tr>
						<tr>
							<td>VB</td>
							<td>EX123</td>
							<td>12/12/2015</td>
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
