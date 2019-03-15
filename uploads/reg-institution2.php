<?php
$page="reg-institution2";
$title="Registration &raquo; Institution";
$ses="no";
include_once("class/config.php");
include_once("includes/functions.php");
require_once 'email_sms.php';
extract($_REQUEST);
session_start();
$user_id=$_SESSION["userid"];
$userType=$_SESSION["type"];
echo $user_id."######";
if(isset($delete_id))
{	
	$sql_delete = "DELETE FROM co_representative_details WHERE user_id='$user_id' AND co_representative_details_id='$delete_id'";
	$statement_delete=$mysqli->prepare($sql_delete);
	$statement_delete->execute();
}
if(isset($save_submit) || isset($submit_details)){
$path = "uploads/customer_organisation/";
                $name="cr_photo";
                if($_FILES[$name]["size"]>0)
                {
                        //echo $_FILES[$name]["size"].'###';

                        $img_name= $_FILES[$name]['name']; 
                        $val1=explode(".",$img_name);
                        $tmp_file = $_FILES[$name]['tmp_name'];
                        $imgtype=substr(strrchr(basename($_FILES[$name]["name"]),"."),1); 
                        $imgtype=strtolower($imgtype);        
                        if($imgtype=='jpg' || $imgtype=='gif' || $imgtype=='png'|| $imgtype=='jpeg' || $imgtype=='doc' || $imgtype=='docx' || $imgtype=='pdf'){
                        $name_file = $val1[0].".".time().".".$imgtype;
                        move_uploaded_file($tmp_file,$path.$name_file);
			$img_file=$path.$name_file;
                        $imgUp=", cr_photo='$name_file'";

                        }
                }

	if($update_id=='') {
	$sts="COO";
	$regindex_pwd2=encrypt('123456','tooople#@D2016');
	$query1 = "INSERT INTO  too_users (user_email, user_pwd,user_type, added_date,status) VALUES(?,?,?, now(),'A')";
	$statement1= $mysqli->prepare($query1);
	$statement1->bind_param('sss', $cr_email, $regindex_pwd2,$sts);
	$statement1->execute();
	$id = $statement1->insert_id;
	
	//email('12',$id,'');

	$querys = "INSERT INTO co_representative_details(user_id,coordinator_id,cr_name,cr_id_no,cr_designation,cr_language,cr_email,cr_phone,cr_city,cr_pincode,cr_country,cr_photo,created_on) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,now())";
	$statements= $mysqli->prepare($querys);  
	$statements->bind_param('iissssssisis',$user_id,$id,$cr_name,$cr_id_no,$cr_designation,$cr_language,$cr_email,$cr_phone,$cr_city,$cr_pincode,$cr_country,$name_file);
	echo $querys;
	$statements->execute();
	
	
	//getMessageNotification('regS');
	//header("location:reg-institution2.php");
	exit;
	}
	else {
	$query_up1 = "UPDATE co_representative_details SET cr_name=?,cr_id_no=?,cr_designation=?,cr_language=?,cr_email=?,cr_phone=?,
cr_city=?,cr_pincode=?,cr_country=?,cr_photo=? where co_representative_details_id='$update_id'";
	$statement_up1= $mysqli->prepare($query_up1); 
	$statement_up1->bind_param('ssssssisis',$cr_name,$cr_id_no,$cr_designation,$cr_language,$cr_email,$cr_phone,$cr_city,$cr_pincode,$cr_country,$name_file);
	$statement_up1->execute(); 
	//echo "UPDATE co_representative_details SET cr_name=$cr_name,cr_id_no=$cr_id_no,cr_designation=$cr_designation,cr_language=$cr_language,$cr_email=$cr_email,cr_alt_email=$cr_alt_email,cr_phone=$cr_phone,cr_alt_phone=$cr_alt_phone,cr_city=$cr_city,cr_pincode=$cr_pincode,cr_country=$cr_country,cr_photo=$cr_photo where co_representative_details_id='$update_id'";;
	}
	header("location:reg-institution2.php");
}

if(isset($proceed_submit)){
	header("location:reg-institution3.php");
}

if(isset($edit_id))
{
	$sql_edit = "SELECT co_representative_details_id,cr_name,cr_id_no,cr_designation,cr_language,cr_email,cr_phone,
cr_city,cr_pincode,cr_country,cr_photo FROM  co_representative_details  where user_id='$user_id' AND co_representative_details_id='$edit_id'";
	$statement_edit=$mysqli->prepare($sql_edit);
	$statement_edit->execute();
	$statement_edit->store_result();
	$statement_edit->bind_result($co_representative_details_id,$cr_name,$cr_id_no,$cr_designation,$cr_language,$cr_email,$cr_phone,$cr_city,$cr_pincode,$cr_country,$cr_photo);
	$statement_edit->fetch();
}


include("header.php"); ?>

<h2><?php echo $title; ?></h2>
<div class="gap30"></div>

