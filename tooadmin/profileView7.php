<?php  
$page="profileView7";
$xpan="no";
include("header.php"); ?>

<?php if($_SESSION["usertype"]==1) { ?>
<h3>
<span class="pull-right">
<a href="Javascript:history.back()" class="submitM">Back</a>
<a href="userAdd.php" class="submitM">Edit</a>
</span>
My Profile &raquo;  Detail View</h3>
<?php } else{?>
<h3><a href="Javascript:history.back()" class="submitM pull-right">Back</a>Internship Student &raquo;  Detail View</h3>
<?php } ?>


<div class="gap10"></div>
<!--
<h4>Type of Users</h4>
<div class="viewTab">
<div class="viewTab1 text-center">
Student, Project Student 
	<div class="gap1"></div>
</div>
</div>
<div class="gap10"></div> 
-->

<h4>Login Info</h4>
<div class="viewTab">
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Email ID</label>
	<div class="col-md-5 col-sm-6 text-bold">Jack@edmo.com</div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Password</label>
	<div class="col-md-5 col-sm-6 text-bold">xxxx</div>
	<div class="gap1"></div>
</div>

<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Plan</label>
	<div class="col-md-5 col-sm-6 text-bold">Silver</div>
	<div class="gap1"></div>
</div>
</div>
<div class="gap10"></div> 
<h4>Personal Info</h4>
<div class="viewTab">
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Name</label>
	<div class="col-md-5 col-sm-6 text-bold">Jack</div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Date of Birth</label>
	<div class="col-md-5 col-sm-6 text-bold">12/12/1999</div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Gender</label>
	<div class="col-md-5 col-sm-6 text-bold">Male</div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Identity Number</label>
	<div class="col-md-5 col-sm-6 text-bold">654654</div>
	<div class="gap1"></div>
</div>
</div>
<div class="gap10"></div> 

<h4>Contact Info</h4>
<div class="viewTab">
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Address Line1</label>
	<div class="col-md-5 col-sm-6 text-bold">No.10, Wall Street, <br />Anna Nagar,<br />Chennai</div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Address Line2</label>
	<div class="col-md-5 col-sm-6 text-bold">No.10, Wall Street, <br />Anna Nagar,<br />Chennai</div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Country</label>
	<div class="col-md-5 col-sm-6 text-bold">India</div>
	<div class="gap1"></div>
</div>

<div class="gap30"></div>

<div class="viewTab1">
	<label class="col-md-3 col-sm-6">State</label>
	<div class="col-md-5 col-sm-6 text-bold">Tamil nadu</div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">City</label>
	<div class="col-md-5 col-sm-6 text-bold">Chennai</div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Primary Contact</label>
	<div class="col-md-5 col-sm-6 text-bold">9999999999</div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Secondary Contact </label>
	<div class="col-md-5 col-sm-6 text-bold">8888888888</div>
	<div class="gap1"></div>
</div> 
</div>
<div class="gap10"></div> 


<h4>Educational Qualification</h4>
<table width="100%" class="table table-striped border">
  <tr>
    <td>Program</td>
    <td>Department</td>
    <td>Yr of Str</td>
    <td>Yr of Complt</td>
    <td>% Achvd</td>
    <td>Institution Name</td>
    <td>Institution Country</td>
    <td>Institution State</td>
    <td>Institution City</td>
    <td>Institution Zip</td>
  </tr>
  <tr>
    <td>B.Tech</td>
    <td>Civil</td>
    <td>2000</td>
    <td>2003</td>
    <td>85</td>
    <td>SRM</td>
    <td>India</td>
    <td>Tamilnadu</td>
    <td>Chennai</td>
    <td>600040</td>
  </tr>
</table>
<div class="gap10"></div> 
<h4>Technical Skills</h4>
<table width="100%" class="table table-striped border">
  <tr>
    <td>Technical Area</td>
    <td>Trained By</td>
    <td>Trained From</td>
    <td>Trained Upto</td>
    <td>Knowledge Level</td>
  </tr>
  <tr>
    <td height="21">PHP</td>
    <td>NIIT</td>
    <td>2000</td>
    <td>2003</td>
    <td>Expert</td>
  </tr>
</table>
<div class="gap10"></div> 
<h4>Cetification Details</h4>
<table width="100%" class="table table-striped border">
  <tr>
    <td>Select Certification Name</td>
    <td>Date of Cleared</td>
  </tr>
  <tr>
    <td height="21">VB</td>
    <td>12/12/2015</td>
  </tr>
</table>
<div class="gap10"></div> 
<h4>Work Experienace </h4>
<table width="100%" class="table table-striped border">
  <tr>
    <td>Organisation Name</td>
    <td>Desgination</td>
    <td>Str Date</td>
    <td>End date</td>
  </tr>
  <tr>
    <td height="21">CSS</td>
    <td>Trainer</td>
    <td>01/01/2014</td>
    <td>01/01/2015</td>
  </tr>
</table>
<div class="gap30"></div> 
 
 
<div class="gap30"></div>


<?php include("footer.php"); ?>
