<?php
function countryId($val)
{
	global $mysqli;
	$status='A';
	$sql = "SELECT country_id, country_name FROM master_country";
	$statement=$mysqli->prepare($sql);	
	$statement->execute();
	$statement->store_result();
	$statement->bind_result($country_id, $country_name);
	while($statement->fetch())
	{
		$selVal="";
		if($country_id==$val) { $selVal="selected";}
		echo '<option value="'.$country_id.'" '.$selVal.'>'.$country_name.'</option>'; 
	}	
}


function mentorstatus($val)
{
	global $mysqli;
	$status='A';
	$sql = "SELECT subcategory_id, subcategory_name FROM master_subcategory where category_id='84'";
	$statement=$mysqli->prepare($sql);	
	$statement->execute();
	$statement->store_result();
	$statement->bind_result($subcategory_id, $subcategory_name);
	while($statement->fetch())
	{
		$selVal="";
		if($subcategory_id==$val) { $selVal="selected";}
		echo '<option value="'.$subcategory_id.'" '.$selVal.'>'.$subcategory_name.'</option>'; 
	}	
}
function mentorstatus1()
{
	global $mysqli;
	$status='A';
	$sql = "SELECT subcategory_id, subcategory_name FROM master_subcategory where category_id='84'";
	$statement=$mysqli->prepare($sql);	
	$statement->execute();
	$statement->store_result();
	$statement->bind_result($subcategory_id, $subcategory_name);
	while($statement->fetch())
	{
		
		echo '<option value="'.$subcategory_id.'">'.$subcategory_name.'</option>'; 
	}	
}
function stateId($val)
{
	global $mysqli;
	$status='A';
	$sql = "SELECT state_id, state_name FROM master_state";
	$statement=$mysqli->prepare($sql);	
	$statement->execute();
	$statement->store_result();
	$statement->bind_result($state_id,$state_name);
	while($statement->fetch())
	{
		$selVal="";
		if($state_id==$val) { $selVal="selected";}
		echo '<option value="'.$state_id.'" '.$selVal.'>'.$state_name.'</option>'; 
	}	
}

function projectcategory($val)
{
	global $mysqli;
	$status='A';
	$sql = "SELECT category_id,category_name FROM master_category where category_for='13'";
	$statement=$mysqli->prepare($sql);	
	$statement->execute();
	$statement->store_result();
	$statement->bind_result($category_id,$category_name);
	while($statement->fetch())
	{
		$selVal="";
		if($category_id==$val) { $selVal="selected";}
		echo '<option value="'.$category_id.'" '.$selVal.'>'.$category_name.'</option>'; 
	}	
}


function projectstatus($val)
{
	global $mysqli;
	$status='A';
	$sql = "SELECT category_id,category_name FROM master_category where category_for='16'";
	$statement=$mysqli->prepare($sql);	
	$statement->execute();
	$statement->store_result();
	$statement->bind_result($category_id,$category_name);
	while($statement->fetch())
	{
		$selVal="";
		if($category_id==$val) { $selVal="selected";}
		echo '<option value="'.$category_id.'" '.$selVal.'>'.$category_name.'</option>'; 
	}	
}

function projectId($val)
{
	global $mysqli;
	$status='A';
	$sql = "SELECT subcategory_id,subcategory_name FROM master_subcategory where subcategory_id='$val'";
	$statement=$mysqli->prepare($sql);	
	$statement->execute();
	$statement->store_result();
	$statement->bind_result($subcategory_id,$subcategory_name);
	$statement->fetch();
	echo $subcategory_name;
}
function rspname($val)
{
	global $mysqli;
	$status='A';
	$sql = "SELECT representative_service_provider_details_id,rsp_name FROM representative_service_provider_details";
	$statement=$mysqli->prepare($sql);	
	$statement->execute();
	$statement->store_result();
	$statement->bind_result($representative_service_provider_details_id, $rsp_name);
	while($statement->fetch())
	{
		$selVal="";
		if($representative_service_provider_details_id==$val) { $selVal="selected";}
		echo '<option value="'.$representative_service_provider_details_id.'" '.$selVal.'>'.$rsp_name.'</option>'; 
	}	
}
function serviceprovider($val)
{
	global $mysqli;
	$status='A';
	$sql = "SELECT category_id, category_name FROM master_category where category_for='6'";
	$statement=$mysqli->prepare($sql);	
	$statement->execute();
	$statement->store_result();
	$statement->bind_result($category_id, $category_name);
	while($statement->fetch())
	{
		$selVal="";
		if($category_id==$val) { $selVal="selected";}
		echo '<option value="'.$category_id.'" '.$selVal.'>'.$category_name.'</option>'; 
	}	
}
function categoryFor($val)
{
	global $mysqli;
	$status='A';
	$sql = "SELECT category_for, category_list FROM category_for";
	$statement=$mysqli->prepare($sql);	
	$statement->execute();
	$statement->store_result();
	$statement->bind_result($category_for, $category_list);
	while($statement->fetch())
	{
		$selVal="";
		if($category_for==$val) { $selVal="selected";}
		echo '<option value="'.$category_for.'" '.$selVal.'>'.$category_list.'</option>'; 
	}	
}