<div class="formss formss1">

	<ul class="nav nav-tabs">
		<li>
			<div class="liLine"></div>
			<a href="reg-institution1.php"></a>
			<div class="gap10"></div>Institution Organization Details
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div>Institution Representative Details
		</li>
		<li>
			<div class="liLine"></div>
			<a href="reg-institution3.php"></a>
			<div class="gap10"></div>Institution Agreement
		</li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane fade in active">
			<div class="gap30"></div>

			<!------------>
			<h3>Institution Representative Details</h3>
			<div class="gap10"></div>
			<form id="form_reg-institution2" method="post" enctype="multipart/form-data">
			<div class="item1">
				<div class="gap20"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Name <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="cr_name" id="cr_name" value="<?php echo $cr_name;?>" class="form-control" placeholder="Name" autofocus>
						</div>
						<div class="gap1"></div>
						<span for="cr_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">ID No. <span class="red">*</span></label>
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
						<input type="text" name="cr_designation" id="cr_designation" value="<?php echo $cr_designation;?>" class="form-control" placeholder="Designation/Role">
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
						<input type="text" name="cr_email" id="cr_email" value="<?php echo $cr_email;?>" class="form-control" placeholder="Email">
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
						<input type="tel" name="cr_phone" id="cr_phone" value="<?php echo $cr_phone;?>" class="form-control" placeholder="Phone Number">
						</div>
						<div class="gap1"></div>
						<span for="cr_phone" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Suburb/Town/City <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
						<input type="text" name="cr_city" id="cr_city" value="<?php echo $cr_city;?>" class="form-control" placeholder="Suburb/Town/City">
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
						<input type="tel" name="cr_pincode" id="cr_pincode" value="<?php echo $cr_pincode;?>" class="form-control" placeholder="Postal Code">
						</div>
						<div class="gap1"></div>
						<span for="cr_pincode" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Country <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
						<select name="cr_country" id="cr_country" value="<?php echo $cr_country;?>" class="form-control">
							<option value="">Select</option>
							<?php countryId($cr_country);?>
						</select><i></i>
						</div>
						<div class="gap1"></div>
						<span for="cr_country" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Upload Photo </label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
						<input type="file" name="cr_photo" id="cr_photo"  class="form-control" placeholder="">
						</div>
						<div class="gap1"></div>
						<span for="cr_photo" class="errors"></span>
					</div>
					<div><span class="form-group">
						    <input type="hidden" name="update_id" id="update_id" class="form-control" value="<?php echo $edit_id;?>" maxlength="50"/>
						  </span></div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="col-sm-9 col-sm-push-3">
					<input type="submit" id="submit_details" name="submit_details" value="Add Representative" class="btn submitM">
				</div>
				<div class="gap30"></div>

				<div class="col-md-12">
				<div class="table-responsive">
					<table width="100%" class="table table-striped border">
						<tr>
						  <td>Name</td>
						  <td>ID No.</td>
						  <td>Designation/Role</td>
						  <td>Language</td>
						  <td>Email</td>
						  <td>Phone</td>
						  <td>Suburb/Town/City</td>
						  <td>Postal Code</td>
						  <td>Country</td>
						  <td align="right">Action</td>
						</tr>

<?php
$sql = "SELECT co_representative_details_id,cr_name,cr_id_no,cr_designation,cr_language,cr_email,cr_phone,
cr_city,cr_pincode,cr_country FROM  co_representative_details  where user_id='$user_id' ORDER BY created_on DESC";
$statement1=$mysqli->prepare($sql);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($co_representative_details_id,$cr_name,$cr_id_no,$cr_designation,$cr_language,$cr_email,$cr_phones,$cr_city,$cr_pincode,$cr_country);

while($statement1->fetch()) {

							$sql1 = "SELECT country_name FROM master_country where country_id='$cr_country'";
							$statement1s=$mysqli->prepare($sql1);	
							$statement1s->execute();
							$statement1s->store_result();
							$statement1s->bind_result($country_name);		
							$statement1s->fetch();
?>
						<tr>
							<td><?php echo $cr_name;?></td>
							<td><?php echo $cr_id_no;?></td>
							<td><?php echo $cr_designation;?></td>
							<td><?php echo $cr_language;?></td>
							<td><?php echo $cr_email;?></td>
							<td><?php echo $cr_phone;?></td>
							<td><?php echo $cr_city;?></td>							
							<td><?php echo $cr_pincode;?></td>
							<td><?php echo $cr_country;?></td>
							
							<td align="right"><a href="reg-institution2.php?edit_id=<?php echo $co_representative_details_id;?>"><i class="fa fa-pencil edit"></i></a><a id="delete" href="reg-institution2.php?delete_id=<?php echo $co_representative_details_id;?>"><i class="fa fa-trash trash"></i></a></td>

						</tr>
					<?php } ?>
					</table>
				</div>
				
				
				<div class="gap20"></div>

		      </div>  
			<div class="gap10"></div>
			<!------------>

			<div class="col-sm-9 col-sm-push-3">
				<input type="submit" class="btn submitM" id="save_submit" name="save_submit" value="Save"> &nbsp;
				<input type="submit" class="btn submitM" id="proceed_submit" name="proceed_submit" value="Save & Proceed"> &nbsp;
				<input type="reset" class="btn submitM" id="" value="Clear"> &nbsp;
				<a class="btn submitM" id="" href="index.php">Cancel</a>
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
                                            numbersrest: true,
					    minlength: 8,
					    maxlength: 15,
                                            },
					    cr_designation: {
					    required: true,
					    firstChar: true,
					    minlength: 3,
					    maxlength: 50,
					    },
					    cr_language: {
					    required: true,
					    lettersonly: true,
					    minlength: 3,
					    maxlength: 50,
					    },
					     cr_email: {
                                            required: true,
                                            email: true,
					    remote: {
						url: "ajax_email_exists.php",
						type: "post",
						data: {
							regindex_email: function() {
							return $("#cr_email").val();
							}
						}
					     }
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
					    lettersnumbers: true,
					    },
                                            cr_country: {
                                            required: true,
                                            },
                                            cr_photo: {
					    required: true,
					    imgextension: true,
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
		numbersrest: "Kindly enter only numbers",
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
		lettersonly: "Kindly enter only characters",
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
		imgextension: "Kindly upload only JPGE,PNG,GIF Formats ",
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


