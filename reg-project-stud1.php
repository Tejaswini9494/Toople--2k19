<?php
$page="reg-project-stud1";
$title="Registration &raquo; Project Student";
$ses="no";
include_once("class/config.php");
include_once("includes/functions.php");
extract($_REQUEST);
session_start();
$user_id=$_SESSION["userid"];
$u_id=$user_id;
$userType=$_SESSION["type"];

if($userType=='SP'|| $userType=='CIN' ){
$name11='Project Student';
}
elseif($userType=='SI'){
$name11='Intern Student';
}
//echo $_GET['sID']."##########<br>";

if($_GET['sID']!='')
$_SESSION['add_user_id']=$_GET['sID'];


if($_SESSION['add_user_id']!='')
$user_id=$_SESSION['add_user_id'];


//echo $user_id."#######################";


if(isset($save_submit) || isset($submit_details) || isset($proceed_submit)){

$s_dob1=sysConvert2($s_dob);





$path = "uploads/student/";
                $name="s_upload_photo";
                if($_FILES[$name]["size"]>0)
                {
                        //echo $_FILES[$name]["size"].'###';

                        $img_name= $_FILES[$name]['name']; 
                        $val1=explode(".",$img_name);
                        $tmp_file = $_FILES[$name]['tmp_name'];
                        $imgtype=substr(strrchr(basename($_FILES[$name]["name"]),"."),1); 
                        $imgtype=strtolower($imgtype);        

                        $name_file = $val1[0].time().".".$imgtype;
                        move_uploaded_file($tmp_file,$path.$name_file);
			
                        $imgUp=", s_upload_photo='$path$name_file'";

                        
                }

		$query = "UPDATE student_info SET s_institution_name=?,s_first_name=?,s_last_name=?,s_dob=?,s_gender=?,s_identify_number=? $imgUp where user_id='$user_id'";
		$statement= $mysqli->prepare($query);  
		$statement->bind_param('ssssss',$s_institution_name, $s_first_name, $s_last_name,$s_dob1,$s_gender,$s_identify_number);
		$statement->execute();
if(isset($proceed_submit)){
	header("location:reg-project-stud2.php?email=$email");
}

}



$sql1="select rsp_id from too_users where user_id='$user_id'";
$stmt1=$mysqli->prepare($sql1);
$stmt1->execute();
$stmt1->store_result();
$stmt1->bind_result($rsp_id);
$stmt1->fetch();



$sql4="select user_id from too_users where user_type='CIN' AND status='A'";
$statement4=$mysqli->prepare($sql4);
$statement4->execute();
$statement4->store_result();
$statement4->bind_result($userid11);






$sql = "SELECT s_institution_name,s_first_name,s_last_name,s_dob,s_gender,s_identify_number,s_upload_photo FROM  student_info  where user_id='$user_id'";
$statement1=$mysqli->prepare($sql);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($s_institution_name,$s_first_name,$s_last_name,$s_dob,$s_gender,$s_identify_number,$s_upload_photo);
$statement1->fetch();
$s_dob1=sysDBDateConvert($s_dob);
if($s_dob1=='00/00/0000' || $s_dob1=='//')
{
$s_dob1="";
} 
if($statement1->num_rows() < 1) {
	$ipaddr=$_SERVER['REMOTE_ADDR'];
	$query2 = "INSERT INTO  student_info (user_id,s_institution_name,ipaddress,created_on) VALUES($user_id,'$u_id','$ipaddr',now())";
	$statement2= $mysqli->prepare($query2); 
		//echo $query2; 
	$statement2->execute();

}


$nrows_menu=0;
$sql_menu="select s_qualification_id FROM student_qualifications WHERE user_id='$user_id'";
$statement_menu=$mysqli->prepare($sql_menu);
$statement_menu->execute();
$statement_menu->store_result();
$statement_menu->bind_result($s_qualification_id_menu);
$nrows_menu=$statement_menu->num_rows();


include("header.php"); ?>

<h2>Registration &raquo;<?php echo $name11; ?></h2>
<div class="gap30"></div>

