<?php 
$page="index";
$tit="Admin Login";
include("head.php"); ?>
 <style>
 body{background:#f7f7f7; }
 </style>

<?php //include("in_top.php"); ?>

<div class="gap50"></div>

<h1 class="text-center font24">Welcome to TOOOPLE</h1>


<div class="col-xs-12">


<div class="gap30"></div>

<div class="logBox">
	<div class="text-center">
		<a href="index.php">
			<!--<img src="images/logo_b.png" class="">	-->
			TOOOPLE
		</a>
	</div>
	<div class="gap1"></div>

  <div id="wrapper">
            <div id="login11" class="animate form" >
                <section class="login_content">
                  	<form role="form" name="log" id="log" action="loginChk.php" method="post"  onsubmit="return isready()">           
                        <h1 class="text-center">Login</h1>
                        
<!--
                        <div class="has-feedback">
                            <select name="usertype" id="usertype" class="form-control" required="required">
<option selected="selected" value="">Select User Type</option>		
<option value="student">Student</option>
<option value="mentor">Mentor</option>    
<option value="admin">Admin</option>
 
</select> 
			 
                        </div>
			<div class="gap15"></div>
-->
                        
                        <div class="has-feedback">
                            <input type="text" class="form-control has-feedback-left" placeholder="Username" required="" name="username" autofocus/>
				<i class="fa fa-user form-control-feedback left" aria-hidden="true"></i>
                        </div>
			<div class="gap15"></div>

                        <div class="has-feedback">
                            <input type="password" class="form-control has-feedback-left" placeholder="Password" required="" name="pwd"/>
				<i class="fa fa-key form-control-feedback left" aria-hidden="true"></i>
                        </div>
			<div class="gap15"></div>
			<div class="text-center">
			<input type="submit" class="submitM" value="Log in" /> &nbsp;
			<input type="reset" class="submitM cancelBtn" value="Cancel" />
			<div class="gap15"></div>
		<!--	<a href="forgot_password.php" class="forgotA">Forgot Password</a> -->
			</div>

			<hr>
			<div class="text-center font14">
			&copy; Tooople <?php echo "20".date('y'); ?>. <!--<a target="_blank" href="http://evincetech.com">developed by ev<span class="ein"></span>ce</a>-->
			</div>
                        <div class="clearfix"></div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
           
            
        </div>

</div>
</div>


<script type="text/javascript">

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#log").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
							 
					username: {
                                        required:true,
                                        },
					pwd: {
                                        required:true,
                                        },
				usertype: {
                                        required:true,
                                        },
                                        
                                        
                    },


				//The error message Str here

           messages: {
                 
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

<?php include("foot.php"); ?>
