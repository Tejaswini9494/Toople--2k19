<?php 
include_once("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);
$student_info_id=$id;

if(isset($update_info)) {
$query = "UPDATE student_info SET s_first_name=?,s_last_name=?,s_dob=?,s_gender=?,s_identify_number=? where student_info_id='$student_info_id'";
		$statement= $mysqli->prepare($query);  
		$statement->bind_param('sssss',$s_first_name, $s_last_name,$s_dob,$s_gender,$s_identify_number);
		$statement->execute();
}
//echo $student_info_id;
$sql = "SELECT s_first_name,s_last_name,s_dob,s_gender,s_identify_number FROM  student_info  where student_info_id='$student_info_id'";
$stat=$mysqli->prepare($sql);
$stat->execute();
$stat->store_result();
$stat->bind_result($s_first_name,$s_last_name,$s_dob,$s_gender,$s_identify_number);
$stat->fetch();
//echo $sql;
$s_dob1=sysDBDateConvert($s_dob);

?>
	<!------------>
	<h3>Personal Info</h3>
	<div class="gap10"></div>
	<form method="post" id="register1a">
	<div class="item1">
		<div class="gap20"></div>

		<div class="form-group">
			<label class="col-sm-3 text-right">First Name <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input type="text" name="s_first_name" id="s_first_name" class="form-control" placeholder="Name" value="<?php echo $s_first_name;?>">
				</div>
				<div class="gap1"></div>
				<span for="s_first_name" class="errors"></span>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap15"></div>
        	<div class="form-group">
			<label class="col-sm-3 text-right">Last Name <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input type="text" name="s_last_name" id="s_last_name" class="form-control" placeholder="Name" value="<?php echo $s_last_name;?>">
				</div>
				<div class="gap1"></div>
				<span for="s_last_name" class="errors"></span>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap15"></div>
		<div class="form-group">
			<label class="col-sm-3 text-right">Date of Birth <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				<input type="text" class="form-control" name="s_dob" id="s_dob" placeholder="Date Of Birth" value="<?php echo $s_dob1;?>" readonly>
				</div>
				<div class="gap1"></div>
				<span for="user_dob" class="errors"></span>
			</div>
			<div class="gap1"></div>
		</div>
        		<div class="gap15"></div>
		

		<div class="form-group">
			<label class="col-sm-3 text-right">Gender <span class="red">*</span></label>
			<div class="col-sm-3">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-female"></i></span>
				<span class="form-control">Female</span>
				<span class="input-group-addon"><input type="radio" id="s_gender" name="s_gender" value="f" <?php if($s_gender=='f') echo "checked"?>></span>
				</div>
			</div>
			 
			<div class="col-sm-3">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-male"></i></span>
				<span class="form-control">Male</span>
				<span class="input-group-addon"><input type="radio" id="s_gender" name="s_gender" value="m" <?php if($s_gender=='m') echo "checked";?>></span>
				</div>
			</div>
				<div class="gap1"></div>
				<span for="gender" class="errors col-sm-8 col-sm-push-5" ></span>
		</div>
        
		<div class="gap15"></div>
		<div class="form-group">
			<label class="col-sm-3 text-right">Identity Number <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input type="text" name="s_identify_number" id="s_identify_number" class="form-control" placeholder="Name" value="<?php echo $s_identify_number?>">
				</div>
				<div class="gap1"></div>
				<span for="user_name" class="errors"></span>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap10"></div>
      </div>  
 
	<!------------>

		<div class="gap10"></div>
		<a class="btn submitM" id="" href="#register1b" name="update_info" data-toggle="tab">Save & Proceed</a> &nbsp;
		<input type="reset" class="btn submitM cancelBtn" id="" value="Clear"> &nbsp;
		<a class="btn submitM" id="" href="index.php">Cancel</a>
		<div class="gap10"></div>
	</form>
