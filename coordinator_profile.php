<?php
$page="coordinator_profile";
$title="Coordinator Profile";
$type=$_GET['t'];
include("header.php"); 
include_once("class/config.php");
include_once("includes/functions.php");
extract($_REQUEST);
session_start();
$user_id=$_SESSION["userid"];
$userType=$_SESSION["type"];
//echo $user_id."######";


if(isset($submit_details)) {


             $path = "uploads/customer_organisation/";
                $name="cr_photo";
                if($_FILES[$name]["size"]>0)
                {
                        //echo $_FILES[$name]["size"].'###1';exit;

                        $img_name= $_FILES[$name]['name']; 
                        $val1=explode(".",$img_name);
                        $tmp_file = $_FILES[$name]['tmp_name'];
                        $imgtype=substr(strrchr(basename($_FILES[$name]["name"]),"."),1); 
                        $imgtype=strtolower($imgtype);        
                        if($imgtype=='jpg' || $imgtype=='gif' || $imgtype=='png'|| $imgtype=='jpeg' || $imgtype=='doc' || $imgtype=='docx' || $imgtype=='pdf'){
                        $name_file = $val1[0].".".time().".".$imgtype;
                        move_uploaded_file($tmp_file,$path.$name_file);
			$img_file=$path.$name_file;
                        $imgUp=", cr_photo='$path$name_file'";
                        }
                        $isizeerr='N';

                }

	$query_up2 = "UPDATE co_representative_details SET cr_name='$cr_name',cr_id_no='$cr_id_no',cr_designation='$cr_designation',cr_language='$cr_language',cr_phone='$cr_phone',cr_country='$cr_country'
,cr_state='$cr_state',cr_city='$cr_city',cr_pincode='$cr_pincode' $imgUp WHERE coordinator_id='$user_id'";
	$statement_up1= $mysqli->prepare($query_up2); 
	//$statement_up1->bind_param('ssssssiiiss',$cr_name,$cr_id_no,$cr_designation,$cr_language,$cr_email,$cr_phone,$cr_country,$cr_state,$cr_city,$cr_pincode,$cr_photo);
	$statement_up1->execute(); 
	//echo $query_up1;
	header("location:coordinator_profile.php");
	}

$querys = "select cr_name,cr_id_no,cr_designation,cr_language,cr_email,cr_phone,cr_pincode,cr_country,cr_state,cr_city,cr_photo FROM co_representative_details WHERE coordinator_id='$user_id'";
$statements=$mysqli->prepare($querys);
	$statements->execute();
	$statements->store_result();
	$statements->bind_result($cr_name,$cr_id_no,$cr_designation,$cr_language,$cr_email,$cr_phone,$cr_pincode,$cr_country,$cr_state,$cr_city,$cr_photo);
	$statements->fetch();

?>

<h3>Coordinator Profile</h3>
<div class="gap10"></div>


			<div class="item1">
<form id="form_reg-institution2" method="post" enctype="multipart/form-data">
				<div class="gap20"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Name <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="cr_name" id="cr_name" value="<?php echo $cr_name;?>"  class="form-control" placeholder="Name" autofocus>
						</div>
						<div class="gap1"></div>
						<span for="cr_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Employee ID <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-users"></i></span>
						<input type="text" name="cr_id_no" id="cr_id_no" value="<?php echo $cr_id_no;?>" class="form-control" placeholder="ID Number">
						</div>
						<div class="gap1"></div>
						<span for="cr_id_no" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Designation/Role <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
						<input type="text" name="cr_designation" id="cr_designation" value="<?php echo $cr_designation;?>" onkeypress="return alpha(event)" onchange="AllowOnlyAlphabates(this);" onpaste="return AllowOnlyAlphabates(this);" oncopy="return AllowOnlyAlphabates(this);" onblur="FormatString(this);" class="form-control" placeholder="Designation/Role">
						</div>
						<div class="gap1"></div>
						<span for="cr_designation" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Language <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-volume-up"></i></span>
						<input type="text" name="cr_language" id="cr_language" value="<?php echo $cr_language;?>" class="form-control" placeholder="Language">
						</div>
						<div class="gap1"></div>
						<span for="cr_language" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Email Address <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="text" name="cr_email" id="cr_email" value="<?php echo $cr_email;?>" onkeypress="javascript:return fncEmailValidate(event);" class="form-control" placeholder="Email" readonly>
						</div>
						<div class="gap1"></div>
						<span for="cr_email" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Phone Number <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-phone"></i></span>
						<input type="tel" name="cr_phone" id="cr_phone" value="<?php echo $cr_phone;?>" onkeypress="javascript:return OnlyNumeric(this,event,false);" class="form-control" placeholder="Phone Number">
						</div>
						<div class="gap1"></div>
						<span for="cr_phone" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Country <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
						<select name="cr_country" id="cr_country" class="form-control">
							<option value="">Select</option>
							<?php echo countryId($cr_country);?>
						</select><i></i>
						</div>
						<div class="gap1"></div>
						<span for="cr_country" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">State<span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
						<select name="cr_state" id="cr_state" class="form-control">
							<option value="">Select</option>
							<?php echo categoryForState($cr_country,$cr_state)?>
						</select><i></i>
						</div>
						<div class="gap1"></div>
						<span for="cr_state" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Suburb/Town/City <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
						<select name="cr_city" id="cr_city"  class="form-control">
							<option value="">Select</option>	
							<?php echo categoryForCity($cr_state,$cr_city);?>
						</select>
						</div>
						<div class="gap1"></div>
						<span for="cr_city" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Postal Code <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="text" name="cr_pincode" id="cr_pincode" value="<?php echo $cr_pincode;?>" class="form-control" placeholder="Postal Code">
						</div>
						<div class="gap1"></div>
						<span for="cr_pincode" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
			
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Upload Photo </label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
						<input type="file" name="cr_photo" id="cr_photo"  accept="image/*"  class="form-control" placeholder="">
						</div>
						<div class="gap1"></div>
						<span for="cr_photo" class="errors"></span>
					</div>
				 <div class="gap5"></div>
				<?php if($cr_photo!='') { ?>
				<div class="col-sm-6 col-sm-push-3">
					<img src="<?php echo $cr_photo;?>" width="100" height="100">
				</div>
				<?php } ?>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="col-sm-9 col-sm-push-3">
					<input type="submit" id="submit_details" name="submit_details" value="SAVE" class="btn submitM">
				</div>
				<div class="gap30"></div>
