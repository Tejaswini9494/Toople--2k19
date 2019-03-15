<?php
$page="contact";
$title="Contact Us";
$ses="no";
include_once ("class/config.php");
include_once("includes/functions.php");
include_once('emails/send_email.php');
extract($_REQUEST);
session_start();
//$action='EM';
//getMessageNotification_admin($action);
//echo $_SESSION['user_message'];


if(isset($submit_contact))
{
	//echo 'aaaaa';

	//$to_email='enquiry@tooople.com';
	$to_email='testevince6@gmail.com';
	$cc="";
	$from_email=$email;        
	$emailSubject1="Contact Us";
	$message_name1= "<p><strong>First Name:</strong>".$fname."</p><br>";
	$message_name1.= "<p><strong>Last Name:</strong>".$lname."</p><br>";
	$message_name1.= "<p><strong>Email:</strong>".$email."</p><br>";
	$message_name1.= "<p><strong>City:</strong>".$city."</p><br>";
	$message_name1.= "<p><strong>I am a...:</strong>".$iam."</p><br>";
	if($othertxt!='') {
	$message_name1.= "<p><strong>For Others:</strong>".$othertxt."</p><br>";
	}
	$message_name1.= "<p><strong>Yes, I'd love to hear more via email!:</strong>".$subscribe."</p><br>";
		      

	// echo $from_email."<br>". $to_email."<br>".$emailSubject1."<br>".$message_name1;

	sendEmail($from_email,$cc,$to_email,$emailSubject1,$message_name1);

	header("location:contact.php");
	exit; 
}
if(isset($submit_count))
{
$status='A';
$query="insert into subscribe_contact (email_id, created_on ) values(?,now())";
$statement=$mysqli->prepare($query);
$statement->bind_param('s', $email_id);
$statement->execute();
header("location:contact.php");
}

include("header.php"); ?>

<h3 class="conTitle">Contact Us</h3>
<div class="gap30"></div>

<div class="row">
	<div class="col-md-5">
		<div class="messageBox">
			<form id="contact" method="post" enctype="multipart/form-data">
				<label>First Name <span class="red">*</span></label>
				<input type="text" id="fname" name="fname" class="form-control" placeholder="">
				<div class="gap15"></div>

				<label>Last Name <span class="red">*</span></label>
				<input type="text" id="lname" name="lname" class="form-control" placeholder="">
				<div class="gap15"></div>

				<label>Email <span class="red">*</span></label>
				<input type="text" id="email" name="email" class="form-control" placeholder="">
				<div class="gap15"></div>

				<label>City <span class="red">*</span></label>
				<input type="text" id="city" name="city" class="form-control" placeholder="">
				<div class="gap15"></div>

				<label>I am a... <span class="red">*</span></label>
				<select class="form-control" id="iam" name="iam" onchange="showhideOther(this.value);">
					<option value="">- Please Select -</option>
					<option value="Student looking to skill up">Student looking to skill up</option>
					<option value="Mentor looking to coach">Mentor looking to coach</option>
					<option value="Manager looking to hire">Manager looking to hire</option>
					<option value="College Placement officer looking to collaborate">College Placement officer looking to collaborate</option>
					<option value="Other">Other</option>
				</select>
				<div class="gap15"></div>

				<div id="othershow" style="display:none;">
					<textarea id="othertxt" name="othertxt" class="form-control tal100"></textarea>
					<div class="gap15"></div>
				</div>

				<label>Yes, I'd love to hear more via email! <span class="red">*</span></label>
				<select class="form-control" id="subscribe" name="subscribe">
					<option value="">- Please Select -</option>
					<option value="Yes">Yes</option>
					<option value="No">No</option>
				</select>
				<div class="gap15"></div>

				<input type="submit" class="btn submitM" name="submit_contact" id="submit_contact" value="Submit"> &nbsp;
				<input type="reset" class="btn submitM" name="cancel_contact" id="cancel_contact" value="Cancel"> &nbsp;
				<div class="gap10"></div>
			</form>
		</div>

	</div>
	<div class="gap20 yes800"></div>

	<div class="col-md-7">
		<div class="addressBox">
			<h4>Email</h4>
			enquiry@tooople.com
			<div class="gap10"></div>
			<hr>
			<div class="gap10"></div>

			<h4>TOOOPLE Pte. Ltd.</h4>
			#19-09, 5000C,<br>
			Marine Parade Road<br>
			Singapore, 449286
			<div class="gap10"></div>
			<hr>
			<div class="gap10"></div>

			<h4>TOOOPLE Digital Skills Pvt. Ltd.</h4>
			16-11/741/D/193/6, FNO:302, Maruthi Classic,<br>
			Salivahana Nagar,Saroor Nagar,P&T Colony,<br>
			Hyderabad,Telangana - 500060.
		</div>
	</div>
	<div class="gap30"></div>
</div>

<!--
<form id="subscribe" method="post" enctype="multipart/form-data">
<div class="col-md-12">
	<div class="well">
		<h3 class="text-center">Subscribe to our News</h3>
		<div class="gap20"></div>
		
		<div Class="col-md-10 col-sm-9">
			<input type="text" id="email_id" name="email_id" class="form-control" placeholder="Email Id" style="height: 40px;">
		</div>
		<div class="gap20 yes600"></div>

		<div Class="col-md-2 col-sm-3">
			<input type="submit" class="btn submitM" name="submit_count" id="submit_count" value="Submit"> &nbsp;
		</div>
		<div class="gap20"></div>
	</div>
</div>
</form>
<div class="gap10"></div>
-->
<div class="gap30"></div>

<h3 class="conTitle">LOCATION ON MAP</h3>
<div class="gap10"></div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.777959232977!2d103.92824351489925!3d1.308466362071131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da22bc4a6de011%3A0xedf4661542f0a5e1!2s5000C+Marine+Parade+Rd%2C+Singapore+449286!5e0!3m2!1sen!2sin!4v1487858736550" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
<div class="gap20"></div>

<?php include("footer.php"); ?>

<script>
function showhideOther(val1) {
	if(val1=='Other') {
		$('#othershow').show();
	} else {
		$('#othershow').hide();
	}
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


            //form validation rules
            $("#contact").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            fname: {
                                            required: true,
                                            firstChar: true,
					    lettersonly4N: true,
					    minlength: 3,
					    maxlength: 50,
                                            },
                                            lname: {
                                            required: true,
                                            firstChar: true,
					    lettersonly4N: true,
					    maxlength: 50,
                                            },
                                            email: {
                                            required: true,
                                            email: true,
                                            },
					    city: {
					    required: true,
					    },
					    iam: {
					    required: true,
					    },
					    subscribe: {
					    required: true,
					    },
					    
					    
					                                             
               },


				//The error message Str here

           messages: {

		name: {
		firstChar: "Kindly start with Character",
		lettersonly4N: "Kindly enter only characters, Space & dot",
		minlength: "Kindly enter only 3 to 50 characters",
		maxlength: "Kindly enter only 3 to 50 characters",
		},

		email: {
		email: "Kindly enter a valid email address",
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
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {


            //form validation rules
            $("#subscribe").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                           
                                            email_id: {
                                            required: true,
                                            email: true,
                                            },
					    
					    
					    
					                                             
               },


				//The error message Str here

           messages: {

		name: {
		firstChar: "Kindly start with Character",
		lettersonly4N: "Kindly enter only characters, Space & dot",
		minlength: "Kindly enter only 3 to 50 characters",
		maxlength: "Kindly enter only 3 to 50 characters",
		},

		email: {
		email: "Kindly enter a valid email address",
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

