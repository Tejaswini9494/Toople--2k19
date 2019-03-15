<?php
$page="reg-rsp-mentor3";
$title="Registration &raquo; Representative for Service Provider";

include_once("class/config.php");
include_once("includes/functions.php");
extract($_REQUEST);
session_start();
$user_id=$_SESSION["userid"];

$uType=$_SESSION["type"];

if($uType=='SPM'){
$name1='Mentor ';
}
elseif($uType=='SPC'){
$name1='Content Provider';
}


if(isset($delete_id))
{	
	$sql_delete = "DELETE FROM representative_service_provider_details WHERE user_id='$user_id' AND representative_service_provider_details_id='$delete_id'";
	$statement_delete=$mysqli->prepare($sql_delete);
	$statement_delete->execute();
}

if(isset($save_submit)){
	header("location:reg-rsp-mentor3.php");
	exit;
}

if(isset($proceed_submit)){
	header("location:reg-rsp-mentor4.php");
	exit;
}




if(isset($submit_details)){
$path = "uploads/rsp/";
                $name="rsp_photo";
                
                        //echo $_FILES[$name]["size"].'###';

                        $img_name= $_FILES[$name]['name']; 
                        $val1=explode(".",$img_name);
                        $tmp_file = $_FILES[$name]['tmp_name'];
                        $imgtype=substr(strrchr(basename($_FILES[$name]["name"]),"."),1); 
                        $imgtype=strtolower($imgtype);        
                        if($imgtype=='jpg' || $imgtype=='gif' || $imgtype=='png'|| $imgtype=='jpeg'){
                        $name_file = $val1[0].".".time().".".$imgtype;
                        move_uploaded_file($tmp_file,$path.$name_file);
			$img_file=$path.$name_file;
                        $imgUp=", rsp_photo='$name_file'";

                        }
                


$state='A';


	if($update_id=='') {
	$querys = "INSERT INTO representative_service_provider_details
(user_id,rsp_name,rsp_emp_id,rsp_role,rsp_email_id,rsp_alter_email,rsp_phone_no,rsp_alter_phone,rsp_photo,status,created_on) VALUES ('$user_id','$rsp_name','$rsp_emp_id','$rsp_role','$rsp_email_id','$rsp_alter_email','$rsp_phone_no','$rsp_alter_phone','$name_file','$state',now())";
	
	$statements= $mysqli->prepare($querys);  
	//$statements->bind_param('isssssssss',$user_id,$rsp_name,$rsp_emp_id,$rsp_role,$rsp_email_id,$rsp_alter_email,$rsp_phone_no,$rsp_alter_phone,$name_file,$state);
	$statements->execute();
	
	}
	else {
		if($rspphoto==''){
		$name_file=$name_file;
		}
		else{
		$name_file=$rspphoto;
		}
	
	$query_up1 = "UPDATE representative_service_provider_details SET
rsp_name=?,rsp_emp_id=?,rsp_role=?,rsp_email_id=?,rsp_alter_email=?,rsp_phone_no=?,rsp_alter_phone=?,rsp_photo=? where representative_service_provider_details_id='$update_id'";
	$statement_up1= $mysqli->prepare($query_up1); 
	$statement_up1->bind_param('ssssssss',$rsp_name,$rsp_emp_id,$rsp_role,$rsp_email_id,$rsp_alter_email,$rsp_phone_no,$rsp_alter_phone,$name_file);
	$statement_up1->execute(); 
	 
	//echo "UPDATE student_qualifications SET s_program=$s_program,s_branch=$s_branch,s_year_of_start=$s_year_of_start,s_year_of_completion=$s_percentage_achieved=$s_percentage_achieved,s_university_name=$s_university_name,s_institution_name=$s_institution_name,s_institution_country=$s_institution_country,s_institution_state=$s_institution_state,s_institution_city=$s_institution_city,s_institution_zip=$s_institution_zip where s_qualification_id='$update_id'";;
	}
	if(isset($proceed_submit)){
		header("location:reg-rsp-mentor4.php");
	}else{
		header("location:reg-rsp-mentor3.php");
	}
}

if(isset($edit_id))
{
	$sql_edit = "SELECT
representative_service_provider_details_id,rsp_name,rsp_emp_id,rsp_role,rsp_email_id,rsp_alter_email,rsp_phone_no,rsp_alter_phone,rsp_photo FROM  representative_service_provider_details  where user_id='$user_id' AND representative_service_provider_details_id='$edit_id'";
	$statement_edit=$mysqli->prepare($sql_edit);
	$statement_edit->execute();
	$statement_edit->store_result();
	$statement_edit->bind_result($representative_service_provider_details_id,$rsp_name,$rsp_emp_id,$rsp_role,$rsp_email_id,$rsp_alter_email,$rsp_phone_no,$rsp_alter_phone,$rsp_photo);
	$statement_edit->fetch();
	
}


