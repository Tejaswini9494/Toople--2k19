<?php
$page="reg-mentor6";
$title="Registration &raquo; Mentor";
$ses="no";

include_once("class/config.php");
include_once("includes/functions.php");
extract($_REQUEST);
session_start();
$user_id=$_SESSION["userid"];
if($_SESSION['add_user_id']!=''){
$user_id=$_SESSION['add_user_id'];
}

$uType=$_SESSION["type"];

if($uType=='SPM' || $uType=='MEN'){
$name1='Mentor';
}
elseif($uType=='SPC' || $uType=='CP'){
$name1='Content Provider';
}
if(isset($delete_id))
{
	$sql_delete = "DELETE FROM student_work_experience WHERE user_id='$user_id' AND s_experience_id='$delete_id'";
	$statement_delete=$mysqli->prepare($sql_delete);
	$statement_delete->execute();
}


if(isset($save_submit)){
	header("location:reg-mentor6.php?email=$email");
	exit;
}

if(isset($proceed_submit)){
	header("location:reg-mentor8.php?email=$email");
	exit;
}


if(isset($submit_details)){
	if($update_id=='') {
	$s_start=sysConvert2($s_start_date);
	$s_end=sysConvert2($s_end_date);
	$querys = "INSERT INTO student_work_experience(user_id,s_organisation_name,s_work_experience,s_technology,s_job_role,s_start_date,s_end_date,created_on) VALUES (?,?,?,?,?,?,?,now())";
	$statements= $mysqli->prepare($querys);  
	$statements->bind_param('issssss',$user_id,$s_organisation_name,$s_work_experience,$s_technology,$s_job_role,$s_start,$s_end);
	$statements->execute();
	
	}
	else {
	$s_start=sysConvert2($s_start_date);
	$s_end=sysConvert2($s_end_date);
	$query_up1 = "UPDATE student_work_experience SET s_organisation_name=?,s_work_experience=?,s_technology=?,s_job_role=?,s_start_date=?,s_end_date=? where s_experience_id='$update_id'";
	$statement_up1= $mysqli->prepare($query_up1); 
	$statement_up1->bind_param('ssssss',$s_organisation_name,$s_work_experience,$s_technology,$s_job_role,$s_start,$s_end);
	$statement_up1->execute(); 
	
	}
	if(isset($proceed_submit)){
		header("location:reg-mentor8.php?email=$email");
	}else{
		header("location:reg-mentor6.php?email=$email");
	}
}


if(isset($edit_id))
{
	$sql_edit = "SELECT s_organisation_name,s_work_experience,s_technology,s_job_role,s_start_date,s_end_date FROM student_work_experience  where user_id='$user_id' AND s_experience_id='$edit_id'";
	$statement_edit=$mysqli->prepare($sql_edit);
	$statement_edit->execute();
	$statement_edit->store_result();
	$statement_edit->bind_result($s_organisation_name,$s_work_experience,$s_technology,$s_job_role,$s_start_date,$s_end_date);
	$statement_edit->fetch();
	$s_date=sysDBDateConvert($s_start_date);
	$e_date=sysDBDateConvert($s_end_date);

}


$nrows_menu=0;
$sql_menu="select s_qualification_id FROM student_qualifications WHERE user_id='$user_id'";
$statement_menu=$mysqli->prepare($sql_menu);
$statement_menu->execute();
$statement_menu->store_result();
$statement_menu->bind_result($s_qualification_id_menu);
$nrows_menu=$statement_menu->num_rows();


include("header.php"); ?>

<h2>Registration &raquo; <?php echo $name1; ?></h2>
<div class="gap30"></div>

<div class="formss formss2">

	<ul class="nav nav-tabs">
		<li class="active">
			<div class="liLine"></div>
			<a href="reg-mentor1.php?email=<?php echo $email;?>"></a>
			<div class="gap10"></div>Personal Info
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="reg-mentor2.php?email=<?php echo $email;?>"></a>
			<div class="gap10"></div>Contact Info
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="reg-mentor3.php?email=<?php echo $email;?>"></a>
			<div class="gap10"></div>Educational Qualification
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="reg-mentor4.php?email=<?php echo $email;?>"></a>
			<div class="gap10"></div>Technical Skills
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="reg-mentor5.php?email=<?php echo $email;?>"></a>
			<div class="gap10"></div>Certification Details
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div>Work Experience
		</li>
