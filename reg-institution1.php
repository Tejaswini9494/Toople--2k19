<?php
$page="reg-institution1";
$title="Registration &raquo; Institution";
$ses="no";
include_once("class/config.php");
include_once("includes/functions.php");
extract($_REQUEST);
session_start();
$user_id=$_SESSION["userid"];
$user_type=$_SESSION["type"];
$username1=$_SESSION["username"];


$query3 = "SELECT user_email FROM too_users where user_id=$user_id";
$statement3=$mysqli->prepare($query3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($user_email3);
$statement3->fetch();

if(isset($co_bank_details))
	$bank=$co_bank_details;
else
	$bank="";


if(isset($save_submit)||isset($proceed_submit)){
	
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
                  
                        $name_file = $val1[0].".".time().".".$imgtype;
                        move_uploaded_file($tmp_file,$path.$name_file);
			$img_file=$path.$name_file;
                        $imgUp=", cr_photo='$path$name_file'";
                        $isizeerr='N';

                }

	$status='A';
	$query = "UPDATE customer_organisation SET co_name=?,co_email=?,co_website=?,co_language=?,co_phone=?,co_fax=?,co_address=?,co_country=?,co_state=?,co_city=?,co_pincode=?,co_pan_number=?,
co_tin_number=?,co_taxno=?,co_bank_details=? $imgUp ,status=? where user_id='$user_id'";
	$statement= $mysqli->prepare($query);  
	$statement->bind_param('sssssssiiissssss',$co_name,$co_email,$co_website,$co_language,$co_phone,$co_fax,$co_address,$co_country,$co_state,$co_city,$co_pincode,$co_pan_number,$co_tin_number,$co_taxno,$bank,$status);
	$statement->execute();

	if(isset($proceed_submit)){
		header("location:reg-institution2.php");
	}else{
		header("location:reg-institution1.php");
	}
}


$sql = "SELECT co_name,co_email,co_website,co_language,co_phone,co_fax,co_address,co_country,co_state,co_city,co_pincode,co_pan_number,co_tin_number,co_taxno,co_bank_details,cr_photo FROM customer_organisation where user_id='$user_id'";
$statement1=$mysqli->prepare($sql);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($co_name,$co_email,$co_website,$co_language,$co_phone,$co_fax,$co_address,$co_country,$co_state,$co_city,$co_pincode,$co_pan_number,$co_tin_number,$co_taxno,$bank,$cr_photo);
$statement1->fetch();

if($statement1->num_rows() < 1) {
	$query2 = "INSERT INTO customer_organisation (user_id, created_on) VALUES($user_id, now())";
	$statement2= $mysqli->prepare($query2);  
	$statement2->execute();
}

if($user_type=='CIS'){
$name12='Internship Organization';
}
elseif($user_type=='CIN'){
$name12='Institution ';
$name13='Institution Details';
}
elseif($user_type=='CRC'){
$name12='Recuriting Organization';
}


$nrows_menu=0;
$sql_menu="select co_representative_details_id FROM co_representative_details WHERE user_id='$user_id'";
$statement_menu=$mysqli->prepare($sql_menu);
$statement_menu->execute();
$statement_menu->store_result();
$statement_menu->bind_result($co_representative_details_id_menu);
$nrows_menu=$statement_menu->num_rows();


include("header.php"); ?>

<h2>Registration &raquo;<?php echo $name12;?> </h2>
<div class="gap30"></div>

<div class="formss formss1">

	<ul class="nav nav-tabs">
		<li class="active">
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div><?php echo $name12;?>Details
		</li>
		<li>
			<div class="liLine"></div>
			<?php if($nrows_menu > 0) { ?>
				<a href="reg-institution2.php"></a>
			<?php } else { ?>
				<a href="javascript:void(0);"></a>
			<?php } ?>
			<div class="gap10"></div><?php echo $name12;?> Representative Details
		</li>
<!--
		<li>
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div><?php echo $name12;?> Agreement
		</li>