</form>		
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
            $("#form_reg-institution2").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            cr_name: {
                                            required: true,
                                            firstChar: true,
					    lettersonly4N: true,
					    minlength: 3,
					    maxlength: 50,
                                            },
                                            cr_id_no: {
                                            required: true,
                                            alphanumeric: true,
					    //minlength: 8,
					    //maxlength: 15,
                                            },
					    cr_designation: {
					    required: true,
					    //firstChar: true,
					    minlength: 3,
					    maxlength: 50,
					    },
					    cr_language: {
					   // required: true,
					    firstChar: true,
					    language: true,
					    minlength: 3,
					    maxlength: 50,
					    },
					     cr_email: {
                                            required: true,
                                            email: true,
					    /*remote: {
						url: "ajax_email_exists.php",
						type: "post",
						data: {
							regindex_email: function() {
							return $("#cr_email").val();
							}
						}
					     }*/
                                            },
					    cr_phone: {
					    required: true,
					    minlength: 8,
					    maxlength: 15,
					    },  
					    cr_city: {
                                            required: true,
                                            },  
					    cr_pincode: {
					    required: true,
					    lettersnums: true,
					    },
                                            cr_country: {
                                            required: true,
                                            },
					    cr_state: {
                                            required: true,
                                            },
                                            cr_photo: {
					    //accept: "jpg|jpeg|png",
					    filesize: 1048576,
					    },

					                                             
               },


				//The error message Str here

           messages: {

		cr_name: {
		firstChar: "Kindly start with Character",
		lettersonly4N: "Kindly enter only characters, Space & dot",
		minlength: "Kindly enter only 3 to 50 characters",
		maxlength: "Kindly enter only 3 to 50 characters",
		},
		
		cr_id_no: {
		lettersnums :"Kindly enter Characters and numbers only",
		minlength: "Kindly enter 8 to 15 digits only",
		maxlength: "Kindly enter 8 to 15 digits only",
		},

		cr_designation: {
		firstChar: "Kindly start with Character",
		minlength: "Kindly enter only 3 to 50 characters",
		maxlength: "Kindly enter only 3 to 50 characters",
		},		

		cr_language: {
		minlength: "Kindly enter only 3 to 50 characters",
		maxlength: "Kindly enter only 3 to 50 characters",
		firstChar: "Kindly start with Character",	
		language: "Kindly enter only letters and ,",
		},

		cr_email: {
		email: "Kindly enter a valid email address",
		remote: "Email Id already Exists",
		},

		cr_phone: {
		minlength: "Kindly enter only 8 to 15 values",
		maxlength: "Kindly enter only 8 to 15 values",
		},

		cr_pincode: {
		lettersnumbers: "Kindly enter the Valid Postal Code",
		},
		cr_photo: {
		accept: "Please enter ' jpg | jpeg | png ' image formats only",
		filesize: "Please Upload a File less Than 1 MB",
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
$(document).ready(function()
{
$('#cr_country').change(function()
{
var con=$('#cr_country').val();
if(con=='')
{
$('#cr_state').html('<option>Select Country First</option>');
}
else
{
   $.ajax({    //create an ajax request to functions.php
        type: "POST",
        url: "stateajax.php",             
        data: {con},                 
        success: function(response){
        $('#cr_state').html(response);
        }
    });
}
});
});
</script>
<script>
$(document).ready(function()
{
$('#cr_state').change(function()
{
var com=$('#cr_state').val();
if(com=='')
{
$('#cr_city').html('<option>Select state First</option>');
}
else
{
   $.ajax({    //create an ajax request to functions.php
        type: "POST",
        url: "stateajax.php",             
        data: {com},                 
        success: function(response){
        $('#cr_city').html(response);
        }
    });
}
});
});
</script>
