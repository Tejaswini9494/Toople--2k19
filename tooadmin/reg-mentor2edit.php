<?php
$page="reg-mentor2";
$title="Registration &raquo; Project Student";
$ses="no";
include_once("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);

$sql="select user_email from too_users where user_id='$user_id'";
$statement14=$mysqli->prepare($sql);
$statement14->execute();
$statement14->store_result();
$statement14->bind_result($umail);
$statement14->fetch();




if($userType=='SP'){
$name11='Project Student';
}
elseif($userType=='SI'){
$name11='Intern Student';
}

if($userType=='SPM'|| $userType=='MEN' ){
$name11='Mentor';
}
elseif($userType=='SPC' || $userType=='CP'){
$name11='Content Provider';
}
//echo $user_id.'###';

if(isset($save_submit) || isset($proceed_submit)){
	$query = "UPDATE student_info SET s_addressline1=?,s_addressline2=?,s_country=?,s_state=?,s_city=?,s_primary_contact=?,s_email_id=?,s_alternate_email_id=?,s_secondary_contact=? where user_id='$user_id'";
	$statement= $mysqli->prepare($query);  
	$statement->bind_param('ssiiissss',$s_addressline1, $s_addressline2, $s_country,$s_state,$s_city,$s_primary_contact,$s_email_id,$s_alternate_email_id,$s_secondary_contact);
	$statement->execute();
	header("location:reg-mentor2edit.php?user_id=$user_id & userType=$userType");


if(isset($proceed_submit)){
	header("location:reg-mentor3edit.php?user_id=$user_id & userType=$userType");
}
}
$sql = "SELECT s_addressline1,s_addressline2,s_country,s_state,s_city,s_primary_contact,s_email_id,s_alternate_email_id,s_secondary_contact FROM  student_info  where user_id='$user_id'";
$statement1=$mysqli->prepare($sql);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($s_addressline1,$s_addressline2,$s_country,$s_state,$s_city,$s_primary_contact,$e_mail,$s_alternate_email_id,$s_secondary_contact);
$statement1->fetch();



include("header.php"); ?>

<h2>Registration &raquo;<?php echo $name11; ?></h2>
<div class="gap30"></div>

<div class="formss">

	<ul class="nav nav-tabs">
		<li class="active">
			<div class="liLine"></div>
			<a href="reg-mentor1edit.php?user_id=<?php echo $user_id; ?>&userType=<?php echo $userType;?>"></a>
			<div class="gap10"></div>Personal Info
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div>Contact Info
		</li>
		<li>
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div>Educational Qualification
		</li>
		<li>
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div>Technical Skills
		</li>
		<li>
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div>Certification Details
		</li>
		<li>
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div>Work Experience
		</li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane fade in active">
			<div class="gap30"></div>

			<!------------>
			<h3>Contact Info</h3>
			<div class="gap10"></div>
			<form method="post" id="form_contactinfo_reg">
			<div class="item1">
				<div class="gap20"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Address Line1 <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-newspaper-o"></i></span>
						<input type="text" class="form-control"  onpaste="return chkAddressLength(this);" 
oncopy="return chkAddressLength(this);"
onchange="javascript:FormatString(this);"
onkeypress="javascript:return fnAddressValidate(event);chkBrowser(this)"  name="s_addressline1" id="s_addressline1" value="<?php echo $s_addressline1;?>"/>
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
						<input type="text" class="form-control" name="s_addressline2"  onpaste="return chkAddressLength(this);" 
oncopy="return chkAddressLength(this);"
onchange="javascript:FormatString(this);"
onkeypress="javascript:return fnAddressValidate(event);chkBrowser(this)"  id="s_addressline2" value="<?php echo $s_addressline2;?>"/>
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
							<?php  countryId($s_country);?>
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
							<?php  categoryForState($s_country,$s_state);?>
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
							<?php categoryForCity($s_state,$s_city);?>
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
						<select  id="primary_isd" name="primary_isd" class="form-control" style="width: 35%;">
						
						</select><i style="left: 34.6%;"></i>
						<input type="text" name="s_primary_contact" id="s_primary_contact" onkeypress="javascript:return OnlyNumeric(this,event,false);" class="form-control" placeholder="10 Digit Number" style="width: 65%;" title="Enter Your Mobile Number" maxlength="10" value="<?php echo $s_primary_contact;?>"/>
						</div>
						<div class="gap1"></div>
						<span for="s_primary_contact" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Email ID</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="text" name="s_email_id" id="s_email_id" onkeypress="javascript:return fncEmailValidate(event);"
OnPaste="return false;"  class="form-control" maxlength="50" value="<?php echo $umail;?>" readonly/>
						</div>
						<div class="gap1"></div>
						<span for="s_email_id" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>


				<div class="form-group">
					<label class="col-sm-3 text-right">Alternate Email ID</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="text" name="s_alternate_email_id" onkeypress="javascript:return fncEmailValidate(event);"
OnPaste="return false;"  id="s_alternate_email_id" class="form-control" maxlength="50" value="<?php echo $s_alternate_email_id;?>"/>
						</div>
						<div class="gap1"></div>
						<span for="s_alternate_email_id" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Secondary Contact </label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-mobile font20"></i></span>
						<select id="secondary_isd" name="secondary_isd" class="form-control" style="width: 35%;">
							
						</select><i style="left: 34.6%;"></i>
						<input type="text" name="s_secondary_contact"  onkeypress="javascript:return OnlyNumeric(this,event,false);" id="s_secondary_contact" class="form-control" placeholder="10 Digit Number" style="width: 65%;" title="Enter Your Mobile Number" maxlength="10" value="<?php echo $s_secondary_contact;?>"/>
						</div>
						<div class="gap1"></div>
						<span for="s_secondary_contact" class="errors"></span>
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
<script>
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {


            //form validation rules
            $("#form_contactinfo_reg").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {

                                            s_addressline1: {
                                            required: true,
                                            },
                                            s_country: {
                                            required: true,	
					    },
                                            s_state: {
                                            required: true,
                                            },
					    s_city: {
                                            required: true,
					    },
					    s_primary_contact:  {
					    required: true,
                                            digits: true,
					    minlength:10,
					    maxlength:10,
					    },
                                            s_email_id: {
                                            required: true,
					    email: true,
                                            },
 					    s_alternate_email_id:  {
                                            email: true,
					    },
                                            s_secondary_contact: {                                         
					    digits:true,
					    minlength:10,
					    maxlength:10,
                                            },
                                            
               },


				//The error message Str here

           messages: {
		
                                            s_addressline1: {
                                            required: "This field is required",
                                            },
                                            s_addressline2: {                                           						
                                            },
                                            s_country: {
                                            required: "Please Select Country",					    	
					    },
                                            s_state: {
                                            required: "Please Select State",
                                            },
					    s_city: {
                                            required: "Please Select City",
					    },
					    s_primary_contact:  {
					    required: "kindly enter Phone Number",
                                            digits: "Please enter valid Phone Number",
					    minlength:"kindly enter 10 digits",
					    },
                                            s_email_id: {
                                            required: "This field is required",
					    email: "Kindly enter Valid Email Id",
                                            },
 					    s_alternate_email_id:  {
					    email: "Kindly enter Valid Email Id",                                          
					    },
                                            s_secondary_contact: {                                           
                                            digits: "Please enter valid Phone Number",
					    minlength:"kindly enter 10 digits",
                                            },
         
       },
       
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }


    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);
