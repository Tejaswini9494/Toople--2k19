<?php
$page="reg-project-stud3";
$title="Registration &raquo; Project Student";
$ses="no";
include_once("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);

if($userType=='SP'){
$name11='Project Student';
}
elseif($userType=='SI'){
$name11='Intern Student';
}
//echo $user_id.'###';

if(isset($delete_id))
{	
	$sql_delete = "DELETE FROM student_qualifications WHERE user_id='$user_id' AND s_qualification_id='$delete_id'";
	$statement_delete=$mysqli->prepare($sql_delete);
	$statement_delete->execute();
}
if(isset($submit_details)){

	if($update_id=='') {
	$querys = "INSERT INTO student_qualifications(user_id,s_program,s_branch,s_year_of_start,s_year_of_completion,s_percentage_achieved,s_university_name,s_institution_name,s_institution_country,
s_institution_state,s_institution_city,s_institution_zip,created_on) VALUES ('$user_id','$s_program','$s_branch','$s_year_of_start','$s_year_of_completion','$s_percentage_achieved','$s_university_name','$s_institution_name','$s_institution_country','$s_institution_state','$s_institution_city','$s_institution_zip',now())";
	$statements= $mysqli->prepare($querys);  
	
	$statements->execute();
	
	}
	else {

	$query_up1 = "UPDATE student_qualifications SET s_program=?,s_branch=?,s_year_of_start=?,s_year_of_completion=?,s_percentage_achieved=?,s_university_name=?,s_institution_name=?,s_institution_country=?,
s_institution_state=?,s_institution_city=?,s_institution_zip=? where s_qualification_id='$update_id'";
	$statement_up1= $mysqli->prepare($query_up1); 
	$statement_up1->bind_param('iississssss',$s_program,$s_branch,$s_year_of_start,$s_year_of_completion,$s_percentage_achieved,$s_university_name,$s_institution_name,$s_institution_country,$s_institution_state,$s_institution_city,$s_institution_zip);
	$statement_up1->execute(); 
	//echo "UPDATE student_qualifications SET s_program=$s_program,s_branch=$s_branch,s_year_of_start=$s_year_of_start,s_year_of_completion=$s_percentage_achieved=$s_percentage_achieved,s_university_name=$s_university_name,s_institution_name=$s_institution_name,s_institution_country=$s_institution_country,s_institution_state=$s_institution_state,s_institution_city=$s_institution_city,s_institution_zip=$s_institution_zip where s_qualification_id='$update_id'";;
	}
	header("location:reg-project-stud3edit.php?user_id=$user_id&userType=$userType");
}

if(isset($save_submit)){
	header("location:reg-project-stud3edit.php?user_id=$user_id&userType=$userType");
}
if(isset($proceed_submit)){
	header("location:reg-project-stud4edit.php?user_id=$user_id&userType=$userType");
}

if(isset($edit_id))
{
	$sql_edit = "SELECT s_qualification_id,s_program,s_branch,s_year_of_start,s_year_of_completion,s_percentage_achieved,s_university_name,s_institution_name,s_institution_country,
	s_institution_state,s_institution_city,s_institution_zip FROM  student_qualifications  where user_id='$user_id' AND s_qualification_id='$edit_id'";
	$statement_edit=$mysqli->prepare($sql_edit);
	$statement_edit->execute();
	$statement_edit->store_result();
	$statement_edit->bind_result($s_qualification_id,$s_program,$s_branch,$s_year_of_start,$s_year_of_completion,$s_percentage_achieved,$s_university_name,$s_institution_name,$s_institution_country,$s_institution_state,$s_institution_city,$s_institution_zip);
	$statement_edit->fetch();
}




include("header.php"); ?>

<h2>Registration &raquo;<?php echo $name11; ?></h2>
<div class="gap30"></div>

