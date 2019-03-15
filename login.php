<?php
$page="login";
$title="Login";
$ses="no";
include_once("class/config.php");
include_once("includes/functions.php");
require_once 'includes/encrypt.php';
require_once 'email_sms.php';

extract($_REQUEST);

//session_start();
//echo $_SESSION["title_message"]."#".$_SESSION["user_message"];
//exit;

if(isset($reg_submit1))
{
	$regindex_pwd2=encrypt($regindex_pwd1,'tooople#@D2016');
	$query1 = "INSERT INTO  too_users (user_email, user_pwd, added_date) VALUES(?,?, now())";
	$statement1= $mysqli->prepare($query1);
	$statement1->bind_param('ss', $regindex_email1, $regindex_pwd2);
	$statement1->execute();
	$id = $statement1->insert_id;

	email('10',$id,'');
	getMessageNotification('regS');
	header("location:index.php");
	exit;

}

include("header.php"); ?>

<style>
.midO {
    min-height: auto;
}
</style>

<div class="row">
<div class="col-sm-6">
	<div class="loginBox">
		<h3>Login to your account</h3>
		<div class="gap10"></div>

		<span class="errors font14" style="display:<?php if($errl==1) { echo "block"; } else { echo "none"; } ?>;">
			Invalid Credentials
			<div class="gap10"></div>
		</span>

		<form id="form_login" action="loginChk.php" method="POST">
			<div class="form-group">
				<div class="input-group">
				<input type="text" class="form-control" id="regindex_email" name="regindex_email" placeholder="Email" tabindex="1">
				<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
				</div>
				<div class="gap1"></div>
				<span class="errors" for="regindex_email"></span>
				<div class="gap1"></div>
			</div>
			<div class="gap15"></div>

			<div class="form-group">
				<div class="input-group">
				<input type="password" class="form-control" id="regindex_pwd" name="regindex_pwd" placeholder="Password" tabindex="2">
				<span class="input-group-addon"><i class="fa fa-key"></i></span>
				</div>
				<div class="gap1"></div>
				<span class="errors" for="regindex_pwd"></span>
				<div class="gap1"></div>
			</div>
			<div class="gap5"></div>

			<a href="forgot_password.php" tabindex="4">Forgot Password?</a>
			<input type="submit" class="btn submitMLog" id="reg_login"  name="reg_login" value="Login" tabindex="3">
		</form>
	</div>
</div>
<div class="gap50 yes600"></div>

<div class="col-sm-6">
	<div class="loginBox">
		<h3>Create a new account</h3>
		<div class="gap10"></div>

		<form id="form_reg1" action="" method="POST">
			<div class="form-group">
				<div class="input-group">
				<input type="text" class="form-control" id="regindex_email1" name="regindex_email1" placeholder="Email" tabindex="5">
				<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
				</div>
				<div class="gap1"></div>
				<span class="errors" for="regindex_email1"></span>
				<div class="gap1"></div>
			</div>
			<div class="gap15"></div>

			<div class="form-group">
				<div class="input-group">
				<input type="password" class="form-control" id="regindex_pwd1" name="regindex_pwd1" placeholder="Password" tabindex="6">
				<span class="input-group-addon"><i class="fa fa-key"></i></span>
				</div>
				<div class="gap1"></div>
				<span class="errors" for="regindex_pwd1"></span>
				<div class="gap1"></div>
			</div>
			<div class="gap15"></div>

			<div class="form-group">
				<div class="input-group">
				<input type="password" class="form-control" id="con_password1" name="con_password1" placeholder="Confirm Password" tabindex="7">
				<span class="input-group-addon"><i class="fa fa-key"></i></span>
				</div>
				<div class="gap1"></div>
				<span class="errors" for="con_password1"></span>
				<div class="gap1"></div>
			</div>
			<div class="gap10"></div>

			<input type="submit" class="btn submitMLog" id="reg_submit1"  name="reg_submit1" value="Register" tabindex="8">
		<!--
			<a class="btn submitMLog" id="" href="#modal_otlSuccess" data-toggle="modal">Register</a>
		-->
		</form>
		<div class="gap10"></div>
	</div>

</div>
</div>
<div class="gap10"></div>


<?php include("footer.php"); ?>

<script>
function load_modal() {
	$('#modal_otlSuccess').modal('show');
}
</script>

<script>
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {


            //form validation ruless field is req
            $("#form_login").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            regindex_email: {
                                            required: true,
					    minlength: 3,
                                            maxlength: 50,
                                            email: true,
                                            },
					    regindex_pwd: {
					    required: true,
					    minlength: 6,
                                            maxlength: 18,
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

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {


            //form validation ruless field is req
            $("#form_reg1").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            regindex_email1: {
                                            required: true,
					    minlength: 3,
                                            maxlength: 50,
                                            email: true,
					    remote: {
						url: "ajax_email_exists.php",
						type: "post",
						data: {
							regindex_email: function() {
							return $("#regindex_email1").val();
							}
						}
					     }
                                            },
					    regindex_pwd1: {
                                            required: true,
                                            minlength: 6,
                                            maxlength: 18,
					    },
					    con_password1: {
                                            required: true,
					    equalTo:'#regindex_pwd1',
					    },
               },


				//The error message Str here
		messages: {
			regindex_email1:
			{
			remote: "Email Id already exist."
			},
		},
                submitHandler: function(form) {
			//alert("hiii");
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

