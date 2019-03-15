<?php
$page="reg-rsp-mentor1";
$title="Registration &raquo; Representative for Service Provider";
$ses="no";
include_once("class/config.php");
include_once("includes/functions.php");
extract($_REQUEST);
session_start();
$user_id=$_SESSION["userid"];
$uType=$_SESSION["type"];

$sl1="select user_email from too_users where user_id='$user_id'";
$state1=$mysqli->prepare($sl1);
$state1->execute();
$state1->store_result();
$state1->bind_result($emailId);
$state1->fetch();



if($uType=='SPM'){
$name1='Mentor ';
}
elseif($uType=='SPC'){
$name1='Content Provider';
}



if(isset($save_submit) || isset($proceed_submit)){

   $path = "uploads/rsp/";
                $name="rsp_photo";
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
                        $imgUp=", rsp_photo='$path$name_file'";
                        $isizeerr='N';

                }








$query = "UPDATE representative_service_provider SET rsp_org_name=?,rsp_email=?,rsp_web=?,rsp_lang=?,rsp_phone=?,rsp_country=?,rsp_state=?,rsp_city=?,rsp_postal=?,rsp_pan=?,rsp_tin=?,rsp_tax=? $imgUp, status='A' where user_id='$user_id'";
	$statement= $mysqli->prepare($query);  
	$statement->bind_param('ssssssssssss',$rsp_org_name,$rsp_email,$rsp_website,$rsp_lang,$rsp_phone,$rsp_country,$rsp_state,$rsp_city,$rsp_postal,$rsp_pan,$rsp_tin,$rsp_tax);
	$statement->execute();
	if(isset($proceed_submit)){
		header("location:reg-rsp-mentor2.php");
	}else{
		header("location:reg-rsp-mentor1.php");
	}
}


$nrows_menu=0;
$sql_menu="select representative_service_provider_details_id FROM representative_service_provider_details WHERE user_id='$user_id'";
$statement_menu=$mysqli->prepare($sql_menu);
$statement_menu->execute();
$statement_menu->store_result();
$statement_menu->bind_result($representative_service_provider_details_id_menu);
$nrows_menu=$statement_menu->num_rows();


include("header.php"); 


$sql = "SELECT rsp_org_name,rsp_email,rsp_web,rsp_lang,rsp_phone,rsp_country,rsp_state,rsp_city,rsp_postal,rsp_pan,rsp_tin,rsp_tax,rsp_photo FROM representative_service_provider where user_id='$user_id'";
$statement1=$mysqli->prepare($sql);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($rsp_org_name,$rsp_email,$rsp_web,$rsp_lang,$rsp_phone,$rsp_country,$rsp_state,$rsp_city,$rsp_postal,$rsp_pan,$rsp_tin,$rsp_tax,$rsp_photo);
$statement1->fetch();

if($statement1->num_rows() < 1) {
	$query2 = "INSERT INTO representative_service_provider (user_id) VALUES($user_id)";
	$statement2= $mysqli->prepare($query2);  
	$statement2->execute();
}



?>

<h2>Registration &raquo; <?php echo $name1; ?> Organization</h2>
<div class="gap30"></div>

