<?php
$page="mentor6";
$title="Registration &raquo; Project Student";
$ses="no";

include_once("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);

if($userType=='MEN'){
$name11='Mentor';
}
elseif($userType=='CP'){
$name11='Content Provider';
}
if(isset($delete_id))
{
	$sql_delete = "DELETE FROM student_work_experience WHERE user_id='$user_id' AND s_experience_id='$delete_id'";
	$statement_delete=$mysqli->prepare($sql_delete);
	$statement_delete->execute();
		header("location:mentor6edit.php?user_id=$user_id&userType=$userType"); 
}
if(isset($submit_details)){
	if($update_id=='') {
	$s_start=sysConvert2($s_start_date);
	$s_end=sysConvert2($s_end_date);
	$querys = "INSERT INTO student_work_experience(user_id,s_organisation_name,s_work_experience,s_technology,s_job_role,s_start_date,s_end_date,created_on) VALUES (?,?,?,?,?,?,?,now())";
	$statements= $mysqli->prepare($querys);  
	$statements->bind_param('issssss',$user_id,$s_organisation_name,$s_work_experience,$s_technology,$s_job_role,$s_start,$s_end);
	$statements->execute();
	//echo $querys;
	}
	else {
	$s_start=sysConvert2($s_start_date);
	$s_end=sysConvert2($s_end_date);
	$query_up1 = "UPDATE student_work_experience SET s_organisation_name=?,s_work_experience=?,s_technology=?,s_job_role=?,s_start_date=?,s_end_date=? where s_experience_id='$update_id'";
	$statement_up1= $mysqli->prepare($query_up1); 
	$statement_up1->bind_param('ssssss',$s_organisation_name,$s_work_experience,$s_technology,$s_job_role,$s_start,$s_end);
	$statement_up1->execute(); 
	
	}
	header("location:mentor6edit.php?user_id=$user_id&userType=$userType"); 
	
}
if(isset($save_submit)){
	header("location:mentor6edit.php?user_id=$user_id&userType=$userType"); 
}
if(isset($proceed_submit)){
	header("location:mentor7edit.php?user_id=$user_id&userType=$userType"); 
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



include("header.php"); ?>

<h2>Registration &raquo;<?php echo $name11; ?></h2>
<div class="gap30"></div>

<div class="formss formss2">

	<ul class="nav nav-tabs">
		<li class="active">
			<div class="liLine"></div>
			<a href="mentor1edit.php?user_id=<?php echo $user_id;?>&userType=<?php echo $userType;?>"></a>
			<div class="gap10"></div>Personal Info
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="mentor2edit.php?user_id=<?php echo $user_id;?>&userType=<?php echo $userType;?>"></a>
			<div class="gap10"></div>Contact Info
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="mentor3edit.php?user_id=<?php echo $user_id;?>&userType=<?php echo $userType;?>"></a>
			<div class="gap10"></div>Educational Qualification
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="mentor4edit.php?user_id=<?php echo $user_id;?>&userType=<?php echo $userType;?>"></a>
			<div class="gap10"></div>Technical Skills
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="mentor5edit.php?user_id=<?php echo $user_id;?>&userType=<?php echo $userType;?>"></a>
			<div class="gap10"></div>Certification Details
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div>Work Experience
		</li>
		<li >
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div>Service Providing
		</li>
		<li>
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
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

				<div class="table-responsive">
				  	<form method="post" id="form_experience_reg">
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
						    <input type="text" name="s_organisation_name" id="s_organisation_name" class="form-control" value="<?php echo $s_organisation_name;?>" maxlength="50"/>
						  </span></td>
						  <td><span class="form-group">
						    <input type="text" name="s_work_experience" id="s_work_experience"value="<?php echo $s_work_experience;?>" class="form-control" />
						  </span></td>
						  <td><span class="form-group">
						    <input type="text" name="s_technology" id="s_technology"value="<?php echo $s_technology;?>" class="form-control" />
						  </span></td>
						  <td>
							<select class="form-control" name="s_job_role" id="s_job_role">
								<option value="">Select</option>
								<?php echo categoryForProgram(20,$s_job_role); ?>
							</select>
						  </td>
						  <td><span class="form-group">
						    <input type="text" name="s_start_date" id="s_start_date" value="<?php echo $s_date;?>"class="dateIcon form-control" style="cursor:pointer;" readonly/>
						  </span></td>
						  <td><span class="form-group">
						    <input type="text" name="s_end_date" id="s_end_date" value="<?php echo $e_date;?>"class="dateIcon form-control" style="cursor:pointer;" readonly/>
						  </span></td>
						
						    <input type="hidden" name="update_id" id="update_id" class="form-control" value="<?php echo $edit_id;?>" maxlength="50"/>
						 
						  <td align="right"><button name="submit_details" class="btn btn-primary"><i class="fa fa-plus"></i></button></td>
					    </tr>
						  
					</table>
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

			 $sdate=sysDBDateConvert($s_start_date);			
			 $edate=sysDBDateConvert($s_end_date);
		?>
			
			<tr>
				<td><?php echo $s_organisation_name;?></td>
				<td><?php echo $s_work_experience;?></td>
				<td><?php echo $s_technology;?></td>
				<td><?php echo $job_role;?></td>
				<td><?php echo $sdate;?></td>
				<td><?php echo $edate;?></td>
				

				<td align="right"><a href="mentor6edit.php?user_id=<?php echo $user_id;?>&userType=<?php echo $userType;?>&edit_id=<?php echo $s_experience_id;?>"><i class="fa fa-pencil edit"></i></a><a class="del" id="delete" href="mentor6edit.php?user_id=<?php echo $user_id;?>&userType=<?php echo $userType;?>&delete_id=<?php echo $s_experience_id;?>"><i class="fa fa-trash trash"></i></a></td>
						</tr>
					<?php } ?>
					</table>
				</div>
				<div class="gap10"></div>
		      </div>  
			<div class="gap10"></div>
			<!------------>
			<div class="col-sm-9 col-sm-push-3">
				<form method="post" enctype="multipart/form-data">
				<input type="submit" class="btn submitM" id="save_submit" name="save_submit" value="Save"> &nbsp;
				<input type="submit" class="btn submitM" id="proceed_submit" name="proceed_submit" value="Save & Proceed"> &nbsp;
				<a class="btn submitM" id="" href="user8View.php?type=<?php echo $userType;?>">Cancel</a>
			</form>
		</div>
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
            $("#form_experience_reg").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {

                                            s_organisation_name: {
                                            required: true,
					    firstChar:true,
					    lettersonly4N:true,
					    minlength:3,
					    maxlength:50,
                                            },
                                            s_work_experience: {
                                            required: true, 
					    lettersonly:true,
					                   						
                                            },
                                            s_technology: {
                                            required: true,	
					    },
                                            s_job_role: {
                                            required: true,
					    //lettersonly:true,
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
                                           
					    required:"Please select Organisation",
                                            },
                                            s_work_experience: {
                                           
                                            required:"Please select Designation",					  
					                   						
                                            },
                                            s_technology: {
                                            required:"Please select technology",
					    },
                                            s_job_role: {
                                            required:"Please select Job Role",
                                            },
					    s_start_date: {
                                            required:"Please select Start date",
					   
					    },
					    s_end_date:  {
					   
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
var startdate=$('#s_start_date');
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
$('.del').click(function() {
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
	//window.location="titleSubCategory.php";
    $("#"+val1).closest('form').find("input[type=text],select").val("");
}

</script>