$nrows_menu=0;
$sql_menu="select representative_service_provider_details_id FROM representative_service_provider_details WHERE user_id='$user_id'";
$statement_menu=$mysqli->prepare($sql_menu);
$statement_menu->execute();
$statement_menu->store_result();
$statement_menu->bind_result($representative_service_provider_details_id_menu);
$nrows_menu=$statement_menu->num_rows();


include("header.php"); ?>

<h2>Registration &raquo; <?php echo $name1; ?> Organization</h2>
<div class="gap30"></div>

<div class="formss formss3">

	<ul class="nav nav-tabs">
		<li class="active">
			<div class="liLine"></div>
			<a href="reg-rsp-mentor1.php"></a>
			<div class="gap10"></div><?php echo $name1; ?> Organization Details
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="reg-rsp-mentor2.php"></a>
			<div class="gap10"></div><?php echo $name1; ?> Bank Details
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
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
			<h3><?php echo $name1; ?> Representative Details</h3>
			<div class="gap10"></div>
			
			<div class="item1">
				<div class="gap20"></div>
			<form id="form_rsp_m3" method="post" enctype="multipart/form-data" >
				<div class="form-group">
					<label class="col-sm-3 text-right">Name <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="rsp_name" id="rsp_name" onkeypress="return alpha(event)"
 value="<?php echo $rsp_name;?>" class="form-control"  placeholder="Name" autofocus>
						</div>
						<div class="gap1"></div>
						<span for="rsp_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Employee ID No. <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-users"></i></span>
						<input type="text" name="rsp_emp_id" id="rsp_emp_id" value="<?php echo $rsp_emp_id;?>" class="form-control" placeholder="ID Number">
						</div>
						<div class="gap1"></div>
						<span for="rsp_emp_id" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Designation/Role <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
						<input type="text" name="rsp_role" id="rsp_role" value="<?php echo $rsp_role;?>" class="form-control" placeholder="Designation/Role">
						</div>
						<div class="gap1"></div>
						<span for="rsp_role" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Email ID <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="text" name="rsp_email_id" id="rsp_email_id" onkeypress="javascript:return fncEmailValidate(event);"
OnPaste="return false;"  value="<?php echo $rsp_email_id;?>" class="form-control" placeholder="Email">
						</div>
						<div class="gap1"></div>
						<span for="rsp_email_id" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Alternative Email ID</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="text" name="rsp_alter_email" onkeypress="javascript:return fncEmailValidate(event);"
OnPaste="return false;"  id="rsp_alter_email"value="<?php echo $rsp_alter_email;?>" class="form-control" placeholder="Email">
						</div>
						<div class="gap1"></div>
						<span for="rsp_alter_email" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Phone Number <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-phone"></i></span>
						<input type="tel" name="rsp_phone_no" id="rsp_phone_no"   onkeypress="javascript:return OnlyNumeric(this,event,false);" value="<?php echo $rsp_phone_no;?>" class="form-control" placeholder="Phone Number">
						</div>
						<div class="gap1"></div>
						<span for="rsp_phone_no" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Alternative Phone Number</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-phone"></i></span>
						<input type="tel" name="rsp_alter_phone" id="rsp_alter_phone"  onkeypress="javascript:return OnlyNumeric(this,event,false);" value="<?php echo $rsp_alter_phone;?>" class="form-control" placeholder="Phone Number">
						</div>
						<div class="gap1"></div>
						<span for="rsp_alter_phone" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Upload Photo </label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
						<input type="file" name="rsp_photo" id="rsp_photo" value="<?php echo $rsp_photo;?>" class="form-control" placeholder="">
						</div>
						<div class="gap1"></div>
						<span for="rsp_photo" class="errors"></span>
						<div class="gap5"></div>
					<?php if($rsp_photo!='') { ?>
				<div class="col-sm-6 col-sm-push-3">
					<img src="uploads/rsp/<?php echo $rsp_photo;?>" width="100" height="100">
				</div>
				<?php } ?>
					</div>
					<div> <span class="form-group">
						    <input type="hidden" name="update_id" id="update_id" class="form-control" value="<?php echo $edit_id;?>" maxlength="50"/></div>
						<input type="hidden" name="rspphoto" id="rspphoto" class="form-control" accept="image/*" value="<?php echo $rsp_photo;?>" maxlength="50"/>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="col-sm-9 col-sm-push-3">
					<input type="submit" id="submit_details" name="submit_details" value="Add Representative" class="btn submitM"> &nbsp;
					<input type="button" class="btn submitM" name="reset" id="reset" value="Clear" onclick="empty_form('reset')"
> &nbsp;
				</div>
				<div class="gap30"></div>
				</form>

