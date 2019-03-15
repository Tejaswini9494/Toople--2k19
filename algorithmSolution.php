<?php
$page="algorithmSolution";
$title="Algorithm Solution";
$ses="no";
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

session_start();
$user_id=$_SESSION["userid"];
$urtype=$_SESSION["type"];

if(isset($algosolu_submit))
{


	$sname=$name;
	$status="A";
	$path = "uploads/algorithm/";
	$name="deliverables";
	if($_FILES[$name]["size"]>0)
	{
		//echo $_FILES[$name]["size"].'###';

		$img_name= $_FILES[$name]['name']; 
		$val1=explode(".",$img_name);
		$tmp_file = $_FILES[$name]['tmp_name'];
		$imgtype=substr(strrchr(basename($_FILES[$name]["name"]),"."),1); 
		$imgtype=strtolower($imgtype);	
		if($imgtype=='jpg' || $imgtype=='gif' || $imgtype=='png'|| $imgtype=='jpeg' || $imgtype=='doc' || $imgtype=='docx' || $imgtype=='pdf'){
		$name_file = $val1[0].time().".".$imgtype;
		move_uploaded_file($tmp_file,$path.$name_file);

		$query1 = "INSERT INTO  too_algosolve (algo_id, name, solution, deliverables, added_date, status) VALUES(?,?,?,?, now(), ?)";
		$statement1= $mysqli->prepare($query1);
		$statement1->bind_param('sssss', $aid, $sname, $solution, $name_file, $status);
		$statement1->execute();

		}
	}

	//getMessageNotification('regS');
	header("location:tooAlgorithms_view.php?aid=$aid");
	//exit;

}
/*
if($urtype=='MEN' || $urtype=='CP' || $urtype=='SP' || $urtype=='SI'){

		$quer2 = "SELECT s_first_name from student_info where user_id='$user_id'";
		$st2= $mysqli->prepare($quer2);
		$st2->execute();
		$st2->bind_result($usr_name);
		//$statement2->fetch();
}
if($urtype=='SPM' || $urtype=='SPC'){

		$quer3 = "SELECT rsp_name from representative_service_provider_details where user_id='$user_id'";
		$st3= $mysqli->prepare($quer3);
		$st3->execute();
		$st3->bind_result($usr_name);
		//$statement3->fetch();
}
if($urtype=='COO'){
		$quer4 = "SELECT cr_name from co_representative_details where user_id='$user_id'";
		$st4= $mysqli->prepare($quer4);
		$st4->execute();
		$st4->bind_result($usr_name);
		//$statement4->fetch();
}
if($urtype=='CIN' || $urtype=='CRC' || $urtype=='CIS'){
		$query5 = "SELECT co_name from customer_organisation where user_id='$user_id'";
		$st5= $mysqli->prepare($query5);
		$st5->execute();
		$st5->bind_result($usr_name);
		//$statement5->fetch();
}
*/

include("header.php");

$query6 = "SELECT name from too_algorithm where algo_id='$aid'";
$st6= $mysqli->prepare($query6);
$st6->execute();
$st6->bind_result($algo_name);
$st6->fetch();

 ?>

<h3 class="text-center"> <?php echo $algo_name; ?>
<span class="pull-right"><a href="javascript:history.back();" class="btn submitBk">&raquo; Back</a></span>
</h3>
<div class="gap30"></div>

<form id="form_algosolu" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label class="col-sm-3 text-right">User Name <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-file"></i></span>
			<input type="text" name="name" id="name" value="<?php echo $usr_name;?>"  class="form-control" >
			</div>
			<div class="gap1"></div>
			<span for="name" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="form-group">
		<label class="col-sm-3 text-right">Solution <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-cube"></i></span>
			<textarea id="solution" name="solution" class="form-control tal100"></textarea>
			</div>
			<div class="gap1"></div>
			<span for="solution" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="form-group">
		<label class="col-sm-3 text-right">Reference Document <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-file"></i></span>
			<input type="file" name="deliverables" id="deliverables" class="form-control">
			</div>
			<div class="gap1"></div>
			<span for="deliverables" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="col-sm-9 col-sm-push-3">	
		<input id="algosolu_submit" name="algosolu_submit" class="btn submitM" type="submit" value="Submit"> &nbsp;
	<!--	<a value="SolutionSubmit" class="btn submitM pull-right" data-toggle="modal" data-target="#modal_algosuccess">Submit</a> &nbsp;	-->
		<a href="toocontents.php" class="btn submitM cancelBtn">Cancel</a>
	</div>
</form>
<div class="gap30"></div>

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
            $("#form_algosolu").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            name: {
                                            required: true,
                                            //firstChar: true,
					    //lettersonly4N: true,
					    minlength: 3,
					    maxlength: 50,
                                            },
					    solution: {
					    required: true,
					    minlength: 3,
					    maxlength: 100,
					    },
                                            deliverables: {
					    required: true,

					    filesize: 1048576,
					    },

					                                             
               },


				//The error message Str here

           messages: {

		name: {
		firstChar: "Kindly start with Character",
		lettersonly4N: "Kindly enter only characters, Space & dot",
		minlength: "Kindly enter only 3 to 50 characters",
		maxlength: "Kindly enter only 3 to 50 characters",
		},
		deliverables: {
		accept: "Please enter jpg,jpeg,gif,doc,pdf,docx formats only",
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

function empty_form(val1){
	//alert(val1);
        $("#"+val1).closest('#form_reg-institution2').find("input[type=text], input[type=radio], input[type=tel], select, textarea").val("");
}

</script>