-->
	</ul>

	<div class="tab-content">
		<div class="tab-pane fade in active">
			<div class="gap30"></div>

			<!------------>
			<h3><?php echo $name13;?> </h3>
			<div class="gap10"></div>
			<form id="form_reg-institution1" method="post" enctype="multipart/form-data"> 
			<div class="item1">
				<div class="gap20"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right"> <?php echo $name12;?> Name <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="co_name" id="co_name" value="<?php echo $co_name;?>"  class="form-control"  placeholder="Name" autofocus>
						</div>
						<div class="gap1"></div>
						<span for="co_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Email <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="text" name="co_email" id="co_email" value="<?php echo $user_email3;?>" onkeypress="javascript:return fncEmailValidate(event);" class="form-control" placeholder="Email" readonly>
						</div>
						<div class="gap1"></div>
						<span for="co_email" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Website Address</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-globe"></i></span>
						<input type="text" name="co_website" id="co_website" value="<?php echo $co_website;?>" class="form-control" placeholder="www.example.com">
						</div>
						<div class="gap1"></div>
						<span for="co_website" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Official Language</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-volume-up"></i></span>
						<input type="text" name="co_language" id="co_language" value="<?php echo $co_language;?>" class="form-control" placeholder="Language">
						</div>
						<div class="gap1"></div>
						<span for="co_language" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Phone Number <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-phone"></i></span>
						<input type="tel" name="co_phone" id="co_phone" value="<?php echo $co_phone;?>" onkeypress="javascript:return OnlyNumeric(this,event,false);" class="form-control" class="form-control" placeholder="Phone Number">
						</div>
						<div class="gap1"></div>
						<span for="co_phone" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Fax Number</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-fax"></i></span>
						<input type="tel" name="co_fax" id="co_fax" value="<?php echo $co_fax;?>" class="form-control" placeholder="Fax Number">
						</div>
						<div class="gap1"></div>
						<span for="co_fax" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Address <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-flag"></i></span>
						<textarea name="co_address" id="co_address" class="form-control tal100"  placeholder="Address"><?php echo $co_address;?></textarea>
						</div>
						<div class="gap1"></div>
						<span for="co_address" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Country <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
						<select name="co_country" id="co_country" class="form-control">
							<option value="">Select</option>
							 <?php countryId($co_country);?>
						</select><i></i>
						</div>
						<div class="gap1"></div>
						<span for="co_country" class="errors"></span>
					</div>
					<div class="gap1"></div>
					</div>
					<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">State <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
						<select name="co_state" id="co_state"  class="form-control">
							<option value="">Select</option>
							<?php categoryForState($co_country,$co_state);?>
							
						</select>
						</div>
						<div class="gap1"></div>
						<span for="co_state" class="errors"></span>
					</div>
					<div class="gap1"></div>
					</div>
					<div class="gap15"></div>

					<div class="form-group">
					<label class="col-sm-3 text-right">Suburb/Town/City <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
						<select name="co_city" id="co_city"  class="form-control">
							<option value="">Select</option>	
							<?php categoryForCity($co_state,$co_city);?>
						</select>
						</div>
						<div class="gap1"></div>
						<span for="co_city" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Postal Code <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="tel" name="co_pincode" id="co_pincode" value="<?php echo $co_pincode;?>" class="form-control" placeholder="Postal Code">
						</div>
						<div class="gap1"></div>
						<span for="co_pincode" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				
				<div class="gap15"></div>

				</div>

				

				<div class="form-group">
					<label class="col-sm-3 text-right">PAN Number </label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
						<input type="text" name="co_pan_number" id="co_pan_number" value="<?php echo $co_pan_number;?>" class="form-control" placeholder="PAN Number">
						</div>
						<div class="gap1"></div>
						<span for="co_pan_number" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">TIN Number </label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-file-text"></i></span>
						<input type="text" name="co_tin_number" id="co_tin_number" value="<?php echo $co_tin_number;?>" class="form-control" placeholder="TIN Number" maxlength="9">
						</div>
						<div class="gap1"></div>
						<span for="co_tin_number" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Service Tax Number </label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-money"></i></span>
						<input type="text" name="co_taxno" id="co_taxno" value="<?php echo $co_taxno;?>" class="form-control" placeholder="Service Tax Number" maxlength="15">
						</div>
						<div class="gap1"></div>
						<span for="co_taxno" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div>
				   <input type="hidden" name="hiddenemail" id="hiddenemail" value="<?php echo $user_email3;?>" maxlength="50"/>
				</div>
				<div class="gap10"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Upload Photo </label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
						<input type="file" name="cr_photo" id="cr_photo" accept="image/*" class="form-control"  placeholder="">
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
					<div>

				<div class="gap10"></div>

		      
			<div class="gap10"></div>
			<!------------>

			<div class="col-sm-9 col-sm-push-3">
				<input type="submit" class="btn submitM" id="save_submit" name="save_submit" value="Save"> &nbsp;
				<input type="submit" class="btn submitM" id="proceed_submit" name="proceed_submit" value="Proceed"> &nbsp;
				<input type="button" class="btn submitM" name="reset" id="reset" value="Clear" onclick="empty_form('reset')"> &nbsp;
				<a class="btn submitM" id="" href="index.php">Cancel</a>
			</div>
			</form>
			<div class="gap20"></div>
			<div class="col-sm-12"><span class="red">Note:</span> All information we collect is highly confidential, and keeping your information private, safe and secure is very important to us.</div>
		</div>
		
	</div>