<div class="formss">

	<ul class="nav nav-tabs">
		<li class="active">
			<div class="liLine"></div>
			<a href="reg-project-stud1edit.php?user_id=<?php echo $user_id;?>&userType=<?php echo $userType;?>"></a>
			<div class="gap10"></div>Personal Info
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="reg-project-stud2edit.php?user_id=<?php echo $user_id;?>&userType=<?php echo $userType;?>"></a>
			<div class="gap10"></div>Contact Info
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div>Educational Qualification
		</li>
		<li>
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
	</ul>

	<div class="tab-content">
		<div class="tab-pane fade in active">
			<div class="gap30"></div>

			<!------------>
			<h3>Educational Qualification</h3>
			<div class="gap10"></div>
			
			<div class="item1">
				<div class="gap20"></div>
			<form method="post" id="form_qualification_reg">	
				<div class="table-responsive">
					<table width="100%" class="table table-striped border">
						<tr class="tr1">
						  <td>Program</td>
						  <td>Branch</td>
						  <td>Year of Start</td>
						  <td>Year of Completion</td>
						  <td>% Achieved</td>
						  <td>University Name</td>
						 
						</tr>
						<tr>
						  <td>
						    <select class="form-control" name="s_program" id="s_program">
						      <option value="">Select</option>
						      
						      <?php echo categoryForProgram(2,$s_program); ?>
							</select>
						  </td>
						  <td>
						    <select class="form-control" name="s_branch" id="s_branch" >
						      <option value="">Select</option>
						      <?php echo categoryForBranch($s_program,$s_branch); ?>
						</select>
						  </td>
						  <td><span class="form-group">
						<select class="form-control" name="s_year_of_start" id="s_year_of_start" >
						      <option value="">Select</option>
						      <?php echo years($s_year_of_start); ?>
						</select>
						  </span></td>
						  <td><span class="form-group">
							<select class="form-control" name="s_year_of_completion" id="s_year_of_completion" >
							      <option value="">Select</option>
							      <?php echo years($s_year_of_start); ?>
							</select>
						   
						  </span></td>
						  <td><span class="form-group">
						    <input type="text" name="s_percentage_achieved" id="s_percentage_achieved" class="form-control" value="<?php echo $s_percentage_achieved;?>"/>
						  </span></td>
						  <td><span class="form-group">
						    <input type="text" name="s_university_name" id="s_university_name" class="form-control" value="<?php echo $s_university_name;?>"/>
						  </span></td>
						</tr>
						<tr class="tr1">
						  <td>Institution Name</td>
						  <td>Institution Country</td>
						  <td>Institution State</td>
						  <td>Institution City</td>
						  <td>Institution Zip</td>
						  <td align="right">&nbsp;</td>
						
						</tr>
						<tr>
						  <td><span class="form-group">
						    <input type="text" name="s_institution_name" id="s_institution_name" class="form-control" value="<?php echo $s_institution_name;?>" maxlength="50"/>
						  </span></td>
						 <td><select class="form-control" name="s_institution_country" id="s_institution_country" >
						      <option value="">Select</option>
						      <?php countryId($s_institution_country);?>
						</select></td>
						  <td><select class="form-control" name="s_institution_state" id="s_institution_state" >
						      <option value="">Select</option>
						      <?php categoryForState($s_institution_country,$s_institution_state);?>
						</select></td>
						  <td><select class="form-control" name="s_institution_city" id="s_institution_city" >
						      <option value="">Select</option>
						      <?php categoryForCity($s_institution_state,$s_institution_city);?>
						</select></td>
						  <td><span class="form-group">
						    <input type="text" name="s_institution_zip" id="s_institution_zip" class="form-control" value="<?php echo $s_institution_zip;?>"maxlength="50"/>
						  </span></td>
				
						    <input type="hidden" name="update_id" id="update_id" class="form-control" value="<?php echo $edit_id;?>" maxlength="50"/>
						
						  <td align="left"><button type="submit" name="submit_details"class="btn btn-primary"><i class="fa fa-plus"></i></button></td>
					    </tr>
					</table>
				</div>
			</form>
				
					<?php