<div class="formss formss3">

	<ul class="nav nav-tabs">
		<li class="active">
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div><?php echo $name1; ?> Organization Details
		</li>
		<li>
			<div class="liLine"></div>
			<?php if($nrows_menu > 0) { ?>
				<a href="reg-rsp-mentor2.php"></a>
			<?php } else { ?>
				<a href="javascript:void(0);"></a>
			<?php } ?>
			<div class="gap10"></div><?php echo $name1; ?> Bank Details
		</li>
		<li>
			<div class="liLine"></div>
			<?php if($nrows_menu > 0) { ?>
				<a href="reg-rsp-mentor3.php"></a>
			<?php } else { ?>
				<a href="javascript:void(0);"></a>
			<?php } ?>
			<div class="gap10"></div><?php echo $name1; ?> Representative Details
		</li>
		<li>
			<div class="liLine"></div>
			<?php if($nrows_menu > 0) { ?>
				<a href="reg-rsp-mentor4.php"></a>
			<?php } else { ?>
				<a href="javascript:void(0);"></a>
			<?php } ?>
			<div class="gap10"></div><?php echo $name1; ?> Agreement
		</li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane fade in active">
			<div class="gap30"></div>

			<!------------>

			<h3><?php echo $name1; ?> Organization Details</h3>
			<div class="gap10"></div>
			<form id="form_rsp_mentor" method="post" enctype="multipart/form-data">
			<div class="item1">
				<div class="gap20"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Organization Name <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="rsp_org_name" id="rsp_org_name"  value="<?php echo $rsp_org_name;?>"  class="form-control" placeholder="Name" autofocus>
						</div>
						<div class="gap1"></div>
						<span for="rsp_org_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Email <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="text" name="rsp_email" id="rsp_email" onkeypress="javascript:return fncEmailValidate(event);"  value="<?php echo $emailId;?>" class="form-control" placeholder="Email" readonly>
						</div>
						<div class="gap1"></div>
						<span for="rsp_email" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Website Address</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-globe"></i></span>
						<input type="text" name="rsp_website" id="rsp_website"  value="<?php echo $rsp_web;?>" class="form-control" placeholder="www.example.com">
						</div>
						<div class="gap1"></div>
						<span for="rsp_website" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Official Language</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-volume-up"></i></span>
						<input type="text" name="rsp_lang" id="rsp_lang" value="<?php echo $rsp_lang;?>" class="form-control" placeholder="Language">
						</div>
						<div class="gap1"></div>
						<span for="rsp_lang" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Phone Number <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-phone"></i></span>
						<input type="tel" name="rsp_phone" id="rsp_phone"  onkeypress="javascript:return OnlyNumeric(this,event,false);" class="form-control"  value="<?php echo $rsp_phone;?>" class="form-control" placeholder="Phone Number">
						</div>
						<div class="gap1"></div>
						<span for="rsp_phone" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Country <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
						<select name="rsp_country" id="rsp_country" class="form-control">
							<option value="">Select</option>
							 <?php countryId($rsp_country);?>
						</select><i></i>
						</div>
						<div class="gap1"></div>
						<span for="rsp_country" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">State <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
						<select name="rsp_state" id="rsp_state"  class="form-control">
							<option value="">Select</option>
							<?php categoryForState($rsp_country,$rsp_state);?>
							
						</select>
						</div>
						<div class="gap1"></div>
						<span for="rsp_state" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>


				<div class="form-group">
					<label class="col-sm-3 text-right">Suburb/Town/City <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
						<select name="rsp_city" id="rsp_city"  class="form-control">
							<option value="">Select</option>
							<?php categoryForCity($rsp_state,$rsp_city);?>
							
						</select>
						</div>
						<div class="gap1"></div>
						<span for="rsp_city" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>

				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Postal Code <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="tel" name="rsp_postal" id="rsp_postal" onblur="FormatString(this);" value="<?php echo $rsp_postal;?>" class="form-control" placeholder="Postal Code">
						</div>
						<div class="gap1"></div>
						<span for="rsp_postal" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				
				<div class="gap15"></div>


				<div class="form-group">
					<label class="col-sm-3 text-right">PAN Number</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
						<input type="text" name="rsp_pan" id="rsp_pan"   value="<?php echo $rsp_pan;?>" class="form-control" placeholder="PAN Number">
						</div>
						<div class="gap1"></div>
						<span for="rsp_pan" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">TIN Number</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-file-text"></i></span>
						<input type="text" name="rsp_tin" id="rsp_tin" onblur="FormatString(this);"   value="<?php echo $rsp_tin;?>" class="form-control" placeholder="TIN Number" maxlength="9">
						</div>
						<div class="gap1"></div>
						<span for="rsp_tin" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Service Tax Number</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-money"></i></span>
						<input type="text" name="rsp_tax" id="rsp_tax" value="<?php echo $rsp_tax;?>" class="form-control" maxlength="15" placeholder="Service Tax Number" maxlength="15">
						</div>
						<div class="gap1"></div>
						<span for="rsp_tax" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Upload Photo </label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
						<input type="file" name="rsp_photo" id="rsp_photo" accept="image/*" class="form-control"  placeholder="">
						</div>
						<div class="gap1"></div>
						<span for="rsp_photo" class="errors"></span>
					</div>
				      <div class="gap5"></div>
				<?php if($rsp_photo!='') { ?>
				<div class="col-sm-6 col-sm-push-3">
					<img src="<?php echo $rsp_photo;?>" width="100" height="100">
				</div>
				<?php } ?>
					</div>
				<div class="gap10"></div>
				
				<div class="gap10"></div>
		      </div>  
			<div class="gap10"></div>
				<div>
				   <input type="hidden" name="hiddenemail" id="hiddenemail" value="<?php echo $emailId;?>" maxlength="50"/>
				</div>
			<!------------>

			<div class="col-sm-9 col-sm-push-3">
				<input type="submit" class="btn submitM" id="save_submit" name="save_submit" value="Save"> &nbsp;
				<input type="submit" class="btn submitM" id="proceed_submit" name="proceed_submit" value="Proceed"> &nbsp;
				<input type="button" class="btn submitM" name="reset" id="reset" value="Clear" onclick="empty_form('reset')"
