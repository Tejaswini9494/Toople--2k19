<?php

include_once("../class/config.php");
extract($_REQUEST);
$username=$_POST["username"];
$pwd=$_POST["pwd"];


$sql="select user_name,password from admin_login where user_name='$username' AND password='$pwd'";

$statement1=$mysqli->prepare($sql);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($user_name,$password);
$statement1->fetch();
$num_rows=$statement1->num_rows();





echo $num_rows;
if($num_rows>0)
	{
	 session_start();
	$_SESSION["sesLoggedInToople"]="YES";
	$_SESSION["username"]=$username;
	$_SESSION["usertype"]=3;

		$linkHome='myHome.php';
		header("location:myHome.php");
		$_SESSION["linkHome"]=$linkHome;
	}else{
	header("location:index.php?st=invalid");
	}
?>