<?php				
$sql = "SELECT
representative_service_provider_details_id,rsp_name,rsp_emp_id,rsp_role,rsp_email_id,rsp_alter_email,rsp_phone_no,rsp_alter_phone,rsp_photo FROM  representative_service_provider_details  where user_id='$user_id' ORDER BY created_on DESC";
$statement1=$mysqli->prepare($sql);
$statement1->execute();
$statement1->store_result();
$num1=$statement1->num_rows();
$statement1->bind_result($representative_service_provider_details_id,$rsp_name,$rsp_emp_id,$rsp_role,$rsp_email_id,$rsp_alter_email,$rsp_phone_no,$rsp_alter_phone,$rsp_photo);
if($num1>0){
?>
				<div class="col-md-12">
				<div class="table-responsive">
					<table width="100%" class="table table-striped border">
						<tr>
						  <td>Name</td>
						  <td>ID No.</td>
						  <td>Designation/Role</td>
						  <td>Email</td>
						  <td>Phone</td>
						  <td align="right">Action</td>
						</tr>
						<?php }

 while($statement1->fetch()) {
														
					?>
						<tr>
							<td><?php echo $rsp_name;?></td>
							<td><?php echo $rsp_emp_id;?></td>
							<td><?php echo $rsp_role;?></td>
							<td><?php echo $rsp_email_id;?></td>
							<td><?php echo $rsp_phone_no;?></td>
							
							

						  <td align="right"><a href="reg-rsp-mentor3.php?edit_id=<?php echo $representative_service_provider_details_id;?>"><i class="fa fa-pencil edit"></i></a><a class="delete" href="reg-rsp-mentor3.php?delete_id=<?php echo $representative_service_provider_details_id;?>"><i class="fa fa-trash trash"></i></a></td>
						</tr>
					<?php } ?>
					</table>
				</div>
				</div> 

				<div class="gap20"></div>

		      </div>  
			<div class="gap10"></div>
			<!------------>
				<form method="post" enctype="multipart/form-data">
			<div class="col-sm-9 col-sm-push-3">
				<input type="submit" class="btn submitM" id="save_submit" name="save_submit" value="Save"> &nbsp;
				<input type="submit" class="btn submitM" id="proceed_submit" name="proceed_submit" value="Proceed"> &nbsp;
				
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
            $("#form_rsp_m3").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {

				rsp_name: {
				required: true,
				firstChar: true,
				lettersonly4N: true,
				minlength: 3,
				maxlength: 50,
				
				},

				rsp_emp_id: {
				required: true,
				lettersnums: true,
				//minlength: 8,
				//maxlength: 15,
				},

				rsp_role: {
				required: true,
				firstChar: true,
				lettersonly4N: true,
				minlength: 3,
				maxlength: 50,
				},

				rsp_email_id: {
				required: true,
				//email: true,
				//firstChar: true,
				},

				rsp_alter_email: {
				email: true,
				firstChar: true,
				},

				rsp_phone_no: {
				required: true,
				//phoneAll: true,
 			        minlength: 8,
				maxlength: 15,
				},

				rsp_alter_phone: {
				//phoneAll: true,
				minlength: 8,
				maxlength: 15,
				},

				rsp_photo: {
				
				//accept: "jpg|jpeg|gif|png",
				filesize: 1048576,
				},
				
 		},

 messages: {

		rsp_name: {
		firstChar: "Kindly start with Character",
		lettersonly4N: "Kindly enter only characters, Space & dot",
		minlength: "Kindly enter only 3 to 50 characters",
		maxlength: "Kindly enter only 3 to 50 characters",
		},
		
		rsp_emp_id: {
		lettersnums: "Kindly enter only characters and numbers",
		minlength: "Kindly enter 8 to 15 values only",
		maxlength: "Kindly enter 8 to 15 values only",
		},

		rsp_role: {
		lettersonly4N: "Kindly enter only characters", 
		firstChar: "Kindly start with Character",
		minlength: "Kindly enter only 3 to 50 characters",
		maxlength: "Kindly enter only 3 to 50 characters",
		},		

		rsp_email_id: {
		email: "Kindly enter a valid email address",
		firstChar: "Kindly start with Character",
		},
		
		rsp_alter_email: {
		email: "Kindly enter a valid email address",
		firstChar: "Kindly start with Character",
		},

		rsp_phone_no: {
		minlength: "Kindly enter only 8 to 15 values",
		maxlength: "Kindly enter only 8 to 15 values",
		phoneAll: "Kindly enter only numbers using + or -",
		},

		rsp_alter_phone: {
		minlength: "Kindly enter only 8 to 15 values",
		maxlength: "Kindly enter only 8 to 15 values",
		phoneAll: "Kindly enter only numbers using + or -",

		},

		rsp_photo: {
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
$('.delete').click(function() {
 var agree=confirm("ARE YOU ABSOLUTELY SURE YOU WANT TO DELETE THIS RECORD?");
	         if (agree) {
		      return true;
	         } else {
		      return false;
		     }
});
});

function empty_form(val1){
        $("#"+val1).closest('#form_rsp_m3').find("input[type=text], input[type=radio], input[type=tel], input[type=file], select, textarea").val("");
}
</script>

