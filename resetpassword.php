<?php
$page="resetpassword";
$title="Reset Password";
$ses="no";
include("class/config.php");
include_once("includes/functions.php");
require_once 'includes/encrypt.php';
require_once 'email_sms.php';
extract($_REQUEST);
$uid=decrypt($uid,'tooople#@D2016');

//echo $uid;exit;

if(isset($reset_submit))
{
	$con_password=encrypt($con_password,'tooople#@D2016');
	$query = "UPDATE too_users SET user_pwd=? WHERE user_id=?";
	$statement= $mysqli->prepare($query);
	$statement->bind_param('si', $con_password, $uid);
	$statement->execute();

	getMessageNotification('rstP');
	header("location:login.php");
	exit;
}

include("header.php");?>



<div class="gap1"></div>

<h3 class="text-bold">Reset Password</h3>
<div class="gap10"></div>

<div class="row">
<div class="col-md-6">
<div class="formBox" style="padding:15px;">
	<div class="gap10"></div>
	<form role="form" id="reset_pass" method="post">
		<div class="form-group">
			<input type="password" class="form-control" id="registrant_password" name="registrant_password" placeholder="New Password" value="">
		</div>
		<div class="gap10"></div>

		<div class="form-group">
			<input type="password" class="form-control" id="con_password" name="con_password" placeholder="Confirm New Password" value="">
		</div>
		<div class="gap10"></div>

		<button type="submit" class="btn submitM pull-right" id="reset_submit" name="reset_submit">Submit</button> &nbsp;
		<!--<a href="index.php" type="submit" class="btn submitM yellowBtn">Cancel</a>-->
		<div class="gap10"></div>
	</form>

<div class="gap1"></div>
</div>
</div>
</div>

<?php include("footer.php"); ?>
<script>
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {


            //form validation ruless field is req
            $("#reset_pass").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            registrant_password: {
                                            required: true,
                                            minlength: 6,
                                            maxlength: 18,
                                            },
                                            con_password: {
                                            required: true,
                                            equalTo:"#registrant_password",
                                            },
               },


				//The error message Str here

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
