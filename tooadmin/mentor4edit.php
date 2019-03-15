<?php
$page="mentor4";
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
//echo $user_id.'###';

if(isset($delete_id))
{
	$sql_delete = "DELETE FROM student_technical_skills WHERE user_id='$user_id' AND s_technical_id='$delete_id'";
	$statement_delete=$mysqli->prepare($sql_delete);
	$statement_delete->execute();
}
if( isset($submit_details)){
	if($update_id=='') {
	$s_start=sysConvert2($s_start_date);
	$s_end=sysConvert2($s_end_date);
	$querys = "INSERT INTO student_technical_skills(user_id,s_technical_area,s_institution_name,s_start_date,s_end_date,s_duration, 	s_efficiency_level,created_on) VALUES (?,?,?,?,?,?,?,now())";
	$statements= $mysqli->prepare($querys);  
	$statements->bind_param('issssss',$user_id,$s_technical_area,$s_institution_name,$s_start,$s_end,$s_duration,$s_efficiency_level);
	$statements->execute();
	//echo $querys;
	}
	else {
	$s_start=sysConvert2($s_start_date);
	$s_end=sysConvert2($s_end_date);
	$query_up1 = "UPDATE student_technical_skills SET s_technical_area=?,s_institution_name=?,s_start_date=?,s_end_date=?,s_duration=?,s_efficiency_level=? where s_technical_id='$update_id'";
	$statement_up1= $mysqli->prepare($query_up1); 
	$statement_up1->bind_param('ssssss',$s_technical_area,$s_institution_name,$s_start,$s_end,$s_duration,$s_efficiency_level);
	$statement_up1->execute(); 
	
	}
	header("location:mentor4edit.php?user_id=$user_id&userType=$userType");
}
if(isset($save_submit))
{
header("location:mentor4edit.php?user_id=$user_id&userType=$userType");
}

if(isset($proceed_submit)){
	header("location:mentor5edit.php?user_id=$user_id&userType=$userType");
}