function categoryname($val)
{
	global $mysqli;
	$status='A';
	$sql = "SELECT category_id, category_name FROM master_category";
	$statement=$mysqli->prepare($sql);	
	$statement->execute();
	$statement->store_result();
	$statement->bind_result($category_id, $category_name);
	while($statement->fetch())
	{
		$selVal="";
		if($category_id==$val) { $selVal="selected";}
		echo '<option value="'.$category_id.'" '.$selVal.'>'.$category_name.'</option>'; 
	}	
}

function subcategoryname($val)
{
	global $mysqli;
	$status='A';
	$sql = "SELECT subcategory_id, subcategory_name FROM master_subcategory";
	$statement=$mysqli->prepare($sql);	
	$statement->execute();
	$statement->store_result();
	$statement->bind_result($subcategory_id, $subcategory_name);
	while($statement->fetch())
	{
		$selVal="";
		if($subcategory_id==$val) { $selVal="selected";}
		echo '<option value="'.$subcategory_id.'" '.$selVal.'>'.$subcategory_name.'</option>'; 
	}	
}
function category($val)
{
	global $mysqli;
	$status='A';
	$sql = "SELECT category_id, category_name FROM master_category where category_for='4'";
	$statement=$mysqli->prepare($sql);	
	$statement->execute();
	$statement->store_result();
	$statement->bind_result($category_id, $category_name);
	while($statement->fetch())
	{
		$selVal="";
		if($category_id==$val) { $selVal="selected";}
		echo '<option value="'.$category_id.'" '.$selVal.'>'.$category_name.'</option>'; 
	}	
}
function categoryForProgram($category_for,$val)
{
	global $mysqli;
	$sql1 = "SELECT category_id,category_for,category_name FROM master_category where category_for='$category_for'";
	$statement1=$mysqli->prepare($sql1);	
	$statement1->execute();
	$statement1->store_result();
	$statement1->bind_result($category_id,$category_for, $category_name);
	while($statement1->fetch())
	{	
		$selVal="";
		if($category_id==$val) { $selVal="selected";}
		echo '<option value="'.$category_id.'" '.$selVal.'>'.$category_name.'</option>'; 
	}	
}
function categoryForBranch($s_program,$s_branch)
{
	global $mysqli;
	$sql2 = "SELECT subcategory_id,subcategory_name FROM master_subcategory where category_id='$s_program'";
	$statement2=$mysqli->prepare($sql2);	
	$statement2->execute();
	$statement2->store_result();
	$statement2->bind_result($subcategory_id,$subcategory_name);
	while($statement2->fetch())
	{	
		$selVal="";
		if($subcategory_id==$s_branch) { $selVal="selected";}
		echo '<option value="'.$subcategory_id.'" '.$selVal.'>'.$subcategory_name.'</option>'; 
	}	
}