$sql = "SELECT s_qualification_id,s_program,s_branch,s_year_of_start,s_year_of_completion,s_percentage_achieved,s_university_name,s_institution_name,s_institution_country,
s_institution_state,s_institution_city,s_institution_zip FROM  student_qualifications  where user_id='$user_id' ORDER BY Created_on DESC";
$statement1=$mysqli->prepare($sql);
$statement1->execute();
$statement1->store_result();
$num1=$statement1->num_rows();
$statement1->bind_result($s_qualification_id,$s_program,$s_branch,$s_year_of_start,$s_year_of_completion,$s_percentage_achieved,$s_university_name,$s_institution_name,$s_institution_country,
$s_institution_state,$s_institution_city,$s_institution_zip);
if($num1>0){ 
?>
				<div class="table-responsive">
					<table width="100%" class="table table-striped border">
						<tr class="tr1">
						  <td>Program</td>
						  <td>Branch</td>
						  <td>Year of Start</td>
						  <td>Year of Completion</td>
						  <td>% Achieved</td>
						  <td>University Name</td>
						  <td>Institution Name</td>
						  <td>Institution Country</td>
						  <td>Institution State</td>
						  <td>Institution City</td>
						  <td>Institution Zip</td>
						  <td align="right">&nbsp;</td>
						</tr>
<?php }
 while($statement1->fetch()) {
					$i++;		
							$sql1 = "SELECT category_name FROM master_category where category_id='$s_program'";
							$statement1s=$mysqli->prepare($sql1);	
							$statement1s->execute();
							$statement1s->store_result();
							$statement1s->bind_result($program_name);		
							$statement1s->fetch();
							$sql2= "SELECT subcategory_name FROM master_subcategory where subcategory_id='$s_branch'";
							$statement2=$mysqli->prepare($sql2);	
							$statement2->execute();
							$statement2->store_result();
							$statement2->bind_result($branch_name);		
							$statement2->fetch();

					?>
						<tr>
							<td><?php echo $program_name;?></td>
							<td><?php echo $branch_name;?></td>
							<td><?php echo $s_year_of_start;?></td>
							<td><?php echo $s_year_of_completion;?></td>
							<td><?php echo $s_percentage_achieved;?></td>
							<td><?php echo $s_university_name;?></td>
							<td><?php echo $s_institution_name;?></td>							
							<td><?php echo getCountryName($s_institution_country);?></td>
							<td><?php echo getStateName($s_institution_state);?></td>
							<td><?php echo getCityName($s_institution_city);?></td>
							<td><?php echo $s_institution_zip;?></td>

							<td align="right">
<a href="reg-project-stud3edit.php?user_id=<?php echo $user_id; ?>&userType=<?php echo $userType;?> & edit_id=<?php echo $s_qualification_id;?>"><i class="fa fa-pencil edit"></i></a>
<a  class="del" href="reg-project-stud3edit.php?user_id=<?php echo $user_id;?> & userType=<?php echo $userType;?> & delete_id=<?php echo $s_qualification_id;?>"><i class="fa fa-trash trash"></i></a></td>
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
				
				<a class="btn submitM" id="" href="userView.php?type=<?php echo $userType;?>">Cancel</a>
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
            $("#form_qualification_reg").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {

                                            s_program: {
                                            required: true,
                                            },
                                            s_branch: {
                                            required: true,                                   						
                                            },
                                            s_year_of_start: {
                                            required: true,	
					    number:true,
					  
					    },
                                            s_year_of_completion: {
                                            required: true,
					    number:true,
					    
                                            },
					    s_percentage_achieved: {
                                            required: true,
					    number: true,
					    },
					    s_university_name:  {
					    required: true,
					    lettersonly4N: true,
					    minlength: 3,
					    maxlength: 50,
					    },
                                            s_institution_name: {
                                            required: true,
					    lettersonly4N: true,
					    minlength: 3,
					    maxlength: 50,
                                            },
 					    s_institution_country:  {
                                            required: true,
					    },
                               		    s_institution_state:  {
                                            required: true,
					    },
                                            s_institution_city:  {
                                            required: true,
					    },
				            s_institution_zip: {
                                            required: true,
					    digits:true,
					    },
               },


				//The error message Str here

           messages: {
		
                                            s_program: {
                                            required: "Please Select Program",
                                            },
                                            s_branch: {
                                            required: "Please Select Branch",                                   						
                                            },
                                            s_year_of_start: {
                                            required: "This field is required",	
					    number: "Please enter valid Year",
					    minlength: "Kindly enter full year",
					    },
                                            s_year_of_completion: {
                                            required: "This field is required",
					    number: "Please enter valid Year",
					    minlength: "Kindly enter full year",
                                            },
					    s_percentage_achieved: {
                                            required: "Please enter % Obtained",
					    number: "Kindly Enter the Numbers Only",
					    },
					    s_university_name:  {
					    required: "kindly enter University Name",
					    minlength: "Please enter above 3 characters",
					    maxlength: "Please enter no more than 50 characters",
					    },
                                            s_institution_name: {
                                            required: "Kindly enter Institution Name",
					    minlength: "Please enter above 3 characters",
					    maxlength: "Please enter no more than 50 characters",
                                            },
 					    s_institution_country:  {
                                            required: "Please enter Country",
					    },
                               		    s_institution_state:  {
                                            required: "Please enter State",
					    },
                                            s_institution_city:  {
                                            required: "Please enter City",
					    },
				            s_institution_zip: {
                                            required: "Please enter Zip Code",
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
$('.del').click(function() {
 var agree=confirm("ARE YOU ABSOLUTELY SURE YOU WANT TO DELETE THIS RECORD?");
	         if (agree) {
		      return true;
	         } else {
		      return false;
		     }
});
$('#s_program').change(function()
{
var cat=$('#s_program').val();
if(cat!='') {
   $.ajax({    //create an ajax request to functions.php
        type: "POST",
        url: "ajax_load_branch.php",             
        data: {cat},                 
        success: function(response){
	//alert(response);
        $('#s_branch').html(response);
        }
    });
}
else {
        $('#s_branch').html("<option value=''>Select</option>");
}
});

});
</script>

<script>
$(document).ready(function()
{
$('#s_institution_country').change(function()
{
var con=$('#s_institution_country').val();
if(con=='')
{
$('#s_institution_state').html('<option>Select Country First</option>');
$('#s_institution_city').html('<option>Select state First</option>');
}
else
{
   $.ajax({    //create an ajax request to functions.php
        type: "POST",
        url: "stateajax.php",             
        data: {con},                 
        success: function(response){
        $('#s_institution_state').html(response);
        }
    });
}
});
});
</script>
<script>
$(document).ready(function()
{
$('#s_institution_state').change(function()
{
var com=$('#s_institution_state').val();
if(com=='')
{
$('#s_institution_city').html('<option>Select state First</option>');
}
else
{
   $.ajax({    //create an ajax request to functions.php
        type: "POST",
        url: "stateajax.php",             
        data: {com},                 
        success: function(response){
        $('#s_institution_city').html(response);
        }
    });
}
});
});

</script>

