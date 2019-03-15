<?php 
include_once("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);
$student_info_id=$id;

if(isset($update_contact_info)) {
$query2 = "UPDATE student_info SET s_addressline1=?,s_addressline2=?,s_country=?,s_state=?,s_city=?,s_primary_contact,s_secondary_contact=? where student_info_id='$student_info_id'";
	$s2= $mysqli->prepare($query2);  
	$s2->bind_param('ssiiiss',$s_addressline1, $s_addressline2, $s_country,$s_state,$s_city,$s_primary_contact,$s_secondary_contact);
	$s2->execute();
}
//echo $student_info_id;
$sql1 = "SELECT s_addressline1,s_addressline2,s_country,s_state,s_city,s_primary_contact,s_secondary_contact FROM  student_info  where student_info_id='$student_info_id'";
$s1=$mysqli->prepare($sql1);
$s1->execute();
$s1->store_result();
$s1->bind_result($s_addressline1,$s_addressline2,$s_country,$s_state,$s_city,$s_primary_contact,$s_secondary_contact);
$s1->fetch();
?>


	<!------------>
	<h3>Contact Info</h3>
	<div class="gap10"></div>
	<form id="register1b" method="post">
	<div class="item1">
				<div class="gap20"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Address Line1 <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-newspaper-o"></i></span>
						<input type="text" class="form-control" name="s_addressline1" id="s_addressline1" value="<?php echo $s_addressline1;?>"/>
						</div>
						<div class="gap1"></div>
						<span for="s_addressline1" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>

				<div class="gap15"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Address Line2</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-newspaper-o"></i></span>
						<input type="text" class="form-control" name="s_addressline2" id="s_addressline2" value="<?php echo $s_addressline2;?>"/>
						</div>
						<div class="gap1"></div>
						<span for="s_addressline2" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>

				<div class="gap15"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Country <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
						<select name="s_country" id="s_country" class="form-control">
							<option value="">Select</option>
							<?php echo countryId($s_country);?>
						</select><i></i>
						</div>
						<div class="gap1"></div>
						<span for="s_country" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>

				<div class="gap15"></div>


				<div class="form-group">
					<label class="col-sm-3 text-right">State <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-flag"></i></span>
						<select name="s_state" id="s_state" class="form-control">
							<option value="">Select </option>
							<?php echo categoryForState($s_country,$s_state);?>
						</select><i></i>
						</div>
						<div class="gap1"></div>
						<span for="s_state" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>


				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">City <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
						<select name="s_city" id="s_city" class="form-control">
							<option value="">Select</option>
							<?php echo categoryForCity($s_state,$s_city);?>
						</select><i></i>
						</div>
						<div class="gap1"></div>
						<span for="s_city" class="errors"></span>
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
						<input type="text" name="s_primary_contact" id="s_primary_contact" class="form-control" placeholder="10 Digit Number" style="width: 65%;" title="Enter Your Mobile Number" maxlength="10" value="<?php echo $s_primary_contact;?>"/>
						</div>
						<div class="gap1"></div>
						<span for="s_primary_contact" class="errors"></span>
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
						<input type="text" name="s_secondary_contact" id="s_secondary_contact" class="form-control" placeholder="10 Digit Number" style="width: 65%;" title="Enter Your Mobile Number" maxlength="10" value="<?php echo $s_secondary_contact;?>"/>
						</div>
						<div class="gap1"></div>
						<span for="s_secondary_contact" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap10"></div>

	</div>
	<!------------>

		<div class="gap10"></div>
		<a class="btn submitM" id="" href="#register1c" name="update_contact_info" data-toggle="tab">Save & Proceed</a> &nbsp;
		<input type="reset" class="btn submitM cancelBtn" id="" value="Clear"> &nbsp;
		<a class="btn submitM" id="" href="index.php">Cancel</a>
		<div class="gap10"></div>
<script>
$('#s_country').change(function()
{
var country_id=$('#s_country').val();
if(country_id!='') {
   $.ajax({    //create an ajax request to functions.php
        type: "POST",
        url: "../ajax_load_state.php",             
        data: {country_id},                 
        success: function(response){
	//(response);
        $('#s_state').html(response);
	$('#s_city').html("<option value=''>Select</option>");
        }
    });
}
else {
        $('#s_state').html("<option value=''>Select</option>");
	$('#s_city').html("<option value=''>Select</option>");
}
});
</script>
<script>
$('#s_state').change(function()
{
var state_id=$('#s_state').val();
if(state_id!='') {
   $.ajax({    //create an ajax request to functions.php
        type: "POST",
        url: "../ajax_load_city.php",             
        data: {state_id},                 
        success: function(response){
	//alert(response);
        $('#s_city').html(response);
        }
    });
}
else {
        $('#s_city').html("<option value=''>Select</option>");
}
});
</script>