function categoryForState($country_id,$val)
{
	global $mysqli;
	$sqls = "SELECT state_id,state_name FROM master_state where country_id='$country_id'";
	$statements=$mysqli->prepare($sqls);	
	$statements->execute();
	$statements->store_result();
	$statements->bind_result($state_id,$state_name);
	while($statements->fetch())
	{	
		$selVal="";
		if($state_id==$val) { $selVal="selected";}
		echo '<option value="'.$state_id.'" '.$selVal.'>'.$state_name.'</option>'; 
	}	
}
function categoryForCity($state_id,$val)
{
	global $mysqli;
	$sqls = "SELECT city_id,city_name FROM master_city where state_id='$state_id'";
	$statements=$mysqli->prepare($sqls);	
	$statements->execute();
	$statements->store_result();
	$statements->bind_result($city_id,$city_name);
	while($statements->fetch())
	{	
		$selVal="";
		if($city_id==$val) { $selVal="selected";}
		echo '<option value="'.$city_id.'" '.$selVal.'>'.$city_name.'</option>'; 
	}	
}
function getCountryName($val)
{
	global $mysqli;
	$status='A';
	$csql = "SELECT country_name FROM master_country WHERE country_id='$val'";
	$cstatement=$mysqli->prepare($csql);	
	$cstatement->execute();
	$cstatement->store_result();
	$cstatement->bind_result($country_name);
	$cstatement->fetch();
	echo $country_name;	
}
function getcategoryname($val)
{
	global $mysqli;
	$sqls = "SELECT category_name FROM master_category where category_id='$val'";
	$statements=$mysqli->prepare($sqls);	
	$statements->execute();
	$statements->store_result();
	$statements->bind_result($category_name);
	$statements->fetch();	
	echo $category_name;	
}

function getsubcategoryname($val)
{
	global $mysqli;
	$sqls = "SELECT subcategory_name FROM master_subcategory where subcategory_id='$val'";
	$statements=$mysqli->prepare($sqls);	
	$statements->execute();
	$statements->store_result();
	$statements->bind_result($subcategory_name);
	$statements->fetch();	
	echo $subcategory_name;	
}
function getStateName($val)
{
	global $mysqli;
	$sqls = "SELECT state_name FROM master_state where state_id='$val'";
	$statements=$mysqli->prepare($sqls);	
	$statements->execute();
	$statements->store_result();
	$statements->bind_result($state_name);
	$statements->fetch();	
	echo $state_name;	
}

function getCityName($val)
{
	global $mysqli;
	$sqls = "SELECT city_name FROM master_city where city_id='$val'";
	$statements=$mysqli->prepare($sqls);	
	$statements->execute();
	$statements->store_result();
	$statements->bind_result($city_name);
	$statements->fetch();	
	echo $city_name;	
}

/* date format */	
function sysConvert($fDate)
{
	$st=explode("/",$fDate);
	$evDay= $st[0];
	$evMonth= $st[1];
	$evYear= $st[2];
	$frDate="";
	if ($evDay!="" && $evMonth!="" && $evYear!="")
	$frDate=($evYear."-".$evMonth."-".$evDay);
	return $frDate;
}
function sysConvert2($fDate)
{
	$st=explode("/",$fDate);
	$evDay= $st[0];
	$evMonth= $st[1];
	$evYear= $st[2];
	$frDate="";
	if ($evDay!="" && $evMonth!="" && $evYear!="")
	$frDate=($evYear."-".$evMonth."-".$evDay);
	return $frDate;
}

function sysConvertYear($fDate)
{
	$st=explode("-",$fDate);
	$evYear= $st[0];// 2007
	$frDate=($evYear);
	return $frDate;
}
function sysConvert1($fDate)
{
$st=explode("/",$fDate);

$evMonth= $st[0];
//$evDay= $st[0];
$evDay= $st[1];
$evYear= $st[2];
$frDate="";
if ($evDay!="" && $evMonth!="" && $evYear!="")
$frDate=($evYear."-".$evMonth."-".$evDay);
return $frDate;
}


function sysDBDateConvert($fDate)
{
$st=explode("-",$fDate);

$evYear= $st[0];// 2007
$evMonth= $st[1];//mon
$evDay= substr($st[2],0,2);//date
$frDate=($evDay."/".$evMonth."/".$evYear);
return $frDate;
}
function sysDBDateConvert1($fDate)
{
$st=explode("-",$fDate);

$evYear= $st[0];// 2007
$evMonth= $st[1];//mon
$evDay= substr($st[2],0,2);//date
$frDate=($evMonth."/".$evDay."/".$evYear);
return $frDate;
}

function sysDBDateConvert12($fDate)
{
$st1=explode(" ",$fDate);
$hr= $st1[0];// 2007
$min= $st1[1];// 2007
$st=explode("-",$hr);
$evYear= $st[0];// 2007
$evMonth= $st[1];//mon
$evDay= substr($st[2],0,2);//date
$st1=explode(":",$min);
$hr1= $st1[0];
if($hr1>12){
$hr2=$hr1-12;
$frDate=($evDay."/".$evMonth."/".$evYear.'&nbsp;'.$hr2.":".$st1[1].'&nbsp;PM');
}else{
$frDate=($evDay."/".$evMonth."/".$evYear.'&nbsp;'.$hr1.":".$st1[1].'&nbsp;AM');
}
return $frDate;
}


