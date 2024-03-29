<?php
$page="reg-mentor8";
$title="Registration &raquo; Mentor";
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

if(isset($save_submit)){
$query = "UPDATE service_provider_details SET sp_awards=?,sp_rewards=? where user_id='$user_id'";

	$statement= $mysqli->prepare($query);  
	$statement->bind_param('ss',$sp_awards,$sp_rewards);
	$statement->execute();
	header("location:user8View.php?type=$userType");
	
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
<li class="active">
			<div class="liLine"></div>
			<a href="reg-mentor7.php?email=<?php echo $email;?>"></a>
			<div class="gap10"></div>Service Providing
		</li>
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
					<label class="col-sm-3 text-right">Awards <span class="red">*</span></label>
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
					<label class="col-sm-3 text-right">Rewards <span class="red">*</span></label>
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
            $("#reg_m8").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {

                                            sp_awards: {
                                            required: true,
                                            },
                                           
                                           sp_rewards: {
                                            required: true,	
					    },
                                           
                                           
               },


				//The error message Str here

           messages: {
					
                                           sp_awards: {
                                            
                                            },
                                           
                                           sp_rewards: {
                                          	
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
        $("#"+val1).closest('#reg_m8').find("input[type=text], input[type=radio], input[type=tel], select, textarea").val("");
}
</script>
