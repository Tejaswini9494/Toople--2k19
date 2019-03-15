<?php
$page="reg-mentor5";
$title="Registration &raquo;";
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
	$sql_delete = "DELETE FROM student_certifcation_details WHERE user_id='$user_id' AND s_certification_id='$delete_id'";
	$statement_delete=$mysqli->prepare($sql_delete);
	$statement_delete->execute();
}

if(isset($save_submit)){
	header("location:reg-mentor5.php?email=$email");
	exit;
}

if(isset($proceed_submit)){
	header("location:reg-mentor6.php?email=$email");
	exit;
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
	if(isset($proceed_submit)){
		header("location:reg-mentor6.php?email=$email");
	}else{
		header("location:reg-mentor5.php?email=$email");
	}
}

if(isset($edit_id))
{
	$sql_edit = "SELECT s_exam_name,s_exam_code,s_date_of_cleared FROM student_certifcation_details  where user_id='$user_id' AND s_certification_id='$edit_id'";
	$statement_edit=$mysqli->prepare($sql_edit);
	$statement_edit->execute();
	$statement_edit->store_result();
	$statement_edit->bind_result($s_exam_name,$s_exam_code,$s_date_of_cleared);
	$statement_edit->fetch();
	$s_doc=sysDBDateConvert($s_date_of_cleared);
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
			<a href="javascript:void(0);"></a>
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
			<h3>Certification Details</h3>
			<div class="gap10"></div>

			<div class="item1">
				<div class="gap20"></div>
			

			<form method="post" id="form_certidetails_reg" enctype="multipart/form-data">
				<div class="table-responsive">
					<table width="100%" class="table table-striped border">
						<tr>
							  <td>Exam Name</td>
							  <td>Exam Code</td>
							  <td>Date of Cleared</td>
							  <td align="right">&nbsp;</td>
					    	</tr>
						<tr>
							<td><span class="form-group">
							<input type="text" name="s_exam_name" id="s_exam_name" onkeypress="return alpha(event)" onchange="AllowOnlyAlphabates(this);" onpaste="return AllowOnlyAlphabates(this);" oncopy="return AllowOnlyAlphabates(this);" onblur="FormatString(this);" placeholder="Exam Name" value="<?php echo $s_exam_name;?>" class="form-control" />
							</span></td>
							<td><span class="form-group">
							<input type="text" name="s_exam_code" id="s_exam_code" placeholder="Exam Code" value="<?php echo $s_exam_code;?>"class="form-control" />
							</span></td>
							<td><span class="form-group">
							<input type="text" name="s_date_of_cleared" id="s_date_of_cleared" placeholder="Date of Cleared" value="<?php echo $s_doc;?>"class="form-control date2" readonly>
							</span></td>
							
							<input type="hidden" name="update_id" id="update_id" class="form-control" value="<?php echo $edit_id;?>" maxlength="50"/>
							
							<td align="right"><button name="submit_details" class="btn btn-primary"><i class="fa fa-plus"></i></button></td>

					   	 </tr>
					</table>
				</div>
			</form>
		<div class="gap10"></div>
<?php
$sql = "SELECT s_certification_id,s_exam_name,s_exam_code,s_date_of_cleared FROM student_certifcation_details where user_id='$user_id' ORDER BY Created_on DESC";
$statement1=$mysqli->prepare($sql);
$statement1->execute();
$statement1->store_result();
$num1=$statement1->num_rows();
$statement1->bind_result($s_certification_id,$s_exam_name,$s_exam_code,$s_date_of_cleared);
if($num1>0){
?>
			<div class="table-responsive">
				<table width="100%" class="table table-striped border">
						<tr>
							  <td>Exam Name</td>
							  <td>Exam Code</td>
							  <td>Date of Cleared</td>
							  <td align="right">&nbsp;</td>
					    	</tr>
						
<?php }
 while($statement1->fetch()) {
				
				$datec=sysDBDateConvert($s_date_of_cleared);;
		?>
			<tr>
				<td><?php echo $s_exam_name;?></td>
				<td><?php echo $s_exam_code;?></td>
				<td><?php echo ($datec);?></td>
				

				<td align="right"><a href="reg-mentor5.php?edit_id=<?php echo $s_certification_id;?>"><i class="fa fa-pencil edit"></i></a><a class="delete" href="reg-mentor5.php?delete_id=<?php echo $s_certification_id;?>"><i class="fa fa-trash trash"></i></a></td>
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
            $("#form_certidetails_reg").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {

                                            s_exam_name: {
                                            required: true,

					    minlength: 3,
					    maxlength: 50,
                                            },
                                            s_exam_code: {
                                            required: true, 


					    minlength: 3,
					    maxlength: 20,       						
                                            },
                                            s_date_of_cleared: {
                                            required: true,	
					    },
                                           
                                           
               },


				//The error message Str here

           messages: {
					
                                            s_exam_code: {
                                            letterswithbasicpunc: "Kindly enter characters and numbers along with hypen(-)",             		
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
</script>
<script>
function empty_form(val1){
	
    $("#form_certidetails_reg").find("input[type=text],select").val("");
}

</script>