if(isset($edit_id))
{
	$sql_edit = "SELECT s_technical_id,s_technical_area,s_institution_name,s_start_date,s_end_date,s_duration,s_efficiency_level FROM student_technical_skills  where user_id='$user_id' AND s_technical_id='$edit_id'";
	$statement_edit=$mysqli->prepare($sql_edit);
	$statement_edit->execute();
	$statement_edit->store_result();
	$statement_edit->bind_result($s_technical_id,$s_technical_area,$s_institution_name,$s_start_date,$s_end_date,$s_duration,$s_efficiency_level);
	$statement_edit->fetch();
	$s_yos=sysDBDateConvert($s_start_date);
	$s_yoc=sysDBDateConvert($s_end_date);
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
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div>Technical Skills
		</li>
		<li>
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div>Certification Details
		</li>
		<li>
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
			<h3>Technical Skills</h3>
			<div class="gap10"></div>
			
			<div class="item1">
				<div class="gap20"></div>

				<div class="table-responsive">
				<form method="post" id="form_techskills_reg">
					<table width="100%" class="table table-striped border">
						<tr>
						  <td>Technical Area</td>
						  <td>Institution Name</td>
						  <td>Start Date</td>
						  <td>End Date</td>
						  <td>Duration</td>
						  <td>Proficiency Level</td>
						  <td align="right" width="100px">&nbsp;</td>
					    </tr>
					
						<tr>
						  <td>
							<select id="s_technical_area" name="s_technical_area" class="form-control" >
								<option value="">Select</option>
								<?php echo categoryForProgram(9,$s_technical_area); ?>
							</select>
						  </td>
						  <td><span class="form-group">
						    <input type="text" name="s_institution_name" id="s_institution_name" class="form-control" value="<?php echo $s_institution_name;?>"maxlength="50"/>
						  </td>
						  <td><span class="form-group">
						    <input type="text" name="s_start_date" id="s_start_date" class="dateIcon form-control" style="cursor:pointer;" value="<?php echo $s_yos;?>"readonly/>
						  </span></td>
						  <td><span class="form-group">
						    <input type="text" name="s_end_date" id="s_end_date" class="dateIcon form-control" style="cursor:pointer;" value="<?php echo $s_yoc;?>"readonly/>
						    </span></td>
						  <td><span class="form-group">
						    <input type="text" name="s_duration" maxlength="20" id="s_duration" class="form-control" value="<?php echo $s_duration;?>"/>
						    </span></td>
						  <td>
						    <select class="form-control" name="s_efficiency_level" id="s_efficiency_level"value="<?php echo $s_efficiency_level;?>">
						      <option value="">Select</option>
						      <option  value="low" <?php if($s_efficiency_level=='low') echo 'selected';?>>Low</option>
				      <option value="i" <?php if($s_efficiency_level=='i') echo 'selected';?>>Intermediate</option>
				      <option value="e" <?php if($s_efficiency_level=='e') echo 'seleted';?>>Expert</option>
						</select>
						  </td>
						
						    <input type="hidden" name="update_id" id="update_id" class="form-control" value="<?php echo $edit_id;?>" maxlength="50"/>
						  
						  <td align="right">	<button name="submit_details" class="btn btn-primary"><i class="fa fa-plus"></i></button></td>
					    </tr>
						</table>
					</form>

<?php
$sql = "SELECT s_technical_id,s_technical_area,s_institution_name,s_start_date,s_end_date,s_duration,s_efficiency_level FROM student_technical_skills where user_id='$user_id' ORDER BY Created_on DESC";
$statement1=$mysqli->prepare($sql);
$statement1->execute();
$statement1->store_result();
$num1=$statement1->num_rows();
$statement1->bind_result($s_technical_id,$s_technical_area,$s_institution_name,$s_start_date,$s_end_date,$s_duration,$s_efficiency_level);
if($num1>0){
?>

				<table width="100%" class="table table-striped border">
				<tr>
						  <td>Technical Area</td>
						  <td>Institution Name</td>
						  <td>Start Date</td>
						  <td>End Date</td>
						  <td>Duration</td>
						  <td>Proficiency Level</td>
						  <td align="right" width="100px">&nbsp;</td>
					    </tr>

<?php }
while($statement1->fetch()) {
$sql1 = "SELECT category_name FROM master_category WHERE category_id='$s_technical_area'";
$statement1s=$mysqli->prepare($sql1);	
$statement1s->execute();
$statement1s->store_result();
$statement1s->bind_result($program_name);		
$statement1s->fetch();

				if($s_efficiency_level=='low') $s_efficiency_level='Low';
				if($s_efficiency_level=='i') $s_efficiency_level='Intermediate';
				if($s_efficiency_level=='e') $s_efficiency_level='Expert';
				$s_startdate=sysDBDateConvert($s_start_date);
				$s_enddate=sysDBDateConvert($s_end_date);
		?>   
                           
                      
			<tr>
				<td><?php echo $program_name;?></td>
				<td><?php echo $s_institution_name;?></td>
				<td><?php echo $s_startdate;?></td>
				<td><?php echo $s_enddate;?></td>
				<td><?php echo $s_duration;?></td>
				<td><?php echo $s_efficiency_level;?></td>
				

				<td align="right"><a href="mentor4edit.php?user_id=<?php echo $user_id;?>&userType=<?php echo $userType;?>&edit_id=<?php echo $s_technical_id;?>"><i class="fa fa-pencil edit"></i></a><a class="del" id="delete" href="mentor4edit.php?user_id=<?php echo $user_id; ?>&userType=<?php echo$userType;?>&delete_id=<?php echo $s_technical_id;?>"><i class="fa fa-trash trash"></i></a></td>
						</tr>
					<?php } ?>
					</table>
				</div>
				<div class="gap10"></div>

		      </div>  
			<div class="gap10"></div>
			<!------------>
			
			<form method="post" enctype="multipart/form-data">
			<div class="col-sm-9 col-sm-push-3">
				<input type="submit" class="btn submitM" id="save_submit" name="save_submit" value="Save"> &nbsp;
				<input type="submit" class="btn submitM" id="proceed_submit" name="proceed_submit" value="Save & Proceed"> &nbsp;
				
				<a class="btn submitM" id="" href="user8View.php?type=<?php echo $userType;?>">Cancel</a>
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
            $("#form_techskills_reg").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {

                                            s_technical_area: {
                                            required: true,
                                            },
                                            s_institution_name: {
                                            required: true, 
					    lettersonly:true,
					    minlength:3,
					    maxlength:50,
					                   						
                                            },
                                            s_start_date: {
                                            required: true,	
					    },
                                            s_end_date: {
                                            required: true,
                                            },
					    s_duration: {
                                            required: true,
					    numponly:true,
					    },
					    s_efficiency_level:  {
					    required: true,
					   
					    },
                                           
               },


				//The error message Str here

           messages: {
		
                                            s_technical_area: {
                                           
                                            },
                                            s_institution_name: {
                                                                              						
                                            },
                                            s_start_date: {
                                     	
					    },
                                            s_end_date: {
                                           
                                            },
					    s_duration: {
                                        	numponly: "Please enter valid Duration",					  
					    },
					    s_efficiency_level:  {
					required: "Please select Proficiency level",
					   
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
	dateFormat: 'dd/mm/yy',
	onClose:function(selectedDate) {
		$("#s_end_date").datepicker("option","minDate",selectedDate);
}	
});
$("#s_end_date").datepicker({
	defaultDate:null,
	changeMonth:true,
	changeYear:true,
	dateFormat: 'dd/mm/yy',
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