> &nbsp;
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
            $("#form_rsp_mentor").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {

				rsp_org_name : {
				required: true,
				firstChar: true,
			 	lettersonly4N: true,
				minlength: 3,
				maxlength: 50,
				},
				
				rsp_email: {
				required: true,
				email: true,
				},		
		
				rsp_website:{
				firstChar: true,
				url: true,
				},

				rsp_lang:{
				language: true,
				firstChar: true,
				minlength: 3,
				maxlength: 50,
				
				},

				rsp_phone:{
				required: true,
				//digits: true,
				minlength: 8,
				maxlength: 15,
				},

	   			rsp_country:{
				required: true,
				},

				rsp_state:{
				required: true,
				},

				rsp_city:{
				required: true,
				},

				rsp_postal:{
				required: true,
				lettersnums: true,
				minlength: 6,
				maxlength: 18,
				},

				rsp_pan:{
				pan: true,
				minlength: 10,
				maxlength: 16,
				},

				rsp_tin:{
				numbersrest: true,
				minlength: 9,
				maxlength: 9,
				},

				rsp_tax:{
				tax: true,
				minlength: 15,
				maxlength: 15,
				},

				rsp_bank_details:{
				firstChar: true,
				required: true,
				//minlength: 15,
				//maxlength: 150,
				
                                },
                                            
               },

				//The error message Str here
  messages: {

		rsp_org_name: {
		firstChar: "Kindly start with Character",
		lettersonly4N: "Kindly enter only characters, Space & dot",
		minlength: "Kindly enter only 3 to 50 characters",
		maxlength: "Kindly enter only 3 to 50 characters",
		},

		rsp_email: {
		email: "Kindly enter a valid email address",
		},

		rsp_lang: {
		minlength: "Kindly enter only 3 to 50 characters",
		maxlength: "Kindly enter only 3 to 50 characters",
		firstChar: "Kindly start with Character",	
		language: "Kindly enter only letters and ,",
		},

		rsp_phone: {
		minlength: "Kindly enter only 8 to 15 values",
		maxlength: "Kindly enter only 8 to 15 values",
		phoneAll: "Kindly enter only numbers using + or -",
		},

		rsp_postal: {
		lettersnums: "Kindly enter only letters and numbers",
		},

		rsp_pan: {
		minlength: "Kindly enter 3 to 16 values only ",
		maxlength: "Kindly enter 3 to 16 values only ",
		pan: "Please enter valid Pan Number",
		},

		rsp_tin: {
		//tin: "Please enter Tin number in XXX-XX-XXXX format",
		minlength: "Please enter 9 digits of Tin Number",
		maxlength: "Please enter 9 digits of Tin Number",
		},

		rsp_tax: {
		minlength: "Kindly enter 15 digits of Service Tax number",
		maxlength: "Kindly enter 15 digits of Service Tax number",
		},

		rsp_bank_details: {
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
$('#rsp_country').change(function()
{
var con=$('#rsp_country').val();
if(con=='')
{
$('#rsp_state').html('<option>Select Country First</option>');
$('#rsp_city').html('<option>Select state First</option>');
}
else
{
   $.ajax({    //create an ajax request to functions.php
        type: "POST",
        url: "stateajax.php",             
        data: {con},                 
        success: function(response){
        $('#rsp_state').html(response);
	$('#rsp_city').html('<option>Select state First</option>');
        }
    });
}
});
});
</script>
<script>
$(document).ready(function()
{
$('#rsp_state').change(function()
{
var com=$('#rsp_state').val();
if(com=='')
{
$('#rsp_city').html('<option>Select state First</option>');
}
else
{
   $.ajax({    //create an ajax request to functions.php
        type: "POST",
        url: "stateajax.php",             
        data: {com},                 
        success: function(response){
        $('#rsp_city').html(response);
        }
    });
}
});
});

function empty_form(val1){
        $("#"+val1).closest('#form_rsp_mentor').find("input[type=text], input[type=radio], input[type=tel], select, textarea").val("");
var com=$('#hiddenemail').val();
	$('#rsp_email').val(com);
}
</script>


