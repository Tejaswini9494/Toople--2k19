<?php
$page="reg-mentor4";
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
	$sql_delete = "DELETE FROM student_technical_skills WHERE user_id='$user_id' AND s_technical_id='$delete_id'";
	$statement_delete=$mysqli->prepare($sql_delete);
	$statement_delete->execute();
}

if(isset($save_submit)){
	header("location:reg-mentor4.php?email=$email");
	exit;
}

if(isset($proceed_submit)){
	header("location:reg-mentor5.php?email=$email");
	exit;
}


if(isset($submit_details)){
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
	if(isset($proceed_submit)){
		header("location:reg-mentor5.php?email=$email");
	}else{
		header("location:reg-mentor4.php?email=$email");
	}
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
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div>Technical Skills
		</li>
		<li>
			<div class="liLine"></div>
			<?php if($nrows_menu > 0) { ?>
				<a href="reg-mentor5.php"></a>
			<?php } else { ?>
				<a href="javascript:void(0);"></a>
			<?php } ?>
			<div class="gap10"></div>Certification Details
		</li>
		<li>
			<div class="liLine"></div>
			<?php if($nrows_menu > 0) { ?>
				<a href="reg-mentor6.php"></a>
			<?php } else { ?>
				<a href="javascript:void(0);"></a>
			<?php } ?>
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
			<h3>Technical Skills</h3>
			<div class="gap10"></div>
			
			<div class="item1">
				<div class="gap20"></div>
				<form method="post" id="form_techskills_reg">
				<div class="table-responsive">
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
								<?php echo categoryForProgram(3,$s_technical_area); ?>
							</select>
						  </span>
						  </td>
						  <td><span class="form-group">
						    <input type="text" name="s_institution_name" id="s_institution_name" placeholder="Institution Name" class="form-control" value="<?php echo $s_institution_name;?>"maxlength="50"/>
						  </td>
						  <td><span class="form-group">
						    <input type="text" name="s_start_date" id="s_start_date" class="dateIcon form-control" placeholder="Start Date"  value="<?php echo $s_yos;?>"readonly/>
						  </span></td>
						  <td><span class="form-group">
						    <input type="text" name="s_end_date" id="s_end_date" class="dateIcon form-control" placeholder="End Date" value="<?php echo $s_yoc;?>"readonly/>
						    </span></td>
						  <td><span class="form-group">
						    <input type="text" name="s_duration" id="s_duration" placeholder="Duration" class="form-control" value="<?php echo $s_duration;?>"/>
						    </span></td>
						  <td>
						    <select class="form-control" name="s_efficiency_level" id="s_efficiency_level"value="<?php echo $s_efficiency_level;?>">
						      <option value="">Select</option>
						      <option  value="L" <?php if($s_efficiency_level=='L') echo 'selected';?>>Low</option>
				      <option value="I" <?php if($s_efficiency_level=='I') echo 'selected';?>>Intermediate</option>
				      <option value="E" <?php if($s_efficiency_level=='E') echo 'seleted';?>>Expert</option>
						</select>
						  </td>
						 
						    <input type="hidden" name="update_id" id="update_id" class="form-control" value="<?php echo $edit_id;?>" maxlength="50"/>
						  
						  <td align="right">	<button name="submit_details" class="btn btn-primary"><i class="fa fa-plus"></i></button></td>
					    </tr>

					</table>
					</div>
					</form>
				<div class="gap10"></div>

<?php
$sql = "SELECT s_technical_id,s_technical_area,s_institution_name,s_start_date,s_end_date,s_duration,s_efficiency_level FROM student_technical_skills where user_id='$user_id' ORDER BY Created_on DESC";
$statement1=$mysqli->prepare($sql);
$statement1->execute();
$statement1->store_result();
$num1=$statement1->num_rows();
$statement1->bind_result($s_technical_id,$s_technical_area,$s_institution_name,$s_start_date,$s_end_date,$s_duration,$s_efficiency_level);
if($num1>0){ 
?>
			<div class="table-responsive">
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
				if($s_efficiency_level=='L') $s_efficiency_level='Low';
				if($s_efficiency_level=='I') $s_efficiency_level='Intermediate';
				if($s_efficiency_level=='E') $s_efficiency_level='Expert';
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
				

				<td align="right"><a href="reg-mentor4.php?edit_id=<?php echo $s_technical_id;?>"><i class="fa fa-pencil edit"></i></a><a class="delete" href="reg-mentor4.php?delete_id=<?php echo $s_technical_id;?>"><i class="fa fa-trash trash"></i></a></td>
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
            $("#form_techskills_reg").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {

                                            s_technical_area: {
                                            required: true,
					    //firstChar: true,
					    //lettersnumberswithalpha:true,
					    //minlength:3,
					    //maxlength:50,
                                            },
                                            s_institution_name: {
                                            required: true, 
					    firstChar: true,
					    letterswithbasicpunc: true,
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
					    numbersrest:true,
					    maxlength:20,
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
                                            numbersrest: "Please enter numbers only",					  
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
	
    $("#form_techskills_reg").find("input[type=text],select").val("");
}

</script>
