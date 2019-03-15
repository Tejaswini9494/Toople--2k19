<?php
$page="mentor7edit7";
$title="Registration &raquo;";
$ses="no";
include_once("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);


if($userType=='MEN'){
$name11='Mentor';
}
elseif($userType=='CP'){
$name11='Content Provider';
}
if(isset($save_submit)||isset($proceed_submit)){
$query = "UPDATE service_provider_details SET sp_service_provided=? where user_id='$user_id'";
	$statement= $mysqli->prepare($query);  
	$statement->bind_param('s',$sp_service_provided);
	$statement->execute();
	if(isset($proceed_submit)){
		header("location:mentor8edit.php?user_id=$user_id&userType=$userType");
	}else{
		header("location:mentor7edit.php?user_id=$user_id&userType=$userType");
	}
}


$sql = "SELECT sp_service_provided FROM service_provider_details where user_id='$user_id'";
$statement1=$mysqli->prepare($sql);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($sp_service_provided);
$statement1->fetch();

if($statement1->num_rows() < 1) {
	$status='A';
	$query2 = "INSERT INTO service_provider_details (user_id) VALUES($user_id)";
	$statement2= $mysqli->prepare($query2);  
	$statement2->execute();
}
  

include("header.php"); ?>

<h2>Registration &raquo; <?php echo $name1; ?></h2>
<div class="gap30"></div>

<div class="formss formss2">

	<ul class="nav nav-tabs">
		<li class="active">
			<div class="liLine"></div>
			<a href="mentor1edit.php?user_id=<?php echo $user_id;?>&userType=<?php echo $userType;?>"></a>
			<div class="gap10"></div>Personal Info
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="mentor2edit.php?user_id=<?php echo $user_id;?>&userType=<?php echo $userType;?>"></a>
			<div class="gap10"></div>Contact Info
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="mentor3edit.php?user_id=<?php echo $user_id;?>&userType=<?php echo $userType;?>"></a>
			<div class="gap10"></div>Educational Qualification
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="mentor4edit.php?user_id=<?php echo $user_id;?>&userType=<?php echo $userType;?>"></a>
			<div class="gap10"></div>Technical Skills
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="mentor5edit.php?user_id=<?php echo $user_id;?>&userType=<?php echo $userType;?>"></a>
			<div class="gap10"></div>Certification Details
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="mentor6edit.php?user_id=<?php echo $user_id;?>&userType=<?php echo $userType;?>"></a>
			<div class="gap10"></div>Work Experience
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div>Service Providing
		</li>
		<li>
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div>Rewards and  Awards
		</li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane fade in active">
			<div class="gap30"></div>

			<!------------>
			<h3>Service Providing</h3>
			<div class="gap10"></div>
			<form method="post" id="reg_m7">
			<div class="item1">
				<div class="gap20"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Service Provider <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-wrench"></i></span>
						<select  class="form-control" id="sp_service_provided"  name="sp_service_provided">
							<option value="">Select</option>		
							<?php echo serviceprovider($sp_service_provided); ?>
						</select>
						</div>
						<div class="gap1"></div>
						<span for="sp_service_provided" class="errors"></span>
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
					<input type="button" class="btn submitM" name="reset" id="reset" value="Clear" onclick="empty_form('reset')"> &nbsp;
				<a class="btn submitM" id="" href="user8View.php?type=<?php echo $userType;?>">Cancel</a>
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
            $("#reg_m7").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {

                                            sp_service_provided: {
                                            required: true,
					    },                                            
                                            
                                           
               },


				//The error message Str here

           messages: {
		
                                          sp_service_provided: {
                                           
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
function empty_form(val1){
        $("#"+val1).closest('#reg_m7').find("input[type=text], input[type=radio], input[type=tel], select, textarea").val("");
}
</script>