</div>

<div class="gap20"></div>

</div></div></div>
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
            $("#form_reg-institution1").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            co_name: {
                                            required: true,
                                            firstChar: true,
					    lettersonly4N: true,
					    minlength: 3,
					    maxlength: 150,
                                            },
                                            co_email: {
                                            required: true,
                                            email: true,
                                            },
					    co_website: {
					    firstChar: true,
				            url:true,
					    },
					    co_language: {
					    firstChar: true,
					    language: true,
					    minlength: 3,
					    maxlength: 50,
					    },
					    co_phone: {
					    required: true,
					    //phoneAll: true,
 					    minlength: 8,
					    maxlength: 15,
					    },
					    co_fax: {
					    numbersrest: true,
					    minlength: 10,
					    maxlength: 10,
					    },
					    co_address: {
					    required: true,
					    },
					    co_country: {
                                            required: true,
                                            },
					    co_state: {
                                            required: true,
                                            },
					    co_city: {
                                            required: true,
                                            },
					    co_pincode: {
					    required: true,
					    lettersnums: true,
					    minlength: 6,
					    maxlength: 18,
					    },
                                            co_pan_number: {
					    //required: true,
					    pan: true,
					    minlength: 10,
					    maxlength: 16,
					    
					    },
					    co_tin_number: {
					    //required: true,
					    numbersrest: true,
					    minlength: 9,
					    maxlength: 9,
					   
					    },
                                            co_taxno: {
					    //required: true,
					    //numbersrest: true,
					    tax: true,
					    //minlength: 15,
					    //maxlength: 15,
					    
					    },
					    co_bank_details: {
					    //minlength: 15,
					    //maxlength: 150,
					    },

					                                             
               },


				//The error message Str here

           messages: {

		co_name: {
		firstChar: "Kindly start with Character",
		lettersonly4N: "Kindly enter only characters, Space & dot",
		minlength: "Kindly enter only 3 to 150 characters",
		maxlength: "Kindly enter only 3 to 150 characters",
		},

		co_email: {
		email: "Kindly enter a valid email address",
		},

		co_language: {
		minlength: "Kindly enter only 3 to 50 characters",
		maxlength: "Kindly enter only 3 to 50 characters",
		firstChar: "Kindly start with Character",	
		language: "Kindly enter only letters and ,",
		},

		co_phone: {
		minlength: "Kindly enter only 8 to 15 values",
		maxlength: "Kindly enter only 8 to 15 values",
		phoneAll: "Kindly enter only numbers using + or -",
		},

		co_fax: {
		numbersrest: "Kindly enter only numbers",
		minlength: "Kindly enter 10 digit fax number",
		maxlength: "Kindly enter 10 digit fax number",
		},

		co_pincode: {
		lettersnums: "Kindly enter only letters and numbers",
		},

		co_pan_number: {
		minlength: "Kindly enter 10 to 16 values only ",
		maxlength: "Kindly enter 10 to 16 values only ",
		pan: "Please enter valid Pan Number",
		},

		co_tin_number: {
		numbersrest :"Please enter Numbers only",
		minlength: "Please enter 9 digits of Tin Number",
		maxlength: "Please enter 9 digits of Tin Number",
		},

		co_taxno: {
		minlength: "Kindly enter 15 digits of Service Tax number",
		maxlength: "Kindly enter 15 digits of Service Tax number",
		numbersrest: "Kindly enter only numbers",
		},

		co_bank_details: {
		minlength: "Kindly enter only 15 to 150 characters",
		maxlength: "Kindly enter only 15 to 150 characters",
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
$('#co_country').change(function()
{
var con=$('#co_country').val();
if(con=='')
{
$('#co_state').html('<option>Select Country First</option>');
}
else
{
   $.ajax({    //create an ajax request to functions.php
        type: "POST",
        url: "stateajax.php",             
        data: {con},                 
        success: function(response){
        $('#co_state').html(response);
        }
    });
}
});
});
</script>
<script>
$(document).ready(function()
{
$('#co_state').change(function()
{
var com=$('#co_state').val();
if(com=='')
{
$('#co_city').html('<option>Select state First</option>');
}
else
{
   $.ajax({    //create an ajax request to functions.php
        type: "POST",
        url: "stateajax.php",             
        data: {com},                 
        success: function(response){
        $('#co_city').html(response);
        }
    });
}
});
});

function empty_form(val1){
        $("#"+val1).closest('#form_reg-institution1').find("input[type=text], input[type=radio], input[type=tel], select, textarea").val("");
	var com=$('#hiddenemail').val();
	$('#co_email').val(com);
}
</script>
