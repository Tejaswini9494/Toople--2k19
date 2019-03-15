<?php 
$page="registerN";
$tit="Register";
$ses="no";
include("head.php"); ?>
 <style>
 body{background:#f7f7f7; }
 </style>

 <?php include("in_top.php"); ?>
 


 <div class="col-xs-12">
 
<div class="gap30"></div>
  
<h1 >Register   </h1>
<div class="logBox regBox">

  
  <!--inner  -->
  
  
  <div class="col-md-4 col-md-push-4">
<form role="form" name="log" id="log" action="loginChk.php" method="post"  onsubmit="return isready()">           
 
    
	<h3>Login Info</h3>
	<div class="gap10"></div>
    
    
    <label class="">User Type <span class="red">*</span></label>
<select name="usertype" class="form-control" required="required">
<option selected="selected" value="">Select User Type</option>		
<option value="student">Student</option>
<option value="mentor">Mentor</option>    
<option value="admin">Admin</option>
 
</select> 

<div class="gap20"></div>
 
    
<label class="">Username <span class="red">*</span></label>
<input type="text" name="username"  class="form-control" placeholder="Username" autofocus>

<div class="gap10"></div>

<label class="">Password <span class="red">*</span></label>
<input type="password" name="pwd"   class="form-control" placeholder="Password">

<div class="gap10"></div>


<label class="">Captcha <span class="red">*</span></label>
<div id="cImg" style="position:relative"><?php include("secImage.php"); ?></div>
					 
	 
 
		<div class="gap20"></div>
			<input type="checkbox" name="amenities" id="amenities"> 
			I confirm that I have read and agreed to <a href="#modal_terms" data-toggle="modal">Terms of Use</a> | <a href="#modal_privacy" data-toggle="modal">Privacy Policy</a> of Toople. <span class="red">*</span>

	  <div class="gap20"></div>
	<input type="submit" class="btn btn-primary" value="Submit">
	<a href="index.php" class="btn btn-primary">Cancel</a>
     
</form>
 </div>
    <!--inner  /-->
  
  
  
  
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

