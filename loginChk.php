<?php
include("class/config.php");
require_once 'includes/encrypt.php';
include_once("includes/functions.php");

session_start();
$_SESSION["profile_complete"]='';

$username=$_POST["regindex_email"];
$pwd=$_POST["regindex_pwd"];
//echo $pwd."<br>";

$uId=$_GET["uId"];
//echo $uId."<br>";

$uId=decrypt($uId,'tooople#@D2016');
//echo $uId.'###';


if($uId!=''){
	$qry="user_id='$uId'";
}else{
	$qry="user_email='$username'";
}

$sql1 = "SELECT user_id, user_email, user_pwd, user_type, status FROM  too_users  WHERE user_pwd!='0' AND $qry";
//echo $sql1;
$statement1=$mysqli->prepare($sql1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($regindex_id, $regindex_email, $regindex_pwd, $regindex_type, $status);
$statement1->fetch();
$logcount=$statement1->num_rows();
$statement1->close();

//echo $logcount.'###';


if($logcount==1) {
	$regindex_pwd=decrypt($regindex_pwd,'tooople#@D2016');

echo $pwd.'###'.$regindex_pwd;
	if($pwd===$regindex_pwd || $uId!='') {

//echo 'arun'.$regindex_type;
		if($regindex_type=="SP") {
			$validuser=1;

			$cnt_pro_chk=0;
			$sql_pro_chk = "SELECT student_info_id FROM  student_info  WHERE user_id='$regindex_id' AND s_institution_name!='' AND s_first_name!='' AND s_last_name!='' AND s_dob!='0000-00-00' AND  s_gender!='' AND s_identify_number!='' AND s_addressline1!='' AND s_country!='0' AND  s_state!='0' AND s_city!='0' AND s_primary_contact!='' AND s_email_id!=''";
			//echo $sql_pro_chk;
			$statement_pro_chk=$mysqli->prepare($sql_pro_chk);
			$statement_pro_chk->execute();
			$statement_pro_chk->store_result();
			$statement_pro_chk->bind_result($user_chk_id);
			$cnt_pro_chk=$statement_pro_chk->num_rows();
			$statement_pro_chk->close();

			if($cnt_pro_chk>0) {
				$page="index.php";
			} else {
				$_SESSION["profile_complete"]='N';
				getMessageNotification('PROFILE');
				$page="reg-project-stud1.php";
			}

		} elseif($regindex_type=="SI") {
			$validuser=1;

			$cnt_pro_chk=0;
			$sql_pro_chk = "SELECT student_info_id FROM  student_info  WHERE user_id='$regindex_id' AND s_institution_name!='' AND s_first_name!='' AND s_last_name!='' AND s_dob!='0000-00-00' AND  s_gender!='' AND s_identify_number!='' AND s_addressline1!='' AND s_country!='0' AND  s_state!='0' AND s_city!='0' AND s_primary_contact!='' AND s_email_id!=''";
			//echo $sql_pro_chk;
			$statement_pro_chk=$mysqli->prepare($sql_pro_chk);
			$statement_pro_chk->execute();
			$statement_pro_chk->store_result();
			$statement_pro_chk->bind_result($user_chk_id);
			$cnt_pro_chk=$statement_pro_chk->num_rows();
			$statement_pro_chk->close();

			if($cnt_pro_chk>0) {
				$page="index.php";
			} else {
				$_SESSION["profile_complete"]='N';
				getMessageNotification('PROFILE');
				$page="reg-project-stud1.php";
			}

		} elseif($regindex_type=="CIN") {
			$validuser=1;

			$cnt_pro_chk=0;
			$sql_pro_chk = "SELECT customer_organisation_id FROM  customer_organisation  WHERE user_id='$regindex_id' AND co_name!='' AND  	co_email!='' AND co_phone!='' AND co_address!='' AND co_country!='0' AND  co_state!='0' AND co_city!='0' AND co_pincode!=''";
			//echo $sql_pro_chk;
			$statement_pro_chk=$mysqli->prepare($sql_pro_chk);
			$statement_pro_chk->execute();
			$statement_pro_chk->store_result();
			$statement_pro_chk->bind_result($user_chk_id);
			$cnt_pro_chk=$statement_pro_chk->num_rows();
			$statement_pro_chk->close();

			if($cnt_pro_chk>0) {
				$page="index.php";
			} else {
				$_SESSION["profile_complete"]='N';
				getMessageNotification('PROFILE');
				$page="reg-institution1.php";
			}

		} elseif($regindex_type=="CIS") {
			$validuser=1;

			$cnt_pro_chk=0;
			$sql_pro_chk = "SELECT customer_organisation_id FROM  customer_organisation  WHERE user_id='$regindex_id' AND co_name!='' AND  	co_email!='' AND co_phone!='' AND co_address!='' AND co_country!='0' AND  co_state!='0' AND co_city!='0' AND co_pincode!=''";
			//echo $sql_pro_chk;
			$statement_pro_chk=$mysqli->prepare($sql_pro_chk);
			$statement_pro_chk->execute();
			$statement_pro_chk->store_result();
			$statement_pro_chk->bind_result($user_chk_id);
			$cnt_pro_chk=$statement_pro_chk->num_rows();
			$statement_pro_chk->close();

			if($cnt_pro_chk>0) {
				$page="index.php";
			} else {
				$_SESSION["profile_complete"]='N';
				getMessageNotification('PROFILE');
				$page="reg-institution1.php";
			}

		} elseif($regindex_type=="CRC") {
			$validuser=1;

			$cnt_pro_chk=0;
			$sql_pro_chk = "SELECT customer_organisation_id FROM  customer_organisation  WHERE user_id='$regindex_id' AND co_name!='' AND  	co_email!='' AND co_phone!='' AND co_address!='' AND co_country!='0' AND  co_state!='0' AND co_city!='0' AND co_pincode!=''";
			//echo $sql_pro_chk;
			$statement_pro_chk=$mysqli->prepare($sql_pro_chk);
			$statement_pro_chk->execute();
			$statement_pro_chk->store_result();
			$statement_pro_chk->bind_result($user_chk_id);
			$cnt_pro_chk=$statement_pro_chk->num_rows();
			$statement_pro_chk->close();

			if($cnt_pro_chk>0) {
				$page="index.php";
			} else {
				$_SESSION["profile_complete"]='N';
				getMessageNotification('PROFILE');
				$page="reg-institution1.php";
			}

		} elseif($regindex_type=="MR") {
			$validuser=1;
			$page="mentorProfile.php";

		} elseif($regindex_type=="CP") {
			$validuser=1;

			$cnt_pro_chk=0;
			$sql_pro_chk = "SELECT student_info_id FROM  student_info  WHERE user_id='$regindex_id' AND s_institution_name!='' AND s_first_name!='' AND s_last_name!='' AND s_dob!='0000-00-00' AND  s_gender!='' AND s_identify_number!='' AND s_addressline1!='' AND s_country!='0' AND  s_state!='0' AND s_city!='0' AND s_primary_contact!='' AND s_email_id!=''";
			//echo $sql_pro_chk;
			$statement_pro_chk=$mysqli->prepare($sql_pro_chk);
			$statement_pro_chk->execute();
			$statement_pro_chk->store_result();
			$statement_pro_chk->bind_result($user_chk_id);
			$cnt_pro_chk=$statement_pro_chk->num_rows();
			$statement_pro_chk->close();

			if($cnt_pro_chk>0) {
				$page="index.php";
			} else {
				$_SESSION["profile_complete"]='N';
				getMessageNotification('PROFILE');
				$page="reg-mentor1.php";
			}

		} elseif($regindex_type=="SPM") {
			$validuser=1;

			$cnt_pro_chk=0;
			$sql_pro_chk = "SELECT representative_service_provider_id FROM  representative_service_provider  WHERE user_id='$regindex_id' AND rsp_org_name!='' AND rsp_email!='' AND rsp_phone!='' AND rsp_country!='0' AND  rsp_state!='0' AND rsp_city!='0' AND rsp_postal!='' AND rsp_bank_name!='' AND rsp_branch_name!='' AND rsp_branch_code!='' AND rsp_country1!='' AND rsp_type_account!='' AND rsp_benefi_name!='' AND rsp_account_no!='' AND rsp_bank_details1!=''";
			//echo $sql_pro_chk;
			$statement_pro_chk=$mysqli->prepare($sql_pro_chk);
			$statement_pro_chk->execute();
			$statement_pro_chk->store_result();
			$statement_pro_chk->bind_result($user_chk_id);
			$cnt_pro_chk=$statement_pro_chk->num_rows();
			$statement_pro_chk->close();

			if($cnt_pro_chk>0) {
				$page="index.php";
			} else {
				$_SESSION["profile_complete"]='N';
				getMessageNotification('PROFILE');
				$page="reg-rsp-mentor1.php";
			}

		} elseif($regindex_type=="SPC") {
			$validuser=1;

			$cnt_pro_chk=0;
			$sql_pro_chk = "SELECT representative_service_provider_id FROM  representative_service_provider  WHERE user_id='$regindex_id' AND rsp_org_name!='' AND rsp_email!='' AND rsp_phone!='' AND rsp_country!='0' AND  rsp_state!='0' AND rsp_city!='0' AND rsp_postal!='' AND rsp_bank_name!='' AND rsp_branch_name!='' AND rsp_branch_code!='' AND rsp_country1!='' AND rsp_type_account!='' AND rsp_benefi_name!='' AND rsp_account_no!='' AND rsp_bank_details1!=''";
			//echo $sql_pro_chk;
			$statement_pro_chk=$mysqli->prepare($sql_pro_chk);
			$statement_pro_chk->execute();
			$statement_pro_chk->store_result();
			$statement_pro_chk->bind_result($user_chk_id);
			$cnt_pro_chk=$statement_pro_chk->num_rows();
			$statement_pro_chk->close();

			if($cnt_pro_chk>0) {
				$page="index.php";
			} else {
				$_SESSION["profile_complete"]='N';
				getMessageNotification('PROFILE');
				$page="reg-rsp-mentor1.php";
			}

		}elseif($regindex_type=="MEN") {
			$validuser=1;

			$cnt_pro_chk=0;
			$sql_pro_chk = "SELECT student_info_id FROM  student_info  WHERE user_id='$regindex_id' AND s_institution_name!='' AND s_first_name!='' AND s_last_name!='' AND s_dob!='0000-00-00' AND  s_gender!='' AND s_identify_number!='' AND s_addressline1!='' AND s_country!='0' AND  s_state!='0' AND s_city!='0' AND s_primary_contact!='' AND s_email_id!=''";
			//echo $sql_pro_chk;
			$statement_pro_chk=$mysqli->prepare($sql_pro_chk);
			$statement_pro_chk->execute();
			$statement_pro_chk->store_result();
			$statement_pro_chk->bind_result($user_chk_id);
			$cnt_pro_chk=$statement_pro_chk->num_rows();
			$statement_pro_chk->close();

			if($cnt_pro_chk>0) {
				$page="index.php";
			} else {
				$_SESSION["profile_complete"]='N';
				getMessageNotification('PROFILE');
				$page="reg-mentor1.php";
			}

		}elseif($regindex_type=="COO") {
			$validuser=1;

			$cnt_pro_chk=0;
			$sql_pro_chk = "SELECT co_representative_details_id FROM  co_representative_details  WHERE coordinator_id='$regindex_id' AND cr_name!='' AND  	cr_id_no!='' AND cr_designation!='' AND cr_email!='' AND cr_phone!='' AND cr_country!='0' AND  cr_state!='0' AND cr_city!='0' AND cr_pincode!=''";
			//echo $sql_pro_chk;
			$statement_pro_chk=$mysqli->prepare($sql_pro_chk);
			$statement_pro_chk->execute();
			$statement_pro_chk->store_result();
			$statement_pro_chk->bind_result($user_chk_id);
			$cnt_pro_chk=$statement_pro_chk->num_rows();
			$statement_pro_chk->close();

			if($cnt_pro_chk>0) {
				$page="index.php";
			} else {
				$_SESSION["profile_complete"]='N';
				getMessageNotification('PROFILE');
				$page="coordinator_profile.php";
			}

		}
	} else {
		header("location:login.php?errl=1");
		exit;
	}
} else {
	header("location:login.php?errl=1");
	exit;
}


//echo $validuser;
if($validuser==1)
	{
	 session_start();
	$_SESSION["sesLoggedInTOOPLE2016"]="YES";
	$_SESSION["userid"]=$regindex_id;
	$_SESSION["username"]=$username;
	$_SESSION["type"]=$regindex_type;
	$_SESSION["name"]=$name;
	
		header("location:$page");
		exit;
	}else{
		header("location:login.php?st=invalid");
		exit;
	}
?>
 

 
