<?php
$page="register";
$title="Registration Information";
$ses="no";
include_once("class/config.php");
include_once("includes/functions.php");
require_once 'includes/encrypt.php';

extract($_REQUEST);

//echo $id.'##'.$user_type;
$id1=decrypt($id,'tooople#@D2016');
//echo $id1.'###';

if($id==''){
	$id1=0;
}

$query1 = "SELECT user_type FROM too_users where user_id=$id1";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($user_type1);
$statement1->fetch();

if($user_type1!='') {
	$errChk='Y';
} else {
	$errChk='';
	if(isset($reg_PS)) {
		if($user_type!='' && $id!="") {
			$query = "UPDATE too_users SET user_type=?, status='A' WHERE user_id=?";
			$statement= $mysqli->prepare($query);
			$statement->bind_param('si', $user_type, $id1);
			$statement->execute();
			//echo $query;
			header("location:loginChk.php?uId=$id");
			exit;
		}
	}
}

include("header.php"); ?>

<h1>Registration Information</h1>
<div class="gap30"></div>

<?php if($errChk!='') { ?>
	<div class="alert alert-danger fade in"><button class="close" data-dismiss="alert">x</button><?php echo "You have already registered with Tooople."; ?></div>
	<div class="gap30"></div>
<?php } ?>


<form id="" action="" method="POST">

<div class="form-group">
	<label class="col-sm-3 text-right">Are You?</label>
	<div class="col-sm-9">
		<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-question"></i></span>
		<select class="form-control" id="usertype" name="usertype" onchange="displayUserType(this.value)">
			<option value="">Select</option>		
			<option value="S">Student</option>
			<option value="C">Customer Organization</option>
			<option value="SP">Service Provider Organization</option>
		</select>
		</div>
		<div class="gap1"></div>
		<span class="errors" for=""></span>
	</div>
	<div class="gap1"></div>
</div>
<div class="gap5"></div>


<div class="types" id="type3" style="display:none;">
	<div class="gap15"></div>
	<div class="form-group">
		<label class="col-sm-3 text-right" id="usertype_title"></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-wrench"></i></span>
			<span id="userType_selec"><span>
			</div>
			<div class="gap1"></div>
			<span class="errors" for=""></span>
		</div>
		<div class="gap1"></div>
	</div>
</div>



<div class="gap15"></div>


<!----------- Project Student------------>
<div class="formss" id="stud1" style="display:none;">
	<div class="col-sm-9 col-sm-push-3">
		<input type="submit" id="reg_PS" name="reg_PS" class="btn submitM" value="Submit"> &nbsp;
		<a href="register1.php" class="btn submitM">Cancel</a>
	</div>
	<?php //include("in_ut123.php"); ?>
</div>

</form>
<div class="gap20"></div>
<?php include("footer.php"); ?>

<!------ User Type ----->
<script>


function displayUserType(Val1){

var userTypCnt='<select class="form-control" id="user_type" name="user_type" ><option value="">Select</option>';

var userTit='';

if(Val1=='S'){

	userTit="Student Type:";
	userTypCnt+='<option value="SP">Project Student</option>';
	userTypCnt+='<option value="SI">Intern Student</option>';
}else if(Val1=='C'){

	userTit="Customer Type:";

	userTypCnt+='<option value="CIN">Institution</option>';
	userTypCnt+='<option value="CIS">Internship Organization</option>';
	userTypCnt+='<option value="CRC">Recruitment Organization</option>';

}else if(Val1=='SP'){

	userTit="Service Provider Type:";
		
	userTypCnt+='<option value="SPM">Mentor Organization</option>';
	userTypCnt+='<option value="SPC">Content Provider Organization</option>';

}
userTypCnt+='</select>';


$('#userType_selec').html(userTypCnt);
$('#usertype_title').html(userTit);
$('#stud1').show();
$('#type3').show();


}


</script>

