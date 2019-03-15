<?php
$page="reg-mentor7";
$title="Registration &raquo;";
$ses="no";
include_once("class/config.php");
include_once("includes/functions.php");
extract($_REQUEST);
session_start();
$user_id=$_SESSION["userid"];
if($_SESSION['add_user_id']!=''){
$user_id=$_SESSION['add_user_id'];
}


$uType=$_SESSION["type"];

if($uType=='SPM' || $uType=='MEN'){
$name1='Mentor';
}
elseif($uType=='SPC' || $uType=='CP'){
$name1='Content Provider';
}
if(isset($save_submit)||isset($proceed_submit)){
$query = "UPDATE service_provider_details SET sp_service_provided=? where user_id='$user_id'";
	$statement= $mysqli->prepare($query);  
	$statement->bind_param('s',$sp_service_provided);
	$statement->execute();
	if(isset($proceed_submit)){
		header("location:reg-mentor8.php?email=$email");
	}else{
		header("location:reg-mentor6.php?email=$email");
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
			<a href="reg-mentor1.php?email=<?php echo $email;?>"></a>
			<div class="gap10"></div>Personal Info
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="reg-mentor2.php?email=<?php echo $email;?>"></a>
			<div class="gap10"></div>Contact Info
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="reg-mentor3.php?email=<?php echo $email;?>"></a>
			<div class="gap10"></div>Educational Qualification
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="reg-mentor4.php?email=<?php echo $email;?>"></a>
			<div class="gap10"></div>Technical Skills
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="reg-mentor5.php?email=<?php echo $email;?>"></a>
			<div class="gap10"></div>Certification Details
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="reg-mentor6.php?email=<?php echo $email;?>"></a>
			<div class="gap10"></div>Work Experience
		</li>
<!--
		<li class="active">
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div>Service Providing
		</li>
-->
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
				<input type="submit" class="btn submitM" id="proceed_submit" name="proceed_submit" value="Proceed"> &nbsp;
				<input type="button" id="reset" onclick="empty_form('reset')" class="btn submitM" id="" value="Clear"> &nbsp;
				<a class="btn submitM" id="" href="index.php">Cancel</a>
			</div>
			</form>
			<div class="gap20"></div>
<div class="col-sm-12"><span class="red">Note:</span> All information we collect is highly confidential, and keeping your information private, safe and secure is very important to us.</div>
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
</script>
<script>
function empty_form(val1){
	
    $("#reg_m7").find("input[type=text],select").val("");
}

</script>
