<?php  
$page="user_mgnt";
$xpan="no";
include("../class/config.php");

$type=array('SP','SI','CIN','CIS','CRC','COO','MEN','CP','SPM','SPC');
$userCount=array();
foreach($type as $user_type)
{
$query="SELECT COUNT(*) AS user_count FROM too_users where user_type='$user_type'";
$stmt=$mysqli->prepare($query);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($user_count);
$stmt->fetch();
$userCount[$user_type]=$user_count;
}
$query1="SELECT COUNT(*) FROM too_users where user_type='SPM'";
$stmt1=$mysqli->prepare($query1);
$stmt1->execute();
$stmt1->store_result();
$stmt1->bind_result($user_count1);
$stmt1->fetch();

$query2="SELECT COUNT(*) FROM too_users where user_type='SPC'";
$stmt2=$mysqli->prepare($query2);
$stmt2->execute();
$stmt2->store_result();
$stmt2->bind_result($user_count2);
$stmt2->fetch();

$count=$user_count1 + $user_count2;

//print_r($userCount);
include("header.php"); 


?>

<div class="dashB">

<div class="col-sm-4">
	<a href="userView.php?type=SP" class="x_panel font16 ic1">
		<div class="col-xs-4"><img src="images/ic1.png"></div>
		<div class="col-xs-8">
			<strong class="font32"><?php echo $userCount['SP']?></strong><br>
			Project Student
		</div>
	</a>
</div>

<div class="col-sm-4">
	<a href="userView.php?type=SI" class="x_panel font16 ic2">
		<div class="col-xs-4"><img src="images/ic2.png"></div>
		<div class="col-xs-8">
			<strong class="font32"><?php echo $userCount['SI']?></strong><br>
			Intern Student
		</div>
	</a>
</div>

<div class="col-sm-4">
	<a href="user3View.php?type=CIN" class="x_panel font16 ic3">
		<div class="col-xs-4"><img src="images/ic3.png"></div>
		<div class="col-xs-8">
			<strong class="font32"><?php echo $userCount['CIN']?></strong><br>
			Representative of Institution
		</div>
	</a>
</div>
<div class="gap10"></div>

<div class="col-sm-4">
	<a href="userViewCOO.php" class="x_panel font16 ic8">
		<div class="col-xs-4"><img src="images/ic8.png"></div>
		<div class="col-xs-8">
			<strong class="font32"><?php echo $userCount['COO']?></strong><br>
			Representative of Institution - Coordinator
		</div>
	</a>
</div>

<div class="col-sm-4">
	<a href="user3View.php?type=CIS" class="x_panel font16 ic5">
		<div class="col-xs-4"><img src="images/ic5.png"></div>
		<div class="col-xs-8">
			<strong class="font32"><?php echo $userCount['CIS']?></strong><br>
			Representative of Internship Organization
		</div>
	</a>
</div>

<div class="col-sm-4">
	<a href="user3View.php?type=CRC" class="x_panel font16 ic4">
		<div class="col-xs-4"><img src="images/ic4.png"></div>
		<div class="col-xs-8">
			<strong class="font32"><?php echo $userCount['CRC']?></strong><br>
			Representative of Recruiting Organization
		</div>
	</a>
</div>
<div class="gap10"></div>

<div class="col-sm-4">
	<a href="user8View.php?type=MEN" class="x_panel font16 ic6">
		<div class="col-xs-4"><img src="images/ic6.png"></div>
		<div class="col-xs-8">
			<strong class="font32"><?php echo $userCount['MEN']?></strong><br>
			Mentor
		</div>
	</a>
</div>

<div class="col-sm-4">
	<a href="user8View.php?type=CP" class="x_panel font16 ic7">
		<div class="col-xs-4"><img src="images/ic7.png"></div>
		<div class="col-xs-8">
			<strong class="font32"><?php echo $userCount['CP']?></strong><br>
			Content Provider
		</div>
	</a>
</div>

<div class="col-sm-4">
	<a href="user2View.php" class="x_panel font16 ic8">
		<div class="col-xs-4"><img src="images/ic8.png"></div>
		<div class="col-xs-8">
			<strong class="font32"><?php echo $count;?></strong><br>
			Representative of Service Provider Organization
		</div>
	</a>
</div>
<div class="gap10"></div>

</div>
<?php include("footer.php"); ?>
