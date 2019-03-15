<?php
$page="mentor5";
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
	$sql_delete = "DELETE FROM student_certifcation_details WHERE user_id='$user_id' AND s_certification_id='$delete_id'";
	$statement_delete=$mysqli->prepare($sql_delete);
	$statement_delete->execute();
		header("location:mentor5edit.php?user_id=$user_id&userType=$userType");
}
if(isset($submit_details)){
	if($update_id=='') {
	$s_date=sysConvert2($s_date_of_cleared);

	$querys = "INSERT INTO student_certifcation_details(user_id,s_exam_name,s_exam_code,s_date_of_cleared,created_on) VALUES (?,?,?,?,now())";
	$statements= $mysqli->prepare($querys);  
	$statements->bind_param('isss',$user_id,$s_exam_name,$s_exam_code,$s_date);
	$statements->execute();
	//echo $querys;
	}
	else {
	$s_date=sysConvert2($s_date_of_cleared);
	$query_up1 = "UPDATE student_certifcation_details SET s_exam_name=?,s_exam_code=?,s_date_of_cleared=? where s_certification_id='$update_id'";
	$statement_up1= $mysqli->prepare($query_up1); 
	$statement_up1->bind_param('sss',$s_exam_name,$s_exam_code,$s_date);
	$statement_up1->execute(); 
	//echo $query_up1;
	}
	header("location:mentor5edit.php?user_id=$user_id&userType=$userType");
}
if(isset($save_submit)){
	header("location:mentor5edit.php?user_id=$user_id&userType=$userType");
}

if(isset($proceed_submit)){
	header("location:mentor6edit.php?user_id=$user_id&userType=$userType");
}

if(isset($edit_id))
{
	$sql_edit = "SELECT s_exam_name,s_exam_code,s_date_of_cleared FROM student_certifcation_details  where user_id='$user_id' AND s_certification_id='$edit_id'";
	$statement_edit=$mysqli->prepare($sql_edit);
	$statement_edit->execute();
	$statement_edit->store_result();
	$statement_edit->bind_result($s_exam_name,$s_exam_code,$s_date_of_cleared);
	$statement_edit->fetch();
	$sdoc=sysDBDateConvert($s_date_of_cleared);
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
			<h3>Certification Details</h3>
			<div class="gap10"></div>

			<div class="item1">
				<div class="gap20"></div>

				<div class="table-responsive">
				<form method="post" id="form_certidetails_reg">
					<table width="100%" class="table table-striped border">
						<tr>
							  <td>Exam Name</td>
							  <td>Exam Code</td>
							  <td>Date of Cleared</td>
							  <td align="right">&nbsp;</td>
					    	</tr>
						<tr>
							<td><span class="form-group">
							<input type="text" name="s_exam_name" id="s_exam_name" value="<?php echo $s_exam_name;?>" class="form-control" />
							</span></td>
							<td><span class="form-group">
							<input type="text" name="s_exam_code" id="s_exam_code" value="<?php echo $s_exam_code;?>"class="form-control" />
							</span></td>
							<td><span class="form-group">
							<input type="text" name="s_date_of_cleared" id="s_date_of_cleared" value="<?php echo $sdoc;?>"class="dateIcon form-control date2" style="cursor:pointer;"  readonly>
							</span></td>
							
							<input type="hidden" name="update_id" id="update_id" class="form-control" value="<?php echo $edit_id;?>" maxlength="50"/>
							
							<td align="right"><button name="submit_details" class="btn btn-primary"><i class="fa fa-plus"></i></button></td>

					   	 </tr>
					</table>
					</form>	

<?php
$sql = "SELECT s_certification_id,s_exam_name,s_exam_code,s_date_of_cleared FROM student_certifcation_details where user_id='$user_id' ORDER BY Created_on DESC";
$statement1=$mysqli->prepare($sql);
$statement1->execute();
$statement1->store_result();
$num1=$statement1->num_rows();
$statement1->bind_result($s_certification_id,$s_exam_name,$s_exam_code,$s_date_of_cleared);
if($num1>0){
?>
				<table width="100%" class="table table-striped border">
				<tr>
							  <td>Exam Name</td>
							  <td>Exam Code</td>
							  <td>Date of Cleared</td>
							  <td align="right">&nbsp;</td>
					    	</tr>
<?php }
while($statement1->fetch()) {
				
				$datec=sysDBDateConvert($s_date_of_cleared);
?> 
			<tr>
				<td><?php echo $s_exam_name;?></td>
				<td><?php echo $s_exam_code;?></td>
				<td><?php echo $datec;?></td>
				

				<td align="right"><a href="mentor5edit.php?user_id=<?php echo $user_id; ?>&userType=<?php echo $userType;?>&edit_id=<?php echo $s_certification_id;?>"><i class="fa fa-pencil edit"></i></a><a class="del" id="delete" href="mentor5edit.php?user_id=<?php echo $user_id;?>&userType=<?php echo $userType;?>&delete_id=<?php echo $s_certification_id;?>"><i class="fa fa-trash trash"></i></a></td>
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
            $("#form_certidetails_reg").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {

                                            s_exam_name: {
                                            required: true,
					    lettersonly:true,
                                            },
                                            s_exam_code: {
                                            required: true, 
					   
					                   						
                                            },
                                            s_date_of_cleared: {
                                            required: true,	
					    },
                                           
                                           
               },


				//The error message Str here

           messages: {
					
                                            s_exam_name: {
                                            
                                            },
                                            s_exam_code: {
                                                          						
                                            },
                                            s_date_of_cleared: {
                                          	
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
});
</script>