<div class="formss">

	<ul class="nav nav-tabs">
		<li class="active">
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div>Personal Info
		</li>
		<li>
			<div class="liLine"></div>
			<?php if($nrows_menu > 0) { ?>
				<a href="reg-project-stud2.php"></a>
			<?php } else { ?>
				<a href="javascript:void(0);"></a>
			<?php } ?>
			<div class="gap10"></div>Contact Info
		</li>
		<li>
			<div class="liLine"></div>
			<?php if($nrows_menu > 0) { ?>
				<a href="reg-project-stud3.php"></a>
			<?php } else { ?>
				<a href="javascript:void(0);"></a>
			<?php } ?>
			<div class="gap10"></div>Educational Qualification
		</li>
		<li>
			<div class="liLine"></div>
			<?php if($nrows_menu > 0) { ?>
				<a href="reg-project-stud4.php"></a>
			<?php } else { ?>
				<a href="javascript:void(0);"></a>
			<?php } ?>
			<div class="gap10"></div>Technical Skills
		</li>
		<li>
			<div class="liLine"></div>
			<?php if($nrows_menu > 0) { ?>
				<a href="reg-project-stud5.php"></a>
			<?php } else { ?>
				<a href="javascript:void(0);"></a>
			<?php } ?>
			<div class="gap10"></div>Certification Details
		</li>
		<li>
			<div class="liLine"></div>
			<?php if($nrows_menu > 0) { ?>
				<a href="reg-project-stud6.php"></a>
			<?php } else { ?>
				<a href="javascript:void(0);"></a>
			<?php } ?>
			<div class="gap10"></div>Work Experience
		</li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane fade in active">
			<div class="gap30"></div>

			<!------------>
			<h3>Personal Info</h3>
			<div class="gap10"></div>
			<form method="post" id="form_personalinfo_reg" enctype="multipart/form-data">
			<div class="item1">
				<div class="gap20"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Institution Name <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-university"></i></span>
						<select name="s_institution_name" id="s_institution_name" class="form-control">
							
							<?php if($rsp_id=='0' )
							{
							  while($statement4->fetch()){
								$sql2="select co_name,user_id from customer_organisation  where user_id='$userid11' AND status='A'";
								$statement6=$mysqli->prepare($sql2);
								$statement6->execute();
								$statement6->store_result();
								$statement6->bind_result($coname,$userid);
								$statement6->fetch();
							  $selVal="";
							if($userid==$s_institution_name) { $selVal="selected";}
							?>
							<option value="<?php echo $userid;?>"<?php echo $selVal;?>><?php echo $coname;?></option>
							<?php  } } else {
							$nrowstl=0;
							$sl="select user_id,co_name from customer_organisation where user_id='$rsp_id' AND status='A'";
							$stl=$mysqli->prepare($sl);
							$stl->execute();
							$stl->store_result();
							$stl->bind_result($user_id,$co_namestl);
							$stl->fetch();
							$nrowstl=$stl->num_rows();
							if($nrowstl>0) {
							?>
							<option value="<?php echo $user_id;?>" selected ><?php echo $co_namestl;?></option>
							<?php } } ?>
						</select>
						</div>
						<div class="gap1"></div>
						<span for="s_institution_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">First name <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="s_first_name" id="s_first_name"  class="form-control" onkeypress="return alpha(event)" onchange="AllowOnlyAlphabates(this);" onpaste="return AllowOnlyAlphabates(this);" oncopy="return AllowOnlyAlphabates(this);" onblur="FormatString(this);" placeholder="First name" maxlength="50" value="<?php echo $s_first_name;?>">
						</div>
						<div class="gap1"></div>
						<span for="s_first_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Last name <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="s_last_name" id="s_last_name" class="form-control" onkeypress="return alpha(event)" onchange="AllowOnlyAlphabates(this);" onpaste="return AllowOnlyAlphabates(this);" oncopy="return AllowOnlyAlphabates(this);" onblur="FormatString(this);" placeholder="Last name" maxlength="50" value="<?php echo $s_last_name;?>">
						</div>
						<div class="gap1"></div>
						<span for="s_last_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Date of Birth <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						<input type="text" class="form-control date2" name="s_dob" id="s_dob" placeholder="Date Of Birth" readonly value="<?php echo $s_dob1;?>">
						</div>
						<div class="gap1"></div>
						<span for="s_dob" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
					<div class="gap15"></div>
	

				<div class="form-group">
					<label class="col-sm-3 text-right">Gender <span class="red">*</span></label>
					<div class="col-sm-3">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-female"></i></span>
						<span class="form-control">Female</span>
						<span class="input-group-addon"><input type="radio" id="s_gender" value="f" name="s_gender" <?php if($s_gender=='f') echo "checked"?>></span>
						</div>
					</div>
					<div class="gap20 yes600"></div>

					<div class="col-sm-3">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-male"></i></span>
						<span class="form-control">Male</span>
						<span class="input-group-addon"><input type="radio" id="s_gender" value="m" name="s_gender" <?php if($s_gender=='m') echo "checked";?>></span>
						</div>
					</div>
						<div class="gap5"></div>
						<span for="s_gender" class="errors col-sm-8 col-sm-push-3" ></span>
				</div>

				<div class="gap15"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Student ID <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="s_identify_number" id="s_identify_number" class="form-control" placeholder="Identity Number" value="<?php echo $s_identify_number?>">
						</div>
						<div class="gap1"></div>
						<span for="s_identify_number" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Upload Photo </label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
						<input type="file" name="s_upload_photo" id="s_upload_photo" class="form-control" placeholder="">
						</div>
						<div class="gap1"></div>
						<span for="s_upload_photo" class="errors"></span>
					</div>
					<div class="gap5"></div>
				<?php if($s_upload_photo!='') { ?>
				<div class="col-sm-6 col-sm-push-3">
					<img src="<?php echo $s_upload_photo;?>" width="100" height="100">
				</div>
				<?php } ?>
				<div class="gap10"></div>

		      </div>  
			<div class="gap10"></div>
			<!------------>

			<div class="col-sm-9 col-sm-push-3">
				<input type="submit" class="btn submitM" id="save_submit" name="save_submit" value="Save"> &nbsp;
				<input type="submit" class="btn submitM" id="proceed_submit" name="proceed_submit" value="Proceed"> &nbsp;
				<input type="button" id="reset" onclick="empty_form('reset')" class="btn submitM" value="Clear"> &nbsp;
				<a class="btn submitM" id="" href="index.php">Cancel</a>
			</div>
			</form>
			<div class="gap20"></div>
			<div class="col-sm-12"><span class="red">Note:</span> All information we collect is highly confidential, and keeping your information private, safe and secure is very important to us.</div>

		</div>
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
            $("#form_personalinfo_reg").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            s_institution_name: {
                                            required: true,
                                            },
                                            s_first_name: {
                                            required: true,
					    //firstChar: true,
					    //lettersonly4N: true,
					    minlength: 3,
		                            maxlength: 50,							
                                            },
                                            s_last_name: {
                                            required: true,
					    //firstChar: true,
					    //lettersonly4N: true,
					    minlength:1,
					    maxlength:50,	
					    },
                                            s_dob: {
                                            required: true,
                                            },
					    s_gender: {
                                            required: true,
					    },
					    s_identify_number:  {
					    required: true,
                                            lettersnums:true,
					    minlength: 3,
					    maxlength:15,
					    },
                                            s_upload_photo: {
                                            //required: true,
					    //accept: "jpg|jpeg|png",
					    filesize: 1048576,
                                            },
					   
                                            
               },


				//The error message Str here

           messages: {
		
					    s_institution_name: {
                                            //required: "Please Select the Institution Name",
                                            },
                                            s_first_name: {
                                            required: "This Field is Required",
					    firstChar: "Kindly start with Character",
					    lettersonly4N: "Letters only with space and (.)",
					    minlength: "Kindly enter only 3 to 50 characters",
		                            maxlength: "Kindly enter only 3 to 50 characters",				
                                            },
                                            s_last_name: {
                                            required: "This Field is Required",
					    firstChar: "Kindly start with Character",
					    lettersonly4N: "Letters only with space and (.)",
					    minlength:"Please enter  1 to 50 charcters",
					    maxlength:"Please enter  1 to 50 charcters",
					    },
                                            s_dob: {
                                            required: "Please select your DOB",
                                            },
					    s_gender: {
                                            required: "Please Select Gender",
					    },
					    s_identify_number:  {
                                            lettersnums: "Kindly enter characters and numbers only",
				 	    minlength:"Please enter  3 to 15 numbers",
					    maxlength: "Please enter  3 to 15 numbers",
					    },
                                            s_upload_photo: {
                                           // required: "This Field is Required",
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
<?php if($s_dob=='0000-00-00' || $s_dob='') { ?>
<script>
$('#s_dob').val('');
</script>
<?php } ?>
<script>
function empty_form(val1){

    $("#"+val1).closest('form').find("input[type=text],input[type=radio],input[type=file],select").val("");
}

</script>
