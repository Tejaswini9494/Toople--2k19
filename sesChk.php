<?php
session_start();
	if($_SESSION["sesLoggedInTOOPLE2016"]=="" && $page!="index" 
	&& $ses!="no")	{header("location:login.php?st=ses");}

	$_SESSION['sessionStart']=DATE('s'); 
		
		
	

?>