///cutword
function cutWord($goal,$size){
	$goal=preg_replace('/([^\s]{'.$size.'})(?=[^\s])/m', '$1 ', $goal);//to cut lengthy single word without space//$goal;
	return $goal;
        
}


/*Notification Message*/
function redirect_with_msg($regindex_type)
{
	$message='';
	if($regindex_type=="SP") {
		$page="reg-project-stud1.php";
	} elseif($regindex_type=="SI") {
		$page="reg-project-stud1.php";
	} elseif($regindex_type=="CIN") {
		$page="reg-institution1.php";
	} elseif($regindex_type=="CIS") {
		$page="reg-institution1.php";
	} elseif($regindex_type=="CRC") {
		$page="reg-institution1.php";
	} elseif($regindex_type=="MR") {
		$page="mentorProfile.php";
	} elseif($regindex_type=="CP") {
		$page="reg-mentor1.php";
	} elseif($regindex_type=="SPM") {
		$page="reg-rsp-mentor1.php";
	} elseif($regindex_type=="SPC") {
		$page="reg-rsp-mentor1.php";
	}elseif($regindex_type=="MEN") {
		$page="reg-mentor1.php";
	}elseif($regindex_type=="COO") {
		$page="coordinator_profile.php";
	}

	$titleMsg="Success!";
        $message='Your details have saved successfully.';

	$_SESSION["title_message"]=$titleMsg;
	$_SESSION["user_message"]=$message;

	header("location:".$page);
	exit;

}

function getMessageNotification($action)
    {
    $message='';
            session_start();
            if($action=='regS')
            {
		$titleMsg="Please check your email";
                $message='We have sent you an email with a registration link. Kindly click on the link to continue with your registration.';
            }elseif($action=='fgtS')
            {
		$titleMsg="Success!";
                $message='We have send you an email with a forgot password link. Kindly click on the link to continue with your Login.';
            }elseif($action=='rstP')
            {
		$titleMsg="Success!";
                $message='Your password has successfully reseted';
            }elseif($action=='SAD')
            {
		$titleMsg="Success!";
                $message='Your booking has saved successfully';
            }
		elseif($action=='proj')
            {
		$titleMsg="Success!";
                $message='Your Projects has saved in Selected Projects List successfully';
            }

            $_SESSION["title_message"]=$titleMsg;
            $_SESSION["user_message"]=$message;

		//echo $_SESSION["title_message"]."#".$_SESSION["user_message"];
		//exit;

    }


function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%&*';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function numbtoDesi($val)
{
	$totAmount=number_format((float)$val, 2, '.', '');
	return $totAmount;
}

function pdfdownload($val1, $val2, $val3)
{
	//$val1="http://evince.us/hazmat/invoice_details.php?sid=80119431480921918";
	$con_url=$val1;
	$pageName="Invoice";
	$url = 'http://freehtmltopdf.com'; 
	$data = array(  'convert' => $con_url, 
		        'size' =>'A4',
		        'baseurl' => 'http://www.evince.us');

	// use key 'http' even if you send the request to https://...
	$options = array(
		'http' => array(
		        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		        'method'  => 'POST',
		        'content' => http_build_query($data),
		),
	);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);

	$file_name = $pageName.".pdf"; // Dynamic
	// set the pdf data as download content:

	$path = $val3.'uploads/pdf/Invoice'.$val2.'.pdf';
	file_put_contents($path, $result);
	//fclose($path);
        // set the pdf data as upload content:

	//header('Content-type: application/pdf');
	//header('Content-Disposition: attachment; filename="'.$file_name.'"');
}


function years($val1)
{
	$tday=date('Y');
	if($val1=='') { $val1=$tday; }
	for($sday=$tday-100; $sday<=$tday; $sday++) {
		if($sday==$val1) { $selVal="selected"; }
		echo '<option value="'.$sday.'" '.$selVal.'>'.$sday.'</option>'; 
	}
}

function get_subcategory($vals)
{
	global $mysqli;

	$query_for_subcat = "SELECT subcategory_name FROM  master_subcategory  WHERE subcategory_id=$vals";
	$statement_for_subcat=$mysqli->prepare($query_for_subcat);
	$statement_for_subcat->execute();
	$statement_for_subcat->store_result();
	$statement_for_subcat->bind_result($subcategory_name);
	$statement_for_subcat->fetch();
	return $subcategory_name;
}

?>