<!---
		<li>
			<div class="liLine"></div>
			<?php if($nrows_menu > 0) { ?>
				<a href="reg-mentor7.php"></a>
			<?php } else { ?>
				<a href="javascript:void(0);"></a>
			<?php } ?>
			<div class="gap10"></div>Service Providing
		</li>
--->
		<li>
			<div class="liLine"></div>
			<?php if($nrows_menu > 0) { ?>
				<a href="reg-mentor8.php"></a>
			<?php } else { ?>
				<a href="javascript:void(0);"></a>
			<?php } ?>
			<div class="gap10"></div>Rewards and  Awards
		</li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane fade in active">
			<div class="gap30"></div>

			<!------------>
			<h3>Work Experience</h3>
			<div class="gap10"></div>
			
			<div class="item1">
				<div class="gap20"></div>
			<form method="post" id="form_experience_reg">
				<div class="table-responsive">
					<table width="100%" class="table table-striped border">
						<tr>
						  <td>Organisation Name</td>
						  <td>Designation</td>
						  <td>Technology</td>
						  <td>Job Role</td>
						  <td>Start Date</td>
						  <td>End Date</td>
						  <td align="right" width="100px">&nbsp;</td>
					    </tr>
						<tr>
						  <td><span class="form-group">
						    <input type="text" name="s_organisation_name" onkeypress="return alpha(event)" onchange="AllowOnlyAlphabates(this);" onpaste="return AllowOnlyAlphabates(this);" oncopy="return AllowOnlyAlphabates(this);" onblur="FormatString(this);" id="s_organisation_name" class="form-control" placeholder="Organisation Name" value="<?php echo $s_organisation_name;?>" maxlength="50"/>
						  </span></td>
						  <td><span class="form-group">
						    <input type="text" name="s_work_experience" id="s_work_experience" placeholder="Designation" value="<?php echo $s_work_experience;?>" class="form-control" />
						  </span></td>
						  <td><span class="form-group">
						    <input type="text" name="s_technology" id="s_technology" placeholder="Technology" value="<?php echo $s_technology;?>" class="form-control" />
						  </span></td>
						  <td>
							<select class="form-control" name="s_job_role" id="s_job_role">
								<option value="">Select</option>
								<?php echo categoryForProgram(20,$s_job_role); ?>
							</select>
						  </td>
						  <td><span class="form-group">
						    <input type="text" name="s_start_date" id="s_start_date" placeholder="Start Date" value="<?php echo $s_date;?>"class="form-control" readonly/>
						  </span></td>
						  <td><span class="form-group">
						    <input type="text" name="s_end_date" id="s_end_date" placeholder="End Date" value="<?php echo $e_date;?>"class="form-control" readonly/>
						  </span></td>
						
						    <input type="hidden" name="update_id" id="update_id" class="form-control" value="<?php echo $edit_id;?>" maxlength="50"/>
						  
						  <td align="right"><button name="submit_details" class="btn btn-primary"><i class="fa fa-plus"></i></button></td>
					    </tr>
						  </tr>
				</table>
			</div>
		</form>
