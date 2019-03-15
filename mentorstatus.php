<?php
$page="reg-mentor1";
$title="Registration &raquo; Mentor";
$ses="no";
include_once("class/config.php");
include_once("includes/functions.php");
extract($_REQUEST);
session_start();
$user_id=$_SESSION["userid"];

if($_SESSION['add_user_id']!=''){
$user_id=$_SESSION['add_user_id'];
}if($edit_id!=''){
$user_id=$edit_id;
}

if(isset($save_submit)){
$query = "UPDATE student_info SET m_status=?,cost_hour=? where user_id='$id'";
		$statement= $mysqli->prepare($query);  
		$statement->bind_param('ss',$m_status,$cost_hour);
		$statement->execute();
   		header("location:myrspo_mentor.php");
}

$sql = "SELECT m_status,cost_hour FROM  student_info  where user_id='$id'";
$statement1=$mysqli->prepare($sql);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($m_status,$cost_hour);
$statement1->fetch();

$sql2 = "SELECT mentor_price_name FROM  master_mentor_price  WHERE mentor_price_id!='' GROUP BY mentor_price_name";
$statement2=$mysqli->prepare($sql2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($mentor_price_name2);

include("header.php"); ?>

<h2><?php echo $title; ?></h2>
<form method="post" id="form_personalinfo_reg" enctype="multipart/form-data">
			<div class="item1">
				<div class="gap20"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Mentor Status</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-university"></i></span>
						<select name="m_status" id="m_status" class="form-control">
							<option value=""> select name</option>
						<?php while($statement2->fetch()) {
						$value1="";
						if($mentor_price_name2==$m_status){ $value1="selected"; }
						 ?>
	
								
							<option value="<?php echo $mentor_price_name2; ?>" <?php echo $value1;?> ><?php echo $mentor_price_name2; ?></option>
						<?php } ?>
						</select>
						</div>
						<div class="gap1"></div>
						<span for="m_status" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 text-right"> cost per hour<span class="red"></span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="cost_hour" id="cost_hour" class="form-control" placeholder="Last name" maxlength="50" value="<?php echo $cost_hour;?>">
						</div>
						<div class="gap1"></div>
						<span for="cost_hour" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>

			<div class="gap10"></div>
			<div class="col-sm-9 col-sm-push-3">
				<input type="submit" class="btn submitM" id="save_submit" name="save_submit" value="Save"> &nbsp;
				
				<a class="btn submitM" id="" href="myrspo_mentor.php">Cancel</a>
			</div>
			</form>
			<div class="gap20"></div>
</div>

<?php include("footer.php"); ?>

