<?php
  
include_once("class/config.php");

extract($_POST);

$import_file=$_POST["import_file"];

$path = "uploads/csv/";
$name="import_file";
if($_FILES[$name]["size"]>0)
{
        //echo $_FILES[$name]["size"].'###'; exit;

        $img_name= $_FILES[$name]['name']; 
        $val1=explode(".",$img_name);
        $tmp_file = $_FILES[$name]['tmp_name'];
        $imgtype=substr(strrchr(basename($_FILES[$name]["name"]),"."),1); 
        $imgtype=strtolower($imgtype);        
	if($imgtype=="csv") {
		$name_file = $val1[0].time().".".$imgtype;
		move_uploaded_file($tmp_file,$path.$name_file);
	}
}


$fcontents = file ("uploads/csv/".$name_file); 


#expects the csv file to be in the same dir as this script
echo sizeof($fcontents); exit;

for($i=1; $i<sizeof($fcontents); $i++) {
	// for($i=0; $i<1000; $i++) {
	$line = trim($fcontents[$i]); 
	$irs = explode(",", $line);

	if($irs[0]!=''){

		$sql_import="INSERT INTO too_users(user_email, user_type, rsp_id, added_date, status) values('$irs[0]', now(), 'A');";
		$statement_imp= $mysqli->prepare($sql_import);
		$statement_imp->execute();

	}
}

//header("location:import.php?res=imp");
?>
