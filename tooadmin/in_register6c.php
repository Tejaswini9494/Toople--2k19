<?php
$page="reg-rsp-mentor3";
$title="Registration &raquo; Representative for Service Provider-mentor";
$ses="no";
include_once("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);

if(isset($delete_id))
{	
	$sql_delete = "DELETE FROM representative_service_provider_details WHERE user_id='$id' AND representative_service_provider_details_id='$delete_id'";
	$statement_delete=$mysqli->prepare($sql_delete);
	$statement_delete->execute();
}





if(isset($submit_details)){
$path = "uploads/rsp/";
                $name="rsp_photo";
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
                        $imgUp=", rsp_photo='$name_file'";

                        }
                }


$state='A';
	if($update_id=='') {
	$querys = "INSERT INTO representative_service_provider_details
(user_id,rsp_name,rsp_emp_id,rsp_role,rsp_email_id,rsp_alter_email,rsp_phone_no,rsp_alter_phone,rsp_photo,status,created_on) VALUES (?,?,?,?,?,?,?,?,?,?,now())";
	$statements= $mysqli->prepare($querys);  
	$statements->bind_param('isssssssss',$user_id,$rsp_name,$rsp_emp_id,$rsp_role,$rsp_email_id,$rsp_alter_email,$rsp_phone_no,$rsp_alter_phone,$name_file,$state);
	$statements->execute();
	//echo $querys;
	}
	else {
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
representative_service_provider_details_id,rsp_name,rsp_emp_id,rsp_role,rsp_email_id,rsp_alter_email,rsp_phone_no,rsp_alter_phone,rsp_photo FROM  representative_service_provider_details  where user_id='$id' AND representative_service_provider_details_id='$edit_id'";
	$statement_edit=$mysqli->prepare($sql_edit);
	$statement_edit->execute();
	$statement_edit->store_result();
	$statement_edit->bind_result($representative_service_provider_details_id,$rsp_name,$rsp_emp_id,$rsp_role,$rsp_email_id,$rsp_alter_email,$rsp_phone_no,$rsp_alter_phone,$rsp_photo);
	$statement_edit->fetch();
	
}





 ?>

<h2><?php echo $title; ?></h2>
<div class="gap30"></div>

<div class="gap10"></div>
			
			<div class="item1">
				<div class="gap20"></div>
			<form id="form_rsp_m3" method="post" enctype="multipart/form-data" >
				<div class="form-group">
					<label class="col-sm-3 text-right">Name <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="rsp_name" id="rsp_name" value="<?php echo $rsp_name;?>" class="form-control" placeholder="Name">
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
						<input type="text" name="rsp_email_id" id="rsp_email_id" value="<?php echo $rsp_email_id;?>" class="form-control" placeholder="Email">
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
						<input type="text" name="rsp_alter_email" id="rsp_alter_email"value="<?php echo $rsp_alter_email;?>" class="form-control" placeholder="Email">
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
						<input type="tel" name="rsp_phone_no" id="rsp_phone_no" value="<?php echo $rsp_phone_no;?>" class="form-control" placeholder="Phone Number">
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
						<input type="tel" name="rsp_alter_phone" id="rsp_alter_phone" value="<?php echo $rsp_alter_phone;?>" class="form-control" placeholder="Phone Number">
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
					</div>
					<div> <span class="form-group">
						    <input type="hidden" name="update_id" id="update_id" class="form-control" value="<?php echo $edit_id;?>" maxlength="50"/></div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="col-sm-9 col-sm-push-3">
					<input type="submit" id="submit_details" name="submit_details" value="Add Representative" class="btn submitM">
				</div>
				<div class="gap30"></div>
				</form>
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
						<?php
$sql = "SELECT
representative_service_provider_details_id,rsp_name,rsp_emp_id,rsp_role,rsp_email_id,rsp_alter_email,rsp_phone_no,rsp_alter_phone,rsp_photo FROM  representative_service_provider_details  where user_id='$id' ORDER BY created_on DESC";
$statement1=$mysqli->prepare($sql);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($representative_service_provider_details_id,$rsp_name,$rsp_emp_id,$rsp_role,$rsp_email_id,$rsp_alter_email,$rsp_phone_no,$rsp_alter_phone,$rsp_photo);

 while($statement1->fetch()) {
														
					?>
						<tr>
							<td><?php echo $rsp_name;?></td>
							<td><?php echo $rsp_emp_id;?></td>
							<td><?php echo $rsp_role;?></td>
							<td><?php echo $rsp_email_id;?></td>
							<td><?php echo $rsp_phone_no;?></td>
							
							

						  <td align="right"><a href="reg-rsp-mentor3.php?edit_id=<?php echo $representative_service_provider_details_id;?>"><i class="fa fa-pencil edit"></i></a><a id="delete" href="reg-rsp-mentor3.php?delete_id=<?php echo $representative_service_provider_details_id;?>"><i class="fa fa-trash trash"></i></a></td>
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
            $("#form_rsp_m3").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {

				rsp_name: {
				required: true,
				lettersonly4N: true,
				minlength: 3,
				maxlength: 50,
				firstChar: true,
				},

				rsp_emp_id: {
				required: true,
				numbersrest: true,
				minlength: 8,
				maxlength: 15,
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
				email: true,
				firstChar: true,
				},

				rsp_alter_email: {
				email: true,
				firstChar: true,
				},

				rsp_phone_no: {
				required: true,
				phoneAll: true,
				minlength: 8,
				maxlength: 15,
				},

				rsp_alter_phone: {
				phoneAll: true,
				minlength: 8,
				maxlength: 15,
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
		numbersrest: "Kindly enter only numbers",
		minlength: "Kindly enter 8 to 15 digits only",
		maxlength: "Kindly enter 8 to 15 digits only",
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
