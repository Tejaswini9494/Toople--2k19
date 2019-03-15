<?php
$page="reg-mentor8";
$title="Registration &raquo; Mentor";
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

if(isset($save_submit)){
$query = "UPDATE service_provider_details SET sp_awards=?,sp_rewards=? where user_id='$user_id'";

	$statement= $mysqli->prepare($query);  
	$statement->bind_param('ss',$sp_awards,$sp_rewards);
	$statement->execute();
	//header("location:reg-mentor8.php?email=$email");
	redirect_with_msg($uType);
}


$sql = "SELECT sp_awards,sp_rewards FROM service_provider_details where user_id='$user_id'";
$statement1=$mysqli->prepare($sql);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($sp_awards,$sp_rewards);
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
			<a href="reg-mentor7.php?email=<?php echo $email;?>"></a>
			<div class="gap10"></div>Service Providing
		</li>
-->
		<li class="active">
			<div class="liLine"></div>
			<a href="reg-mentor8.php?email=<?php echo $email;?>"></a>
			<div class="gap10"></div>Rewards and  Awards
		</li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane fade in active">
			<div class="gap30"></div>

			<!------------>
			<h3>Rewards and  Awards</h3>
			<div class="gap10"></div>
			<form method="post" id="reg_m8">
			<div class="item1">
				<div class="gap20"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Awards </label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-university"></i></span>
						<input type="text" name="sp_awards" id="sp_awards" value="<?php echo $sp_awards;?>" class="form-control" placeholder="Awards">
						</div>
						<div class="gap1"></div>
						<span for="sp_awards" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Rewards </label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-building"></i></span>
						<input type="text" name="sp_rewards" value="<?php echo $sp_rewards;?>" id="sp_rewards" class="form-control" placeholder="Rewards">
						</div>
						<div class="gap1"></div>
						<span for="sp_rewards" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap10"></div>
		      </div>  
			<div class="gap10"></div>
			<!------------>

			<div class="col-sm-9 col-sm-push-3">
				<input type="submit" class="btn submitM" id="save_submit" name="save_submit" value="Save"> &nbsp;
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
            $("#reg_m8").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {

                                            sp_awards: {
                                            //required: true,
					    firstChar: true,
					    lettersonly4N: true,
					    minlength:3,
					    maxlength:50,
                                            },
                                           
                                            sp_rewards: {
                                            //required: true,
					    firstChar: true,
					    lettersonly4N: true,
					    minlength:3,
					    maxlength:50,	
					    },
                                           
                                           
               },


				//The error message Str here

           messages: {
					
                                            sp_awards: {
                                            firstChar: "Kindly start with Character",
					    lettersonly4N: "Kindly enter only characters, Space & dot",
                                            },
                                           
                                            sp_rewards: {
                                            firstChar: "Kindly start with Character",
					    lettersonly4N: "Kindly enter only characters, Space & dot",	
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
	
    $("#reg_m8").find("input[type=text],select").val("");
}

</script>
