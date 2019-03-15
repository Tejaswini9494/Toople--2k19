<?php
$page="mentor register";
$title="mentor register";
$ses="no";
include_once("class/config.php");
include_once("includes/functions.php");
require_once 'includes/encrypt.php';
require_once 'email_sms.php';
session_start();
extract($_REQUEST);
$userid=$_SESSION["userid"];
$userType=$_SESSION["type"];


if(isset($submit_import))
{

	if($userType=='SPM'){
		$uType="MEN";
	}else if($userType=='SPC'){
		$uType="CP";
	}else if($userType=='CIN'){
		$uType="SP";
	}


	$path = "uploads/csv/";
	$name="import_file";
	//echo $regindex_pwd2a.$path.$name; exit;

	if($_FILES[$name]["size"]>0)
	{
		//echo $_FILES[$name]["size"].'###'; exit;

		$img_name= $_FILES[$name]['name']; 
		$val1=explode(".",$img_name);
		$tmp_file = $_FILES[$name]['tmp_name'];
		$imgtype=substr(strrchr(basename($_FILES[$name]["name"]),"."),1); 
		$imgtype=strtolower($imgtype);        
		if($imgtype=="csv") {
			$name_file = $val1[0].time().".".$imgtype;
			move_uploaded_file($tmp_file,$path.$name_file);
		}
	}


	$fcontents = fopen("uploads/csv/".$name_file, "r");

	$ihd=1;
	while (($irs=fgetcsv($fcontents, 2000, ',', '"')) !== FALSE) {
		//echo "<pre>";
		//print_r($irs);
		//echo "</pre>";
		if($ihd!=1) {
		for($i=0; $i<count($irs); $i++) {

			//echo $irs[$i]."--";
			//echo "<br>".$irs[0];

			if($irs[6]!='') {

				$regindex_pwd1a=randomPassword();
				$emailFor=$uType;
				$regindex_pwd2a=encrypt($regindex_pwd1a,'tooople#@D2016');

				$nrows_emailCHK=0;
				$sql_emailCHK="select user_id from too_users WHERE user_email='$irs[6]'";
				$statement_emailCHK=$mysqli->prepare($sql_emailCHK);
				$statement_emailCHK->execute();
				$statement_emailCHK->store_result();
				$statement_emailCHK->bind_result($user_id_emailCHK);
				$nrows_emailCHK=$statement_emailCHK->num_rows();

				if($nrows_emailCHK == 0) {
					$sql_import1="INSERT INTO too_users(user_email, user_pwd, user_type, rsp_id, added_date, status) values('$irs[6]', '$regindex_pwd2a', '$uType', '$userid', now(), 'A');";
					//echo $sql_import1."<br>";
					$statement_imp1= $mysqli->prepare($sql_import1);
					$statement_imp1->execute();
					$id_imp=$statement_imp1->insert_id;
					email('11',$id_imp,$emailFor);


					$ipaddr=$_SERVER['REMOTE_ADDR'];
					$sql_import2="INSERT INTO student_info(user_id, s_first_name, s_last_name, s_identify_number, s_addressline1, s_addressline2, s_primary_contact, s_email_id, status, ipaddress, created_on) values('$id_imp', '$irs[0]', '$irs[1]', '$irs[2]', '$irs[3]', '$irs[4]', '$irs[5]', '$irs[6]', 'A', '$ipaddr', now());";
					//echo $sql_import."<br>";
					$statement_imp2= $mysqli->prepare($sql_import2);
					$statement_imp2->execute();

				}
			}
		}
		}
		$ihd++;
	}

	//getMessageNotification('regS');
	header("location:studentMgnt.php");
	exit;
}

if(isset($reg_submit1))
{

if($userType=='SPM'){
	$uType="MEN";
	$name="Mentor";
	$redirect="reg-mentor1.php?email=$regindex_email1";
}else if($userType=='SPC'){
	$uType="CP";
	$name="Content Provider";
	$redirect="reg-mentor1.php?email=$regindex_email1";
}else if($userType=='CIN'){
	$uType="SP";
	$name="Institution Organization";
	$redirect="reg-project-stud1.php?email=$regindex_email1";
}


	$regindex_pwd1=randomPassword();
	$emailFor=$uType;
	
	$regindex_pwd2=encrypt($regindex_pwd1,'tooople#@D2016');
	$query1 = "INSERT INTO  too_users (user_email, user_pwd,user_type,rsp_id,added_date,status) VALUES(?,?,?,?,now(),'A')";
	$statement1= $mysqli->prepare($query1);
	$statement1->bind_param('sssi', $regindex_email1, $regindex_pwd2,$uType,$userid);
	$statement1->execute();
	$id = $statement1->insert_id;
	
	$_SESSION['add_user_id']=$id;

	email('11',$id,$emailFor);
	//getMessageNotification('regS');
	header("location:$redirect");
	exit;

}

