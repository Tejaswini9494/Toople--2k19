<?php
include_once("../class/config.php");
extract($_REQUEST);

$query1="select user_id from too_users where status='A' AND user_type='CIN'";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($user_id);
$CIN_num_rows=$statement1->num_rows();

$query2="select user_id from too_users where status='A' AND user_type='CIS'";
$statement2=$mysqli->prepare($query2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($user_id);
$CIS_num_rows=$statement2->num_rows();

$query3="select user_id from too_users where status='A' AND user_type='CRC'";
$statement3=$mysqli->prepare($query3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($user_id);
$CRC_num_rows=$statement3->num_rows();

$query4="select user_id from too_users where status='A' AND user_type='MEN'";
$statement4=$mysqli->prepare($query4);
$statement4->execute();
$statement4->store_result();
$statement4->bind_result($user_id);
$MEN_num_rows=$statement4->num_rows();

$query5="select user_id from too_users where status='A' AND user_type='CP'";
$statement5=$mysqli->prepare($query5);
$statement5->execute();
$statement5->store_result();
$statement5->bind_result($user_id);
$CP_num_rows=$statement5->num_rows();

?>
<div class="dashB" style="min-height: 80vh;">

<div class="col-md-4 col-sm-6" onclick="window.location.href='user3View.php?type=CIS'" >
	<div class="x_panel font16 ic1">
		<div class="col-xs-4"><img src="images/ic1.png"></div>
		<div class="col-xs-8">
			<strong class="font32"><?php echo $CIS_num_rows; ?></strong><br>
			Representative of Internship Organization
		</div>
	</div>
</div>

<div class="col-md-4 col-sm-6" onclick="window.location.href='user3View.php?type=CIN'" >
	<div class="x_panel font16 ic2">
		<div class="col-xs-4"><img src="images/ic2.png"></div>
		<div class="col-xs-8">
			<strong class="font32"><?php echo $CIN_num_rows; ?></strong><br>
			Representative of Institution Organization
		</div>
	</div>
</div>

<div class="col-md-4 col-sm-6" onclick="window.location.href='user3View.php?type=CRC'">
	<div class="x_panel font16 ic3">
		<div class="col-xs-4"><img src="images/ic3.png"></div>
		<div class="col-xs-8">
			<strong class="font32"><?php echo $CRC_num_rows; ?></strong><br>
			Representative of Recruiting Organization
		</div>
	</div>
</div>
<div class="gap15"></div>

<div class="col-md-4 col-sm-6" onclick="window.location.href='user8View.php?type=MEN'">
	<div class="x_panel font16 ic4">
		<div class="col-xs-4"><img src="images/ic4.png"></div>
		<div class="col-xs-8">
			<strong class="font32"><?php echo $MEN_num_rows; ?></strong><br>
			Mentor Service Providing Organization
		</div>
	</div>
</div>

<div class="col-md-4 col-sm-6" onclick="window.location.href='user8View.php?type=CP'">
	<div class="x_panel font16 ic5">
		<div class="col-xs-4"><img src="images/ic5.png"></div>
		<div class="col-xs-8">
			<strong class="font32"><?php echo $CP_num_rows; ?></strong><br>
			Content Provider Service Providing Organization
		</div>
	</div>
</div>

<div class="gap15 no1024"></div>

</div>
