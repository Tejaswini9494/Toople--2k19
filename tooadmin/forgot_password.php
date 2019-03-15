<?php 
$page="forgot_password";
$tit="Forgot Password";
$ses="no";
include("head.php"); ?>
 <style>
 body{background:#f7f7f7; }
 </style>


<div class="col-xs-1 loginLHS"></div>

<div class="col-xs-11">

<div class="gap50"></div>
<h1 class="text-center font24">Welcome to TOOPLE</h1>
<div class="gap30"></div>
<div class="logBox">
	<div class="text-center"><a href="index.php"><img src="images/logo_b.png" class="" /></a></div>
	<div class="gap1"></div>

  <div id="wrapper">
            <div id="login11" class="animate form" >
                <section class="login_content reg_content">
                  	<form role="form" name="forgot_pwd" id="forgot_pwd" action="loginChk.php" method="post"  onsubmit="return isready()">           
                        <h1 class="text-center">Forgot Password</h1>
				<div class="gap5"></div>
				Password reset link will be send to your Email Id.
				<div class="gap10"></div>
                        <div class="has-feedback">
                            <input type="text" class="form-control has-feedback-left" placeholder="Email ID" required="" name="email" autofocus/>
				<i class="fa fa-envelope form-control-feedback left" aria-hidden="true" style="left:4px;"></i>
                        </div>
			<div class="gap15"></div>

			<div class="pull-right">
			<input type="submit" class="btn submitM" value="Submit" />
			<a href="index.php" class="submit cancelBtn">Cancel</a>
			</div>
			<div class="gap1"></div>
			<hr>
			<div class="text-center">
			&copy;<span class="text-center font14">Toople</span> <?php echo "20".date('y'); ?> <!--<a target="_blank" href="http://evincetech.com">developed by ev<span class="ein"></span>ce</a>-->
		  </div>
                        <div class="clearfix"></div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
           
            
        </div>

<div class="gap1"></div>

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
            $("#forgot_pwd").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
							 
					email: {
                                        required:true,
					email:true,
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