if($userType=='SPM'){
	$uType="MEN";
	$name="Mentor";
	$redirect="reg-mentor1.php?email=$regindex_email1";
}else if($userType=='SPC'){
	$uType="CON";
	$name="Content Provider";
	$redirect="reg-mentor1.php?email=$regindex_email1";
}else if($userType=='CIN'){
	$uType="SP";
	$name="Student";
	$redirect="reg-project-stud1.php?email=$regindex_email1";
}

include("header.php"); ?>

<div class="gap40"></div>

<div class="row">



		<h3 align="center">Create a new <?php echo $name; ?></h3>
		<div class="gap30"></div>

	<?php if($userType=='CIN') { ?>
		<div class="form-group">
			<label class="col-sm-3 text-right">Mode of Creation</label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-database"></i></span>
				<select class="form-control" id="create_mode" name="create_mode" onchange="load_mode();">
					<option value="">Select</option>
					<option value="1">Single</option>
					<option value="2">Upload CSV</option>
				</select>
				</div>
				<div class="gap1"></div>
				<span class="errors" for="create_mode"></span>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap15"></div>
	<?php } ?>

		<form id="form_reg1" action="" method="POST" <?php if($userType=='CIN') { ?>style="display:none;"<?php } ?>>
			<div class="form-group">
				<label class="col-sm-3 text-right">Email ID</label>
				<div class="col-sm-9">
					<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
					<input type="text" class="form-control" id="regindex_email1" name="regindex_email1" placeholder="Email">
					</div>
					<div class="gap1"></div>
					<span class="errors" for="regindex_email1"></span>
				</div>
				<div class="gap1"></div>
			</div>
			<div class="gap15"></div>

			<div class="col-sm-9 col-sm-push-3">
				<input type="submit" class="btn submitM" id="reg_submit1"  name="reg_submit1" value="Register">
			</div>
		<!--
			<a class="btn submitMLog" id="" href="#modal_otlSuccess" data-toggle="modal">Register</a>
		-->
		</form>

	<?php if($userType=='CIN') { ?>
		<form id="form_reg2" method="post" enctype="multipart/form-data" action="" style="display:none;">
		<div class="form-group">
			<label class="col-sm-3 text-right">Upload CSV</label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-file-excel-o"></i></span>
				<input type="file" name="import_file" id="import_file" class="form-control" />
				</div>
				<div class="gap1"></div>
				<span class="errors" for="import_file"></span>
			</div>
			<div class="gap1"></div>
		</div>
		<a href="uploads/csv/sampleCSV.csv" target="_blank" class="errors pull-right">View Sample CSV</a>
		<div class="gap15"></div>

		<div class="col-sm-9 col-sm-push-3">
			<input type="submit" name="submit_import" id="submit_import" class="btn submitM" value="Submit"/>
		</div>
		<div class="gap15"></div>
		</form>
	<?php } ?>

	</div>


<div class="gap100"></div>


<?php include("footer.php"); ?>

<script>
function load_modal() {
	$('#modal_otlSuccess').modal('show');
}

function load_mode() {
	var val1=$('#create_mode').val();
	if(val1=='1') {
		$('#form_reg1').slideDown();
		$('#form_reg2').slideUp();
	} else if(val1=='2') {
		$('#form_reg2').slideDown();
		$('#form_reg1').slideUp();
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


            //form validation ruless field is req
            $("#form_reg1").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            regindex_email1: {
                                            required: true,
                                            email: true,
					    remote: {
						url: "ajax_email_exists.php",
						type: "post",
						data: {
							regindex_email: function() {
							return $("#regindex_email1").val();
							}
						}
					     }
                                            },
					    regindex_pwd1: {
                                            required: true,
                                            minlength: 6,
                                            maxlength: 18,
					    },
					    con_password1: {
                                            required: true,
					    equalTo:'#regindex_pwd1',
					    },
               },


				//The error message Str here
		messages: {
			regindex_email1:
			{
			remote: "Email Id already exist."
			},
		},
                submitHandler: function(form) {
			//alert("hiii");
                    form.submit();
                }
            });

            //form validation ruless field is req
            $("#form_reg2").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
					    import_file: {
                                            required: true,
					    },
               },


				//The error message Str here
		messages: {
			regindex_email1:
			{
			remote: "Email Id already exist."
			},
		},
                submitHandler: function(form) {
			//alert("hiii");
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