<?php
$sql = "SELECT s_experience_id,s_organisation_name,s_work_experience,s_technology,s_job_role,s_start_date,s_end_date FROM student_work_experience where user_id='$user_id' ORDER BY Created_on DESC";
$statement1=$mysqli->prepare($sql);
$statement1->execute();
$statement1->store_result();
$num1=$statement1->num_rows();
$statement1->bind_result($s_experience_id,$s_organisation_name,$s_work_experience,$s_technology,$s_job_role,$s_start_date,$s_end_date);
if($num1>0){
?>
			<div class="table-responsive">
				<table width="100%" class="table table-striped border">
					<tr>
						  <td>Organisation Name</td>
						  <td>Designation</td>
						  <td>Technology</td>
						  <td>Job Role</td>
						  <td>Start Date</td>
						  <td>End Date</td>
						  <td align="right" width="100px">&nbsp;</td>
					    </tr>
<?php }
while($statement1->fetch()) {

$sql1 = "SELECT category_name FROM master_category where category_id='$s_job_role'";
$statement1s=$mysqli->prepare($sql1);	
$statement1s->execute();
$statement1s->store_result();
$statement1s->bind_result($job_role);		
$statement1s->fetch();			
		?>
			<tr>
				<td><?php echo $s_organisation_name;?></td>
				<td><?php echo $s_work_experience;?></td>
				<td><?php echo $s_technology;?></td>
				<td><?php echo $job_role;?></td>
				<td><?php echo sysDBDateConvert($s_start_date);?></td>
				<td><?php echo sysDBDateConvert($s_end_date);?></td>
				

				<td align="right"><a href="reg-mentor6.php?edit_id=<?php echo $s_experience_id;?>"><i class="fa fa-pencil edit"></i></a><a class="delete" href="reg-mentor6.php?delete_id=<?php echo $s_experience_id;?>"><i class="fa fa-trash trash"></i></a></td>
						</tr>
					<?php } ?>
					</table>
				</div>
			</form>
			<div class="gap10"></div>
		      </div>  
			<div class="gap10"></div>
			<!------------>
				<form method="post" enctype="multipart/form-data">
				<input type="submit" class="btn submitM" id="save_submit" name="save_submit" value="Save"> &nbsp;
				<input type="submit" class="btn submitM" id="proceed_submit" name="proceed_submit" value="Proceed"> &nbsp;
				<input type="button" id="reset" onclick="empty_form('reset')" class="btn submitM" id="" value="Clear"> &nbsp;
				<a class="btn submitM" id="" href="index.php">Cancel</a>
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
            $("#form_experience_reg").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {

                                            s_organisation_name: {
                                            required: true,
					    //firstChar: true,
					    //letterswithbasicpunc: true,
					    minlength:3,
					    maxlength:50,
                                            },
                                            s_work_experience: {
                                            required: true, 
					    firstChar:true,
                   			    minlength:3,
					    maxlength:50,		
                                            },
                                            s_technology: {
					    firstChar:true,
					    lettersonly4N:true,
                                            required: true,
					    minlength:3,
					    maxlength:50,	
					    },
                                            s_job_role: {
                                            required: true,
					    //lettersonly:true,
					    //minlength:3,
					    //maxlength:50,
                                            },
					    s_start_date: {
                                            required: true,
					   
					    },
					    s_end_date:  {
					    required: true,
					   
					    },
                                           
               },


				//The error message Str here

           messages: {
		
                                            s_organisation_name: {
					    //required:"Please select Organisation",
                                            },
                                            s_work_experience: {
                                            //required:"Please select Designation",      						
					    },
                                            s_technology: {
                                            //required:"Please select technology",
					    },
                                            s_job_role: {
                                            //required:"Please select Job Role",
                                            },
					    s_start_date: {
                                            required:"Please select Start date",
					    },
					    s_end_date: {
					    required:"Please select End Date",
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
$(function() {
$("#s_start_date").datepicker({
	defaultDate:null,
	changeMonth:true,
	changeYear:true,
	dateFormat:'dd/mm/yy',
	onClose:function(selectedDate) {
		$("#s_end_date").datepicker("option","minDate",selectedDate);
}	
});
$("#s_end_date").datepicker({
	defaultDate:null,
	changeMonth:true,
	changeYear:true,
	dateFormat:'dd/mm/yy',
	onClose:function(selectedDate) {
		$("#s_start_date").datepicker("option","maxDate",selectedDate);
}	
});
});
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
</script>
<script>
function empty_form(val1){
	
    $("#form_experience_reg").find("input[type=text],select").val("");
}

</script>