</script>
<script>
$('#s_country').change(function()
{
	var country_id=$('#s_country').val();
	if(country_id!='') {
		$.ajax({    //create an ajax request to functions.php
			type: "POST",
			url: "ajax_load_state.php",             
			data: {country_id},                 
			success: function(response){
				//(response);
				$('#s_state').html(response);
				$('#s_city').html("<option value=''>Select</option>");
			}
		});
		load_isd();
	}
	else {
		$('#s_state').html("<option value=''>Select</option>");
		$('#s_city').html("<option value=''>Select</option>");
	}
});
</script>

<script>
$(document).ready(function(){
    load_isd();
});

function load_isd() {
	var country_id=$('#s_country').val();
	if(country_id!='') {
	   $.ajax({    //create an ajax request to functions.php
		type: "POST",
		url: "ajax_load_isd.php",             
		data: {country_id},                 
		success: function(response){
		//(response);
		$('#primary_isd').html(response);
		$('#secondary_isd').html(response);
		}
	    });
	}
}
/*
$('#s_country').change(function()
{
var country_id=$('#s_country').val();
if(country_id!='') {
   $.ajax({    //create an ajax request to functions.php
        type: "POST",
        url: "ajax_load_isd.php",             
        data: {country_id},                 
        success: function(response){
	//(response);
        $('#primary_isd').html(response);
        }
    });
}
});
*/
</script>

<script>
$('#s_state').change(function()
{
var state_id=$('#s_state').val();
if(state_id!='') {
   $.ajax({    //create an ajax request to functions.php
        type: "POST",
        url: "ajax_load_city.php",             
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
